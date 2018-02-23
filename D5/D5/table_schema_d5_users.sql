create table d5_users (
    user            varchar(50)  not null,
    password        varchar(50)  not null,
    access_level    integer      not null
);

insert into d5_users (user,password,access_level) values('user001','pw001',1);
insert into d5_users (user,password,access_level) values('user002','pw002',1);
insert into d5_users (user,password,access_level) values('user003','pw003',2);
