<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_goods_gallery`;");
E_C("CREATE TABLE `ecs_goods_gallery` (
  `img_id` mediumint(8) unsigned NOT NULL auto_increment,
  `goods_id` mediumint(8) unsigned NOT NULL default '0',
  `img_url` varchar(255) NOT NULL default '',
  `img_desc` varchar(255) NOT NULL default '',
  `thumb_url` varchar(255) NOT NULL default '',
  `img_original` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`img_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_goods_gallery` values('1','1','images/201310/goods_img/1_P_1381080926345.jpg','','images/201310/thumb_img/1_thumb_P_1381080926252.jpg','images/201310/source_img/1_P_1381080926252.jpg');");
E_D("replace into `ecs_goods_gallery` values('2','2','images/201310/goods_img/2_P_1381081006183.jpg','','images/201310/thumb_img/2_thumb_P_1381081006998.jpg','images/201310/source_img/2_P_1381081006625.jpg');");
E_D("replace into `ecs_goods_gallery` values('3','3','images/201310/goods_img/3_P_1381081063895.jpg','','images/201310/thumb_img/3_thumb_P_1381081063765.jpg','images/201310/source_img/3_P_1381081063245.jpg');");
E_D("replace into `ecs_goods_gallery` values('4','4','images/201310/goods_img/4_P_1381081094109.jpg','','images/201310/thumb_img/4_thumb_P_1381081094938.jpg','images/201310/source_img/4_P_1381081094741.jpg');");
E_D("replace into `ecs_goods_gallery` values('5','5','images/201310/goods_img/5_P_1381081130142.jpg','','images/201310/thumb_img/5_thumb_P_1381081130989.jpg','images/201310/source_img/5_P_1381081130258.jpg');");
E_D("replace into `ecs_goods_gallery` values('6','6','images/201310/goods_img/6_P_1381081160319.jpg','','images/201310/thumb_img/6_thumb_P_1381081160314.jpg','images/201310/source_img/6_P_1381081160107.jpg');");
E_D("replace into `ecs_goods_gallery` values('7','7','images/201310/goods_img/7_P_1381081297847.jpg','','images/201310/thumb_img/7_thumb_P_1381081297029.jpg','images/201310/source_img/7_P_1381081297356.jpg');");
E_D("replace into `ecs_goods_gallery` values('8','8','images/201310/goods_img/8_P_1381081330534.jpg','','images/201310/thumb_img/8_thumb_P_1381081330901.jpg','images/201310/source_img/8_P_1381081330400.jpg');");
E_D("replace into `ecs_goods_gallery` values('9','9','images/201402/goods_img/9_P_1393470766420.jpg','','images/201402/thumb_img/9_thumb_P_1393470766111.jpg','images/201402/source_img/9_P_1393470766410.jpg');");
E_D("replace into `ecs_goods_gallery` values('10','9','images/201402/goods_img/9_P_1393521367944.jpg','','images/201402/thumb_img/9_thumb_P_1393521367906.jpg','images/201402/source_img/9_P_1393521367159.jpg');");
E_D("replace into `ecs_goods_gallery` values('11','10','images/201402/goods_img/10_P_1393522126268.jpg','','images/201402/thumb_img/10_thumb_P_1393522126757.jpg','images/201402/source_img/10_P_1393522126095.jpg');");
E_D("replace into `ecs_goods_gallery` values('12','11','images/201402/goods_img/11_P_1393531608586.jpg','','images/201402/thumb_img/11_thumb_P_1393531608816.jpg','images/201402/source_img/11_P_1393531608068.jpg');");
E_D("replace into `ecs_goods_gallery` values('13','12','images/201402/goods_img/12_P_1393531879689.jpg','','images/201402/thumb_img/12_thumb_P_1393531879060.jpg','images/201402/source_img/12_P_1393531879789.jpg');");
E_D("replace into `ecs_goods_gallery` values('14','13','images/201402/goods_img/13_P_1393532004108.jpg','','images/201402/thumb_img/13_thumb_P_1393532004642.jpg','images/201402/source_img/13_P_1393532004061.jpg');");
E_D("replace into `ecs_goods_gallery` values('15','14','images/201402/goods_img/14_P_1393532143318.jpg','','images/201402/thumb_img/14_thumb_P_1393532143335.jpg','images/201402/source_img/14_P_1393532143338.jpg');");
E_D("replace into `ecs_goods_gallery` values('16','15','images/201402/goods_img/15_P_1393532283778.jpg','','images/201402/thumb_img/15_thumb_P_1393532283011.jpg','images/201402/source_img/15_P_1393532283180.jpg');");
E_D("replace into `ecs_goods_gallery` values('17','16','images/201402/goods_img/16_P_1393532402694.jpg','','images/201402/thumb_img/16_thumb_P_1393532402902.jpg','images/201402/source_img/16_P_1393532402644.jpg');");
E_D("replace into `ecs_goods_gallery` values('18','15','images/201403/goods_img/15_P_1394560257437.jpg','','images/201403/thumb_img/15_thumb_P_1394560257247.jpg','images/201403/source_img/15_P_1394560257750.jpg');");
E_D("replace into `ecs_goods_gallery` values('19','15','images/201403/goods_img/15_P_1394560258507.jpg','','images/201403/thumb_img/15_thumb_P_1394560258460.jpg','images/201403/source_img/15_P_1394560258264.jpg');");
E_D("replace into `ecs_goods_gallery` values('20','3','images/201404/goods_img/3_P_1398450814933.jpg','','images/201404/thumb_img/3_thumb_P_1398450814113.jpg','images/201404/source_img/3_P_1398450814417.jpg');");

require("../../inc/footer.php");
?>