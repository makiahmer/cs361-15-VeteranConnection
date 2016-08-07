--INSERTION STATEMENTS

-- Campaign Insertions
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('OIF', 2003-03-20, 2010-09-01);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('OEF', 2001-10-07, 2016-12-31);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('Desert Storm', 1991-01-16, 1991-02-28);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('Operation Damayan', 2013-08-22, 2014-10-26);
INSERT INTO campaign (campaign, startDate, endDate) VALUES ('Spartan Shield', 2001-06-12, 2020-11-08);

-- Base insertions
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

-- User insertions
INSERT INTO user(fname, lname, gender, birthDate, city, state, phone, email, rank, username, password, branch, date_start, date_end) VALUES (Forest, Gump, male, 1-1-1975, Atlanta, Georgia, 555-555-5555, forest.gump@gmail.com, SGT, forest.gump, bubba, Army, 8-12-1990, 8-12-1995);
INSERT INTO user(fname, lname, gender, birthDate, city, state, phone, email, rank, username, password, branch, date_start, date_end) VALUES (Billy, Bob, male, 11-1-1985, Los Angeles, California, 666-666-6666, billy.bob@gmail.com, CPL, billy.bob, bobbo, Marine Corp,2-12-2001, 8-12-2005);
INSERT INTO user(fname, lname, gender, birthDate, city, state, phone, email, rank, username, password, branch, date_start, date_end) VALUES (Jane, Doe, female,6-13-1966, New York City, New York, 777-777-7777, jane.doe@yahoo.com, AFC, jane.doe, gijane, Air Farce, 2-12-2001, 8-12-2005);



-- QUERIES

--get all users in this unit
SELECT US.fname, US.lname, US.city, US.state, US.email FROM user_unit USUN
INNER JOIN user US ON US.id = USUN.usid
INNER JOIN unit UN ON UN.id = USUN.unid
WHERE UN.name = {input}
--generic select for 1 relationship
SELECT US.fname, US.lname, US.city, US.state, US.email FROM {pair}
INNER JOIN {item1} ON
INNER JOIN {item2} ON
WHERE {condition}

--get all users who served at this base during this campaign
SELECT US.fname, US.lname, US.city, US.state, US.email FROM user_campaign UC
INNER JOIN user_base UB
INNER JOIN base B ON B.id = UB.bid AND 
INNER JOIN campaign C ON C.id = UC.cid
INNER JOIN user US ON US.id = UC.usid
WHERE {condition}

SELECT US.fname, US.lname, US.city, US.state, US.email FROM user_campaign UC
INNER JOIN campaign C ON C.id = UC.cid
INNER JOIN user US ON US.id = UC.usid
INNER JOIN user_base UB ON UB.usid = US.id
INNER JOIN base B ON B.id = UB.bid
WHERE {condition}



--get all users who did this job at this base
SELECT US.fname, US.lname, US.city, US.state, US.email FROM user_mos UM
INNER JOIN user_base UB
INNER JOIN base B ON B.id = UB.bid AND B.name = {input}
INNER JOIN mos M ON M.id = UM.mid AND M.title = {input}
INNER JOIN user US ON US.id = UC.usid
WHERE {condition}

--select all units from this campaign
SELECT UN.unit FROM unit_campaign UNC
INNER JOIN campaign C ON C.id = UNC.cid
INNER JOIN unit UN ON UN.id = UNC.unid
WHERE C.campaign = {input}

--select all units from this campaign
SELECT UN.unit FROM user_campaign USC
INNER JOIN campain C ON C.id = USC.cid AND C.campaign = {input}
INNER JOIN user US ON US.id = USC.usid
INNER JOIN user_unit USUN
INNER JOIN unit UN ON UN.id = USUN.unid
GROUP BY UN.id