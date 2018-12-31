import requests
import time
import random
import urllib3

urllib3.disable_warnings()
# 所有请求归我管吧！

class Requester():

    def __init__(self,header,useProxyPool,useProxyFun,ipPool,limit):
        self.header = header
        self.ipPool = ipPool
        self.useProxyPool = useProxyPool
        self.useProxyFun = useProxyFun
        self.limit = limit

    def retry(count=1):
        def dec(f):
            def ff(*args, **kwargs):
                ex = None
                for i in range(count):
                    try:
                        ans = f(*args, **kwargs)
                        return ans
                    except Exception as e:
                        ex = e
                raise ex

            return ff

        return dec

    def log(text):
        def decorator(func):
            def wrapper(*args, **kw):
                print('%s %s():' % (text, func.__name__))
                return func(*args, **kw)

            return wrapper

        return decorator

    # limit 请求多少次失败跳过
    @retry(self.limit)
    @log("execute")
    def sendNewRequest(self,url):

        req = requests.session()
        req.headers = self.header
        if self.useProxyPool:
            req.proxies = {'http': random.choice(self.ipPool)}
        if self.useProxyFun:
            proxyip = self.getIP()
            req.proxies = {"http" : 'http://' + proxyip, "https" : 'https://' + proxyip}
        else:
            req.proxies = None
        response = req.get(url, verify=False,timeout=15)
        requesterItem = RequesterItem()
        requesterItem.response = response
        requesterItem.session = req
        return requesterItem

    # 用旧回话执行请求
    @retry(self.limit)
    @log("execute")
    def executeOldRequest(self,url,session):

        if self.useProxyPool:
            session.proxies = {'http': random.choice(self.ipPool)}
        elif self.useProxyFun:
            proxyip = self.getIP()
            session.proxies = {"http" : 'http://' + proxyip, "https" : 'https://' + proxyip}
        else:
            session.proxies = None
        response = session.get(url,verify=False,timeout=15)
        requesterItem = RequesterItem()
        requesterItem.response = response
        requesterItem.session = session
        return requesterItem


class RequesterItem():

    def __init__(self):
        self.response = None
        self.session = None