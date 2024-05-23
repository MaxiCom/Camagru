CREATE TABLE users
(
    username varchar(255),
    password varchar(255),
    email varchar(255),
    active varchar(255)
);

CREATE TABLE pictures
(
    username varchar(255),
    image text,
    likes int,
    time text
);

CREATE TABLE comments
(
    username text,
    content text,
    on_picture_id int,
    time text
);
