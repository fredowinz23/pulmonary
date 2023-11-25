# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2023-11-25 14:33:29
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
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','1234','John','Doe','Active','Admin',NULL,NULL,NULL,'false',NULL,NULL),(2,'Mary','198738','Dr. Mary Angelson ','Delios- Balles','Inactive','Doctor','2023-11-25','09486600146','maryangelson@gmail.com','false',NULL,0);
