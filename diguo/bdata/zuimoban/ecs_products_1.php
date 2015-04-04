<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_products`;");
E_C("CREATE TABLE `ecs_products` (
  `product_id` mediumint(8) unsigned NOT NULL auto_increment,
  `goods_id` mediumint(8) unsigned NOT NULL default '0',
  `goods_attr` varchar(50) default NULL,
  `product_sn` varchar(60) default NULL,
  `product_number` smallint(5) unsigned default '0',
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_products` values('1','10','69|76','e150150150','1000');");
E_D("replace into `ecs_products` values('2','10','70|77','e160160160','1000');");
E_D("replace into `ecs_products` values('3','10','71|78','e170170170','1000');");
E_D("replace into `ecs_products` values('4','10','72|79','e180180180','1000');");

require("../../inc/footer.php");
?>