create table d5_catalogue (
    cat_id             integer      not null auto_increment primary key,
    category_parent    varchar(50)  not null,
    category_name      varchar(50)  not null,
    item_name          varchar(50)  default null,
    sort_key           varchar(500) default null
);

insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('catalogue','catalogue',null, 'catalogue/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('catalogue','Electronics',null, 'catalogue/Electronics/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('Electronics','Televisions','49-inch LCD','catalogue/Electronics/Televisions/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('Electronics','Televisions','40-inch plasma','catalogue/Electronics/Televisions/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('Electronics','Televisions','32-inch CRT','catalogue/Electronics/Televisions/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('catalogue','Gaming Consoles','PS4 Pro','catalogue/Gaming Consoles/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('catalogue','Gaming Consoles','XBox One X','catalogue/Gaming Consoles/');
insert into d5_catalogue (category_parent,category_name,item_name,sort_key) values('catalogue','Gaming Consoles','Nintendo Switch','catalogue/Gaming Consoles/');

