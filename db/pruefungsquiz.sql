CREATE DATABASE `pruefungsquiz`;

CREATE TABLE `user` (
 	`id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
 	`name` varchar(32) NOT NULL,
  	`passwort` varchar(32) NOT NULL
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

CREATE TABLE `rollen` (
  	`id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  	`name` varchar(32) UNIQUE NOT NULL
);


CREATE TABLE `frage_kategorie` (
  	`frage_id` int NOT NULL,
  	`kategorie_id` int NOT NULL,
	FOREIGN KEY (`frage_id`) REFERENCES `fragen` (`id`),
	FOREIGN KEY (`kategorie_id`) REFERENCES `kategorien` (`id`)
);

CREATE TABLE `user_rolle` (
  	`user_id` int NOT NULL,
 	 `rolle_id` int NOT NULL,
	FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
	FOREIGN KEY (`rolle_id`) REFERENCES `rollen` (`id`)
);

INSERT INTO `rollen` (`id`, `name`) VALUES
	(1, 'user'),
	(2, 'admin');

INSERT INTO `user` (`id`, `name`, `passwort`) VALUES
	(1, 'Blub', 'Test'),
	(2, 'Bla', '1234');