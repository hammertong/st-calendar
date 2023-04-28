curl "http://mwe.grpud.net/ajax.asp" ^
  -H "Accept: */*" ^
  -H "Accept-Language: it-IT,it;q=0.9,de-DE;q=0.8,de;q=0.7,en-US;q=0.6,en;q=0.5" ^
  -H "Connection: keep-alive" ^
  -H "Content-Type: application/x-www-form-urlencoded; charset=UTF-8" ^
  -H "Cookie: ASPSESSIONIDQQRTDQCS=GIHPFFGAEIIMLDCGDLMAKHNP" ^
  -H "Origin: http://mwe.grpud.net" ^
  -H "Referer: http://mwe.grpud.net/login.asp" ^
  -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36" ^
  -H "X-Requested-With: XMLHttpRequest" ^
  --data-raw "items=LOGIN_USER,mntfrc,Pandora6^!" ^
  --compressed ^
  --insecure
 
ASPSESSIONIDSSRSCTCT=HPADOABBHIAPMPFOEAIDFMID

curl "http://mwe.grpud.net/urmet/ajaxNewDoc.asp" ^
  -H "Accept: */*" ^
  -H "Accept-Language: it-IT,it;q=0.9,de-DE;q=0.8,de;q=0.7,en-US;q=0.6,en;q=0.5" ^
  -H "Connection: keep-alive" ^
  -H "Content-Type: application/x-www-form-urlencoded; charset=UTF-8" ^
  -H "Cookie: ASPSESSIONIDSSRSCTCT=HPADOABBHIAPMPFOEAIDFMID" ^
  -H "Origin: http://mwe.grpud.net" ^
  -H "Referer: http://mwe.grpud.net/urmet/new_doc.asp?cDipKey=000102010225&nMdId=127&nVis=1" ^
  -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36" ^
  -H "X-Requested-With: XMLHttpRequest" ^
  --data-raw "creatore=000102010225&mdid=127&docid=0&azione=RICHIEDI&cRifDipKey=000102010225&tipoGiustificativo=giorni&dataInizio=27^%^2F04^%^2F2023&dataFine=27^%^2F04^%^2F2023&tipoPermesso=0712&oreIni=--&minIni=--&oreEnd=--&minEnd=--&note=come+da+accordi+con+la+DG" ^
  --compressed ^
  --insecure 


