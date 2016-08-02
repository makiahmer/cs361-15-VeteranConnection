DROP TABLE IF EXISTS `user_campaign`;
DROP TABLE IF EXISTS `user_unit`;
DROP TABLE IF EXISTS `user_mos`;
DROP TABLE IF EXISTS `user_job`;
DROP TABLE IF EXISTS `user_base`;
DROP TABLE IF EXISTS `unit_campaign`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `unit`;
DROP TABLE IF EXISTS `campaign`;
DROP TABLE IF EXISTS `mos`;
DROP TABLE IF EXISTS `base`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `school`;



CREATE TABLE user (
	id int(11) NOT NULL AUTO_INCREMENT,
	
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	birthDate DATE NOT NULL,
	gender varchar(255),
	
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	
	city varchar(255),
	state varchar(255),
	
	phone varchar(255),
	email varchar(255),

	branch varchar(255),
	date_start DATE,
	date_end DATE,
	
	rank varchar(255) NOT NULL,
	
	
	PRIMARY KEY (id),
	CONSTRAINT username UNIQUE (username)
) ENGINE=InnoDB;



CREATE TABLE unit(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`unit` varchar(255) NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT unitName UNIQUE (unit)
) ENGINE=InnoDB;

CREATE TABLE campaign(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`campaign` varchar(255) NOT NULL,
	`startDate` DATE NOT NULL,
	`endDate` DATE NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT campaignName UNIQUE (campaign)
) ENGINE=InnoDB;

CREATE TABLE base(
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT baseName UNIQUE (name)
) ENGINE=InnoDB;

CREATE TABLE jobs(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(255),
	PRIMARY KEY (id)
) ENGINE=InnoDB;



CREATE TABLE user_campaign(
	`uid` int(11),
	`cid` int(11),
	date DATE,
	PRIMARY KEY (uid, cid),
	FOREIGN KEY uid REFERENCES user (id),
	FOREGIN KEY cid REFERENCES campaign (id)
) ENGINE=InnoDB;

CREATE TABLE user_unit(
	`usid` int(11),
	`unid` int(11),
	date_start DATE,
	date_end DATE,
	PRIMARY KEY (usid, unid)
	FOREIGN KEY usid REFERENCES user (id),
	FOREGIN KEY unid REFERENCES unit (id)
) ENGINE=InnoDB;

CREATE TABLE unit_campaign(
	`uid` int(11),
	`cid` int(11),
	PRIMARY KEY (uid, cid)
	FOREIGN KEY uid REFERENCES unit (id)
	FOREGIN KEY cid REFERENCES campaign (id)
) ENGINE=InnoDB;

CREATE TABLE user_job(
	`uid` int(11),
	`jid` int(11),
	PRIMARY KEY (uid, jid),
	FOREIGN KEY uid REFERENCES user (id),
	FOREGIN KEY jid REFERENCES job (id)
	
) ENGINE=InnoDB;

CREATE TABLE user_base(
	uid int(11),
	bid int(11),
	date_start DATE,
	date_end DATE,
	PRIMARY KEY (uid, bid),
	FOREIGN KEY uid REFERENCES user (id),
	FOREGIN KEY bid REFERENCES base (id)
) ENGINE=InnoDB;

CREATE TABLE school(
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE user_school(
	usid int(11),
	sid int(11),
	date_attended DATE,
	PRIMARY KEY (usid, sid),
	FOREIGN KEY uid REFERENCES user (id),
	FOREGIN KEY cid REFERENCES school (id)
) ENGINE=InnoDB;