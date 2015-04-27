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

require (dirname ( __FILE__ ) . '/includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$action = isset ( $_REQUEST ['act'] ) ? trim ( $_REQUEST ['act'] ) : 'default';

// 不需要登录的操作或自己验证是否登录（如ajax处理）的act
$not_login_arr = array (
		'act_login',
		'update_ktcard',
		'next_ktcard',
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
				$back_act = 'ktcard.php?' . $_SERVER ['QUERY_STRING'];
			}
			$action = 'default';
		} else {
			// 未登录提交数据。非正常途径提交数据！
			die ( '已经记录此非法操作IP' );
		}
	}
}

/* 登陆代金卡界面 */
if ($action == 'default') {
	
	assign_template ();
	$smarty->assign ( 'page_title', '用户代金卡管理' );
	$smarty->assign ( 'ur_here', '代金卡' );
	$smarty->assign ( 'helps', get_shop_help () );
	$smarty->assign ( 'act', 'act_login' );
	$smarty->assign ( 'action', $action );
	$smarty->assign ( 'back_act', $back_act );
	
	$smarty->display ( 'ktcard.dwt' );
}

/* 处理代金卡登陆界面 */
if ($action == 'act_login') {
	
	$card_sn = isset ( $_REQUEST ['card_sn'] ) ? trim ( $_REQUEST ['card_sn'] ) : '0';
	
	$card_pwd = isset ( $_REQUEST ['card_pwd'] ) ? trim ( $_REQUEST ['card_pwd'] ) : '0';
	
	if ($card_sn != '0') 
	{
		$sql = "SELECT * FROM " . $ecs->table ( 'kt_bcards' ) . " WHERE card_sn = '$card_sn'" . " AND card_pwd = '$card_pwd'";
		
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
			
			assign_template ();
			$smarty->assign ( 'page_title', '用户代金卡管理' );
			$smarty->assign ( 'ur_here', '代金卡' );
			$smarty->assign ( 'helps', get_shop_help () );
			$smarty->assign ( 'act', 'next_ktcard' );
			$smarty->assign ( 'action', $action );
			$smarty->assign ( 'back_act', $back_act );
			$smarty->assign ( 'card_sn', $card_sn );
			$smarty->assign ( 'card_pwd', $card_pwd );
			$smarty->assign ( 'card_bonus', $record_arr ['card_bonus'] );
			$smarty->assign ( 'goods_list', get_order_goods_list () );
			$smarty->display ( 'ktcard.dwt' );
		}
	}
}

