
CREATE DATABASE `medical`;

USE `medical`;

CREATE TABLE `admins` (
`admin_id` 		 int(11) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
`admin_name` 	 varchar(255) NOT NULL,
`admin_email`	 varchar(100) NOT NULL,
`admin_password` varchar(255) NOT NULL,
`admin_type`	 enum('admin','superadmin') NOT NULL DEFAULT 'admin'
) ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cities` (
  `city_id` int(11) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `city_name` varchar(100) NOT NULL,
  `city_is_active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `services` (
  `services_id` int(11) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `services_name` varchar(100) NOT NULL,
  `services_is_active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `order_id` int(11) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(100) NOT NULL,
  `order_phone` varchar(15) NOT NULL,
  `order_city_id` int(11) UNSIGNED NOT NULL,
  `order_services_id` int(11) UNSIGNED NOT NULL,
  `order_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  
   FOREIGN KEY (order_city_id)	    REFERENCES  cities(city_id),
   FOREIGN KEY (order_services_id)  REFERENCES  services(services_id)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;















