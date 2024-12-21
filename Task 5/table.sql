create table logs 
(
    id int auto_increment primary key,
    message text not null,
     created_at datetime not null
);