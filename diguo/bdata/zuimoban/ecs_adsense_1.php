<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_adsense`;");
E_C("CREATE TABLE `ecs_adsense` (
  `from_ad` smallint(5) NOT NULL default '0',
  `referer` varchar(255) NOT NULL default '',
  `clicks` int(10) unsigned NOT NULL default '0',
  KEY `from_ad` (`from_ad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `ecs_adsense` values('1','本站','375');");
E_D("replace into `ecs_adsense` values('29','本站','3');");
E_D("replace into `ecs_adsense` values('2','本站','31');");
E_D("replace into `ecs_adsense` values('3','本站','44');");
E_D("replace into `ecs_adsense` values('15','本站','10');");
E_D("replace into `ecs_adsense` values('30','本站','175');");
E_D("replace into `ecs_adsense` values('6','本站','41');");
E_D("replace into `ecs_adsense` values('16','本站','4');");
E_D("replace into `ecs_adsense` values('9','本站','12');");
E_D("replace into `ecs_adsense` values('10','本站','11');");
E_D("replace into `ecs_adsense` values('20','本站','5');");
E_D("replace into `ecs_adsense` values('19','本站','4');");
E_D("replace into `ecs_adsense` values('5','本站','25');");
E_D("replace into `ecs_adsense` values('8','本站','8');");
E_D("replace into `ecs_adsense` values('11','本站','7');");
E_D("replace into `ecs_adsense` values('25','本站','11');");
E_D("replace into `ecs_adsense` values('7','本站','3');");
E_D("replace into `ecs_adsense` values('13','本站','3');");
E_D("replace into `ecs_adsense` values('14','本站','5');");
E_D("replace into `ecs_adsense` values('24','本站','5');");
E_D("replace into `ecs_adsense` values('31','本站','38');");
E_D("replace into `ecs_adsense` values('0','本站','67');");
E_D("replace into `ecs_adsense` values('4','本站','9');");
E_D("replace into `ecs_adsense` values('27','本站','10');");
E_D("replace into `ecs_adsense` values('21','本站','2');");
E_D("replace into `ecs_adsense` values('17','本站','3');");
E_D("replace into `ecs_adsense` values('23','本站','1');");

require("../../inc/footer.php");
?>