create database bugs;
use bugs;

create table User (
	username varchar(16) not null primary key,
	password char(32) not null,
	email varchar(50) not null
);


create table Bug (
	bugID varchar(10) not null,
	username varchar(16) not null,
	project varchar(30) not null,
	project_version varchar(8) not null,
	bug_date varchar(12) not null,
	bug_time varchar(12) not null,
	




)

User
username, password, email, //bugs

Bug	
id#, creator, project, project_version, date, time, title, description, status
