<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_ad`;");
E_C("CREATE TABLE `ecs_ad` (
  `ad_id` smallint(5) unsigned NOT NULL auto_increment,
  `position_id` smallint(5) unsigned NOT NULL default '0',
  `media_type` tinyint(3) unsigned NOT NULL default '0',
  `ad_name` varchar(60) NOT NULL default '',
  `ad_link` varchar(255) NOT NULL default '',
  `ad_code` text NOT NULL,
  `start_time` int(11) NOT NULL default '0',
  `end_time` int(11) NOT NULL default '0',
  `link_man` varchar(60) NOT NULL default '',
  `link_email` varchar(60) NOT NULL default '',
  `link_phone` varchar(60) NOT NULL default '',
  `click_count` mediumint(8) unsigned NOT NULL default '0',
  `enabled` tinyint(3) unsigned NOT NULL default '1',
  PRIMARY KEY  (`ad_id`),
  KEY `position_id` (`position_id`),
  KEY `enabled` (`enabled`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_ad` values('1','1','0','首页轮播底部广告1','http://www.mrfruit.net','1381078478245755980.jpg','1381046400','1478332800','','','','375','1');");
E_D("replace into `ecs_ad` values('2','2','0','首页轮播底部广告2','http://www.mrfruit.net','1381078490585253095.jpg','1381046400','1478332800','','','','31','1');");
E_D("replace into `ecs_ad` values('3','3','0','首页轮播底部广告3','http://www.mrfruit.net','1381078501056775939.jpg','1381046400','1478332800','','','','44','1');");
E_D("replace into `ecs_ad` values('4','4','0','首页轮播底部广告4','http://www.mrfruit.net','1381078512058670740.jpg','1381046400','1478332800','','','','9','1');");
E_D("replace into `ecs_ad` values('5','5','0','首页新品上架广告1','http://www.mrfruit.net','1381079074783077594.jpg','1381075200','1478361600','','','','25','1');");
E_D("replace into `ecs_ad` values('6','6','0','首页新品上架广告2','http://www.mrfruit.net','1381079086419426180.jpg','1381046400','1478332800','','','','41','1');");
E_D("replace into `ecs_ad` values('7','7','0','首页新品上架广告3','http://www.mrfruit.net','1381079098845415041.jpg','1381075200','1478361600','','','','3','1');");
E_D("replace into `ecs_ad` values('8','8','0','首页新品上架广告4','http://www.mrfruit.net','1381079110798949923.jpg','1381046400','1478332800','','','','8','1');");
E_D("replace into `ecs_ad` values('9','9','0','首页新品上架广告5','http://www.mrfruit.net','1381079123806215282.jpg','1381075200','1478361600','','','','12','1');");
E_D("replace into `ecs_ad` values('10','10','0','首页新品上架广告6','http://www.mrfruit.net','1381079135375220123.jpg','1381075200','1478361600','','','','11','1');");
E_D("replace into `ecs_ad` values('11','11','0','首页新品上架广告7','http://www.mrfruit.net','1381079148278788405.jpg','1381046400','1478332800','','','','7','1');");
E_D("replace into `ecs_ad` values('12','12','0','首页新品上架广告8','http://www.mrfruit.net','1381079160614448364.jpg','1381075200','1478361600','','','','0','1');");
E_D("replace into `ecs_ad` values('13','13','0','首页新品上架广告9','http://www.mrfruit.net','1381079173096324823.jpg','1381046400','1478332800','','','','3','1');");
E_D("replace into `ecs_ad` values('14','14','0','首页热卖商品广告1','http://www.mrfruit.net','1381079769279843680.jpg','1381046400','1478332800','','','','5','1');");
E_D("replace into `ecs_ad` values('15','15','0','首页热卖商品广告2','http://www.mrfruit.net','1381079782806067816.jpg','1381046400','1478332800','','','','10','1');");
E_D("replace into `ecs_ad` values('16','16','0','首页热卖商品广告3','http://www.mrfruit.net','1381079794839130789.jpg','1381075200','1478361600','','','','4','1');");
E_D("replace into `ecs_ad` values('17','17','0','首页热卖商品广告4','http://www.mrfruit.net','1381079807440076997.jpg','1381046400','1478332800','','','','3','1');");
E_D("replace into `ecs_ad` values('18','18','0','首页热卖商品广告5','http://www.mrfruit.net','1381079819554664571.jpg','1381075200','1478361600','','','','0','1');");
E_D("replace into `ecs_ad` values('19','19','0','首页热卖商品广告6','http://www.mrfruit.net','1381079834276524628.jpg','1381075200','1478361600','','','','4','1');");
E_D("replace into `ecs_ad` values('20','20','0','首页热卖商品广告7','http://www.mrfruit.net','1381079848807832620.jpg','1381046400','1478332800','','','','5','1');");
E_D("replace into `ecs_ad` values('21','21','0','首页热卖商品广告8','http://www.mrfruit.net','1381079860978991489.jpg','1381046400','1478332800','','','','2','1');");
E_D("replace into `ecs_ad` values('22','22','0','首页热卖商品广告9','http://www.mrfruit.net','1381079871286558996.jpg','1381075200','1478361600','','','','0','1');");
E_D("replace into `ecs_ad` values('23','23','0','首页热卖商品广告10','http://www.mrfruit.net','1381079884247885511.jpg','1381075200','1478361600','','','','1','1');");
E_D("replace into `ecs_ad` values('24','24','0','首页热评商品广告','http://www.mrfruit.net','1381080376013057330.jpg','1381075200','1478361600','','','','5','1');");
E_D("replace into `ecs_ad` values('25','26','0','首页特卖商品广告','http://www.mrfruit.net','1381080407655272744.jpg','1381075200','1478361600','','','','11','1');");
E_D("replace into `ecs_ad` values('26','25','2','首页热评商品文字说明','http://www.mrfruit.net','<div class=\"score\"><span class=\"icon-stat icon-stat-5\"></span>\r\n            <label>(共0人评价)</label>\r\n          </div>\r\n          <div class=\"msg\"><strong class=\"people\">蓝博5210：</strong>\r\n            <p>质量超好！完美匹配！音质干净！价格实在！带上没有不适感！</p>\r\n          </div>','1381075200','1478361600','','','','0','1');");
E_D("replace into `ecs_ad` values('27','27','0','首页-分类ID1-广告1','http://www.mrfruit.net','1381122527570139896.jpg','1381046400','1478332800','','','','10','1');");
E_D("replace into `ecs_ad` values('28','28','0','首页-分类ID1-广告2','http://www.mrfruit.net','1381122544505045697.jpg','1381046400','1478332800','','','','0','1');");
E_D("replace into `ecs_ad` values('29','29','0','导航右侧广告位','http://www.mrfruit.net','1389733610469692710.png','1388908800','1582876800','','','','3','1');");
E_D("replace into `ecs_ad` values('30','30','0','wap首页banner轮播1','','1393533057225562343.jpg','1393315200','1585296000','','','','175','1');");
E_D("replace into `ecs_ad` values('31','30','0','wap首页banner轮播2','','1393533036048445261.jpg','1393315200','1585296000','','','','38','1');");

require("../../inc/footer.php");
?>