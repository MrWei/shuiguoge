<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_point`;");
E_C("CREATE TABLE `ecs_weixin_point` (
  `point_id` int(3) unsigned NOT NULL auto_increment,
  `point_name` varchar(64) NOT NULL default '',
  `point_value` int(3) unsigned NOT NULL,
  `point_num` int(3) NOT NULL,
  `autoload` varchar(20) NOT NULL default 'yes',
  PRIMARY KEY  (`point_id`),
  UNIQUE KEY `option_name` (`point_name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_point` values('1','new','10','1','yes');");
E_D("replace into `ecs_weixin_point` values('2','best','10','1','yes');");
E_D("replace into `ecs_weixin_point` values('3','hot','10','1','yes');");
E_D("replace into `ecs_weixin_point` values('4','cxbd','10','1','yes');");
E_D("replace into `ecs_weixin_point` values('5','ddcx','10','1','yes');");
E_D("replace into `ecs_weixin_point` values('6','kdcx','10','1','yes');");
E_D("replace into `ecs_weixin_point` values('8','qiandao','20','1','yes');");
E_D("replace into `ecs_weixin_point` values('11','promote','10','1','yes');");

require("../../inc/footer.php");
?>