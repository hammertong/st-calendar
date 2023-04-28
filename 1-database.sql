CREATE TABLE `events` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` datetime NOT NULL,
  `evt_end` datetime NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL,
  `evt_bg` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `events`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`),
  ADD KEY `evt_end` (`evt_end`);

ALTER TABLE `events`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- user profiles 
--

CREATE TABLE `users` (
    `userid` int(10) NOT NULL UNIQUE AUTO_INCREMENT COMMENT 'user id univoco',   
    `name` varchar(40) NOT NULL,   
    `surname` varchar(40) NOT NULL,   
    `email` varchar(64) NOT NULL,   
    `username` varchar(32) NOT NULL UNIQUE,   
    `userpass` varchar(32) NOT NULL,   
    `my_lang` enum('it-it','en-us','es-es','fr-fr','de-de') NOT NULL DEFAULT 'it-it',   
    `user_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=inactive, 1=active, 2=disabled',   
    `grp` enum('admins','user') NOT NULL DEFAULT 'user', 
    PRIMARY KEY (`userid`), 
    UNIQUE KEY `email` (`email`)   
);

ALTER TABLE `calendar`.`users` 
  ADD COLUMN `default_color` VARCHAR(8) NULL AFTER `grp`;

INSERT into users (username, userpass, name, surname, email) values ('montini', md5('Federico1'), 'Federico', 'Montini', 'federico.montini@urmet.com');
INSERT into users (username, userpass, name, surname, email) values ('bruzzese', md5('Giuseppe1'), 'Giuseppe', 'Bruzzese', 'giuseppe.bruzzese@urmet.com');
INSERT into users (username, userpass, name, surname, email) values ('castellaro', md5('Massimiliano1'), 'Massimiliano', 'Castellaro', 'massimiliano.castellaro@urmet.com');
INSERT into users (username, userpass, name, surname, email) values ('piazza', md5('Simone1'), 'Simone', 'Piazza', 'simone.piazza@urmet.com');
INSERT into users (username, userpass, name, surname, email) values ('zuin', md5('Matteo1'), 'Matteo', 'Zuin', 'matteo.zuin@urmet.com');

UPDATE users set default_color = '#ed7d31' where username like 'bruzzese';
UPDATE users set default_color = '#ffc000' where username like 'montini';
UPDATE users set default_color = '#4472c4' where username like 'castellaro';
UPDATE users set default_color = '#70ad47' where username like 'piazza';
UPDATE users set default_color = '#ff0000' where username like 'zuin';

ALTER TABLE `calendar`.`events`  ADD COLUMN `userid` INT(10) NULL AFTER `evt_bg`;


