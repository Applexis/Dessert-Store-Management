CREATE TABLE `user` (

`id` int NOT NULL,

`username` varchar(40) NOT NULL,

`email` varchar(100) NOT NULL,

`password` varchar(255) NOT NULL,

`level` tinyint NOT NULL,

`age` int(3) NOT NULL,

`sex` tinyint(1) NOT NULL,

`card_id` int NOT NULL,

`location` varchar(200) NOT NULL,

PRIMARY KEY (`id`) 

);



CREATE TABLE `card` (

`id` int NOT NULL,

`activated` tinyint(1) NOT NULL,

`activate_date` date NOT NULL,

`money` int NOT NULL,

PRIMARY KEY (`id`) 

);



CREATE TABLE `product` (

`id` int NOT NULL,

`name` varchar(100) NOT NULL,

`amount` int NOT NULL,

`base_price` int NOT NULL,

PRIMARY KEY (`id`) 

);



CREATE TABLE `sale` (

`id` int NOT NULL,

`user_id` int NOT NULL,

`product_id` int NOT NULL,

`amount` int NOT NULL,

`buy_time` datetime NOT NULL,

PRIMARY KEY (`id`) 

);



CREATE TABLE `reservation` (

`id` int NOT NULL,

`user_id` int NOT NULL,

`product_id` int NOT NULL,

`amount` int NOT NULL,

`mk_reserve_time` datetime NOT NULL,

`reserve_time` datetime NOT NULL,

PRIMARY KEY (`id`) 

);



CREATE TABLE `product_manage` (

`id` int NOT NULL,

`date` date NOT NULL,

`product_id` int NOT NULL,

`amount` int NOT NULL,

`price` decimal(10,2) NOT NULL,

PRIMARY KEY (`id`) 

);





ALTER TABLE `user` ADD CONSTRAINT `card__ref` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`);

ALTER TABLE `sale` ADD CONSTRAINT `user_ref_s` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `sale` ADD CONSTRAINT `product_ref_s` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `reservation` ADD CONSTRAINT `user_ref_r` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `reservation` ADD CONSTRAINT `product_ref_r` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_manage` ADD CONSTRAINT `product_ref_m` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);



