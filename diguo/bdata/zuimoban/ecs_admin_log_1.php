<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_admin_log`;");
E_C("CREATE TABLE `ecs_admin_log` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `log_time` int(10) unsigned NOT NULL default '0',
  `user_id` tinyint(3) unsigned NOT NULL default '0',
  `log_info` varchar(255) NOT NULL default '',
  `ip_address` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=358 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_admin_log` values('335','1398484301','1','删除操作日志: ','110.184.138.236');");
E_D("replace into `ecs_admin_log` values('336','1398486295','1','还原数据库备份: 备份时间2014-04-26 19:51:59','110.184.138.236');");
E_D("replace into `ecs_admin_log` values('337','1398486694','1','编辑商品: 小米活塞耳机简装版','110.184.138.236');");
E_D("replace into `ecs_admin_log` values('338','1398486862','1','编辑商店设置: ','110.184.138.236');");
E_D("replace into `ecs_admin_log` values('339','1398527627','1','还原数据库备份: 备份时间2014-04-26 20:40:08','192.168.1.88');");
E_D("replace into `ecs_admin_log` values('340','1398528083','1','添加会员账号: test','192.168.1.88');");
E_D("replace into `ecs_admin_log` values('341','1398539089','1','添加红包类型: 测试的哦','192.168.1.88');");
E_D("replace into `ecs_admin_log` values('342','1398543180','1','添加用户红包: 1000047598','192.168.1.88');");
E_D("replace into `ecs_admin_log` values('343','1398566565','1','删除会员账号: test','192.168.1.88');");
E_D("replace into `ecs_admin_log` values('344','1400466729','1','还原数据库备份: 备份时间2014-04-27 18:44:26','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('345','1400482435','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('346','1400482441','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('347','1400483365','1','添加商品分类: 搜虎精品社区','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('348','1400483392','1','添加商品分类: www.zuimoban.com','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('349','1400483498','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('350','1400483762','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('351','1400483767','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('352','1400483875','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('353','1400483882','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('354','1405275687','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('355','1405276970','1','删除商品分类: www.zuimoban.com','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('356','1405276991','1','删除商品分类: 搜虎精品社区','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('357','1405277581','1','还原数据库备份: 备份时间2014-07-14 10:52:23','127.0.0.1');");

require("../../inc/footer.php");
?>