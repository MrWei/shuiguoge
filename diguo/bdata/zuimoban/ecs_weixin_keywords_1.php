<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_keywords`;");
E_C("CREATE TABLE `ecs_weixin_keywords` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `contents` text NOT NULL,
  `pic` varchar(80) NOT NULL,
  `pic_tit` varchar(80) NOT NULL,
  `desc` text NOT NULL,
  `pic_url` varchar(80) NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_keywords` values('90','帮助','help','1','输入【help】查看帮助\r\n输入【cxbd】绑定会员\r\n输入【quit】退出绑定\r\n输入【member】会员中心\r\n输入【new】查看最新商品\r\n输入【hot】查看热卖商品\r\n输入【best】查看推荐商品\r\n输入【promote】特价促销\r\n输入【qiandao】签到送积分\r\n输入【ddcx】查询订单\r\n输入【kdcx】快递查询\r\n输入【jfcx】查询积分、余额','','','','','99','1');");
E_D("replace into `ecs_weixin_keywords` values('91','你好','你好','1','输入【帮助】打开快捷菜单','','','','','6','1');");
E_D("replace into `ecs_weixin_keywords` values('92','您好','您好','1','输入【帮助】打开快捷菜单','','','','','0','1');");
E_D("replace into `ecs_weixin_keywords` values('100','图文消息测试','图文消息','2','','4.jpg','图文消息的测试标题','资料显示，华数集团是由杭州文广集团、浙江广电集团等投资设立的大型国有文化传媒产业集团。在新媒体产业，华数集团旗下控股的上市公司华数传媒控股股份有限公司拥有上百万小时的数字媒体内容库、数千万台互联网电视终端，新媒体全业务运营牌照。','http://tech.sina.com.cn/i/2014-04-08/18199305530.shtml','63','1');");
E_D("replace into `ecs_weixin_keywords` values('105','文本消息测试','文本消息','1','近年来，公开选拔和竞争上岗作为干部人事制度改革的重要举措，在拓宽选人视野，打破论资排辈等不少方面积极作用明显。“但走向极端就会出现问题，比如一些地方规定公开选拔和竞争上岗人员必须达到干部任用的多少比例，甚至进一步绝对化为‘凡提必竞’。”中央党校教授辛鸣说。','','','','','54','1');");

require("../../inc/footer.php");
?>