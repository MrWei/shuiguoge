<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_template`;");
E_C("CREATE TABLE `ecs_template` (
  `filename` varchar(30) NOT NULL default '',
  `region` varchar(40) NOT NULL default '',
  `library` varchar(40) NOT NULL default '',
  `sort_order` tinyint(1) unsigned NOT NULL default '0',
  `id` smallint(5) unsigned NOT NULL default '0',
  `number` tinyint(1) unsigned NOT NULL default '5',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `theme` varchar(60) NOT NULL default '',
  `remarks` varchar(30) NOT NULL default '',
  KEY `filename` (`filename`,`region`),
  KEY `theme` (`theme`),
  KEY `remarks` (`remarks`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `ecs_template` values('index','广告-首页特卖商品广告','/library/ad_position.lbi','0','26','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热评商品文字说明','/library/ad_position.lbi','0','25','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告9','/library/ad_position.lbi','0','22','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告10','/library/ad_position.lbi','0','23','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热评商品广告','/library/ad_position.lbi','0','24','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告6','/library/ad_position.lbi','0','19','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告7','/library/ad_position.lbi','0','20','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告8','/library/ad_position.lbi','0','21','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告3','/library/ad_position.lbi','0','16','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告4','/library/ad_position.lbi','0','17','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告5','/library/ad_position.lbi','0','18','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告9','/library/ad_position.lbi','0','13','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告1','/library/ad_position.lbi','0','14','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页热卖商品广告2','/library/ad_position.lbi','0','15','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告6','/library/ad_position.lbi','0','10','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告7','/library/ad_position.lbi','0','11','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告8','/library/ad_position.lbi','0','12','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告4','/library/ad_position.lbi','0','8','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告5','/library/ad_position.lbi','0','9','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告3','/library/ad_position.lbi','0','7','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告1','/library/ad_position.lbi','0','5','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页新品上架广告2','/library/ad_position.lbi','0','6','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页轮播底部广告3','/library/ad_position.lbi','0','3','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页轮播底部广告4','/library/ad_position.lbi','0','4','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页轮播底部广告2','/library/ad_position.lbi','0','2','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','广告-首页轮播底部广告1','/library/ad_position.lbi','0','1','0','4','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','文章-网站公告','/library/cat_articles.lbi','0','8','10','3','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/brands.lbi','0','0','3','0','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/auction.lbi','0','0','3','0','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/group_buy.lbi','0','0','3','0','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/recommend_promotion.lbi','0','0','2','0','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/recommend_hot.lbi','0','0','6','0','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/recommend_new.lbi','0','0','6','0','www_zuimoban_com','');");
E_D("replace into `ecs_template` values('index','','/library/recommend_best.lbi','0','0','6','0','www_zuimoban_com','');");

require("../../inc/footer.php");
?>