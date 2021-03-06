SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `materials` (
  `material_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datestamp` char(10) NOT NULL,
  `publications` varchar(1500) NOT NULL,
  `plate_1` int(5) unsigned NOT NULL,
  `plate_2` int(5) unsigned NOT NULL,
  `plate_3` int(5) unsigned NOT NULL,
  `paper_1` int(5) unsigned NOT NULL,
  `paper_1s` int(5) unsigned NOT NULL,
  `paper_2` int(5) unsigned NOT NULL,
  `paper_2s` int(5) unsigned NOT NULL,
  `paper_3` int(5) unsigned NOT NULL,
  `paper_3s` int(5) unsigned NOT NULL,
  `paper_4` int(5) unsigned NOT NULL,
  `paper_4s` int(5) unsigned NOT NULL,
  `color_c` decimal(5,2) unsigned NOT NULL,
  `color_m` decimal(5,2) unsigned NOT NULL,
  `color_y` decimal(5,2) unsigned NOT NULL,
  `color_k` decimal(5,2) unsigned NOT NULL,
  PRIMARY KEY (`material_id`),
  UNIQUE KEY `timestamp` (`datestamp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

CREATE TABLE IF NOT EXISTS `publications` (
  `publication_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `frequency` decimal(5,2) unsigned NOT NULL,
  `num_pages` int(3) unsigned NOT NULL,
  `plate_1` int(3) unsigned NOT NULL,
  `plate_2` int(3) unsigned NOT NULL,
  `plate_3` int(3) unsigned NOT NULL,
  `paper_1` int(5) unsigned NOT NULL,
  `paper_1s` int(5) unsigned NOT NULL,
  `paper_2` int(5) unsigned NOT NULL,
  `paper_2s` int(5) unsigned NOT NULL,
  `paper_3` int(5) unsigned NOT NULL,
  `paper_3s` int(5) unsigned NOT NULL,
  `paper_4` int(5) unsigned NOT NULL,
  `paper_4s` int(5) unsigned NOT NULL,
  `color_c` decimal(5,2) NOT NULL,
  `color_m` decimal(5,2) NOT NULL,
  `color_y` decimal(5,2) NOT NULL,
  `color_k` decimal(5,2) NOT NULL,
  PRIMARY KEY (`publication_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;
