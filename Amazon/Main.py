import BrandsSpider
import PageSpider
import Requester
import threadpool
import lxml
import re
import pymysql
from bs4 import BeautifulSoup

# 输入
rootCategory = "Electronic" # 电子类
# 输入
rootUrl = "https://www.amazon.com/Home-Audio-Electronics/b/ref=sd_allcat_hat?ie=UTF8&node=667846011" # 电子类入口链接
# 输入-线程总数
threadNum = 3
# 数据库地址,名字，账号，密码及端口
host = "localhost"
db = "amazon"
user = "root"
password = "root"
port = 3306
# 是否使用代理
useProxy = False
# ip池
ipPool = []



try:
    print("数据库链接测试...")
    testConn = pymysql.connect(host=host, user=user, password=password, db=db, port=port)
    print("数据库链接成功。")
except Exception as e:
    print(e)
    print("数据库链接失败！检查~")
    exit()



basicHeaders = {
    'accept':'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
    'accept-encoding':'gzip, deflate, br',
    'accept-language':'zh-CN,zh;q=0.9',
    'User-Agent':'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36',
 }


requester = Requester.Requester(basicHeaders,useProxy,ipPool)

# 爬取二级类目列表
def crawlSecondaryUrlList(rootUrl,rootCategory):
    print("开始解析二级类目列表...")

    rootHtml = requester.sendNewRequest(rootUrl,limit=3).response.content.decode("utf-8")


    soup = BeautifulSoup(rootHtml,"lxml")
    soup.prettify()
    leftNavigation = soup.find('div',attrs={'role':'region'})
    if leftNavigation:
        secondaryUrlInfoReg = re.compile('<li><a href="(.*?)">(.*?)</a></li>')
        secondaryUrlInfoRegSearch = re.findall(secondaryUrlInfoReg,str(leftNavigation))
        paramList = []
        for href , secondaryCategory in secondaryUrlInfoRegSearch:
            try:
                secondaryUrl = str("https://www.amazon.com"+href).replace("amp;","")
                param = ([rootCategory, secondaryUrl,secondaryCategory],None)
                print(param)
                paramList.append(param)
            except:
                continue
        return paramList

    else:
        print('解析二级类目有误！')
        exit()

# 开始爬取二级类目下的多页和所有商标
def crawlSecondaryCategory(rootCategory,secondaryUrl,secondaryCategory):
    print("抓取 ",rootCategory+" >>> "+secondaryCategory)

    # secondaryUrl="https://www.amazon.com/Wireless-Multiroom-Digital-Music-Systems/b/ref=amb_link_1?ie=UTF8&node=12097482011&pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-leftnav&pf_rd_r=CYVYY0VQ8XQG5QMAS0XD&pf_rd_r=CYVYY0VQ8XQG5QMAS0XD&pf_rd_t=101&pf_rd_p=48506895-91ee-4c2c-8d8c-441280c612ea&pf_rd_p=48506895-91ee-4c2c-8d8c-441280c612ea&pf_rd_i=667846011"
    print(secondaryUrl)
    requsterItem = requester.sendNewRequest(url=secondaryUrl,limit=3)
    html =requsterItem.response.content.decode("utf-8")

    # 下面处理商标
    brandsSpider = BrandsSpider.BrandsSpider(requsterItem.session,requester,rootCategory,secondaryCategory,host,db,user,password,port,ipPool)
    brands = brandsSpider.htmlParser(html)
    brandsSpider.brandPersistence(brands)
    # 下面处理产品
    pageSpider = PageSpider.PageSpider(rootCategory,secondaryCategory,host,db,user,password,port,ipPool)
    nextUrl = pageSpider.pageHtmlParser(html,requester)
    pageSpider.crawlEachPage(nextUrl,requsterItem.session,requester)

if __name__ == "__main__":

    paramList = crawlSecondaryUrlList(rootUrl,rootCategory)

    taskPool = threadpool.ThreadPool(threadNum)
    execute = threadpool.makeRequests(crawlSecondaryCategory, paramList)
    for exe in execute:
        taskPool.putRequest(exe)
    taskPool.wait()

    print("执行完毕！")