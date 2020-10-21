CREATE DATABASE inst;

CREATE TABLE first_page
(
    ID        int AUTO_INCREMENT PRIMARY KEY,
    user_name char(8),
    password  char(8),
    unique (user_name),
    unique (password)
);

CREATE TABLE photo
(
    ID     int AUTO_INCREMENT PRIMARY KEY,
    name   text,
    view   int,
    userid int,
    FOREIGN KEY (userid) REFERENCES first_page (ID)
);