/* 登陆代金卡界面 */
if ($action == 'next_ktcard') {
	$getAction = isset ( $_REQUEST ['action'] ) ? trim ( $_REQUEST ['action'] ) : NULL;
	$goodsSetId = isset ( $_REQUEST ['goods_id'] ) ? trim ( $_REQUEST ['goods_id'] ) : '';
	
	$card_sn = isset ( $_REQUEST ['card_sn'] ) ? trim ( $_REQUEST ['card_sn'] ) : '0';
	$card_pwd = isset ( $_REQUEST ['card_pwd'] ) ? trim ( $_REQUEST ['card_pwd'] ) : '0';
	
	$sql = "SELECT * FROM " . $ecs->table ( 'kt_bcards' ) . " WHERE card_sn = '$card_sn'" . " AND card_pwd = '$card_pwd'";
	$record_arr = $db->getRow ( $sql );
	$card_bonus = $record_arr ['card_bonus'];
	//选择商品处理
	if( $getAction == "ajaxshop" ){
		//要返回的数据
		$data = array();
		$data['status'] = 0;
		$data['tips']  = "";
		if (empty ( $record_arr )){
			$data['tips']  = "无效的代金卡";
			exit( json_encode( $data) );
		}else {
			//处理商品，计算总价格
			$data['total'] = "";
			foreach ( $_POST['goods'] as $k=>$v ){
				$data['total'] += $_POST['goods_num'][$v] * $_POST['goods_price'][$v] ;
			}
			//价格对比
			if( $record_arr ['card_bonus'] < $data['total'] ){
				$data['tips']  = "所选的商品总额大于代金卡金额";
				$data['goods_id'] = $goodsSetId;
				$data['goods_num'] = $_POST['goods_num'][$goodsSetId]-1;
			}else{
				$data['total'] = sprintf( "%1\$.2f" , $data['total']);
				$data['status'] = 1;
				$data['yue'] =  ($record_arr ['card_bonus'] - $data['total']);
				$data['yue'] = sprintf( "%1\$.2f" , $data['yue']);
			}
			exit( json_encode( $data) );
		}
	}else {
		$fee = intval($_POST['sum']);
		if ($fee > $card_bonus) {
			show_message ( '订单超出代金卡余额,请重新选择商品' );
			return 0;
		}
		if (empty ( $record_arr )) {
			show_message ( '卡号或密码错误' );
			return 0;
		}
		// 购买的商品
		$goods = array ();
		foreach ( $_POST ['goods'] as $k => $v ) {
			$goods [$k] ['goods_id'] = $v;
			$goods [$k] ['goods_num'] = $_POST ['goods_num'] [$v];
		}
		if (! is_array ( $goods ) || empty ( $goods )) {
			show_message ( '请选择商品' );
			return 0;
		}
		assign_template ();
		$smarty->assign ( 'page_title', '用户代金卡管理' );
		$smarty->assign ( 'ur_here', '代金卡' );
		$smarty->assign ( 'helps', get_shop_help () );
		$smarty->assign ( 'act', 'update_ktcard' );
		$smarty->assign ( 'action', $action );
		$smarty->assign ( 'back_act', $back_act );
		$smarty->assign ( 'card_sn', $card_sn );
		$smarty->assign ( 'card_pwd', $card_pwd );
		$smarty->assign ( 'goodsAll', $goods );
		$smarty->assign ( 'card_bonus', $record_arr ['card_bonus'] );
		$smarty->assign ( 'fee', $fee );
		// 省市
		/* 取得省份列表 By zhangyh */
		$smarty->assign ( 'shop_province_list', get_regions ( 1, $_CFG ['shop_country'] ) );
		$consignee = get_consignee ( $_SESSION ['user_id'] );
		if ($consignee ['province']) {
			$smarty->assign ( 'shop_city_list', get_regions ( 2, $consignee ['province'] ) );
		}
		if ($consignee ['city']) {
			$smarty->assign ( 'shop_district_list', get_regions ( 3, $consignee ['city'] ) );
		}
		/* 取得配送列表 */
		$region = array (
				1,
				$consignee ['province'],
				$consignee ['city'],
				$consignee ['district'] 
		);
		$shipping_list = available_shipping_list ( $region );
		$cart_weight_price = cart_weight_price ( $flow_type );
		$insure_disabled = true;
		$cod_disabled = true;
		// 省市结束
		$smarty->display ( 'ktcard.dwt' );
	}
	
}

/* 提交客户订单 */

