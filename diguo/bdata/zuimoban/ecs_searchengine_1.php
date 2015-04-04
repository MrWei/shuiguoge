<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_searchengine`;");
E_C("CREATE TABLE `ecs_searchengine` (
  `date` date NOT NULL default '0000-00-00',
  `searchengine` varchar(20) NOT NULL default '',
  `count` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`date`,`searchengine`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `ecs_searchengine` values('2014-04-03','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-04','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-05','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-06','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-09','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-12','BAIDU','1');");
E_D("replace into `ecs_searchengine` values('2014-04-13','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-14','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-15','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-16','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-17','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-18','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-19','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-20','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-21','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-22','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-23','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-24','BAIDU','2');");
E_D("replace into `ecs_searchengine` values('2014-04-26','GOOGLE','4');");

require("../../inc/footer.php");
?>