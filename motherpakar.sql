/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.37-MariaDB : Database - motherpakar
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
('G01','VGA tidak terdeteksi'),
('G02','Sound Card tidak terdeteksi'),
('G03','USB Card tidak terdeteksi'),
('G04','LAN tidak terdeteksi'),
('G05','Kinerja PC melambat'),
('G06','RAM tidak terdeteksi'),
('G07','Debu pada slot RAM'),
('G08','Bau gosong pada slot RAM'),
('G09','Komputer tidak menyala'),
('G10','Lampu indikator monitor berkedip'),
('G11','Monitor tidak menyala'),
('G12','Bau gosong pada slot processor'),
('G13','Tidak terdengar suara beep'),
('G14','External card tidak terbaca'),
('G15','Processor tidak terbaca'),
('G16','Hardisk tidak terbaca'),
('G17','Muncul DISK BOOT FAILURE'),
('G18','Komputer blank total'),
('G19','Hardware tidak terdeteksi'),
('G20','Baterai BIOS rusak'),
('G21','Baterai CMOS Failure'),
('G22','Muncul Press F1'),
('G23','Komponen slot I/O tidak terhubung'),
('G24','Printer tidak bekerja'),
('G25','Mouse tidak bekerja'),
('G26','Suara tidak muncul '),
('G27','Lampu port LAN tidak menyala');

/*Table structure for table `tbl_kerusakan` */

DROP TABLE IF EXISTS `tbl_kerusakan`;

