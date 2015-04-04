<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_kefu`;");
E_C("CREATE TABLE `ecs_kefu` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_kefu` values('1','kefushow','1');");
E_D("replace into `ecs_kefu` values('2','skin','10');");
E_D("replace into `ecs_kefu` values('3','show','1');");
E_D("replace into `ecs_kefu` values('4','showlefttop','30');");
E_D("replace into `ecs_kefu` values('5','showleft','10');");
E_D("replace into `ecs_kefu` values('6','showrighttop','110');");
E_D("replace into `ecs_kefu` values('7','showright','50');");
E_D("replace into `ecs_kefu` values('8','fs_show','0');");
E_D("replace into `ecs_kefu` values('9','typeone','售前客服');");
E_D("replace into `ecs_kefu` values('10','kfqq','张三:25872435');");
E_D("replace into `ecs_kefu` values('11','im','李四:zixiao07');");
E_D("replace into `ecs_kefu` values('12','typetwo','售后客服');");
E_D("replace into `ecs_kefu` values('13','kfqqtwo','李四:49335350');");
E_D("replace into `ecs_kefu` values('14','imtwo','张三:luoye07');");
E_D("replace into `ecs_kefu` values('15','qqqun','');");
E_D("replace into `ecs_kefu` values('16','wwqun','');");
E_D("replace into `ecs_kefu` values('17','kftel','400888888');");
E_D("replace into `ecs_kefu` values('18','shijian','8:00-23:00');");
E_D("replace into `ecs_kefu` values('19','kf53','');");
E_D("replace into `ecs_kefu` values('20','qqcss','1');");
E_D("replace into `ecs_kefu` values('21','wwcss','1');");
E_D("replace into `ecs_kefu` values('22','fenxiang','');");

require("../../inc/footer.php");
?>