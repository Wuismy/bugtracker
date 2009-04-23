create database bugReports;
use bugReports;

create table Users (
	username varchar(16) not null primary key,
	password char(32) not null,
	email varchar(50) not null
);


create table Bugs (
	bugID int unsigned not null auto_increment primary key,
	username varchar(16) not null,
	project varchar(30) not null,
	project_version varchar(8) not null,
	bug_date date not null,
	bug_time varchar(12) not null,
	title varchar(40) not null,
	description varchar(400) not null
);

create table Actions (
	actionID int unsigned not null auto_increment primary key,
	action_type varchar(10) not null,
	action_date date not null,
	action_time varchar(12) not null,
	bugID int(10) unsigned not null
);
