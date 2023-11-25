# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2023-11-25 15:51:18
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "appointment"
#

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `patientId` int(11) DEFAULT NULL,
  `appointmentDate` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Pending',
  `dateAdded` date DEFAULT NULL,
  `appointmentTime` varchar(10) DEFAULT NULL,
  `purpose` text,
  `doctorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "appointment"
#

INSERT INTO `appointment` VALUES (1,5,'2023-11-26','Pending','2023-11-25','12:00PM','follow up',2),(2,5,'2023-11-26','Pending','2023-11-25','12:30PM','check up',2),(3,5,'2023-11-26','Approved','2023-11-25','12:00PM','chfhfh',2);

#
# Structure for table "check_up"
#

DROP TABLE IF EXISTS `check_up`;
CREATE TABLE `check_up` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentId` int(255) DEFAULT NULL,
  `allergies` text,
  `medication` text,
  `findings` text,
  `needLab` varchar(11) DEFAULT 'No',
  `labtestDetail` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "check_up"
#

INSERT INTO `check_up` VALUES (1,3,NULL,'whjkegfskefhsogishgsoigh','y4uitriurteutrgtow','Yes','urgiugriugedigeeidgt');

#
# Structure for table "lab_test"
#

DROP TABLE IF EXISTS `lab_test`;
CREATE TABLE `lab_test` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentId` int(11) DEFAULT NULL,
  `description` text,
  `dateAdded` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "lab_test"
#

INSERT INTO `lab_test` VALUES (1,3,'urgiugriugedigeeidgt ejfhejehggh','2023-11-25');

#
# Structure for table "physical_test"
#

DROP TABLE IF EXISTS `physical_test`;
CREATE TABLE `physical_test` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentId` int(11) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `bloodPressure` varchar(255) DEFAULT NULL,
  `resperatoryRate` varchar(255) DEFAULT NULL,
  `oxygen` varchar(255) DEFAULT NULL,
  `cardiacRate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "physical_test"
#

INSERT INTO `physical_test` VALUES (1,3,'37','80/110','100','100','100');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactive',
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDeleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `birthday` date DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','1234','John','Doe','Active','Admin',NULL,NULL,NULL,'false',NULL,NULL,NULL),(2,'Mary','1234','Dr. Mary Angelson ','Delios- Balles','Active','Doctor','2023-11-25','09486600146','maryangelson@gmail.com','false',NULL,0,'1700898550.jpg'),(3,'staff','1234','Monica','Enrique','Active','Staff','2023-11-25','09703344152','monica@gmail.com','false',NULL,2,NULL),(4,'lab','1234','Angelson','Clini','Active','Lab','2023-11-25','09914720342','clinicangelson@gmail.com','false',NULL,0,NULL),(5,'Anton','1234','Antonio','Garnica','Active','Patient','2023-11-25','09914720342','antoniogarnica0919@gmail.com','false','2023-06-02',NULL,NULL);
