/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - motherpakar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`motherpakar` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `motherpakar`;

/*Table structure for table `tbl_gejala` */

DROP TABLE IF EXISTS `tbl_gejala`;

CREATE TABLE `tbl_gejala` (
  `kd_gejala` char(3) NOT NULL,
  `gejala` text NOT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gejala` */

insert  into `tbl_gejala`(`kd_gejala`,`gejala`) values 
('K01','Kerusakan Slot Expansi'),
('K02','Kerusakan Slot RAM'),
('K03','Kerusakan Socket Processor'),
('K04','Kerusakan Chipset Northbridge'),
('K05','Kerusakan Chipset Southbridge'),
('K06','Kerusakan pada BIOS'),
('K07','Kerusakan pada CMOS'),
('K08','Kerusakan pada Port I/O');

/*Table structure for table `tbl_kerusakan` */

DROP TABLE IF EXISTS `tbl_kerusakan`;

CREATE TABLE `tbl_kerusakan` (
  `kd_kerusakan` char(3) NOT NULL,
  `kerusakan` text NOT NULL,
  PRIMARY KEY (`kd_kerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kerusakan` */

/*Table structure for table `tbl_konsultasi_detail` */

DROP TABLE IF EXISTS `tbl_konsultasi_detail`;

CREATE TABLE `tbl_konsultasi_detail` (
  `id_konsultasi` int(11) NOT NULL,
  `kd_gejala` char(3) NOT NULL,
  `jawab` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_konsultasi_detail` */

/*Table structure for table `tbl_kosultasi` */

DROP TABLE IF EXISTS `tbl_kosultasi`;

CREATE TABLE `tbl_kosultasi` (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `kd_kerusakan` char(3) NOT NULL,
  PRIMARY KEY (`id_konsultasi`),
  KEY `user` (`id_user`),
  CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kosultasi` */

/*Table structure for table `tbl_penyebab` */

DROP TABLE IF EXISTS `tbl_penyebab`;

CREATE TABLE `tbl_penyebab` (
  `kd_penyebab` char(3) NOT NULL,
  `penyebab` text NOT NULL,
  PRIMARY KEY (`kd_penyebab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_penyebab` */

/*Table structure for table `tbl_relasi` */

DROP TABLE IF EXISTS `tbl_relasi`;

CREATE TABLE `tbl_relasi` (
  `kd_kerusakan` char(3) NOT NULL,
  `kd_gejala` varchar(100) NOT NULL,
  `kd_solusi` varchar(100) NOT NULL,
  `kd_penyebab` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_kerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_relasi` */

/*Table structure for table `tbl_solusi` */

DROP TABLE IF EXISTS `tbl_solusi`;

CREATE TABLE `tbl_solusi` (
  `kd_solusi` char(3) NOT NULL,
  `solusi` text,
  PRIMARY KEY (`kd_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_solusi` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenis` enum('pengguna','pakar') NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
