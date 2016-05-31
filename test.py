import os, re, urllib, urlparse
#http://blog.livedoor.jp/kato_taka_special/archives/51331337.html

Site = 'https://www.google.co.jp'

t=urllib.urlopen(Site)
txt = t.read()
#txt = txt.encode('utf_8')   #

import rw_file
rwf = rw_file.rw_file()

rwf.write('dat/file2.txt',txt)

print 'Finish'
