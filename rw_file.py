# -*- coding: utf-8 -*-
# ver.1.0.0
#
#---------------------------------------

import codecs

class rw_file:

    def __init__(self):
        pass

    def read(self,path,code="utf-8"):
        f = codecs.open(path,"r",code)
        str = ""
        for row in f:
            str += row
        f.close()
        return str

    def write(self,path,str,code="utf-8"):
        f = codecs.open(path,"w",code)
        f.write(str)
        f.close()

if __name__ == "__main__":
    pass
    rw = rw_file()
    str = rw.read("dat/file.txt")
    rw.write("dat/file2.txt",str)
    print str

