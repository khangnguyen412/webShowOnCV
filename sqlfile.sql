create database DingDongFastFood;

create table users(
    id int not null primary key auto_increment,
    username varchar(50) not null,
    passwords varchar(500) not null,
    timecreate datetime not null default current_timestamp(),
    timeupdate datetime not null default current_timestamp()
);

create table admins(
    id int not null primary key auto_increment,
    username varchar(50) not null,
    passwords varchar(500) not null,
    timecreate datetime not null default current_timestamp(),
    timeupdate datetime not null default current_timestamp()
);

create table drink(
	id int not null primary key auto_increment,
    drinkname nvarchar(255) not null,
    price varchar(15) not null,
    img  nvarchar(500) not null, 
    drinkdescription text not null,
    timeupload datetime not null default current_timestamp(),
    timeupdate datetime not null default current_timestamp()
);

create table food(
	id int not null primary key auto_increment,
    foodname nvarchar(255) not null,
    price varchar(15) not null,
    img  nvarchar(500) not null, 
    fooddescription text not null,
    timeupload datetime not null default current_timestamp(),
    timeupdate datetime not null default current_timestamp()
);
create table usercommentfood(
    id int not null primary key auto_increment,
	userid int not null,
    foodid int not null,
    comments text not null,
    datecoments datetime not null default current_timestamp(),
    CONSTRAINT FK_userid FOREIGN KEY (userid) REFERENCES users(id),
    CONSTRAINT FK_foodid FOREIGN KEY (foodid) REFERENCES food(id)
);

create table admincommentfood(
    id int not null primary key auto_increment,
	adminid int not null,
    foodid int not null,
    comments text not null,
    datecoments datetime not null default current_timestamp(),
    CONSTRAINT FK_adminid FOREIGN KEY (adminid) REFERENCES admins(id),
    CONSTRAINT FK_foodid2 FOREIGN KEY (foodid) REFERENCES food(id)
);

create table usercommentdrink(
    id int not null primary key auto_increment,
	userid int not null,
    drinkid int not null,
    comments text not null,
    datecoments datetime not null default current_timestamp(),
    CONSTRAINT FK_userid2 FOREIGN KEY (userid) REFERENCES users(id),
    CONSTRAINT FK_drinkid FOREIGN KEY (drinkid) REFERENCES drink(id)
);

create table admincommentdrink(
    id int not null primary key auto_increment,
	adminid int not null,
    drinkid int not null,
    comments text not null,
    datecoments datetime not null default current_timestamp(),
    CONSTRAINT FK_adminid2 FOREIGN KEY (adminid) REFERENCES admins(id),
    CONSTRAINT FK_drinkid2 FOREIGN KEY (drinkid) REFERENCES drink(id)
);

select * from admins;
select * from users;
insert into users (username, passwords) values ('ronglun', 'ronglun');
insert into users (username, passwords) values ('khangnguyen', '82304289ee4cd9b6e1da8eaa58a39de1');
SELECT * FROM users where username = "khangnguyen";
update admins set username = 'khangnguyen', passwords = "82304289ee4cd9b6e1da8eaa58a39de1", timeupdate = now()  where id = 57;
alter table admins drop column avt;
delete from admins where id = 63;
SET SQL_SAFE_UPDATES = 0;
alter table admins add constraint UC_username unique (username);
alter table users modify column passwords varchar(500) not null;
select * from drink;
select * from food;
select id, foodname, price, img, fooddescription, timeupload, timeupdate from food;
insert into food (foodname, price, img, fooddescription) values ('cá', '12000', '123.png', 'ngon');
insert into drink (drinkname, price, img, drinkdescription) values ('cá', '12000', '123.png', 'ngon');
update food set foodname = 'fish', price = '10.000', fooddescription= 'ổn', img='không có',timeupdate = now()  where id = 1;
insert into usercommentfood (userid, foodid, comments) values ('63', '1', 'cái này ăn ngon');
select adminid, drinkid, drinkname, comments, datecoments from admincommentdrink inner join drink on drinkid = drink.id;
delete from usercommentdrink where drinkid = 1 and datecoments = '2023-04-29 22:53:20';
select * from admincommentfood;
select * from usercommentfood;
select * from admincommentdrink;
select * from usercommentdrink;
select adminid as id, foodid as idproduct, adminid, admins.username, comments, datecoments from admincommentfood inner join admins on  adminid = admins.id where foodid = 1
union select userid, foodid, userid, users.username, comments, datecoments from usercommentfood inner join users on userid = users.id where foodid = 1 order by datecoments desc;
select adminid as id, drinkid as idproduct, adminid, admins.username, comments, datecoments from admincommentdrink inner join admins on  adminid = admins.id where drinkid = 1
union select userid, drinkid, userid, users.username, comments, datecoments from usercommentdrink inner join users on userid = users.id where drinkid = 1 order by datecoments desc;
select day(timecreate), month(timecreate), year(timecreate) from users where username = 'khangnguyen';

select id, drinkname, price, img, drinkdescription from drink where drinkname like "Trà%" and drinkname not like "Trà sữa %" 