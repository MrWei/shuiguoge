<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_users`;");
E_C("CREATE TABLE `ecs_users` (
  `user_id` mediumint(8) unsigned NOT NULL auto_increment,
  `email` varchar(60) NOT NULL default '',
  `user_name` varchar(60) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `question` varchar(255) NOT NULL default '',
  `answer` varchar(255) NOT NULL default '',
  `sex` tinyint(1) unsigned NOT NULL default '0',
  `birthday` date NOT NULL default '0000-00-00',
  `user_money` decimal(10,2) NOT NULL default '0.00',
  `frozen_money` decimal(10,2) NOT NULL default '0.00',
  `pay_points` int(10) unsigned NOT NULL default '0',
  `rank_points` int(10) unsigned NOT NULL default '0',
  `address_id` mediumint(8) unsigned NOT NULL default '0',
  `reg_time` int(10) unsigned NOT NULL default '0',
  `last_login` int(11) unsigned NOT NULL default '0',
  `last_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL default '',
  `visit_count` smallint(5) unsigned NOT NULL default '0',
  `user_rank` tinyint(3) unsigned NOT NULL default '0',
  `is_special` tinyint(3) unsigned NOT NULL default '0',
  `ec_salt` varchar(10) default NULL,
  `salt` varchar(10) NOT NULL default '0',
  `parent_id` mediumint(9) NOT NULL default '0',
  `flag` tinyint(3) unsigned NOT NULL default '0',
  `alias` varchar(60) NOT NULL,
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `is_validated` tinyint(3) unsigned NOT NULL default '0',
  `credit_line` decimal(10,2) unsigned NOT NULL,
  `passwd_question` varchar(50) default NULL,
  `passwd_answer` varchar(255) default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `parent_id` (`parent_id`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>