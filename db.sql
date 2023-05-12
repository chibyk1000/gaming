CREATE TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    firstname varchar(200) not null,
    lastname varchar(200) not null,
    username varchar(100) not null UNIQUE,
    email varchar(200) not null UNIQUE,
    password varchar(200) not null,
    role varchar(100) not null default 'user'
    );


CREATE TABLE products(
    id int AUTO_INCREMENT PRIMARY KEY,    
    username varchar(100) not null, 
    image varchar(100) not null, 
    title varchar(100) not null, 
    price int not null,
        FOREIGN KEY (username) REFERENCES users(username)
    )