show databases;

use CS3380;

show tables;

select * from CS3380.User;
select * from CS3380.Games;
select * from CS3380.Reviews;
CREATE DATABASE CS3380;

create user 'ec2-user'@'localhost' identified by 'Hunting98';
grant select, insert, delete, update on CS3380.* to 'ec2-user'@'localhost';

insert into Games(gameName, pubYear, ESRb, developer, price, publisher, imageLocation) values ('Fallout 4', '2015', 'M', 'Bethesda Game Studios', '34.99', 'Bethesda Softworks', 'Fallout4.jpg');

insert into Games(gameName, pubYear, ESRb, developer, price, publisher, imageLocation) values ('Rainbow Six Siege', '2015', 'M', 'Ubisoft Montreal', '39.99', 'Ubisoft', 'R6Siege.jpeg' );

ALTER TABLE Reviews 
ADD FOREIGN KEY (username) REFERENCES User(username) on delete cascade;


UPDATE User SET password = 'admin' WHERE username = 'hunterjohnson97';

ALTER TABLE Reviews 
ADD FOREIGN KEY (gameTitle, pubYear) REFERENCES Games(gameName, pubYear) on delete cascade;


ALTER TABLE Games ADD imageLocation VARCHAR(30) NOT NULL;

delete from User where username='hunting98';

drop table Reviews;

CREATE TABLE User(
username VARCHAR(20) NOT NULL,
password VARCHAR(41) NOT NULL,
bdate DATE NOT NULL,
email VARCHAR(100) NOT NULL,
fname VARCHAR(10) NOT NULL,
lname VARCHAR(10) NOT NULL,
PRIMARY KEY(username)
);

CREATE TABLE Purchases(
orderNumber INT NOT NULL,
dateOfPurchase DATE NOT NULL,
costs FLOAT NOT NULL,
PRIMARY KEY(orderNumber)
);

insert into Company(licenseNum) values('696969');

CREATE TABLE Company(
licenseNum INT NOT NULL,
PRIMARY KEY(licenseNum)
);

CREATE TABLE userPhoneNumber(
username VARCHAR(20) NOT NULL,
phoneNumber INT NOT NULL,
PRIMARY KEY(username, phoneNumber)
);

CREATE TABLE Merch(
inventoryNum INTEGER NOT NULL,
price FLOAT NOT NULL,
productName VARCHAR(50) NOT NULL,
PRIMARY KEY(inventoryNum)
);

CREATE TABLE Physical(
name VARCHAR(50) NOT NULL,
pubYear INTEGER(4) NOT NULL,
manufacturingNum INTEGER NOT NULL,
PRIMARY KEY(name, pubYear, manufacturingNum)
);

Create TABLE Digital(
name VARCHAR(50) NOT NULL,
pubYear INTEGER(4) NOT NULL,
digitalCode INTEGER NOT NULL,
PRIMARY KEY(name, pubYear, digitalCode)
);

CREATE TABLE Games(
gameName varChar(50) NOT NULL,
pubYear INTEGER(4) NOT NULL,
ESRb char NOT NULL,
developer VARCHAR(50) NOT NULL,
price FLOAT NOT NULL,
publisher VARCHAR(50) NOT NULL,
PRIMARY KEY(gameName, pubYear)
);

CREATE TABLE Reviews(
username VARCHAR(20) NOT NULL,
gameTitle VARCHAR(50) NOT NULL,
platform VARCHAR(20)  NOT NULL,
pubYear INTEGER(4) NOT NULL,
ratingDesc VARCHAR(280),
ratingNum INTEGER(1) NOT NULL,
PRIMARY KEY(username, gameTitle, platform, pubYear),
FOREIGN KEY (username) REFERENCES User(username) on delete cascade,
FOREIGN KEY (gameTitle, pubYear) REFERENCES Games(gameName, pubYear) on delete cascade
);