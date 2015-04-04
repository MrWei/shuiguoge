<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_article_cat`;");
E_C("CREATE TABLE `ecs_article_cat` (
  `cat_id` smallint(5) NOT NULL auto_increment,
  `cat_name` varchar(255) NOT NULL default '',
  `cat_type` tinyint(1) unsigned NOT NULL default '1',
  `keywords` varchar(255) NOT NULL default '',
  `cat_desc` varchar(255) NOT NULL default '',
  `sort_order` tinyint(3) unsigned NOT NULL default '50',
  `show_in_nav` tinyint(1) unsigned NOT NULL default '0',
  `parent_id` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_type` (`cat_type`),
  KEY `sort_order` (`sort_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_article_cat` values('1','系统分类','2','','系统保留分类','50','0','0');");
E_D("replace into `ecs_article_cat` values('2','网店信息','3','','网店信息分类','50','0','1');");
E_D("replace into `ecs_article_cat` values('3','网店帮助分类','4','','网店帮助分类','50','0','1');");
E_D("replace into `ecs_article_cat` values('4','购物指南','5','','','50','0','3');");
E_D("replace into `ecs_article_cat` values('5','支付方式','5','','','50','0','3');");
E_D("replace into `ecs_article_cat` values('6','配送方式','5','','','50','0','3');");
E_D("replace into `ecs_article_cat` values('7','售后服务','5','','','50','0','3');");
E_D("replace into `ecs_article_cat` values('8','网站公告','1','','','50','0','0');");

require("../../inc/footer.php");
?>