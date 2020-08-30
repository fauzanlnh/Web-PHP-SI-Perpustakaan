/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.34-MariaDB : Database - db_kuliah_atol_perpustakaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `t_anggota` */

DROP TABLE IF EXISTS `t_anggota`;

CREATE TABLE `t_anggota` (
  `Kd_Anggota` varchar(20) NOT NULL,
  `Nama_Anggota` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Kd_Anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_anggota` */

insert  into `t_anggota`(`Kd_Anggota`,`Nama_Anggota`,`Email`,`foto`) values 
('082020-001','FAUZAN LUKMANUL HAKIM','FAUZAN.10118227@MAHASISWA.UNIKOM.AC.ID','082020-001.jpg'),
('082020-002','ABIDI KASPI','ABIDIKASPI@GMAIL.COM','082020-002.jpg'),
('082020-003','ALWAN MAULANA','ALWANM@GMAIL.COM','082020-003.jpg'),
('082020-004','BARA MAANY','BARA@GMAIL.COM','082020-004.jpg'),
('082020-005','DAFFA SUPARLAN','DAFFA@GMAIL.COM','082020-005.jpg'),
('082020-006','DJORDIE SECTIO','DJORDIE@GMAIL.COM','082020-006.jpg'),
('082020-007','DONI RAMDHANI','DONI@GMAIL.COM','082020-007.jpg'),
('082020-008','FAHMI SALIMUDIN','FAHMI@GMAIL.COM','082020-008.png'),
('082020-009','FAHREIZA SIDIK','FAHREIZA@GMAIL.COM','082020-009.jpg'),
('082020-010','GELAR GUMILAR','GELAR@GMAIL.COM','082020-010.jpg'),
('082020-011','ICHSAN STING','ICHSAN@GMAIL.COM','082020-011.jpg'),
('082020-012','IRGI AHMAD MAULANA','IRGI@GMAIL.COM','082020-012.jpg'),
('082020-014','RADEN BAIHAQI','EQI@GMAIL.COM','082020-014.jpg'),
('082020-015','REZA RIZKY CONTINUE','REZARC@GMAIL.COM','082020-015.jpg');

/*Table structure for table `t_buku` */

DROP TABLE IF EXISTS `t_buku`;

CREATE TABLE `t_buku` (
  `Kd_Buku` int(11) NOT NULL AUTO_INCREMENT,
  `Judul_Buku` varchar(50) DEFAULT NULL,
  `Nama_Pengarang` char(30) DEFAULT NULL,
  `Nama_Penerbit` char(30) DEFAULT NULL,
  `Tahun_Terbit` char(4) DEFAULT NULL,
  `No_Rak` char(10) DEFAULT NULL,
  `Kd_Kategori` char(5) DEFAULT NULL,
  `Status` char(20) DEFAULT NULL,
  `Estimasi_Pengembalian` date DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`Kd_Buku`),
  KEY `Kd_Kategori` (`Kd_Kategori`),
  CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`Kd_Kategori`) REFERENCES `t_kategori_buku` (`Kd_Kategori`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

/*Data for the table `t_buku` */

insert  into `t_buku`(`Kd_Buku`,`Judul_Buku`,`Nama_Pengarang`,`Nama_Penerbit`,`Tahun_Terbit`,`No_Rak`,`Kd_Kategori`,`Status`,`Estimasi_Pengembalian`,`Harga`) values 
(3,'ANIMASI MENGGUNAKAN FLASH','PRIYANTO HIDAYATULLAH','INFORMATIKA','2011','1','IT','RUSAK',NULL,210000),
(4,'GRAFIK DAN ANIMASI PROFESIONAL POWER POINT','EDY WINARNO DAN ALI ZAKI','ELEX MEDIA KOMPUTINDO','2015','1','IT','TERSEDIA',NULL,225000),
(5,'GOD, DO YOU SPEAK ENGLISH?','JEFF KRISTIANTO','RENE BOOKS','2019','1','PU','TERSEDIA',NULL,265000),
(6,'ONTOLOGI METAFISIKA UMUM FILSAFAT','ACHMAD CHARIS ZUBAIR','KANISIUS YOGYAKARTA','1992','1','FLSFT','TERSEDIA',NULL,190000),
(7,'AKUNTANSI PENGANTAR-1','SUPARDI','GAVA MEDIA','2009','2','AK','TERSEDIA',NULL,150000),
(8,'THE AUTHORIZED BIOGRAPHY OF KH.ABDURRAHMAN WAHID','GREG BARTON','LKiS','2011','2','SEJ','TERSEDIA',NULL,285000),
(9,'KESADARAN NASIONAL','SLAMET MULJANA','LKiS','2008','2','SEJ','TERSEDIA',NULL,170000),
(10,'MANAJEMEN PENERBIT JURNAL ILMIAH','LUKMAN S','SUGANG SETO','2012','2','MJMN','TERSEDIA',NULL,240000),
(11,'FIQH EKONOMI SYARIAH','DR. MARDANI','KENCANA','2013','2','AG','TERSEDIA',NULL,125000),
(12,'TETAP SEHAT SETELAH USIA 40 TAHUN','DR. SALMA','GEMA INSANI','2014','3','SS','TERSEDIA',NULL,270000),
(13,'JEJAK-JEJAK CINTA','TONI RAHARJO','GEMA INSANI','2015','3','SS','TERSEDIA',NULL,185000),
(14,'AN INQUIRY INTO THE NATURE AND CAUSES OF THE WEALT','ADAM SMITH','ADAM SMITH','1776','3','EK','TERSEDIA',NULL,350000),
(15,'HUKUM BISNIS PROPERTI DI INDONESIA','ANDIKA WIJAYA','GRASINDO','2017','3','HK','TERSEDIA',NULL,105000),
(16,'MATEMATIKA DASAR TEORI','JHON BIRD','ERLANGGA','2004','3','PD','TERSEDIA',NULL,135000),
(17,'BAHASA DAN SASTRA','KIFTIAWATI DAN ENDRY SULISTYO','PUSPA SWARA','2007','4','BHS','TERSEDIA',NULL,75000),
(18,'A BRIEF HISTORY OF TIME','STEPHEN HAWKING','BANTAM DELL PUBLISHING GROUP','1988','4','SC','HILANG',NULL,500000),
(19,'MAKING AND BREAKING THE GRID','TIMOTHY SAMARA','AUTHOR BOOKS','2005','4','DSGN','TERSEDIA',NULL,450000),
(20,'SEJARAH DAN PERADABAN ISLAM','BADRI YATIM','PT RAJA GRAFINDO PERSADA','1998','5','SEJ','TERSEDIA',NULL,120000),
(21,'DESAIN RUMAH APLIKATIF','ARTATI','DEEP PUBLISH','2018','4','ARS','TERSEDIA',NULL,80000),
(22,'SITI NURBAYA','MARAH RUSLI','BALAI PUSTAKA','1922','4','SASTR','TERSEDIA',NULL,195000),
(23,'PENGANTAR TEKNOLOGI INFORMASI','TATA SUTABRI','ANDI OFFSET','2014','5','IT','TERSEDIA',NULL,80000),
(24,'TEKNIK SAMPLING','ERIYANTO','LKiS','2007','5','IT','TERSEDIA',NULL,95000),
(25,'TEKNIK SAMPLING','ERIYANTO','LKiS','2007','5','IT','TERSEDIA',NULL,320000),
(26,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(27,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(28,'PEMROGRAMAN DATABASE DENGAN DELPHI 7','ABDUL KADIR','PENERBIT ANDI','2004','1','IT','TERSEDIA',NULL,200000),
(29,'PEMROGRAMAN DATABASE DENGAN DELPHI 7','ABDUL KADIR','PENERBIT ANDI','2004','1','IT','TERSEDIA',NULL,200000),
(30,'ANIMASI MENGGUNAKAN FLASH','PRIYANTO HIDAYATULLAH','INFORMATIKA','2011','1','IT','TERSEDIA',NULL,210000),
(31,'ANIMASI MENGGUNAKAN FLASH','PRIYANTO HIDAYATULLAH','INFORMATIKA','2011','1','IT','TERSEDIA',NULL,210000),
(32,'GRAFIK DAN ANIMASI PROFESIONAL POWER POINT','EDY WINARNO DAN ALI ZAKI','ELEX MEDIA KOMPUTINDO','2015','1','IT','TERSEDIA',NULL,225000),
(33,'GRAFIK DAN ANIMASI PROFESIONAL POWER POINT','EDY WINARNO DAN ALI ZAKI','ELEX MEDIA KOMPUTINDO','2015','1','IT','TERSEDIA',NULL,225000),
(34,'GOD, DO YOU SPEAK ENGLISH?','JEFF KRISTIANTO','RENE BOOKS','2019','1','PU','TERSEDIA',NULL,265000),
(35,'ONTOLOGI METAFISIKA UMUM FILSAFAT','ACHMAD CHARIS ZUBAIR','KANISIUS YOGYAKARTA','1992','1','FLSFT','TERSEDIA',NULL,190000),
(36,'AKUNTANSI PENGANTAR-1','SUPARDI','GAVA MEDIA','2009','2','AK','TERSEDIA',NULL,150000),
(37,'THE AUTHORIZED BIOGRAPHY OF KH.ABDURRAHMAN WAHID','GREG BARTON','LKiS','2011','2','SEJ','TERSEDIA',NULL,285000),
(38,'KESADARAN NASIONAL','SLAMET MULJANA','LKiS','2008','2','SEJ','TERSEDIA',NULL,170000),
(39,'MANAJEMEN PENERBIT JURNAL ILMIAH','LUKMAN S','SUGANG SETO','2012','2','MJMN','TERSEDIA',NULL,240000),
(40,'FIQH EKONOMI SYARIAH','DR. MARDANI','KENCANA','2013','2','AG','TERSEDIA',NULL,125000),
(41,'TETAP SEHAT SETELAH USIA 40 TAHUN','DR. SALMA','GEMA INSANI','2014','3','SS','TERSEDIA',NULL,270000),
(42,'JEJAK-JEJAK CINTA','TONI RAHARJO','GEMA INSANI','2015','3','SS','TERSEDIA',NULL,185000),
(43,'AN INQUIRY INTO THE NATURE AND CAUSES OF THE WEALT','ADAM SMITH','ADAM SMITH','1776','3','EK','TERSEDIA',NULL,350000),
(44,'HUKUM BISNIS PROPERTI DI INDONESIA','ANDIKA WIJAYA','GRASINDO','2017','3','HK','TERSEDIA',NULL,105000),
(45,'MATEMATIKA DASAR TEORI','JHON BIRD','ERLANGGA','2004','3','PD','TERSEDIA',NULL,135000),
(46,'A BRIEF HISTORY OF TIME','STEPHEN HAWKING','BANTAM DELL PUBLISHING GROUP','1988','4','SC','HILANG',NULL,500000),
(47,'MAKING AND BREAKING THE GRID','TIMOTHY SAMARA','AUTHOR BOOKS','2005','4','DSGN','TERSEDIA',NULL,450000),
(48,'SEJARAH DAN PERADABAN ISLAM','BADRI YATIM','PT RAJA GRAFINDO PERSADA','1998','5','SEJ','TERSEDIA',NULL,120000),
(49,'SITI NURBAYA','MARAH RUSLI','BALAI PUSTAKA','1922','4','SASTR','TERSEDIA',NULL,195000),
(50,'DESAIN RUMAH APLIKATIF','ARTATI','DEEP PUBLISH','2018','4','ARS','TERSEDIA',NULL,80000),
(51,'PENGANTAR TEKNOLOGI INFORMASI','TATA SUTABRI','ANDI OFFSET','2014','5','IT','TERSEDIA',NULL,80000),
(52,'TEKNIK SAMPLING','ERIYANTO','LKiS','2007','5','IT','TERSEDIA',NULL,95000),
(53,'ANIMASI MENGGUNAKAN FLASH','PRIYANTO HIDAYATULLAH','INFORMATIKA','2020','1','IT','TERSEDIA',NULL,180000),
(54,'GOD, DO YOU SPEAK ENGLISH?','JEFF KRISTIANTO','RENE BOOKS','2019','1','PU','TERSEDIA',NULL,265000),
(55,'ONTOLOGI METAFISIKA UMUM FILSAFAT','ACHMAD CHARIS ZUBAIR','KANISIUS YOGYAKARTA','2019','1','FLSFT','TERSEDIA',NULL,190000),
(56,'AKUNTANSI PENGANTAR-1','SUPARDI','GAVA MEDIA','2019','2','AK','TERSEDIA',NULL,180000),
(57,'THE AUTHORIZED BIOGRAPHY OF KH.ABDURRAHMAN WAHID','GREG BARTON','LKIS','2011','2','SEJ','TERSEDIA',NULL,300000),
(58,'KESADARAN NASIONAL','SLAMET MULJANA','LKIS','2019','2','SEJ','TERSEDIA',NULL,150000),
(59,'FIQH EKONOMI SYARIAH','DR. MARDANI','KENCANA','2018','2','AG','TERSEDIA',NULL,150000),
(60,'TETAP SEHAT SETELAH USIA 40 TAHUN','DR. SALMA','GEMA INSANI','2020','3','SS','TERSEDIA',NULL,100000),
(61,'JEJAK-JEJAK CINTA','TONI RAHARJO','GEMA INSANI','2018','3','SS','TERSEDIA',NULL,180000),
(62,'A BRIEF HISTORY OF TIME','STEPHEN HAWKING','BANTAM DELL PUBLISHING GROUP','2019','4','SC','HILANG',NULL,300000),
(63,'MAKING AND BREAKING THE GRID','TIMOTHY SAMARA','AUTHOR BOOKS','2019','4','DSGN','TERSEDIA',NULL,180000),
(64,'AN INQUIRY INTO THE NATURE AND CAUSES OF THE WEALT','ADAM SMITH','ADAM SMITH','2018','3','EK','TERSEDIA',NULL,180000),
(65,'HUKUM BISNIS PROPERTI DI INDONESIA','ANDIKA WIJAYA','GRASINDO','2019','3','HK','TERSEDIA',NULL,195000),
(66,'MATEMATIKA DASAR TEORI','JHON BIRD','ERLANGGA','2018','3','PD','TERSEDIA',NULL,165000),
(67,'BAHASA DAN SASTRA','KIFTIAWATI DAN ENDRY SULISTYO','PUSPA SWARA','2020','4','BHS','TERSEDIA',NULL,135000),
(68,'SEJARAH DAN PERADABAN ISLAM','BADRI YATIM','PT RAJA GRAFINDO PERSADA','2018','5','SEJ','TERSEDIA',NULL,165000),
(69,'PENGANTAR TEKNOLOGI INFORMASI','TATA SUTABRI','ANDI OFFSET','2018','5','IT','TERSEDIA',NULL,140000),
(70,'DESAIN RUMAH APLIKATIF','ARTATI','DEEP PUBLISH','2020','4','ARS','TERSEDIA',NULL,210000),
(71,'SITI NURBAYA','MARAH RUSLI','BALAI PUSTAKA','2017','4','SASTR','TERSEDIA',NULL,180000),
(72,'TEKNIK SAMPLING','ERIYANTO','LKIS','2018','5','IT','TERSEDIA',NULL,180000),
(73,'PEMROGRAMAN DATABASE DENGAN DELPHI 7','ABDUL KADIR','PENERBIT ANDI','2018','1','IT','TERSEDIA',NULL,145000),
(74,'SITI NURBAYA','MARAH RUSLI','BALAI PUSTAKA','1992','4','SASTR','TERSEDIA',NULL,195000),
(75,'TEKNIK SAMPLING','ERIYANTO','LKIS','2018','5','IT','TERSEDIA',NULL,180000),
(76,'DESAIN RUMAH APLIKATIF','ARTATI','DEEP PUBLISH','2020','4','ARS','TERSEDIA',NULL,210000),
(77,'PENGANTAR TEKNOLOGI INFORMASI','TATA SUTABRI','ANDI OFFSET','2018','5','IT','TERSEDIA',NULL,140000),
(78,'TEKNIK SAMPLING','ERIYANTO','LKIS','2018','5','IT','TERSEDIA',NULL,180000),
(79,'ACCESS BY DESIGNNN','GEORGE A. COVINGTONNN','VAN NOSTRAND REIHOLDD','2008','6','PD','HILANG',NULL,2500000),
(80,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(81,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','HILANG',NULL,250000),
(82,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(83,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(84,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','RUSAK',NULL,250000),
(85,'ONTOLOGI METAFISIKA UMUM FILSAFAT','ACHMAD CHARIS ZUBAIR','KANISIUS YOGYAKARTA','2019','1','AG','TERSEDIA',NULL,190000),
(86,'ANIMASI MENGGUNAKAN FLASH','PRIYANTO HIDAYATULLAH','INFORMATIKA','2020','1','AG','TERSEDIA',NULL,180000),
(87,'AKUNTANSI PENGANTAR-1','SUPARDI','GAVA MEDIA','2019','2','AG','TERSEDIA',NULL,180000),
(88,'THE AUTHORIZED BIOGRAPHY OF KH.ABDURRAHMAN WAHID','GREG BARTON','LKIS','2011','2','AG','TERSEDIA',NULL,300000),
(90,'KESADARAN NASIONAL','SLAMET MULJANA','LKIS','2019','2','AG','TERSEDIA',NULL,150000),
(91,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','AG','TERSEDIA',NULL,250000),
(92,'A BRIEF HISTORY OF TIME','STEPHEN HAWKING','BANTAM DELL PUBLISHING GROUP','2019','4','SC','TERSEDIA',NULL,300000),
(93,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(94,'ACCESS BY DESIGNN','GEORGE A. COVINGTONN','VAN NOSTRAND REIHOLD','2007','5','DSGN','TERSEDIA',NULL,250000),
(95,'A BRIEF HISTORY OF TIME','STEPHEN HAWKING','BANTAM DELL PUBLISHING GROUP','1988','4','SC','TERSEDIA',NULL,500000);

/*Table structure for table `t_kategori_buku` */

DROP TABLE IF EXISTS `t_kategori_buku`;

CREATE TABLE `t_kategori_buku` (
  `Kd_Kategori` char(5) NOT NULL,
  `Nama_Kategori` char(30) DEFAULT NULL,
  PRIMARY KEY (`Kd_Kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_kategori_buku` */

insert  into `t_kategori_buku`(`Kd_Kategori`,`Nama_Kategori`) values 
('AG','AGAMA'),
('AK','AKUNTASI'),
('ARS','ARSITEKTUR'),
('AST','ASTRONOMI'),
('BHS','BAHASA'),
('DSGN','DESAIN'),
('EK','EKONOMI'),
('FLSFT','FILSAFAT'),
('GEO','GEOGRAFI'),
('HK','HUKUM'),
('IPO','ILMU POLITIK'),
('IT','KOMPUTER'),
('KES','KESEHATAN'),
('KWR','KEWARGANEGARAAN'),
('MAN','MANUFAKTUR'),
('MJMN','MANAJEMEN'),
('MTMK','MATEMATIKA'),
('OR','OLAHRAGA'),
('PD','PENDIDIKAN'),
('PSI','PSIKOLOGI'),
('PU','PENGETAHUAN UMUM'),
('SASTR','KESASTRAAN'),
('SC','SCIENCE'),
('SEJ','SEJARAH'),
('SS','SOSIAL'),
('TEK','TEKNIK');

/*Table structure for table `t_master` */

DROP TABLE IF EXISTS `t_master`;

CREATE TABLE `t_master` (
  `Username` char(20) NOT NULL,
  `Password` char(20) DEFAULT NULL,
  `Hak_Akses` char(20) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_master` */

insert  into `t_master`(`Username`,`Password`,`Hak_Akses`) values 
('PGWI-001','ADMIN','ADMIN'),
('PGWI-003','PGWI-003','ADMIN');

/*Table structure for table `t_pegawai` */

DROP TABLE IF EXISTS `t_pegawai`;

CREATE TABLE `t_pegawai` (
  `kd_pegawai` varchar(11) NOT NULL,
  `nama_pegawai` char(30) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_pegawai`),
  KEY `t_pegawai_ibfk_1` (`username`),
  CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`username`) REFERENCES `t_master` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_pegawai` */

insert  into `t_pegawai`(`kd_pegawai`,`nama_pegawai`,`username`,`foto`,`email`) values 
('PGWI-001','UJANG','PGWI-001','PGWI-001.png','UJANG@GMAIL.COM'),
('PGWI-003','OKI SAPUTRA AGUNG','PGWI-003','PGWI-003.jpg','OKI@GMAIL.COM');

/*Table structure for table `t_peminjaman` */

DROP TABLE IF EXISTS `t_peminjaman`;

CREATE TABLE `t_peminjaman` (
  `Kd_Peminjaman` char(10) NOT NULL,
  `Kd_Buku` int(11) DEFAULT NULL,
  `Kd_Anggota` varchar(20) DEFAULT NULL,
  `Tgl_Pinjam` date DEFAULT NULL,
  `Tgl_Kembali` date DEFAULT NULL,
  `EstimasiPengembalian` date DEFAULT NULL,
  `Denda_Keterlambatan` int(11) DEFAULT NULL,
  `Status_Peminjaman` char(15) DEFAULT NULL,
  `Username` char(20) DEFAULT NULL,
  PRIMARY KEY (`Kd_Peminjaman`),
  KEY `Kd_Anggota` (`Kd_Anggota`),
  KEY `Kd_Koleksi` (`Kd_Buku`),
  KEY `Username` (`Username`),
  CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`Kd_Buku`) REFERENCES `t_buku` (`Kd_Buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`Kd_Anggota`) REFERENCES `t_anggota` (`Kd_Anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_peminjaman_ibfk_3` FOREIGN KEY (`Username`) REFERENCES `t_master` (`Username`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_peminjaman` */

insert  into `t_peminjaman`(`Kd_Peminjaman`,`Kd_Buku`,`Kd_Anggota`,`Tgl_Pinjam`,`Tgl_Kembali`,`EstimasiPengembalian`,`Denda_Keterlambatan`,`Status_Peminjaman`,`Username`) values 
('202008-004',7,'082020-003','2020-08-29','2020-08-29',NULL,0,'DIKEMBALIKAN','PGWI-001'),
('202008-005',62,'082020-002','2020-08-29','2020-08-29',NULL,0,'HILANG','PGWI-001'),
('202008-006',46,'082020-008','2020-08-29','2020-08-29',NULL,0,'HILANG','PGWI-001'),
('202008-007',80,'082020-001','2020-08-29','2020-08-29',NULL,0,'HILANG','PGWI-001'),
('202008-008',92,'082020-010','2020-08-29','2020-08-29',NULL,0,'DIKEMBALIKAN','PGWI-001'),
('202008-009',79,'082020-001','2020-08-29','2020-08-29',NULL,0,'HILANG','PGWI-001'),
('202008-010',18,'082020-001','2020-08-29','2020-08-29',NULL,0,'HILANG','PGWI-001');

/*Table structure for table `t_pengembalian_bayar` */

DROP TABLE IF EXISTS `t_pengembalian_bayar`;

CREATE TABLE `t_pengembalian_bayar` (
  `Kd_Kehilangan` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal_Ganti` date DEFAULT NULL,
  `Harga_Ganti` int(11) DEFAULT NULL,
  `Kd_Peminjaman` char(10) DEFAULT NULL,
  PRIMARY KEY (`Kd_Kehilangan`),
  KEY `Kd_Peminjaman` (`Kd_Peminjaman`),
  CONSTRAINT `t_pengembalian_bayar_ibfk_1` FOREIGN KEY (`Kd_Peminjaman`) REFERENCES `t_peminjaman` (`Kd_Peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_pengembalian_bayar` */

insert  into `t_pengembalian_bayar`(`Kd_Kehilangan`,`Tanggal_Ganti`,`Harga_Ganti`,`Kd_Peminjaman`) values 
(1,'2020-08-29',500000,'202008-006'),
(2,'2020-08-29',2500000,'202008-009'),
(3,'2020-08-29',2500000,'202008-009');

/*Table structure for table `t_pengembalian_ganti` */

DROP TABLE IF EXISTS `t_pengembalian_ganti`;

CREATE TABLE `t_pengembalian_ganti` (
  `Kd_Kehilangan` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal_Ganti` date DEFAULT NULL,
  `Kd_Buku_Ganti` int(11) DEFAULT NULL,
  `Kd_Peminjaman` char(10) DEFAULT NULL,
  PRIMARY KEY (`Kd_Kehilangan`),
  KEY `Kd_Peminjaman` (`Kd_Peminjaman`),
  KEY `Kode_Koleksi_Ganti` (`Kd_Buku_Ganti`),
  CONSTRAINT `t_pengembalian_ganti_ibfk_2` FOREIGN KEY (`Kd_Buku_Ganti`) REFERENCES `t_buku` (`Kd_Buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_pengembalian_ganti_ibfk_3` FOREIGN KEY (`Kd_Peminjaman`) REFERENCES `t_peminjaman` (`Kd_Peminjaman`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_pengembalian_ganti` */

insert  into `t_pengembalian_ganti`(`Kd_Kehilangan`,`Tanggal_Ganti`,`Kd_Buku_Ganti`,`Kd_Peminjaman`) values 
(1,'2020-08-29',92,'202008-005'),
(2,'2020-08-29',93,'202008-007'),
(3,'2020-08-29',95,'202008-010');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;