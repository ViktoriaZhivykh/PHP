CREATE DATABASE task_manager;
USE task_manager;

create table tasks
(
    id           int auto_increment primary key,
    title         varchar(255) not null,
    completed         boolean          DEFAULT FALSE
);