import re
import json
import lxml
import pymysql
import requests
from bs4 import BeautifulSoup

class PageSpider():
    def __init__(self,rootCategory,secondaryCategory,host,db,user,password,port,ipPool):
        self.rootCategory = rootCategory
        self.secondaryCategory = secondaryCategory

        self.dbLinker = pymysql.connect(host=host, user=user,password=password, db=db, port=port)
        self.dbCursor = self.dbLinker.cursor()

        self.ipPool = ipPool


    def __del__(self):
        self.dbLinker.close()

    def getPageNum(self):
        pass

    def crawlEachPage(self,nextUrl,session,requester):
        while(nextUrl):
            response = requester.executeOldRequest(nextUrl,session,3).response
            html = response.content.decode("utf-8")
            nextUrl = self.pageHtmlParser(html,requester)

    def pageHtmlParser(self,html,requester):
        soup = BeautifulSoup(html,"lxml")
        soup.prettify()
        pagnTag = soup.find("span",attrs={'class':'pagnCur'})
        if pagnTag:
            print("当前页 :",pagnTag.get_text())

        allDivTag = soup.find_all("li",attrs={'class':['s-result-item','celwidget']})
        if (len(allDivTag)) > 30:
            allDivTag = allDivTag[:30]
        for divTag in allDivTag:
            print("---------------------------------")

            asin = ""
            title = ""
            price = ""
            link = ""
            brand = ""

            txt = str(divTag)
            Dsoup = BeautifulSoup(txt,"html.parser")

            try:
                asin = divTag['data-asin']
            except:
                continue

            aTag = Dsoup.find("a",attrs={'class':['s-access-detail-page','s-color-twister-title-link']})
            if aTag:
                title = aTag['title']
                link = str(aTag['href'])
                if link.count("https://www.amazon.com")==0:
                    link = "https://www.amazon.com"+link

            priceTag = Dsoup.find('span',attrs={'class':['sx-price', 'sx-price-large',]})
            if priceTag:
                priceTag = str(priceTag.get_text()).replace("\n","").replace(" ","")
                price = priceTag[:-2]+"."+priceTag[-2:]
            if price == "":
                priceSpanTag = Dsoup.find('span',attrs={'class':['a-size-base','a-color-base"']})
                if priceSpanTag:
                    price = priceSpanTag.get_text()

            brandReg = re.compile('<span class="a-size-small a-color-secondary">by </span><span class="a-size-small a-color-secondary">(.*?)</span>')
            brandRegSearch = re.findall(brandReg,txt)
            if len(brandRegSearch)!=0:
                brand = brandRegSearch[0]

            headers = {
                'Accept': '*/*',
                'Accept-Encoding': 'gzip, deflate, br',
                'Accept-Language': 'zh-CN,zh;q=0.9',
                'Connection': 'keep-alive',
                'Content-Length': '142',
                'Content-Type': 'application/json',
                 'Host': 'amzscout.net',
                'Cookie':'cid = 977721',
                'Origin': 'null',
                'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36',

            }

            reqSession = requests.session()
            reqSession.headers = headers

            try:
                response = requester.executeOldRequest(link, reqSession, 3).response
                Dhtml = response.content.decode("utf-8")
                jsonInfoReg = re.compile(''' <span>#(.*?) in (.*?)
                                        <br>''')
                jsonInfoRegSearch = re.findall(jsonInfoReg, Dhtml)
                dataList = []
                for jsonInfo in jsonInfoRegSearch:
                    dataList.append({"rank": int(jsonInfo[0]),
                                     "category": str(BeautifulSoup(jsonInfo[1], "html.parser").get_text()).replace(' > ',
                                                                                                                   '|')})
                jsonData = json.dumps(dataList)
                url = "https://amzscout.net/estimator/v1/COM/" + asin + "/sales"
                response = requests.post(url, data=jsonData, headers=headers)
                jsonDict = json.loads(response.content.decode("utf-8"))
                if jsonDict.__contains__("sales"):

                    sales = jsonDict['sales']
                else:
                    sales = ""
                    print("无sales,设为空值")
            except:
                sales = ""
                print('sales 请求失败！')

            print('asin :',asin,"\n",'标题 :',title)
            print('商标 :',brand)
            print('价格 :',price)
            print('链接 :',link)
            print('预期 :',sales)

            sql = "insert into product(rootCategory,secondaryCategory,asin,title,brand,price,link,sales) values(%s,%s,%s,%s,%s,%s,%s,%s)"

            try:
                self.dbCursor.execute(sql,(self.rootCategory,self.secondaryCategory,asin,title,brand,price,link,sales))
                # 提交
                self.dbLinker.commit()

            except Exception as e:
                print(e)
                # 错误回滚
                self.dbLinker.rollback()


        nextUrlTag = soup.find('a',attrs={'class','pagnNext'})
        if nextUrlTag:
            nextUrl = "https://www.amazon.com"+nextUrlTag['href']
            return nextUrl
        else:return None
