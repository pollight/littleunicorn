DROP TABLE IF EXISTS `sxgeo_cities`;
CREATE TABLE IF NOT EXISTS `sxgeo_cities` (
  `id` mediumint(8) unsigned NOT NULL,
  `region_id` mediumint(8) unsigned NOT NULL,
  `name_ru` varchar(128) NOT NULL,
  `name_en` varchar(128) NOT NULL,
  `lat` decimal(10,5) NOT NULL,
  `lon` decimal(10,5) NOT NULL,
  `okato` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Информация о городах для SxGeo 2.2';
LOAD DATA INFILE 'worker.txt' INTO TABLE sxgeo_cities;