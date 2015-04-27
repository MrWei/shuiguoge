<?php

/**
 * ECSHOP 标签云
 * ============================================================================
 * 版权所有 2005-2008 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: testyang $
 * $Id: tag_cloud.php 15013 2008-10-23 09:31:42Z testyang $
*/
define ( 'IN_ECS', true );

require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$action = isset ( $_REQUEST ['act'] ) ? trim ( $_REQUEST ['act'] ) : 'default';

// 不需要登录的操作或自己验证是否登录（如ajax处理）的act
$not_login_arr = array (
		'act_login',
		'update_kscard' 
);

/* 显示页面的action列表 */
$ui_arr = array (
		'default' 
);

/* 未登录处理 */
if (empty ( $_SESSION ['user_id'] )) {
	if (! in_array ( $action, $not_login_arr )) {
		if (in_array ( $action, $ui_arr )) {
			if (! empty ( $_SERVER ['QUERY_STRING'] )) {
				$back_act = 'kscard.php?' . $_SERVER ['QUERY_STRING'];
			}
			$action = 'default';
		} else {
			// 未登录提交数据。非正常途径提交数据！
			die ( '已经记录此非法操作IP' );
		}
	}
}

/* 登陆水果卡界面 */
if ($action == 'default') {
	
	assign_template ();
	$smarty->assign ( 'page_title', '用户水果卡管理' );
	$smarty->assign ( 'ur_here', '水果卡' );
	$smarty->assign ( 'helps', get_shop_help () );
	$smarty->assign ( 'act', 'act_login' );
	$smarty->assign ( 'action', $action );
	$smarty->assign ( 'back_act', $back_act );
	
	$smarty->display ( 'kscard.dwt' );
}

/* 处理水果卡登陆界面 */
if ($action == 'act_login') {
	$card_sn = isset ( $_REQUEST ['card_sn'] ) ? trim ( $_REQUEST ['card_sn'] ) : '0';
	$card_pwd = isset ( $_REQUEST ['card_pwd'] ) ? trim ( $_REQUEST ['card_pwd'] ) : '0';
	if ($card_sn != '0') 
	{
		$sql = "SELECT * FROM " . $ecs->table ( 'ks_cards' ) . " WHERE card_sn = '$card_sn'" . " AND card_pwd = '$card_pwd'";
		$record_arr = $db->getRow ( $sql );
		if (empty ( $record_arr )) 
		{
			show_message ( '卡号或密码错误' );
			return 0;
		}elseif ( !$record_arr['status'] ){
			show_message ( '卡号未激活!' );
			return 0;
		}elseif ( $record_arr['pass_time']<time() ){
			show_message ( '卡号已过期' );
			return 0;
		} else {
			if ($record_arr ['order_id'] == 0) {
				assign_template ();
				$smarty->assign ( 'page_title', '用户水果卡管理' );
				$smarty->assign ( 'ur_here', '水果卡' );
				$smarty->assign ( 'helps', get_shop_help () );
				$smarty->assign ( 'act', 'update_kscard' );
				$smarty->assign ( 'action', $action );
				$smarty->assign ( 'back_act', $back_act );
				$smarty->assign ( 'card_sn', $card_sn );
				$smarty->assign ( 'card_id', $record_arr ['card_id'] );
				$smarty->assign ( 'card_pwd', $card_pwd );
				$smarty->assign ( 'card_type', $record_arr ['card_type'] );
				$smarty->assign ( 'goods_list', get_order_goods_list ( $record_arr ['card_type'] ) );
				//省市
				
				/* 取得省份列表 By zhangyh */
				$smarty->assign('shop_province_list', get_regions(1, $_CFG['shop_country']));
				
				$consignee = get_consignee($_SESSION['user_id']);
				
				if($consignee['province'])
				{
					$smarty->assign('shop_city_list', get_regions(2, $consignee['province']));
				}
				if($consignee['city'])
				{
					$smarty->assign('shop_district_list', get_regions(3, $consignee['city']));
				}
				/* 取得配送列表 */
				$region            = array(1, $consignee['province'], $consignee['city'], $consignee['district']);
				$shipping_list     = available_shipping_list($region);
				$cart_weight_price = cart_weight_price($flow_type);
				$insure_disabled   = true;
				$cod_disabled      = true;
				
				
				//省市结束
				$smarty->assign ( 'sel_num', get_goods_num ( $record_arr ['card_type'] ) );
				$smarty->display ( 'kscard.dwt' );
			} else {
				assign_template ();
				$smarty->assign ( 'page_title', '用户水果卡管理' );
				$smarty->assign ( 'ur_here', '水果卡' );
				$smarty->assign ( 'helps', get_shop_help () );
				$smarty->assign ( 'act', 'order_info' );
				$smarty->assign ( 'action', 'order_info' );
				
				$order_id = $record_arr ['order_id'];
				$list = $db->getRow ( "SELECT * FROM " . $ecs->table ( 'ks_order' ) . " WHERE order_id = '$order_id'" );
				$order_time = local_date ( "Y-h-d H:i:s", $list [order_time] );
				$smarty->assign ( 'order_time', $order_time );
				$smarty->assign ( 'order', $list );
				$smarty->display ( 'kscard.dwt' );
			}
		}
	}
}

