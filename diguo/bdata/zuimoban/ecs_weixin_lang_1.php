<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_lang`;");
E_C("CREATE TABLE `ecs_weixin_lang` (
  `lang_id` int(4) unsigned NOT NULL auto_increment,
  `lang_name` varchar(64) NOT NULL,
  `lang_value` text NOT NULL,
  PRIMARY KEY  (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_lang` values('1','regmsg','欢迎关注搜虎精品社区ecshop微信公众演示平台！\r\n进入 <a href=\"http://xiaomi.codes5.com\">官方商城</a>\r\n输入【help】打开快捷菜单');");

require("../../inc/footer.php");
?>