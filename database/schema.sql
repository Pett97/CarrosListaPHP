


drop table if exists cars;

create table cars (
	id int auto_increment primary key,
    name varchar(55) not null
);

drop table if exists brands;

create table brands(
	id int auto_increment primary key,
    name varchar(55) not null
);

