
CREATE TABLE `groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `users` 
	CHANGE COLUMN `grp` `grp` INT DEFAULT NULL ,
ADD INDEX `FK_user_belong_to_group_idx` (`grp` ASC) VISIBLE;

INSERT INTO `groups` (`id`,`name`) VALUES (1,'Servizio Tecnico');

UPDATE users set grp = 1 where username in (
	'montini',
	'castellaro',
	'piazza',
	'zuin',
	'bruzzese'
);

ALTER TABLE `users` 
ADD CONSTRAINT `FK_user_belong_to_group`
  FOREIGN KEY (`grp`)
  REFERENCES `groups` (`id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;
  
INSERT INTO `roles` (`name`) VALUES ('user');
INSERT INTO `roles` (`name`) VALUES ('admin');

CREATE TABLE `profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `roleid` INT NOT NULL,
  `userid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_user_role_idx` (`roleid` ASC) VISIBLE,
  INDEX `FK_user_exists_idx` (`userid` ASC) VISIBLE,
  CONSTRAINT `FK_user_role`
    FOREIGN KEY (`roleid`)
    REFERENCES `roles` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_user_exists`
    FOREIGN KEY (`userid`)
    REFERENCES `users` (`userid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION);


