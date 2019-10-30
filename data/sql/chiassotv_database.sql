CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains all the admins of the website'

CREATE TABLE `episode` (
  `episode_number` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `link` varchar(128) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`episode_number`,`category_id`),
  UNIQUE KEY `link` (`link`),
  KEY `category_id` (`category_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `episode_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img_path` varchar(2048) DEFAULT 'not_found.jpg',
  PRIMARY KEY (`id`,`last_edit_at`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1