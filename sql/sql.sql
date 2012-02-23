CREATE TABLE `user` (
`id` int NULL,
`username` varchar(40) NULL,
`email` varchar(100) NULL,
`password` varchar(255) NULL,
`level` tinyint NULL,
`age` int(3) NULL,
`sex` tinyint(1) NULL,
`card_id` int NULL,
`location` varchar(200) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `card` (
`id` int NULL,
`activated` tinyint(1) NULL,
`activate_date` date NULL,
`money` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `product` (
`id` int NULL,
`name` varchar NULL,
`amount` int NULL,
`base_price` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `sale` (
`id` int NULL,
`user_id` int NULL,
`product_id` int NULL,
`amount` int NULL,
`buy_time` datetime NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `reservation` (
`id` int NULL,
`user_id` int NULL,
`product_id` int NULL,
`amount` int NULL,
`mk_reserve_time` datetime NULL,
`reserve_time` datetime NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `product_manage` (
`id` int NULL,
`date` date NULL,
`product_id` int NULL,
`amount` int NULL,
`price` decimal(10,2) NULL,
PRIMARY KEY (`id`) 
);


ALTER TABLE `user` ADD CONSTRAINT `card__ref` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`);
ALTER TABLE `sale` ADD CONSTRAINT `user_ref_s` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `sale` ADD CONSTRAINT `product_ref_s` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
ALTER TABLE `reservation` ADD CONSTRAINT `user_ref_r` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `reservation` ADD CONSTRAINT `product_ref_r` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
ALTER TABLE `product_manage` ADD CONSTRAINT `product_ref_m` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

