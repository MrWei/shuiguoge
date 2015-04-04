<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_shipping`;");
E_C("CREATE TABLE `ecs_shipping` (
  `shipping_id` tinyint(3) unsigned NOT NULL auto_increment,
  `shipping_code` varchar(20) NOT NULL default '',
  `shipping_name` varchar(120) NOT NULL default '',
  `shipping_desc` varchar(255) NOT NULL default '',
  `insure` varchar(10) NOT NULL default '0',
  `support_cod` tinyint(1) unsigned NOT NULL default '0',
  `enabled` tinyint(1) unsigned NOT NULL default '0',
  `shipping_print` text NOT NULL,
  `print_bg` varchar(255) default NULL,
  `config_lable` text,
  `print_model` tinyint(1) default '0',
  `shipping_order` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`shipping_id`),
  KEY `shipping_code` (`shipping_code`,`enabled`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_shipping` values('1','cac','上门取货','买家自己到商家指定地点取货','0','1','1','','','','2','0');");
E_D("replace into `ecs_shipping` values('2','sto_express','申通快递','江、浙、沪地区首重为15元/KG，其他地区18元/KG， 续重均为5-6元/KG， 云南地区为8元','0','0','1','','/images/receipt/dly_sto_express.jpg','t_shop_address,网店-地址,235,48,131,152,b_shop_address||,||t_shop_name,网店-名称,237,26,131,200,b_shop_name||,||t_shop_tel,网店-联系电话,96,36,144,257,b_shop_tel||,||t_customer_post,收件人-邮编,86,23,578,268,b_customer_post||,||t_customer_address,收件人-详细地址,232,49,434,149,b_customer_address||,||t_customer_name,收件人-姓名,151,27,449,231,b_customer_name||,||t_customer_tel,收件人-电话,90,32,452,261,b_customer_tel||,||','2','0');");
E_D("replace into `ecs_shipping` values('3','sf_express','顺丰速运','江、浙、沪地区首重15元/KG，续重2元/KG，其余城市首重20元/KG','0','0','1','','/images/receipt/dly_sf_express.jpg','t_shop_name,网店-名称,150,29,112,137,b_shop_name||,||t_shop_address,网店-地址,268,55,105,168,b_shop_address||,||t_shop_tel,网店-联系电话,55,25,177,224,b_shop_tel||,||t_customer_name,收件人-姓名,78,23,299,265,b_customer_name||,||t_customer_address,收件人-详细地址,271,94,104,293,b_customer_address||,||','2','0');");

require("../../inc/footer.php");
?>