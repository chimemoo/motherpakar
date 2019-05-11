/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.37-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `tbl_gejala` (
	`kd_gejala` char (9),
	`gejala` text 
); 
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K01','Kerusakan Slot Expansi');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K02','Kerusakan Slot RAM');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K03','Kerusakan Socket Processor');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K04','Kerusakan Chipset Northbridge');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K05','Kerusakan Chipset Southbridge');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K06','Kerusakan pada BIOS');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K07','Kerusakan pada CMOS');
insert into `tbl_gejala` (`kd_gejala`, `gejala`) values('K08','Kerusakan pada Port I/O');
