<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_goods_attr`;");
E_C("CREATE TABLE `ecs_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL auto_increment,
  `goods_id` mediumint(8) unsigned NOT NULL default '0',
  `attr_id` smallint(5) unsigned NOT NULL default '0',
  `attr_value` text NOT NULL,
  `attr_price` varchar(255) NOT NULL default '',
  `thumb_url` varchar(255) NOT NULL,
  `img_url` varchar(80) NOT NULL,
  `img_original` varchar(80) NOT NULL,
  `hex_color` varchar(80) NOT NULL,
  PRIMARY KEY  (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_goods_attr` values('2','8','1','蓝色','','','','','0B03FF');");
E_D("replace into `ecs_goods_attr` values('3','8','1','绿色','','','','','');");
E_D("replace into `ecs_goods_attr` values('4','8','1','橙色','','','','','');");
E_D("replace into `ecs_goods_attr` values('6','7','1','蓝色','','','','','');");
E_D("replace into `ecs_goods_attr` values('7','7','1','绿色','','','','','');");
E_D("replace into `ecs_goods_attr` values('8','7','1','橙色','','','','','FF9C19');");
E_D("replace into `ecs_goods_attr` values('46','10','186','1600万','0','','','','');");
E_D("replace into `ecs_goods_attr` values('45','10','184','100G','0','','','','');");
E_D("replace into `ecs_goods_attr` values('44','10','183','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('43','10','182','苹果','0','','','','');");
E_D("replace into `ecs_goods_attr` values('42','10','181','10G','0','','','','');");
E_D("replace into `ecs_goods_attr` values('41','10','180','GF','0','','','','');");
E_D("replace into `ecs_goods_attr` values('40','10','172','2008年01月','0','','','','');");
E_D("replace into `ecs_goods_attr` values('17','9','56','11111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('18','9','57','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('19','9','60','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('20','9','61','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('21','9','62','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('22','9','64','11111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('23','9','65','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('24','9','66','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('25','9','67','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('26','9','68','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('27','9','69','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('28','9','70','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('29','9','71','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('30','9','72','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('31','9','73','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('32','9','74','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('33','9','75','内置','0','','','','');");
E_D("replace into `ecs_goods_attr` values('34','9','76','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('35','9','77','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('36','9','78','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('37','9','79','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('38','9','80','11111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('39','9','81','高价机','0','','','','');");
E_D("replace into `ecs_goods_attr` values('47','10','187','TFT','0','','','','');");
E_D("replace into `ecs_goods_attr` values('48','10','188','320×240 像素','0','','','','');");
E_D("replace into `ecs_goods_attr` values('49','10','189','屏幕大小','0','','','','');");
E_D("replace into `ecs_goods_attr` values('50','10','190','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('51','10','191','情景模式','0','','','','');");
E_D("replace into `ecs_goods_attr` values('52','10','192','USB','0','','','','');");
E_D("replace into `ecs_goods_attr` values('53','10','193','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('54','10','194','USB','0','','','','');");
E_D("replace into `ecs_goods_attr` values('55','10','195','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('56','10','197','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('57','10','198','800万','0','','','','');");
E_D("replace into `ecs_goods_attr` values('58','10','199','1200万','0','','','','');");
E_D("replace into `ecs_goods_attr` values('59','10','200','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('60','10','201','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('61','10','202','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('62','10','203','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('63','10','204','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('64','10','205','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('65','10','206','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('66','10','207','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('67','10','208','支持','0','','','','');");
E_D("replace into `ecs_goods_attr` values('68','10','209','UC浏览器','0','','','','');");
E_D("replace into `ecs_goods_attr` values('69','10','185','黑色','','','','','');");
E_D("replace into `ecs_goods_attr` values('70','10','185','灰色','','','','','');");
E_D("replace into `ecs_goods_attr` values('71','10','185','银色','','','','','');");
E_D("replace into `ecs_goods_attr` values('72','10','185','粉色','','','','','');");
E_D("replace into `ecs_goods_attr` values('73','10','185','白色','','','','','');");
E_D("replace into `ecs_goods_attr` values('74','10','185','蓝色','','','','','');");
E_D("replace into `ecs_goods_attr` values('75','10','185','金色','','','','','');");
E_D("replace into `ecs_goods_attr` values('76','10','211','150/M','1','','','','');");
E_D("replace into `ecs_goods_attr` values('77','10','211','160/M','2','','','','');");
E_D("replace into `ecs_goods_attr` values('78','10','211','170/M','3','','','','');");
E_D("replace into `ecs_goods_attr` values('79','10','211','180/M','4','','','','');");
E_D("replace into `ecs_goods_attr` values('80','10','173','双模（GSM,900,1800,CDMA 1X）','0','','','','');");
E_D("replace into `ecs_goods_attr` values('81','10','174','1111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('82','10','175','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('83','10','176','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('84','10','177','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('85','10','178','滑盖','0','','','','');");
E_D("replace into `ecs_goods_attr` values('86','10','179','111','0','','','','');");
E_D("replace into `ecs_goods_attr` values('87','10','196','111','0','','','','');");

require("../../inc/footer.php");
?>