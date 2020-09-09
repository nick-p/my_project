CREATE DATABASE `ijdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
CREATE TABLE `author` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
CREATE TABLE `joke` (
  `id` int NOT NULL AUTO_INCREMENT,
  `joketext` text,
  `jokedate` date NOT NULL,
  `authorId` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
CREATE TABLE `joke_category` (
  `jokeId` int NOT NULL,
  `categoryId` int NOT NULL,
  PRIMARY KEY (`jokeId`,`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
