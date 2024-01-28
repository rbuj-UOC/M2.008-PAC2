SET global general_log = on;
SET global general_log_file='/var/log/mysqld.log';
SET global log_output = 'file'; 

CREATE DATABASE tagcloud DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE tagcloud;

CREATE TABLE content (
  ID int(11) NOT NULL AUTO_INCREMENT,
  TITLE varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  ABSTRACT blob,
  BODY blob NOT NULL,
  LABELS blob,
  CREATION_DATE datetime NOT NULL,
  MODIFICATION_DATE datetime NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE USER 'tagcloud' IDENTIFIED BY 'tagcloud';

GRANT ALL PRIVILEGES ON tagcloud.* TO 'tagcloud';

FLUSH PRIVILEGES;

INSERT INTO `content` VALUES (1,'First entry','This is the content abstract','This is the body','web development','2011-10-29 00:00:00','2011-10-29 00:00:00'),(2,'Non obstrusive Javascript','Non obtrusive Javascript technique allows you to separate HTML structure from behaviour elements, that is Javascript. ','Non obtrusive Javascript technique allows you to separate HTML structure from behaviour elements, that is Javascript. ','technology,JavaScript','2011-10-29 00:00:00','2011-10-29 00:00:00'),(3,'AJAX',NULL,'AJAX means Asyncronous JavaScript And XML. It\'s a web development technique to create better web applications from user experience and througput points of view.','technology,JavaScript,AJAX','2011-10-29 00:00:00','2011-10-29 00:00:00');