/* 提交客户订单 */

if ($action == 'update_kscard') {
	
	$order_user = isset ( $_REQUEST ['order_user'] ) ? trim ( $_REQUEST ['order_user'] ) : '0';
	$order_address = isset ( $_REQUEST ['order_address'] ) ? trim ( $_REQUEST ['order_address'] ) : '0';
	$order_tel = isset ( $_REQUEST ['order_tel'] ) ? trim ( $_REQUEST ['order_tel'] ) : '0';
	
	$country = isset ( $_REQUEST ['country'] ) ? trim ( $_REQUEST ['country'] ) : '0';
	$province = isset ( $_REQUEST ['province'] ) ? trim ( $_REQUEST ['province'] ) : '0';
	$city = isset ( $_REQUEST ['city'] ) ? trim ( $_REQUEST ['city'] ) : '0';
	$district = isset ( $_REQUEST ['district'] ) ? trim ( $_REQUEST ['district'] ) : '0';
	$postscript = isset ( $_REQUEST ['postscript'] ) ? htmlspecialchars( $_REQUEST ['postscript'] ) : '0';
	
	
	$arr = array ();
	$arr = $_POST ['goods'];
	$goods_num = count ( $arr );
	$goods = ! empty ( $arr ) ? join ( ",", $arr ) : '0';
	
	$card_sn = isset ( $_REQUEST ['card_sn'] ) ? trim ( $_REQUEST ['card_sn'] ) : '0';
	$card_pwd = isset ( $_REQUEST ['card_pwd'] ) ? trim ( $_REQUEST ['card_pwd'] ) : '0';
	$card_type = ! empty ( $_REQUEST ['card_type'] ) ? intval ( $_REQUEST ['card_type'] ) : 0;
	
	$sel_num = ! empty ( $_REQUEST ['sel_num'] ) ? intval ( $_REQUEST ['sel_num'] ) : 0;
	
	$card_id = ! empty ( $_REQUEST ['card_id'] ) ? intval ( $_REQUEST ['card_id'] ) : 0;
	
	if (empty ( $order_user ) or empty ( $order_tel ) or empty ( $order_address )) {
		show_message ( '联系人为必填项,电话任选其一.' );
		return 0;
	}
	if (empty ( $arr )) {
		show_message ( '请选择商品' );
		return 0;
	}
	if ($sel_num < $goods_num) {
		show_message ( "商品限定只选择($sel_num)种,请重新选择." );
		return 0;
	}
	
	if ($card_sn != '0') 

	{
		
		$sql = "SELECT * FROM " . $ecs->table ( 'ks_cards' ) . " WHERE card_sn = '$card_sn'" . " AND card_pwd = '$card_pwd'";
		$record_arr = $db->getRow ( $sql );
		unset($sql);
		$sql = "SELECT * FROM " . $ecs->table ( 'goods' ) . " WHERE goods_id = '$goods'";
		$goodinfo = $db->getRow($sql);
		unset($sql);
		if (empty ( $record_arr )) 

		{
			show_message ( '卡号或密码错误' );
			return 0;
		} else {
			//保存到order_info
			$order_sn = get_order_sn ();
			$order_time = gmtime ();
			$money = $goodinfo['shop_price'];
			$postscript .= "水果卡支付,卡号:{$card_sn},密码:{$card_pwd}";
			$sql = "INSERT INTO " . $GLOBALS ['ecs']->table ( 'order_info' ) . " (order_sn, user_id, order_status, pay_status, consignee , country , province , city , district , address , tel , mobile ,postscript , add_time,pay_time,pay_id,pay_name,goods_amount,money_paid,order_amount,shipping_id ,shipping_name) ";
			$sql .="VALUES('$order_sn',0,0,2,'$order_user','$country','$province','$city','$district','$order_address','$order_tel','$order_tel','$postscript','$order_time','$order_time',7,'水果卡支付','$money','$money','$money',5,'圆通快递')";
			$db->query($sql);
			$order_id = $db->insert_id();
			////保存到order_goods
			$sql = "INSERT INTO " . $GLOBALS ['ecs']->table ( 'order_goods' ) . " (order_id,goods_id,goods_name,goods_sn,goods_number,market_price,goods_price,is_real)";
			$sql .="VALUES( {$order_id} , {$goodinfo['goods_id']}, '{$goodinfo['goods_name']}',{$goodinfo['goods_sn']},1,{$goodinfo['market_price']},{$goodinfo['shop_price']}, {$goodinfo['is_real']})";
			$db->query($sql);
			//更新卡状态
           	$sql = "UPDATE " .$ecs->table('ks_cards'). " SET ".
                      "order_id         = '$order_id' ,".
                      "order_id         = '$order_id' ,".
                      "used_name         = '$order_user' ".
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'";
          
           	$db->query($sql);
			$action = 'default';
			show_message ( '已经成功提交订单!', '返回商城首页', 'index.php', 'default' );
		}
	}
}
/**
 * 获取水果卡商品列表
 * 
 * @access public
 * @return void
 */
