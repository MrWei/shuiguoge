<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_goods`;");
E_C("CREATE TABLE `ecs_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL auto_increment,
  `cat_id` smallint(5) unsigned NOT NULL default '0',
  `goods_sn` varchar(60) NOT NULL default '',
  `goods_name` varchar(120) NOT NULL default '',
  `goods_name_style` varchar(60) NOT NULL default '+',
  `click_count` int(10) unsigned NOT NULL default '0',
  `brand_id` smallint(5) unsigned NOT NULL default '0',
  `provider_name` varchar(100) NOT NULL default '',
  `goods_number` smallint(5) unsigned NOT NULL default '0',
  `goods_weight` decimal(10,3) unsigned NOT NULL default '0.000',
  `market_price` decimal(10,2) unsigned NOT NULL default '0.00',
  `shop_price` decimal(10,2) unsigned NOT NULL default '0.00',
  `promote_price` decimal(10,2) unsigned NOT NULL default '0.00',
  `promote_start_date` int(11) unsigned NOT NULL default '0',
  `promote_end_date` int(11) unsigned NOT NULL default '0',
  `warn_number` tinyint(3) unsigned NOT NULL default '1',
  `keywords` varchar(255) NOT NULL default '',
  `goods_brief` varchar(255) NOT NULL default '',
  `goods_desc` text NOT NULL,
  `goods_thumb` varchar(255) NOT NULL default '',
  `goods_img` varchar(255) NOT NULL default '',
  `original_img` varchar(255) NOT NULL default '',
  `is_real` tinyint(3) unsigned NOT NULL default '1',
  `extension_code` varchar(30) NOT NULL default '',
  `is_on_sale` tinyint(1) unsigned NOT NULL default '1',
  `is_alone_sale` tinyint(1) unsigned NOT NULL default '1',
  `is_shipping` tinyint(1) unsigned NOT NULL default '0',
  `integral` int(10) unsigned NOT NULL default '0',
  `add_time` int(10) unsigned NOT NULL default '0',
  `sort_order` smallint(4) unsigned NOT NULL default '100',
  `is_delete` tinyint(1) unsigned NOT NULL default '0',
  `is_best` tinyint(1) unsigned NOT NULL default '0',
  `is_new` tinyint(1) unsigned NOT NULL default '0',
  `is_hot` tinyint(1) unsigned NOT NULL default '0',
  `is_promote` tinyint(1) unsigned NOT NULL default '0',
  `bonus_type_id` tinyint(3) unsigned NOT NULL default '0',
  `last_update` int(10) unsigned NOT NULL default '0',
  `goods_type` smallint(5) unsigned NOT NULL default '0',
  `seller_note` varchar(255) NOT NULL default '',
  `give_integral` int(11) NOT NULL default '-1',
  `rank_integral` int(11) NOT NULL default '-1',
  `suppliers_id` smallint(5) unsigned default NULL,
  `is_check` tinyint(1) unsigned default NULL,
  PRIMARY KEY  (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_weight` (`goods_weight`),
  KEY `promote_end_date` (`promote_end_date`),
  KEY `promote_start_date` (`promote_start_date`),
  KEY `goods_number` (`goods_number`),
  KEY `sort_order` (`sort_order`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_goods` values('1','10','ECS000000','双口USB充电器测试商品','+','27','1','','100','0.000','58.80','49.00','40.00','1381046400','1478332800','1','','','','images/201310/thumb_img/1_thumb_G_1381080926818.jpg','images/201310/goods_img/1_G_1381080926401.jpg','images/201310/source_img/1_G_1381080926338.jpg','1','','1','1','0','0','1381080926','100','0','1','1','1','1','0','1398481323','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('2','10','ECS000002','Adiaos限量T恤（白色L）','+','32','1','','100','0.000','36.00','30.00','28.00','1381075200','1478361600','1','','','','images/201310/thumb_img/2_thumb_G_1381081006658.jpg','images/201310/goods_img/2_G_1381081006155.jpg','images/201310/source_img/2_G_1381081006740.jpg','1','','1','1','0','0','1381081006','100','0','1','1','1','1','0','1393541967','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('3','10','ECS000003','小米超薄5055mAh移动电源（白）adios','+','8','2','','100','0.000','154.79','129.00','0.00','0','0','1','','28纳米四核1.5GHz 4.7英寸IPS视网膜屏','','images/201404/thumb_img/3_thumb_G_1398450814920.jpg','images/201404/goods_img/3_G_1398450814102.jpg','images/201404/source_img/3_G_1398450814906.jpg','1','','1','1','0','1','1381081063','100','0','0','0','0','0','0','1398450906','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('4','10','ECS000004','鳄鱼纹真皮后盖（豹纹黄）adi','+','9','1','','100','0.000','118.80','99.00','0.00','0','0','1','','','','images/201310/thumb_img/4_thumb_G_1381081094117.jpg','images/201310/goods_img/4_G_1381081094237.jpg','images/201310/source_img/4_G_1381081094291.jpg','1','','1','1','0','0','1381081094','100','0','1','1','1','0','0','1396223970','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('5','10','ECS000005','冰淇淋色后盖（黄）-非','+','25','1','','100','0.000','58.80','49.00','0.00','0','0','1','','','','images/201310/thumb_img/5_thumb_G_1381081130578.jpg','images/201310/goods_img/5_G_1381081130476.jpg','images/201310/source_img/5_G_1381081130081.jpg','1','','1','1','0','0','1381081130','100','0','1','1','1','0','0','1393541958','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('6','10','ECS000006','社区帽衫版米兔','+','46','3','','100','0.000','21.59','18.00','0.00','0','0','1','','','','images/201310/thumb_img/6_thumb_G_1381081160153.jpg','images/201310/goods_img/6_G_1381081160462.jpg','images/201310/source_img/6_G_1381081160257.jpg','1','','1','1','0','0','1381081160','100','0','1','1','1','0','0','1397812317','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('7','11','ECS000007','小米定制版拉卡拉刷卡器','+','17','1','','100','0.000','105.60','88.00','0.00','0','0','1','','','','images/201310/thumb_img/7_thumb_G_1381081297850.jpg','images/201310/goods_img/7_G_1381081297686.jpg','images/201310/source_img/7_G_1381081297677.jpg','1','','1','1','0','0','1381081297','100','0','1','1','1','0','0','1393541949','1','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('8','11','ECS000008','学院风帆布双肩包（黑）','+','105','1','','100','0.000','70.80','59.00','0.00','0','0','1','','高清网络机顶盒，发烧升级，性能提升4倍','','images/201310/thumb_img/8_thumb_G_1381081330475.jpg','images/201310/goods_img/8_G_1381081330963.jpg','images/201310/source_img/8_G_1381081330468.jpg','1','','1','1','0','0','1381081330','101','0','1','1','1','0','0','1393541946','1','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('9','1','ECS000009','小米手机3','+','72','1','','110','0.000','0.01','0.01','0.00','0','0','1','','迄今为止最快的小米手机','<h1>快，就是速度超越所有其它</h1>\r\n<p>小米手机3 安兔兔性能测试对比表。得分越高，代表综合性能越强。<br />\r\n内置72颗 NVIDIA GeForce 图形处理核芯</p>\r\n<h1><strong>全面支持最新3D游戏特效</strong></h1>\r\n<p>小米手机3 图形处理核芯由72颗 NVIDIA GeForce GPU 核芯组成，每秒可运行1150亿次浮点运算！<br />\r\n支持DirectX 9、PhysX 等多种图形技术与最新的3D游戏动态效果。</p>\r\n<h1>迄今速度最快</h1>\r\n<p>2GB LPDDR3 内存<br />\r\n顶级 LPDDR3 内存，较LPDDR2提升50%，同时功耗降低20%！<br />\r\n顶级 16GB/64GB eMMC 4.5 闪存，读速度高达 120MB/s。</p>\r\n<h1>夏普/LG 5吋超灵敏触控视网膜屏</h1>\r\n<p>标准16:9全高清分辨率，显示精度高达441PPI<br />\r\n5吋大屏，游戏、视频、阅读一切截然不同！全高清视网膜屏，1920 x 1080全高清分辨率提供标准16:9的完美兼容方案，<br />\r\n显示精度比小米手机2S提高 28%，更细腻、更自然。搭载康宁玻璃，使用超灵敏触摸屏，湿手或戴手套也能操作。<br />\r\n<br />\r\n&nbsp;</p>','images/201402/thumb_img/9_thumb_G_1393521367610.jpg','images/201402/goods_img/9_G_1393521367739.jpg','images/201402/source_img/9_G_1393521367780.jpg','1','','1','1','1','0','1393470766','2','0','1','1','1','0','0','1397202251','4','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('10','12','ECS000010','红米手机','+','189','1','','4000','0.000','838.80','699.00','0.00','0','0','1','2008年01月 1600万 320×240 像素 800万 黑色 灰色 银色 粉色 白色 蓝色 金色 双模（GSM,900,1800,CDMA 1X） 滑盖','MTK联发科最强28纳米四核1.5GHz','<h2><strong>电话，短信</strong></h2>\r\n<p>利用拨号盘快速查找联系人，通话时显示全屏来电大头贴，来电提示归属地及骚扰号码，响一声电话自动静音，远离来电骚扰，尽享自然通话。</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>更安全的MIUI米柚操作系统</strong></h2>\r\n<p>系统级整合金山、瓦力、LBE等专业安全技术，更完善的安全机制，操作系统从未如此安全。</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>你的手机与众不同</strong></h2>\r\n<p>独创个性主题、百变锁屏与自由桌面MIUI拥有上千款个性主题，上万种个性搭配。 你可以在线访问主题商店，随时获取由上千名知名设计师为你精心设计的个性主题。</p>','images/201402/thumb_img/10_thumb_G_1393522126376.jpg','images/201402/goods_img/10_G_1393522126693.jpg','images/201402/source_img/10_G_1393522126032.jpg','1','','1','1','0','6','1393522126','1','0','1','1','1','0','0','1396818745','9','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('11','1','ECS000011','小米手机2S 直降400','+','17','1','','1000','0.000','1558.80','1299.00','0.00','0','0','1','','挑战4核性价比极限','<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 网络制式标准版：支持中国联通3G(WCDMA)及中国移动、中国联通2G(GSM)网络<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 电信版：支持中国联通、电信3G(WCDMA/CDMA)及中国移动、中国联通2G(GSM)及中国电信2G(CDMA1X)网络<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 网络频率2G:GSM 850/900/1800/1900MHz<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3G:WCDMA 850/1900/2100MHz<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3G（电信版）：CDMA2000 800/1900MHz<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 数据业务GPRS/EDGE/HSPA+ （42Mbps）<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GPSGPS + GLONASS AGPS<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 蓝牙蓝牙4.0，蓝牙HID<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WIFIWIFI Display、WIFI Direct</p>','images/201402/thumb_img/11_thumb_G_1393531608375.jpg','images/201402/goods_img/11_G_1393531608505.jpg','images/201402/source_img/11_G_1393531608939.jpg','1','','1','1','0','12','1393531608','2','0','1','1','1','0','0','1393532488','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('12','1','ECS000012','小米电视','+','25','1','','10000','0.000','3598.79','2999.00','0.00','0','0','1','','顶配47英寸，3D智能电视','<p>顶级LG/三星屏幕<br />\r\n<br />\r\n1920 x 1080 全高清分辨率<br />\r\nLG IPS硬屏 / 三星SPVA屏<br />\r\n<br />\r\nLG与三星是全球液晶面板最顶级的供应商，小米电视<br />\r\n的面板具有178&deg;可视角度，屏幕从几乎任何角度看，<br />\r\n都能呈现出色彩出众的亮丽画面，保证画面色彩更丰<br />\r\n富和节能环保。 </p>','images/201402/thumb_img/12_thumb_G_1393531879085.jpg','images/201402/goods_img/12_G_1393531879762.jpg','images/201402/source_img/12_G_1393531879339.jpg','1','','1','1','0','29','1393531879','100','0','1','1','1','0','0','1393532152','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('13','1','ECS000013','小米盒子','+','9','1','','1000','0.000','358.80','299.00','0.00','0','0','1','','高清网络机顶盒，发烧升级，性能提升4倍','<p><br />\r\n在电视上看1080p高清电影电视剧<br />\r\n<br />\r\n小米盒子通过未来电视运营的 &ldquo; 中国互联网电视 &rdquo; 集成播控平台，不论是1080p高清热门电影，还是让你痴迷的TVB/美剧/韩剧/<br />\r\n央视电视剧，就连你刚刚错过或想重看一次的精彩赛事、综艺节目，都在无广告的小米新盒子里，随时等你观看。<br />\r\n&nbsp;</p>','images/201402/thumb_img/13_thumb_G_1393532004802.jpg','images/201402/goods_img/13_G_1393532004412.jpg','images/201402/source_img/13_G_1393532004844.jpg','1','','1','1','0','2','1393532004','100','0','1','1','1','0','0','1393532153','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('14','1','ECS000014','小蜜蜂 手机支架','+','18','1','','10000','0.000','22.80','19.00','0.00','0','0','1','','吸盘设计，支持多角度摆放','<div class=\"bd\">\r\n<div id=\"goodsDesc\" class=\"goods-desc-con\">\r\n<p><img src=\"http://img01.mifile.cn/images/accs/xmf_01.jpg\" alt=\"\" /><img src=\"http://img01.mifile.cn/images/accs/xmf_02.jpg\" alt=\"\" /><img src=\"http://img01.mifile.cn/images/accs/xmf_03.jpg\" alt=\"\" /><img src=\"http://img01.mifile.cn/images/accs/xmf_04.jpg\" alt=\"\" /><img src=\"http://img01.mifile.cn/images/accs/xmf_05.jpg\" alt=\"\" /><img src=\"http://p.www.xiaomi.com/images/1202/xinluzhang02.jpg\" alt=\"\" /><img style=\"width: 720px; height: 871px; \" src=\"http://p.www.xiaomi.com/images/1202/xinliuzhang03.jpg\" alt=\"\" /><img src=\"http://p.www.xiaomi.com/images/1202/xinluzhang04.jpg\" alt=\"\" /></p>\r\n</div>\r\n</div>','images/201402/thumb_img/14_thumb_G_1393532143495.jpg','images/201402/goods_img/14_G_1393532143711.jpg','images/201402/source_img/14_G_1393532143512.jpg','1','','1','1','0','0','1393532143','100','0','1','1','1','0','0','1393532143','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('15','1','ECS000015','小米活塞耳机简装版','+','33','1','','100','0.000','118.80','99.00','88.00','1398412800','1587801600','1','','小米手机听歌必备','<p>整体表现上，小米活塞耳机是超出我的预期的，比我想象的要好出不少。铝合金腔体、做工还算不错、可以通话、调音走向正确、有品牌，毕竟附带通话功能的它售价不足百元、但音质却超过了很多国产耳机。小米做的这个绝对是良心价格！值得普通用户入手！</p>','images/201402/thumb_img/15_thumb_G_1393532283708.jpg','images/201402/goods_img/15_G_1393532283019.jpg','images/201402/source_img/15_G_1393532283895.jpg','1','','1','1','0','0','1393532283','100','0','1','1','1','1','0','1398486694','0','','-1','-1','0','0');");
E_D("replace into `ecs_goods` values('16','1','ECS000016','财神米兔','+','54','1','','1000','0.000','105.60','88.00','0.00','0','0','1','','最萌的财神，带给你一整年的好财运','<p><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_01.jpg\" style=\"margin-bottom:20px;\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_03.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_04.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_05.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_06.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_07.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_08.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_09.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen1227_10.jpg\" /><img alt=\"\" src=\"http://img03.mifile.cn/webfile/images/g/2013/cn/index/caishen121_02.jpg\" /></p>','images/201402/thumb_img/16_thumb_G_1393532402180.jpg','images/201402/goods_img/16_G_1393532402962.jpg','images/201402/source_img/16_G_1393532402576.jpg','1','','1','1','0','0','1393532402','100','0','1','1','1','0','0','1393896654','0','','-1','-1','0','0');");

require("../../inc/footer.php");
?>