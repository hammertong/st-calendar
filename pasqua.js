function Pasqua(yyyy) {
// RITORNA DATA DELLA PASQUA fra il 1753 e il 2500
var Ap, Bp, Cp, Dp, Ep, Fp, Mp;
  if (yyyy<100) yyyy = 1900 + yyyy;
  Ap = yyyy % 19;
  Bp = yyyy % 4;
  Cp = yyyy % 7;
  Dp = (19*Ap + 24) % 30;
  Fp = 0;            // correzione per secoli
  if (yyyy<2500) Fp=3;
  if (yyyy<2300) Fp=2;
  if (yyyy<2200) Fp=1;
  if (yyyy<2100) Fp=0;
  if (yyyy<1900) Fp=6;
  if (yyyy<1800) Fp=5;
  if (yyyy<1700) Fp=4;
  Ep = (2*Bp + 4*Cp + 6*Dp + Fp + 5) % 7;
  Ep = 22 + Dp + Ep;
  Mp = 3;
  if (Ep>31) {
    Mp = 4;
    Ep = Ep - 31;
  }
  return (new Date(yyyy, Mp-1, Ep));
}
// ' ----------------------------------------------------------- 
function isFest(data) {
var s,d,p,ff,f
    // sabato
    s = (data.getDay()==6);
    // domenica
    d = (data.getDay()==0);
    // pasquetta
    pp = Pasqua(data.getFullYear());
    qq = data;
    qq.setDate(qq.getDate()-1);
    p = (date2str(qq) == date2str(pp));
    // FISSI
    ff = " 0101 0106 0425 0501 0602 0815 1101 1208 1225 1226 " 
    // PATRONO
    ff += " 1030 " 
    // data in stringa
    ss = date2str(data);
    f = (ff.indexOf(ss.substr(4))>0);
    return (d || s || p || f);
}
// ' ----------------------------------------------------------- 
function date2str(dd) {
    return String(dd.getFullYear()*10000 + (dd.getMonth()+1)*100 + dd.getDate())
}