if ($action == 'update_ktcard') {

	$order_user = isset ( $_REQUEST ['order_user'] ) ? trim ( $_REQUEST ['order_user'] ) : '0';
	$order_address = isset ( $_REQUEST ['order_address'] ) ? trim ( $_REQUEST ['order_address'] ) : '0';
	$order_tel = isset ( $_REQUEST ['order_tel'] ) ? trim ( $_REQUEST ['order_tel'] ) : '0';
	
	$country = isset ( $_REQUEST ['country'] ) ? trim ( $_REQUEST ['country'] ) : '0';
	$province = isset ( $_REQUEST ['province'] ) ? trim ( $_REQUEST ['province'] ) : '0';
	$city = isset ( $_REQUEST ['city'] ) ? trim ( $_REQUEST ['city'] ) : '0';
	$district = isset ( $_REQUEST ['district'] ) ? trim ( $_REQUEST ['district'] ) : '0';
	$postscript = isset ( $_REQUEST ['postscript'] ) ? htmlspecialchars( $_REQUEST ['postscript'] ) : '0';
	
	$card_sn = isset ( $_REQUEST ['card_sn'] ) ? trim ( $_REQUEST ['card_sn'] ) : '0';
	$card_pwd = isset ( $_REQUEST ['card_pwd'] ) ? trim ( $_REQUEST ['card_pwd'] ) : '0';
	//价格
	$fee = intval($_POST['sum']);
	$goodsNum = $_POST['goods_num'] ;
	$goodsArr = array();
	//去除产品数量为0的产品
	foreach ( $_REQUEST ['goods'] as $k=>$v ){
		if( $goodsNum[$v] ) $goodsArr[$k] = $v;
	}
	$goods = implode(',', $goodsArr);
	//
	$order_sn = get_order_sn ();
	$order_time = gmtime ();
	//商品信息
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'goods' ) . " WHERE goods_id in ($goods)";
	$goodsInfo = $GLOBALS ['db']->getAll ( $sql );
	if (empty ( $order_user ) or empty ( $order_tel ) or empty ( $order_address )) {
		show_message ( '联系人为必填项,地址为必选项,手机号任选其一.' );
		return 0;
	}
	
	if ($card_sn != '0') {
		
		$sql = "SELECT * FROM " . $ecs->table ( 'kt_bcards' ) . " WHERE card_sn = '$card_sn'" . " AND card_pwd = '$card_pwd'";
		$record_arr = $db->getRow ( $sql );
		$card_bonus = $record_arr ['card_bonus'];
		if ($fee > $card_bonus) {
			show_message ( '订单超出代金卡余额,请重新选择商品' );
			return 0;
		}
		if (empty ( $record_arr )) 

		{
			show_message ( '卡号或密码错误' );
			return 0;
		} else {
			$card_id = intval ( $record_arr ['card_id'] );
			if ($fee > $card_bonus) {
				show_message ( '所选商品总额大于代金卡金额' );
			} 
			//保存到order_info
			$order_sn = get_order_sn ();
			$order_time = gmtime ();
			
			$postscript .= "代金支付,卡号:{$card_sn},密码:{$card_pwd}";
			$sql = "INSERT INTO " . $GLOBALS ['ecs']->table ( 'order_info' ) . " (order_sn, user_id, order_status, pay_status, consignee , country , province , city , district , address , tel , mobile ,postscript , add_time,pay_time,pay_id,pay_name,goods_amount,money_paid,order_amount,shipping_id ,shipping_name ) ";
			$sql .="VALUES('$order_sn',0,0,2,'$order_user','$country','$province','$city','$district','$order_address','$order_tel','$order_tel','$postscript','$order_time','$order_time',8,'代金卡支付','$fee','$fee','$fee',5,'圆通快递')";
			$db->query($sql);
			$order_id = $db->insert_id();
			//保存订单商品	
			foreach ( $goodsInfo as $v ){
				
				$sql = "INSERT INTO " . $GLOBALS ['ecs']->table ( 'order_goods' ) . " (order_id,goods_id,goods_name,goods_sn,goods_number,market_price,goods_price,is_real)";
				$sql .="VALUES( {$order_id} , {$v['goods_id']}, '{$v['goods_name']}',{$v['goods_sn']},{$goodsNum[$v['goods_id']]},{$v['market_price']},{$v['shop_price']}, {$v['is_real']})";
				$db->query($sql);
			}
			
			$sql = "UPDATE " . $ecs->table ( 'kt_bcards' ) . " SET " . "used_time = '$order_time', used_name = '$order_user'" . " WHERE card_sn = '$card_sn'" . " AND card_pwd = '$card_pwd'";
			$db->query ( $sql );
			$action = 'default';
			show_message ( '已经成功提交订单!', '返回商城首页', 'index.php', 'default' );
		}
	}
}
/**
 * 获取代金卡商品列表
 * 
 * @access public
 * @return void
 */
function get_order_goods_list() {
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'goods' ) . " WHERE is_on_sale = 1 ORDER BY goods_id desc";
	
	$result = $GLOBALS ['db']->getAll ( $sql );
	$goods = array ();
	
	foreach ( $result as $idx => $row ) {
		$goods [$idx] ['goods_id'] = $row ['goods_id'];
		$goods [$idx] ['goods_name'] = $row ['goods_name'];
		$goods [$idx] ['goods_price'] = $row ['shop_price'];
		$goods [$idx] ['goods_number'] = $row ['goods_number'];
		$goods [$idx] ['goods_thumb'] = $row ['goods_thumb'];
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

?>