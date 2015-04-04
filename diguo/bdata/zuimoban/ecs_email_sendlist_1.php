<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_email_sendlist`;");
E_C("CREATE TABLE `ecs_email_sendlist` (
  `id` mediumint(8) NOT NULL auto_increment,
  `email` varchar(100) NOT NULL,
  `template_id` mediumint(8) NOT NULL,
  `email_content` text NOT NULL,
  `error` tinyint(1) NOT NULL default '0',
  `pri` tinyint(10) NOT NULL,
  `last_send` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_email_sendlist` values('1','admin@adf.com','6','亲爱的test您好！\n\n恭喜您获得了1个红包，金额为￥10.00元\nECSHOP2014-04-27','0','1','1398567898');");

require("../../inc/footer.php");
?>