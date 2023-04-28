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

CREATE TABLE `users` (
    `userid` int(10) NOT NULL UNIQUE AUTO_INCREMENT COMMENT 'user id univoco',   
    `name` varchar(40) NOT NULL,   
    `surname` varchar(40) NOT NULL,   
    `email` varchar(64) NOT NULL,   
    `username` varchar(32) NOT NULL,   
    `userpass` varchar(32) NOT NULL,   
    `my_lang` enum('it-it','en-us','es-es','fr-fr','de-de') NOT NULL DEFAULT 'it-it',   
    `user_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=inactive, 1=active, 2=disabled',   
    `grp` enum('admins','user') NOT NULL DEFAULT 'user', 
    PRIMARY KEY (`userid`), 
    UNIQUE KEY `email` (`email`)   
);

insert into users (username, userpass, email) values ('montini', sha1('Federico1'). 'federico.montini@urmet.com');
insert into users (username, userpass, email) values ('montini', sha1('Federico1'), 'federico.montini@urmet.com');
insert into users (username, userpass, email) values ('montini', md5('Federico1'), 'federico.montini@urmet.com');
insert into users (username, userpass, email) values ('montini', md5('Federico1'), 'Federico', 'Montini', 'federico.montini@urmet.com');
insert into users (username, userpass, name, surname, email) values ('montini', md5('Federico1'), 'Federico', 'Montini', 'federico.montini@urmet.com');
insert into users (username, userpass, name, surname, email) values ('bruzzese', md5('Giuseppe1'), 'Giuseppe', 'Bruzzese', 'giuseppe.bruzzese@urmet.com');
insert into users (username, userpass, name, surname, email) values ('castellaro', md5('Massimiliano1'), 'Massimiliano', 'Castellaro', 'massimiliano.castellaro@urmet.com');