function get_order_goods_list($id) {
	$field = "tc.cg_id,tc.cg_catid,tc.cg_goodid,g.goods_name,g.shop_price,g.goods_thumb";
	$sql = "SELECT {$field} FROM " . $GLOBALS ['ecs']->table ( 'ks_cardgoods' ) . "AS tc LEFT JOIN " . $GLOBALS ['ecs']->table ( 'goods' ) . " AS g ON tc.cg_goodid=g.goods_id";
	$sql .= " WHERE tc.cg_catid = $id";
	
	$result = $GLOBALS ['db']->getAll ( $sql );
	$goods = array ();
	foreach ( $result as $idx => $row ) {
		
		$goods [$idx] ['cg_id'] = $row ['cg_id'];
		$goods [$idx] ['cg_catid'] = $row ['cg_catid'];
		$goods [$idx] ['cg_goodid'] = $row ['cg_goodid'];
		$goods [$idx] ['cg_goodname'] = $row ['goods_name'];
		$goods [$idx] ['cg_price'] = $row ['shop_price'];
		$goods [$idx] ['cg_img'] = $row ['goods_thumb'];
	}
	
	return $goods;
}

/* 获取配送商品名称 */
function get_goods_name($id) 

{
	$sql = "SELECT goods_name FROM " . $GLOBALS ['ecs']->table ( 'goods' ) . " WHERE goods_id = '$id'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}

/* 获取配送商品备注 */
function get_goods_bak($id) 

{
	$sql = "SELECT seller_note FROM " . $GLOBALS ['ecs']->table ( 'goods' ) . " WHERE goods_id = '$id'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}

/* 获取可选商品数量 */
function get_goods_num($id) 

{
	$sql = "SELECT cat_sgn FROM " . $GLOBALS ['ecs']->table ( 'ks_cardcats' ) . " WHERE cat_id = '$id'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}
?>