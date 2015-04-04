<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_comment`;");
E_C("CREATE TABLE `ecs_comment` (
  `comment_id` int(10) unsigned NOT NULL auto_increment,
  `comment_type` tinyint(3) unsigned NOT NULL default '0',
  `id_value` mediumint(8) unsigned NOT NULL default '0',
  `email` varchar(60) NOT NULL default '',
  `user_name` varchar(60) NOT NULL default '',
  `content` text NOT NULL,
  `comment_rank` tinyint(1) unsigned NOT NULL default '0',
  `add_time` int(10) unsigned NOT NULL default '0',
  `ip_address` varchar(15) NOT NULL default '',
  `status` tinyint(3) unsigned NOT NULL default '0',
  `parent_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`comment_id`),
  KEY `parent_id` (`parent_id`),
  KEY `id_value` (`id_value`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_comment` values('1','0','6','','匿名用户','sss','3','1394559059','14.153.111.138','1','0','0');");
E_D("replace into `ecs_comment` values('2','0','15','','匿名用户','hffgh','5','1394587966','114.250.189.65','1','0','0');");
E_D("replace into `ecs_comment` values('3','0','2','','匿名用户','吧','5','1395793789','113.240.85.114','1','0','0');");
E_D("replace into `ecs_comment` values('4','0','6','','匿名用户','好','5','1397338039','183.249.187.114','1','0','0');");
E_D("replace into `ecs_comment` values('5','0','5','','匿名用户','2232','5','1397811445','119.122.161.59','1','0','0');");
E_D("replace into `ecs_comment` values('6','0','9','','匿名用户','非常不错，我超级喜欢。','5','1397938480','110.184.136.63','1','0','0');");
E_D("replace into `ecs_comment` values('7','0','9','','zxxx','t r','5','1398243899','119.80.134.172','0','0','118');");
E_D("replace into `ecs_comment` values('8','0','9','','zxxx','t r','5','1398243904','119.80.134.172','0','0','118');");

require("../../inc/footer.php");
?>