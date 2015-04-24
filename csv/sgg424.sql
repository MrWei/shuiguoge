ALTER TABLE  `ecs_ks_cards` ADD  `send_time` INT NOT NULL COMMENT  '发卡时间' AFTER  `add_time` ,
ADD  `pass_time` INT NOT NULL COMMENT  '过期时间' AFTER  `send_time` ,
ADD  `owner` VARCHAR( 20 ) NOT NULL DEFAULT  '未领卡' COMMENT  '领卡人' AFTER  `pass_time` ,
ADD  `used_name` VARCHAR( 20 ) NOT NULL  DEFAULT  '无使用人' COMMENT  '使用人' AFTER  `owner`

ALTER TABLE  `ecs_ks_cards` ADD  `status` TINYINT( 1 ) NOT NULL DEFAULT  '0' COMMENT  '是否激活0没有激活1激活' AFTER  `card_pwd` ;

ALTER TABLE  `ecs_kt_bcards` ADD  `send_time` INT NOT NULL COMMENT  '发卡时间' AFTER  `add_time` ,
ADD  `pass_time` INT NOT NULL COMMENT  '过期时间' AFTER  `send_time` ,
ADD  `owner` VARCHAR( 20 ) NOT NULL DEFAULT  '未领卡' COMMENT  '领卡人' AFTER  `pass_time` ,
ADD  `used_name` VARCHAR( 20 ) NOT NULL  DEFAULT  '无使用人' COMMENT  '使用人' AFTER  `owner`

ALTER TABLE  `ecs_ks_cards` ADD  `status` TINYINT( 1 ) NOT NULL DEFAULT  '0' COMMENT  '是否激活0没有激活1激活' AFTER  `card_pwd` ;

