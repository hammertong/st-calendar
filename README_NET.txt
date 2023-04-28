{
  "ip": "34.154.231.236",
  "hostname": "236.231.154.34.bc.googleusercontent.com",
  "city": "Milan",
  "region": "Lombardy",
  "country": "IT",
  "loc": "45.4643,9.1895",
  "org": "AS396982 Google LLC",
  "postal": "20121",
  "timezone": "Europe/Rome",
  "readme": "https://ipinfo.io/missingauth"
}
o
CREATE\040TABLE\040`users`\040(\040\040\040`userid`\040int(10)\040NOT\040NULL\040UNIQUE\040AUTO_INCREMENT\040COMMENT\040'user\040id\040univoco',\040\040\040`name`\040varchar(40)\040NOT\040NULL,\040\040\040`surname`\040varchar(40)\040NOT\040NULL,\040\040\040`email`\040varchar(64)\040NOT\040NULL,\040\040\040`username`\040varchar(32)\040NOT\040NULL,\040\040\040`userpass`\040varchar(32)\040NOT\040NULL,\040\040\040`my_lang`\040enum('it-it','en-us','es-es','fr-fr','de-de')\040NOT\040NULL\040DEFAULT\040'it-it',\040\040\040`user_status`\040int(1)\040NOT\040NULL\040DEFAULT\040'0'\040COMMENT\040'0=inactive,\0401=active,\0402=disabled',\040\040\040`grp`\040enum('admins','user')\040NOT\040NULL\040DEFAULT\040'user',\040PRIMARY\040KEY\040(`userid`),\040UNIQUE\040KEY\040`email`\040(`email`)\040\040\040);
show\040tables;
select\040*\040from\040users
;
insert\040into\040users\040(username,\040userpass,\040email)\040values\040('montini',\040sha1('Federico1').\040'federico.montini@urmet.com');
insert\040into\040users\040(username,\040userpass,\040email)\040values\040('montini',\040sha1('Federico1'),\040'federico.montini@urmet.com');
insert\040into\040users\040(username,\040userpass,\040email)\040values\040('montini',\040md5('Federico1'),\040'federico.montini@urmet.com');
insert\040into\040users\040(username,\040userpass,\040email)\040values\040('montini',\040md5('Federico1'),\040'Federico',\040'Montini',\040'federico.montini@urmet.com');
insert\040into\040users\040(username,\040userpass,\040name,\040surname,\040email)\040values\040('montini',\040md5('Federico1'),\040'Federico',\040'Montini',\040'federico.montini@urmet.com');
insert\040into\040users\040(username,\040userpass,\040name,\040surname,\040email)\040values\040('bruzzese',\040md5('Giuseppe1'),\040'Giuseppe',\040'Bruzzese',\040'giuseppe.bruzzese@urmet.com');
insert\040into\040users\040(username,\040userpass,\040name,\040surname,\040email)\040values\040('castellaro',\040md5('Massimiliano1'),\040'Massimiliano',\040'Castellaro',\040'massimiliano.castellaro@urmet.com');



