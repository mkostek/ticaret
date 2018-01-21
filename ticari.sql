-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ara 2016, 19:32:57
-- Sunucu sürümü: 5.6.15-log
-- PHP Sürümü: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `ticari`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmalar`
--

CREATE TABLE IF NOT EXISTS `firmalar` (
  `firmaID` int(11) NOT NULL AUTO_INCREMENT,
  `firmaAd` varchar(50) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`firmaID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `firmalar`
--

INSERT INTO `firmalar` (`firmaID`, `firmaAd`, `tel`, `adres`) VALUES
(1, 'adidas', NULL, 'almanya'),
(2, 'nike', NULL, 'amerika'),
(3, 'umbro', NULL, 'italya'),
(4, 'lotto', NULL, 'italya'),
(5, 'lescon', NULL, 'türkiye'),
(6, 'puma', NULL, 'amerika');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategoriID` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriAd` varchar(50) DEFAULT NULL,
  `kdv` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`kategoriID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategoriAd`, `kdv`) VALUES
(1, 'ayakkabi', 18),
(2, 'tshirt', 17),
(3, 'mont', 18),
(4, 'pantolon', 18),
(5, 'kazak', 18),
(6, 'kilot', 18),
(7, 'gozluk', 18),
(8, 'bileklik', 18),
(9, 'forma', 18),
(10, 'sapka', 18);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE IF NOT EXISTS `musteri` (
  `musteriID` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`musteriID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`musteriID`, `ad`, `soyad`, `adres`, `tel`) VALUES
(1, 'mustafa ', 'kostek', 'balıkesir', '05549935366'),
(2, 'tugaycan', 'kostek', 'izmir', '026638458484'),
(4, 'ahmet', 'candar', 'balikesir', '02663845884'),
(5, 'hayri', 'haydar', 'şapçı', '02663845885'),
(6, 'haydar', 'veli', 'balikesir', '05549935366'),
(7, 'ahmet', 'vahet', 'edremit', '02645589656'),
(8, 'mustafa', 'kafadar', 'balikesir', '03659876566'),
(10, 'mert', 'kostek', 'akcay', '05549968745'),
(12, 'mahmut', 'redar', 'edremit', '03554875233'),
(13, 'zeynel', 'abidin', 'akcay', '03356522323'),
(14, 'velihan', 'acar', 'akcay', '02563321548'),
(15, 'hayri', 'vefalÄ±', 'havran', '02663548745'),
(16, 'miralem', 'tekte', 'burhaniye', '05548875699'),
(17, 'ali', 'gardas', 'stanbul', '03336665544'),
(18, 'tugaycan', 'kÃ¶stek', 'akcay', '02224156544');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE IF NOT EXISTS `siparis` (
  `siparisID` int(11) NOT NULL AUTO_INCREMENT,
  `musteriID` int(11) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL,
  `alindi` bit(1) DEFAULT NULL,
  PRIMARY KEY (`siparisID`),
  KEY `musteriID` (`musteriID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=135 ;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparisID`, `musteriID`, `tarih`, `adres`, `alindi`) VALUES
(131, 4, '2016-12-15', 'mustafa kostek', NULL),
(130, 6, '2017-01-02', 'akcay', NULL),
(129, 4, '2016-12-17', 'bayburt', NULL),
(132, 7, '2016-12-16', 'edremit', NULL),
(133, 1, '2016-12-17', 'akcay', NULL),
(134, 8, '2016-12-17', 'BURSA', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisdetay`
--

CREATE TABLE IF NOT EXISTS `siparisdetay` (
  `nu` int(11) NOT NULL AUTO_INCREMENT,
  `siparisID` int(11) DEFAULT NULL,
  `urunID` int(11) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  PRIMARY KEY (`nu`),
  KEY `siparisID` (`siparisID`),
  KEY `urunID` (`urunID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Tablo döküm verisi `siparisdetay`
--

INSERT INTO `siparisdetay` (`nu`, `siparisID`, `urunID`, `adet`) VALUES
(43, 129, 12, 1),
(45, 130, 12, 1),
(46, 130, 12, 1),
(93, 134, 27, 3),
(83, 134, 18, 3),
(79, 133, 26, 1),
(92, 134, 11, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `urunID` int(11) NOT NULL AUTO_INCREMENT,
  `urunAd` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `alis` int(11) DEFAULT NULL,
  `satis` int(11) DEFAULT NULL,
  `kategoriID` int(11) DEFAULT NULL,
  `firmaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`urunID`),
  KEY `firmaID` (`firmaID`),
  KEY `kategoriID` (`kategoriID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urunID`, `urunAd`, `alis`, `satis`, `kategoriID`, `firmaID`) VALUES
(7, 'M kirmizi', 6, 17, 2, 5),
(2, '42 beyaz', 7, 16, 1, 1),
(3, '41 siyah', 6, 13, 1, 4),
(4, '43 sari', 11, 16, 1, 3),
(5, '41 mavi', 6, 15, 1, 6),
(6, '42 kirmizi', 6, 11, 1, 5),
(8, 'M sari', 7, 17, 2, 4),
(9, 'L mavi', 7, 12, 2, 1),
(10, 'L siyah', 5, 15, 2, 6),
(11, 'L beyaz', 15, 45, 3, 4),
(12, 'M  kirmizi', 22, 66, 3, 5),
(13, 'M sari', 29, 50, 3, 1),
(14, 'mavi 32 32', 11, 44, 4, 2),
(15, 'beyaz 32 34 ', 14, 40, 4, 1),
(16, 'siyah 34 34', 20, 45, 4, 4),
(17, 'sari M', 16, 33, 5, 2),
(18, 'siyah L', 11, 44, 5, 5),
(19, 'beyaz S', 14, 35, 5, 1),
(20, 'siyah S', 20, 45, 6, 6),
(21, 'mavi M', 17, 39, 6, 6),
(22, 'bordo L', 15, 37, 6, 6),
(23, 'yuvarlak erkek', 15, 33, 7, 3),
(24, 'kemikli bayan', 13, 33, 7, 5),
(25, 'yuvarlak erkek', 11, 25, 7, 4),
(26, 'yuvarlak erkek', 11, 22, 7, 2),
(27, 'lacivert M', 9, 20, 8, 1),
(28, 'siyah L', 11, 20, 9, 2),
(29, 'beyaz M', 8, 15, 9, 3),
(30, 'sarı L', 13, 30, 9, 5),
(31, 'kırmızı', 5, 15, 10, 2),
(32, 'beyaz', 7, 17, 10, 3),
(33, 'gri tshirt', 12, 23, 5, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
