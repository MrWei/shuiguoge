<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_user`;");
E_C("CREATE TABLE `ecs_weixin_user` (
  `uid` int(7) NOT NULL auto_increment,
  `subscribe` tinyint(1) unsigned NOT NULL,
  `wxid` char(28) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `headimgurl` varchar(200) NOT NULL,
  `subscribe_time` int(10) unsigned NOT NULL,
  `localimgurl` varchar(200) NOT NULL,
  `setp` smallint(2) unsigned NOT NULL,
  `uname` varchar(50) NOT NULL,
  `coupon` varchar(30) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=343 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_user` values('340','0','oKIVft-swX4_pRDyWpN5VmswPZlE','','0','','','','','','0','','3','sclzz','1000013001');");
E_D("replace into `ecs_weixin_user` values('337','0','oKIVft02ugRp0vX0XTkfJkXO_gs8','','0','','','','','','0','','0','','');");
E_D("replace into `ecs_weixin_user` values('338','0','oKIVft-We_6U2Lxak40Ht9jTmMKc','','0','','','','','','0','','3','weixin322','1000020700');");
E_D("replace into `ecs_weixin_user` values('339','0','oKIVftyTI_air21Gqu1I-FhkW_9Y','','0','','','','','','0','','3','weixin339','1000005399');");
E_D("replace into `ecs_weixin_user` values('341','0','oKIVft8XNakdy6x-4C-YlK_hKcrk','','0','','','','','','0','','0','','');");
E_D("replace into `ecs_weixin_user` values('342','0','oKIVft4Hk9gNczpAyszvsIYeGklU','','0','','','','','','0','','0','','');");

require("../../inc/footer.php");
?>