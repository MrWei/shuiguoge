<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_bonus`;");
E_C("CREATE TABLE `ecs_weixin_bonus` (
  `id` tinyint(1) NOT NULL auto_increment,
  `type_id` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_bonus` values('1','1');");

require("../../inc/footer.php");
?>