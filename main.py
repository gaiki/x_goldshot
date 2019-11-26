import urllib.request
import re
import mysql.connector
from datetime import date


dat = date.today()

url = "https://www.x-kom.pl/"
request = urllib.request.Request(url)
response = urllib.request.urlopen(request)
resdata = response.read().decode("utf-8")
quantity = 10

#Html search
namev = re.findall(r"<p class=\"product-name\">(.*?)</p>", str(resdata))
pricev = re.findall(r"<div class=\"old-price\">(.*?)</div>", str(resdata))
newpricev = re.findall(r"<div class=\"new-price\">(.*?)</div>", str(resdata))


#mysql connection
try:
    con = mysql.connector.connect(password='',user='', host='', database='nowa', autocommit='')
    print ("Database successfully connected")
except:
    print ("Please Check Your DB Details")
cursor = con.cursor()
dane = ("INSERT INTO xkom_dane (`product`, `data`,  `oldprice`, `newprice`, `dostepnosc`) VALUES ('%s', '%s', '%s', '%s', '%s' )" % (namev[0], dat,  pricev[0], newpricev[0], quantity))
cursor.execute(dane)