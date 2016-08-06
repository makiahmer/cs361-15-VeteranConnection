DROP TABLE IF EXISTS `user_campaign`;
DROP TABLE IF EXISTS `user_unit`;
DROP TABLE IF EXISTS `user_mos`;
DROP TABLE IF EXISTS `user_job`;
DROP TABLE IF EXISTS `user_base`;
DROP TABLE IF EXISTS `user_school`;
DROP TABLE IF EXISTS `unit_campaign`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `unit`;
DROP TABLE IF EXISTS `campaign`;
DROP TABLE IF EXISTS `mos`;
DROP TABLE IF EXISTS `base`;
DROP TABLE IF EXISTS `job`;
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

CREATE TABLE job(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(255),
	PRIMARY KEY (id)
) ENGINE=InnoDB;



CREATE TABLE user_campaign(
	`uid` int(11),
	`cid` int(11),
	‘date’ DATE,
	PRIMARY KEY (uid, cid),
	FOREIGN KEY (uid) REFERENCES user (id),
	FOREIGN KEY (cid) REFERENCES campaign (id)
) ENGINE=InnoDB;

CREATE TABLE user_unit(
	`usid` int(11),
	`unid` int(11),
	date_start DATE,
	date_end DATE,
	PRIMARY KEY (usid, unid),
	FOREIGN KEY (usid) REFERENCES user (id),
	FOREIGN KEY (unid) REFERENCES unit (id)
) ENGINE=InnoDB;

CREATE TABLE unit_campaign(
	`uid` int(11),
	`cid` int(11),
	PRIMARY KEY (uid, cid),
	FOREIGN KEY (uid) REFERENCES unit (id),
	FOREIGN KEY (cid) REFERENCES campaign (id)
) ENGINE=InnoDB;

CREATE TABLE user_job(
	`uid` int(11),
	`jid` int(11),
	PRIMARY KEY (uid, jid),
	FOREIGN KEY (uid) REFERENCES user (id),
	FOREIGN KEY (jid) REFERENCES job (id)
	
) ENGINE=InnoDB;

CREATE TABLE user_base(
	uid int(11),
	bid int(11),
	date_start DATE,
	date_end DATE,
	PRIMARY KEY (uid, bid),
	FOREIGN KEY (uid) REFERENCES user (id),
	FOREIGN KEY (bid) REFERENCES base (id)
) ENGINE=InnoDB;

CREATE TABLE school(
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE user_school(
	uid int(11),
	sid int(11),
	date_attended DATE,
	PRIMARY KEY (uid, sid),
	FOREIGN KEY (uid) REFERENCES user (id),
	FOREIGN KEY (sid) REFERENCES school (id)
) ENGINE=InnoDB;

CREATE TABLE connections(
	iduser int(11),
	idfriend int(11),
	PRIMARY KEY (iduser, idfriend),
	FOREIGN KEY (iduser) REFERENCES user (id),
	FOREIGN KEY (idfriend) REFERENCES user (id)
) ENGINE=InnoDB;

INSERT INTO campaign (campaign, startDate, endDate) VALUES ('OIF', 2003-03-20, 2010-09-01);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('OEF', 2001-10-07, 2016-12-31);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('Desert Storm', 1991-01-16, 1991-02-28);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('Operation Damayan', 2013-08-22, 2014-10-26);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('Spartan Shield', 2001-06-12, 2020-11-08);

INSERT INTO base (name) VALUES ('Parris Island, Recruit Depot');
INSERT INTO base (name) VALUES ('Mayport');
INSERT INTO base (name) VALUES ('Fort Carson');
INSERT INTO base (name) VALUES ('Edwards Air Force Base');
INSERT INTO base (name) VALUES ('Key West');

INSERT INTO unit (unit) VALUES ('2nd Fighter Training Squadron');
INSERT INTO unit (unit) VALUES ('USS Green Bay');
INSERT INTO unit (unit) VALUES ('4th Infantry Division');
INSERT INTO unit (unit) VALUES ('Marine Air Group 2');
INSERT INTO unit (unit) VALUES ('Combat Logistics Regiment 3');
 