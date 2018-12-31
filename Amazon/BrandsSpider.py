import re
import json
import pymysql

class BrandsSpider:
    def __init__(self,session,requester,rootCategory,secondaryCategory,host,db,user,password,port,ipPool):
        self.ifMore = False
        req = session
        self.req = req
        self.rootCategory = rootCategory
        self.requester = requester
        self.secondaryCategory = secondaryCategory
        self.dbLinker = pymysql.connect(host=host, user=user, password=password, db=db, port=port)
        self.dbCursor = self.dbLinker.cursor()
        self.ipPool = ipPool

    def htmlParser(self,html):

        if "Featured Brands" not in html:
            if '<h4 class="a-size-small a-spacing-mini a-color-base a-text-bold">Brand</h4>' not in html:
                print("not one brand！")
                return []

        smTagReg = re.compile('<a class="a-link-normal" href="(.*?)"><span class="a-size-small">See more</span></a>')
        smTagRegSearch = re.findall(smTagReg,html)
        if len(smTagRegSearch)!=0:
            brands = []
            # https://www.amazon.com/gp/search/other/ref=sr_sa_p_89?rh=n%3A172282%2Cn%3A667846011%2Cn%3A172563%2Ck%3AOutdoor+Speakers&bbn=667846011&keywords=Outdoor+Speakers&pickerToList=lbr_brands_browse-bin&ie=UTF8&qid=1535290664
            # https://www.amazon.com/gp/search/other/ref=sr_in_a_Y?rh=i%3Aelectronics-accessories%2Cn%3A172282%2Cn%3A%21493964%2Cn%3A281407%2Cn%3A172532&bbn=172532&pickerToList=lbr_brands_browse-bin&indexField=a&ie=UTF8&qid=1535289903
            for indexField in ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']:

                smUrl = ("https://www.amazon.com"+smTagRegSearch[0]).replace("amp;","") +"&indexField="+indexField
                smHtml = self.requester.executeOldRequest(smUrl,self.req,3).response.content.decode("utf-8")
                print(smUrl)
                brandSearch = re.compile('<span class="refinementLink">(.*?)</span>').findall(smHtml)
                brands+=brandSearch

        else:
            if "Featured Brands" in html:
                regTxt = str(str(html).split('Featured Brands')[1]).split('Packaging Option')[0]
            else:
                regTxt = str(str(html).split('<h4 class="a-size-small a-spacing-mini a-color-base a-text-bold">Brand</h4>')[1]).split('Packaging Option')[0]
            brands = re.compile('<span class="a-size-small a-color-base s-ref-text-link s-ref-link-cursor">(.*?)</span>').findall(regTxt)
        print(brands)
        return brands

    def brandPersistence(self,brands):
        for brand in brands:
            sql = 'insert into brands(rootCategory,secondaryCategory,brand) values(%s,%s,%s)'

            try:
                self.dbCursor.execute(sql, (self.rootCategory, self.secondaryCategory, brand))
                # 提交
                self.dbLinker.commit()

            except Exception as e:
                print(e)
                # 错误回滚
                self.dbLinker.rollback()

    def __del__(self):
        self.dbLinker.close()
