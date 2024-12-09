-- auto-generated definition
create table messages
(
    id      int auto_increment
        primary key,
    name    varchar(64) null,
    phone   varchar(64) null,
    email   varchar(64) null,
    message mediumtext  null
);
