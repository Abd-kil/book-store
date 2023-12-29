-- creating the database and its tables
create database book_store;
use book_store;
create table user(
    id int not null auto_increment unique,
    username varchar(255) not null unique,
    password varchar(255) not null,
    permissions varchar(255) default 'user',
    primary key (id)
);
create table book(
    id int not null auto_increment unique,
    name varchar(255) not null unique,
    author varchar(255) not null,
    description varchar(255) not null,
    price float not null,
    rate int default 0,
    image varchar(255) not null,
    date date,
    category varchar(255) not null default 'others',
    primary key (id)
);
create table user_wishlist(
    user_id int,
    book_id int,
    foreign key (user_id) references user(id) ON DELETE CASCADE,
    foreign key (book_id) references book(id) ON DELETE CASCADE,
    primary KEY (user_id, book_id)
);