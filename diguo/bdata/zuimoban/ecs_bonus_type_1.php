<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_bonus_type`;");
E_C("CREATE TABLE `ecs_bonus_type` (
  `type_id` smallint(5) unsigned NOT NULL auto_increment,
  `type_name` varchar(60) NOT NULL default '',
  `type_money` decimal(10,2) NOT NULL default '0.00',
  `send_type` tinyint(3) unsigned NOT NULL default '0',
  `min_amount` decimal(10,2) unsigned NOT NULL default '0.00',
  `max_amount` decimal(10,2) unsigned NOT NULL default '0.00',
  `send_start_date` int(11) NOT NULL default '0',
  `send_end_date` int(11) NOT NULL default '0',
  `use_start_date` int(11) NOT NULL default '0',
  `use_end_date` int(11) NOT NULL default '0',
  `min_goods_amount` decimal(10,2) unsigned NOT NULL default '0.00',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_bonus_type` values('1','微信关注红包','10.00','3','0.00','0.00','1398326400','1400918400','1398326400','1495612800','1.00');");
E_D("replace into `ecs_bonus_type` values('2','测试的哦','10.00','0','0.00','0.00','1398499200','1401091200','1398499200','1590480000','200.00');");

require("../../inc/footer.php");
?>