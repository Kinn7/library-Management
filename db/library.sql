SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `admin`(
`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`password` varchar(100) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publishers` (
`pubId` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`pub_name` varchar(100) NOT NULL DEFAULT 'unknown',
`country` varchar(50) NOT NULL DEFAULT 'unknown',
`country_office` varchar(50) NOT NULL DEFAULT 'unknown',
`no_of_branch` int NOT NULL DEFAULT 0
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `books` (
`bookid` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`book_img` varchar(250) NOT NULL,
`isbn` varchar(25) DEFAULT NULL,
`author` varchar(100) NOT NULL DEFAULT 'unknown',
`title` varchar(150) NOT NULL,
`price` double  NOT NULL,
`available` tinyint(1) DEFAULT 1, 
`quantity` int, #if this is zero available column will change to 0
`pubId` int NOT NULL,
FOREIGN KEY (pubID) REFERENCES publishers(pubID)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `members`(
`membId` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` varchar(100) NOT NULL,
`email` varchar(100)  DEFAULT NULL,
`phone_no` varchar(100) NOT NULL ,
`books_borrowed` int DEFAULT 0 #number of books borrwed 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `borrowed_by`(
#`borrowId` int  NOT NULL,
`bookId` int NOT NULL,	
`membId` int NOT NULL,
`borrowedDate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
`DueDate` TIMESTAMP,
FOREIGN KEY (bookId) REFERENCES books (bookId),
FOREIGN KEY (membId) REFERENCES members (membId),
PRIMARY KEY (bookId, membId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
