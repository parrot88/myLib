# -*- coding: utf-8 -*-
from bs4 import BeautifulSoup
import urllib2
#import os, re, urlparse

#Site = 'https://www.google.co.jp'
Site = 'http://www.yahoo.co.jp/'

soup = BeautifulSoup(urllib2.urlopen(Site), "lxml")
#res = soup.find_all("a")
#res = soup.a.get("href")
res = soup.select('a[href^="http://"]')

for one in res:
    print one

#from pprint import pprint
#pprint(txt)
print 'Finish'
