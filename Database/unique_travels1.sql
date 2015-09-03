/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.14 : Database - unique_travels
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`unique_travels` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `unique_travels`;

/*Table structure for table `tblairlines` */

DROP TABLE IF EXISTS `tblairlines`;

CREATE TABLE `tblairlines` (
  `air_line_id` int(11) NOT NULL AUTO_INCREMENT,
  `air_line_name` varchar(50) DEFAULT NULL,
  `air_line_code` varchar(3) DEFAULT NULL,
  `air_line_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`air_line_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tblairlines` */

insert  into `tblairlines`(`air_line_id`,`air_line_name`,`air_line_code`,`air_line_image`) values (2,'new','PLM','oSyKnthai.gif'),(3,'PIA12','PLM','UyJaRshaheen.gif'),(4,'PLM','PLM','aeA7ksrilanka.jpg');

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) DEFAULT NULL,
  `user_login` varchar(32) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_email` varchar(20) DEFAULT NULL,
  `user_permissions` varchar(255) DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: admin, 0: client',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `tbluser` */

insert  into `tbluser`(`user_id`,`user_name`,`user_login`,`user_password`,`user_status`,`user_email`,`user_permissions`,`user_type`) values (1,'admin','admin','21232f297a57a5a743894a0e4a801fc3',1,'jawad@gmail.com','2,3,4',1),(30,'Jawad Hassan','jawad12','202cb962ac59075b964b07152d234b70',0,'umair@gmail.com',NULL,0),(31,'Jawad Hassan','test','202cb962ac59075b964b07152d234b70',0,'test@gmail.com',NULL,0),(32,'Jawad Hassan','jawad','202cb962ac59075b964b07152d234b70',1,'jawad@gmail.com',NULL,0);

/*Table structure for table `tbluserairlines` */

DROP TABLE IF EXISTS `tbluserairlines`;

CREATE TABLE `tbluserairlines` (
  `user_air_line_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_url` varchar(100) DEFAULT NULL,
  `air_line_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_air_line_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tbluserairlines` */

insert  into `tbluserairlines`(`user_air_line_id`,`user_id`,`user_url`,`air_line_id`) values (1,30,'1',6),(2,30,'1',11),(3,30,'1',7),(4,30,'1',9),(5,30,'1',10),(6,31,'8888',7),(16,32,'1',2),(17,32,'2',3),(18,32,'3',4),(19,1,'2',2),(20,1,'2',3),(21,1,'2',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
