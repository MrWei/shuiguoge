<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_point_record`;");
E_C("CREATE TABLE `ecs_weixin_point_record` (
  `pr_id` int(7) NOT NULL auto_increment,
  `wxid` char(28) NOT NULL,
  `point_name` varchar(64) NOT NULL,
  `num` int(5) NOT NULL,
  `lasttime` int(10) NOT NULL,
  `datelinie` int(10) NOT NULL,
  PRIMARY KEY  (`pr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_point_record` values('10','oKIVft-swX4_pRDyWpN5VmswPZlE','qiandao','5','1398478404','1398431460');");
E_D("replace into `ecs_weixin_point_record` values('11','oKIVft-swX4_pRDyWpN5VmswPZlE','best','6','1398479714','1398431608');");
E_D("replace into `ecs_weixin_point_record` values('12','oKIVft-swX4_pRDyWpN5VmswPZlE','hot','4','1398479389','1398431616');");
E_D("replace into `ecs_weixin_point_record` values('13','oKIVft-swX4_pRDyWpN5VmswPZlE','promote','4','1398435826','1398432317');");
E_D("replace into `ecs_weixin_point_record` values('14','oKIVft-swX4_pRDyWpN5VmswPZlE','new','3','1398435862','1398434130');");
E_D("replace into `ecs_weixin_point_record` values('15','oKIVft-We_6U2Lxak40Ht9jTmMKc','promote','2','1398486013','1398436227');");
E_D("replace into `ecs_weixin_point_record` values('16','oKIVft-swX4_pRDyWpN5VmswPZlE','ddcx','2','1398478572','1398440053');");
E_D("replace into `ecs_weixin_point_record` values('17','oKIVft-swX4_pRDyWpN5VmswPZlE','kdcx','2','1398478601','1398442335');");
E_D("replace into `ecs_weixin_point_record` values('18','oKIVftyTI_air21Gqu1I-FhkW_9Y','promote','1','1398442694','1398442694');");
E_D("replace into `ecs_weixin_point_record` values('19','oKIVftyTI_air21Gqu1I-FhkW_9Y','new','1','1398442792','1398442792');");
E_D("replace into `ecs_weixin_point_record` values('20','oKIVft-We_6U2Lxak40Ht9jTmMKc','qiandao','2','1398501760','1398486037');");
E_D("replace into `ecs_weixin_point_record` values('21','oKIVft-We_6U2Lxak40Ht9jTmMKc','ddcx','1','1398487820','1398487820');");
E_D("replace into `ecs_weixin_point_record` values('22','oKIVft-We_6U2Lxak40Ht9jTmMKc','hot','1','1398501782','1398501782');");

require("../../inc/footer.php");
?>