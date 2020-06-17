CREATE DATABASE products;
-- use the correct DB
use products;

-- create the table
create table tool_products (
    product_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    productName VARCHAR(30) NOT NULL,
	toolCatagory VARCHAR(30) NOT NULL,
    price float,
    ageRequirement VARCHAR(30) NOT NULL
);


insert into tool_products values (1, 'Axe', 'blades', 16.99, 'true');
insert into tool_products values (20, 'Saw', 'blades', 19.99, 'true');
insert into tool_products values (3, 'sandpaper', 'finishing', 1.99, 'false');
insert into tool_products values (5, 'hammer', 'heavy', 9.99, 'false');