CREATE TABLE `tbl_kerusakan` (
  `kd_kerusakan` char(3) NOT NULL,
  `kerusakan` text NOT NULL,
  PRIMARY KEY (`kd_kerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kerusakan` */

insert  into `tbl_kerusakan`(`kd_kerusakan`,`kerusakan`) values 
('K01','Kerusakan Slot Expansi'),
('K02','Kerusakan Slot RAM'),
('K03','Kerusakan Socket Processor'),
('K04','Kerusakan Chipset Northbridge'),
('K05','Kerusakan Chipset Southbridge'),
('K06','Kerusakan pada BIOS'),
('K07','Kerusakan pada CMOS'),
('K08','Kerusakan pada Port I/O');

/*Table structure for table `tbl_konsultasi` */

DROP TABLE IF EXISTS `tbl_konsultasi`;

CREATE TABLE `tbl_konsultasi` (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `kd_kerusakan` char(3) DEFAULT NULL,
  PRIMARY KEY (`id_konsultasi`),
  KEY `user` (`id_user`),
  CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_konsultasi` */

insert  into `tbl_konsultasi`(`id_konsultasi`,`id_user`,`waktu`,`kd_kerusakan`) values 
(3,1,'2019-05-11 18:44:42',NULL),
(5,1,'2019-05-11 13:54:28',NULL),
(6,1,'2019-05-11 13:58:18','K04'),
(7,1,'2019-05-11 14:46:44','K02'),
(8,1,'2019-05-11 14:47:37','K01'),
(9,1,'2019-05-11 17:04:08','K03'),
(10,1,'2019-05-11 17:32:53','K06'),
(11,1,'2019-05-11 17:34:29','K05'),
(12,1,'2019-05-11 17:44:28','K04'),
(13,1,'2019-05-11 17:45:15','K04'),
(14,1,'2019-05-11 17:46:03','K04'),
(15,1,'2019-05-11 17:46:48','K04'),
(16,1,'2019-05-12 06:05:18','K05'),
(17,1,'2019-05-12 06:15:58','K05'),
(18,1,'2019-05-12 06:23:14','K05'),
(19,1,'2019-05-12 06:43:48','K03'),
(20,1,'2019-05-12 06:43:48','K03'),
(21,1,'2019-05-12 06:48:58','K03'),
(22,1,'2019-05-12 06:48:58','K03'),
(23,1,'2019-05-12 07:14:21','K06'),
(24,1,'2019-05-12 07:14:21','K06'),
(25,1,'2019-05-12 07:21:03','K06'),
(26,1,'2019-05-12 07:21:03','K06'),
(27,1,'2019-05-12 07:23:16','K06'),
(28,1,'2019-05-12 07:23:16','K06'),
(29,1,'2019-05-12 07:24:05','K06'),
(30,1,'2019-05-12 07:24:05','K06'),
(31,1,'2019-05-12 07:27:17','K03'),
(32,1,'2019-05-12 07:27:17','K03'),
(33,1,'2019-05-12 07:29:26','K01'),
(34,1,'2019-05-12 07:29:26','K01'),
(35,1,'2019-05-12 07:30:21','K01'),
(36,1,'2019-05-12 07:30:21','K01'),
(37,1,'2019-05-12 07:34:26','K04'),
(38,1,'2019-05-12 07:34:26','K04'),
(39,1,'2019-05-12 07:37:41','K06'),
(40,1,'2019-05-12 07:37:41','K06'),
(41,1,'2019-05-12 07:39:10','K02'),
(42,1,'2019-05-12 07:39:10','K02'),
(43,1,'2019-05-12 07:40:26','K02'),
(44,1,'2019-05-12 07:40:26','K02');

/*Table structure for table `tbl_konsultasi_detail` */

DROP TABLE IF EXISTS `tbl_konsultasi_detail`;

CREATE TABLE `tbl_konsultasi_detail` (
  `id_konsultasi` int(11) NOT NULL,
  `kd_gejala` char(3) NOT NULL,
  `jawab` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_konsultasi_detail` */

insert  into `tbl_konsultasi_detail`(`id_konsultasi`,`kd_gejala`,`jawab`) values 
(15,'G01',''),
(15,'G03','y'),
(15,'G04','y'),
(15,'G06','y'),
(15,'G14','y'),
(15,'G15','y'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(21,'G09','i'),
(23,'G18','i'),
(23,'G19','t'),
(23,'G20','i'),
(25,'G18','t'),
(29,'G18','t'),
(31,'G09','i'),
(31,'G10','t'),
(35,'G01','i'),
(35,'G02','t'),
(37,'G01','i'),
(37,'G03','t'),
(37,'G04','i'),
(37,'G06','i'),
(37,'G14','i'),
(37,'G15','i'),
(39,'G18','i'),
(41,'G05','i'),
(41,'G06','t'),
(43,'G05','t'),
(43,'G06','t'),
(43,'G01','i'),
(43,'G03','i'),
(43,'G04','i');

/*Table structure for table `tbl_penyebab` */

DROP TABLE IF EXISTS `tbl_penyebab`;

CREATE TABLE `tbl_penyebab` (
  `kd_penyebab` char(3) NOT NULL,
  `penyebab` text NOT NULL,
  PRIMARY KEY (`kd_penyebab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_penyebab` */

insert  into `tbl_penyebab`(`kd_penyebab`,`penyebab`) values 
('P01','Pin pada slot tambahan kotor jadi menghambat proses penghantaran data\r\n'),
('P02','Pemakaian yang terlalu berlebihan (overclock) pada pcrocessor'),
('P03','Slot processor kotor'),
('P04','Terdapat getaran keras pada badan PC\r\n'),
('P05','Panas berlebih pada processor\r\n'),
('P06','Tegangan listrik tidak stabil\r\n'),
('P07','Kipas processor sudah rusak\r\n'),
('P08','Data BIOS terhapus\r\n'),
('P09','Baterai CMOS sudah tua\r\n'),
('P10','Port Longgar\r\n'),
('P11','Umur motherboard Tua'),
('P12','Pemakaian tidak sesuai dengan kapasistas RAM\r\n'),
('P13','Semakin lama PC digunakan tanpa dibersihkan maka akan mempengaruhi kemampuan PC\r\n');

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

insert  into `tbl_relasi`(`kd_kerusakan`,`kd_gejala`,`kd_solusi`,`kd_penyebab`) values 
('K01','G01,G02,G03,G04','S01','P01,P02'),
('K02','G05,G06,G07,G08','S02,S03,S04,S05,G06','P12,P13'),
('K03','G09,G10,G11,G12,G13','S07,S08','P03,P04,P06,P07'),
('K04','G01,G03,G04,G06,G14,G15','S09','P02,P05,P11'),
('K05','G03,G16,G17','S09','P05'),
('K06','G18,G19,G20','S10','P08'),
('K07','G21,G22','S11,S14','P09'),
('K08','G03,G23,G24,G25,G26,G27','S12,S13','P10');

/*Table structure for table `tbl_solusi` */

DROP TABLE IF EXISTS `tbl_solusi`;

CREATE TABLE `tbl_solusi` (
  `kd_solusi` char(3) NOT NULL,
  `solusi` text,
  PRIMARY KEY (`kd_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_solusi` */

insert  into `tbl_solusi`(`kd_solusi`,`solusi`) values 
('S01','Bersihkan pin-pin slot tambahan dengan lap kering'),
('S02','Bersihkan pin-pin dan slot RAM dengan lap kering'),
('S03','Lakukan testing menggunakai software'),
('S04','Perbaiki pemasangan RAM'),
('S05','Pindahkan RAM pada slot yang ke-2 apabila masih onboard'),
('S06','Ganti slot RAM apabila terbakar'),
('S07','Periksa slot processor-nya'),
('S08','Bersihkan slot processor-nya dengan lap kering'),
('S09','Ganti dengan motherboard baru'),
('S10','Flashing BIOS apabila terjadi blank total'),
('S11','Ganti baterai CMOS apabila terjadi \"CMOS Failure\"'),
('S12','Ganti port I/O dengan yang baru apabila terjadi kerusakan'),
('S13','Cek kabel yang menyambung pada port I/O seblum menggati yang lainnya');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenis` enum('pengguna','pakar') NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`username`,`password`,`jenis`,`alamat`) values 
(1,'chimemoo','memory543','pengguna','Purwakarta');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
