CREATE TABLE `rollen` (
  	`id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  	`name` varchar(32) UNIQUE NOT NULL
);

CREATE TABLE `user` (
 	`id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
 	`name` varchar(32) NOT NULL,
  	`passwort` varchar(32) NOT NULL,
	`role_id` int NOT NULL,
	FOREIGN KEY (`role_id`) REFERENCES `rollen` (`id`),
	`is_deleted` boolean
);

CREATE TABLE `fragen` (
	`id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`fragetext` text NOT NULL,
	`user_id` int NOT NULL,
	FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);

CREATE TABLE `antworten` (
	`id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`antworttext` varchar(255) NOT NULL,
	`wahrheit` tinyint(1) NOT NULL,
	`frage_id` int NOT NULL,
	FOREIGN KEY (`frage_id`) REFERENCES `fragen` (`id`)
);

CREATE TABLE `kategorien` (
  	`id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  	`name` varchar(32) NOT NULL
);

CREATE TABLE `frage_kategorie` (
  	`frage_id` int NOT NULL,
  	`kategorie_id` int NOT NULL,
	FOREIGN KEY (`frage_id`) REFERENCES `fragen` (`id`),
	FOREIGN KEY (`kategorie_id`) REFERENCES `kategorien` (`id`)
);
