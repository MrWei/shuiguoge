<?php
define ( 'IN_ECS', true );
require (dirname ( __FILE__ ) . '/includes/init.php');
/* act操作项的初始化 */
if (empty ( $_REQUEST ['act'] )) {
	$_REQUEST ['act'] = 'cat';
} else {
	$_REQUEST ['act'] = trim ( $_REQUEST ['act'] );
}
/* 初始化$exc对象 */
$exc = new exchange ( $ecs->table ( 'bonus_type' ), $db, 'type_id', 'type_name' );
/* ------------------------------------------------------ */
// -- 水果卡分类列表
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'cat') {
	$smarty->assign ( 'ur_here', '水果卡分类' );
	$smarty->assign ( 'action_link', array (
			'text' => '添加水果卡类型',
			'href' => 'ks_card.php?act=add' 
	) );
	$smarty->assign ( 'full_page', 1 );
	
	$list = get_type_list ();
	
	$smarty->assign ( 'type_list', $list );
	
	assign_query_info ();
	$smarty->display ( 'ks_card_type.htm' );
}
/**
 * 编辑实卡类别
 *
 * @access public
 * @param
 *        	s integer $isdelete
 * @param
 *        	s integer $real_goods
 * @return array
 */
if ($_REQUEST ['act'] == 'edit_card_type') {
	$card_id = ! empty ( $_REQUEST ['cid'] ) ? intval ( $_REQUEST ['cid'] ) : 0;
	$card_type = ! empty ( $_REQUEST ['tid'] ) ? intval ( $_REQUEST ['tid'] ) : 0;
	$backLink = $card_type ? '&tid='.$card_type : '';
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '水果卡编辑' );
	$smarty->assign ( 'action_link', array (
			'text' => '水果卡列表',
			'href' => "ks_card.php?act=list{$backLink}" , 
	) );
	$smarty->assign ( 'action', 'edit_card_type' );
	$smarty->assign ( 'card_name', get_type_name ( $card_type ) );
	$smarty->assign ( 'form_act', 'card_type_update' );
	$smarty->assign ( 'card_id', $card_id );
	$smarty->assign ( 'card_type', $card_type );
	//当前卡信息
	$cardinfo = getCardInfo($card_id);
	$smarty->assign ( 'card',$cardinfo );
	$smarty->assign ( 'cfg_lang', $_CFG ['lang'] );
	$list = get_catd_type_list ();
	$smarty->assign ( 'type_list', $list );
	assign_query_info ();
	$smarty->display ( 'ks_edit_card_type.htm' );
}
/* 获取水果卡类型名称 */
function getCardInfo($card_id){
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_id = '$card_id'";
	$result = $GLOBALS ['db']->getRow ( $sql );
	return $result;
}
/* ------------------------------------------------------ */
// -- 修改水果卡分类
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'card_type_update') {
	/* 初始化数据 */
	$card_id = ! empty ( $_REQUEST ['cid'] ) ? intval ( $_REQUEST ['cid'] ) : 0;
	$up_card_type = ! empty ( $_REQUEST ['card_type'] ) ? intval ( $_REQUEST ['card_type'] ) : 0;
	$status =  ! empty($_REQUEST['status']) ? intval($_REQUEST['status']) : 0;
	$sendTime = ! empty($_REQUEST['send_time']) ? strtotime($_REQUEST['send_time']) : $_REQUEST['sendtime'] ;
	$passTime = ! empty($_REQUEST['pass_time']) ? strtotime($_REQUEST['pass_time']) : $_REQUEST['passtime'] ;
	$owner =  ! empty($_REQUEST['owner']) ? htmlspecialchars($_REQUEST['owner']) : '';
	$used_name =  ! empty($_REQUEST['used_name']) ? htmlspecialchars($_REQUEST['used_name'])  : 0;
	$sql = "UPDATE " . $ecs->table ( 'ks_cards' ) . " SET " . "card_type = '$up_card_type',status = '$status',owner = '$owner',send_time = '$sendTime',pass_time = '$passTime',used_name = '$used_name' " . "WHERE card_id    = '$card_id'";
	$db->query ( $sql );
	$url = "ks_card.php?act=list&tid=$up_card_type";
	ecs_header ( "Location: $url\n" );
	exit ();
}
/* ------------------------------------------------------ */
// -- 导出线下发放的信息
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'excel') {
	@set_time_limit ( 0 );
	
	/* 获得此线下红包类型的ID */
	$tid = ! empty ( $_GET ['tid'] ) ? intval ( $_GET ['tid'] ) : 0;
	$type_name = $db->getOne ( "SELECT cat_name FROM " . $ecs->table ( 'ks_cardcats' ) . " WHERE cat_id = '$tid'" );
	
	/* 文件名称 */
	$bonus_filename = $type_name . '_bonus_list';
	if (EC_CHARSET != 'gbk') {
		$bonus_filename = ecs_iconv ( 'UTF8', 'GB2312', $bonus_filename );
	}
	
	header ( "Content-type: application/vnd.ms-excel; charset=utf-8" );
	header ( "Content-Disposition: attachment; filename=$bonus_filename.xls" );
	
	/* 文件标题 */
	if (EC_CHARSET != 'gbk') {
		echo ecs_iconv ( 'UTF8', 'GB2312', '水果卡序号' ) . "\t";
		echo ecs_iconv ( 'UTF8', 'GB2312', '水果卡密码' ) . "\t\n";
	} else {
		echo "水果卡序号" . "\t";
		echo "水果卡密码" . "\t\n";
	}
	
	$val = array ();
	$sql = "SELECT card_sn, card_pwd " . "FROM " . $ecs->table ( 'ks_cards' ) . "WHERE  card_type = '$tid' ORDER BY card_id";
	$res = $db->query ( $sql );
	
	$code_table = array ();
	while ( $val = $db->fetchRow ( $res ) ) {
		echo $val ['card_sn'] . "\t";
		echo $val ['card_pwd'] . "\t";
		echo "\t\n";
	}
}
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////// 导入excel start //////////////////////////////////////////////
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_REQUEST ['act'] == 'import') {
	$type_id = ! empty ( $_REQUEST ['tid'] ) ? intval ( $_REQUEST ['tid'] ) : 0;
	// 语言
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '导入水果卡' );
	// 返回链接
	$smarty->assign ( 'action_link', array (
			'text' => '返回水果卡列表',
			'href' => "ks_card.php?act=list&tid=$type_id" 
	) );
	$smarty->assign ( 'typeid', $type_id );
	// 当前水果卡类型
	$smarty->assign ( 'card_name', get_type_name ( $type_id ) );
	// 内存占用情况
	$smarty->assign ( 'form_act', 'importExcel' );
	assign_query_info ();
	$smarty->display ( 'ks_card_import.htm' );
}
/**
 * 导入execel
 */
if ($_REQUEST ['act'] == 'importExcel') {
	$cuur_typeid = intval ( $_POST ['typeid'] );
	// 语言
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '导入水果卡' );
	// 内存占用情况
	$filename = $_FILES ['file'] ['tmp_name'];
	if ($filename == '')exit ( "请选择要导入的CSV文件！" );
	//开始导入 
	$arr = array();
	require (dirname ( __FILE__ ) . '/excel/PHPExcel.class.php');
	require (dirname ( __FILE__ ) . '/excel/PHPExcel/Reader/Excel5.php');
		$PHPExcel=new PHPExcel();
		$PHPReader=new PHPExcel_Reader_Excel5();
    	$PHPExcel=$PHPReader->load($filename);
    	$currentSheet=$PHPExcel->getSheet(0);
    	$allColumn=$currentSheet->getHighestColumn();
    	$allRow=$currentSheet->getHighestRow();
    	for($currentRow=2;$currentRow<=$allRow;$currentRow++){
    		for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
    			$address=$currentColumn.$currentRow;
    			$arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
    		}
    
    	}
    	$add_time = gmtime ();
    	$used_time = 0;
    	$order_id = 0;
    	$data_values = "";
    	foreach ( $arr as $v ){
    		if( $v['A'] != $cuur_typeid ) exit('类型id错误');
    		$passTime = strtotime($v['E']);
    		$sendTime = strtotime($v['D']);
			$data_values .= "('".$v['A']."','".$v['B']."','".$v['C']."','".$add_time."','$passTime','$sendTime','".$v['F']."','$used_time', '$order_id'),";
    	}
    $data_values = substr($data_values,0,-1);
    $sql = "INSERT INTO " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . "(card_type, card_sn, card_pwd, add_time,pass_time,send_time,owner, used_time, order_id) VALUES " . $data_values;
	$res = $GLOBALS ['db']->query ( $sql );
	if ($res) {
		$iresult = "恭喜，导入成功";
	} else {
		$iresult = "导入失败";
	}
	$smarty->assign ( 'action_link', array (
			'text' => '返回水果卡列表',
			'href' => "ks_card.php?act=list&tid=$cuur_typeid" 
	) );
	$smarty->assign ( 'iresult', $iresult );
	$smarty->display ( 'ks_card_importcsv.htm' );
}
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////// 导入excel end //////////////////////////////////////////////////
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * 获取水果卡分类
 */
function get_catd_type_list() {
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cardcats' );
	
	$result = $GLOBALS ['db']->getAll ( $sql );
	$goods = array ();
	
	foreach ( $result as $idx => $row ) {
		
		$goods [$idx] ['cat_id'] = $row ['cat_id'];
		$goods [$idx] ['cat_name'] = $row ['cat_name'];
	}
	
	return $goods;
}

/**
 * 获得水果卡实卡列表
 *
 * @access public
 * @param
 *        	s integer $isdelete
 * @param
 *        	s integer $real_goods
 * @return array
 */
if ($_REQUEST ['act'] == 'edit_card') {
	$type_id = ! empty ( $_REQUEST ['tid'] ) ? intval ( $_REQUEST ['tid'] ) : 0;
	
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '水果卡列表' );
	$smarty->assign ( 'action_link', array (
			'text' => '水果卡列表',
			'href' => "ks_card.php?act=list" 
	) );
	$smarty->assign ( 'action', 'edit_card' );
	
	$smarty->assign ( 'form_act', 'card_update' );
	$smarty->assign ( 'type_id', $type_id );
	$smarty->assign ( 'cfg_lang', $_CFG ['lang'] );
	
	assign_query_info ();
	$smarty->display ( 'ks_edit_card.htm' );
}

/* ------------------------------------------------------ */
// -- 翻页、排序
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'query') {
	$list = get_order_list ();
	
	$smarty->assign ( 'type_list', $list ['item'] );
	$smarty->assign ( 'filter', $list ['filter'] );
	$smarty->assign ( 'record_count', $list ['record_count'] );
	$smarty->assign ( 'page_count', $list ['page_count'] );
	
	$sort_flag = sort_flag ( $list ['filter'] );
	$smarty->assign ( $sort_flag ['tag'], $sort_flag ['img'] );
	
	make_json_result ( $smarty->fetch ( 'ks_order_list.htm' ), '', array (
			'filter' => $list ['filter'],
			'page_count' => $list ['page_count'] 
	) );
}

/* ------------------------------------------------------ */
// -- 礼品实卡列表
/* ------------------------------------------------------ */
// TODO::礼品实卡列表
if ($_REQUEST ['act'] == 'list') {
	//导入入类
	require (dirname ( __FILE__ ) . '/includes/Page.class.php');
	//接收查询条件
	$map = array();
	//查询类型
	if( !empty($_REQUEST['type_id'] ) ){
		$map['card_type'] = intval($_REQUEST['type_id']);
	}
	//查询卡号
	if( !empty($_REQUEST['card_sn'] ) ){
		$map['card_sn'] =  htmlspecialchars( $_REQUEST['card_sn']) ;
	}
	//激活状态
	if( !empty($_REQUEST['status'] ) && $_REQUEST['status']!=2 ){
		$map['status'] =  ( $_REQUEST['status']) ;
	}
	//领卡人
	if( !empty($_REQUEST['owner'] )  ){
		$map['owner'] = htmlspecialchars( $_REQUEST['owner']);
	}
	//组合查询条件
	$where= " WHERE ";
	foreach ( $map as $k=>$v ){
		$where .= " ( {$k}='{$v}' ) AND ";
	}
	$where .= true;
	$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . $where;
	echo $sql;
	$total= $GLOBALS ['db']->getOne ( $sql );
	$page = new Page( $total, 30 );
	
	foreach($map as $key=>$val) {
		 $page->parameter .= "&$key=".urlencode($val)."&";   
	}
	
	$smarty->assign ( 'fenye', $page->show() );
	assign_query_info ();
	$smarty->display ( 'ks_card_list.htm' );
}
/*
 * 
 * 
 * 
	$type_id = ! empty ( $_REQUEST ['tid'] ) ? intval ( $_REQUEST ['tid'] ) : 0;
	$card_id = ! empty ( $_REQUEST ['id'] ) ? intval ( $_REQUEST ['id'] ) : 0;
	$pageid = ! empty ( $_REQUEST ['page'] ) ? intval ( $_REQUEST ['page'] ) : 1;
	$pagesize = 20;
	$smarty->assign ( 'ur_here', '水果卡实卡' );
	$smarty->assign ( 'action_link', array (
			'text' => '生成水果卡',
			'href' => "ks_card.php?act=edit_card&tid=$type_id" 
	) );
	if ($type_id)
		$smarty->assign ( 'import_link', array (
				'text' => '导入水果卡',
				'href' => "ks_card.php?act=import&tid=$type_id" 
		) );
	$smarty->assign ( 'full_page', 1 );
	$list = get_card_list ( $type_id, $card_id, $pagesize, $pageid );
	$pages = get_card_page ( $pagesize, $type_id );
	$smarty->assign ( 'type_list', $list );
	//所有的卡分类列表
	$smarty->assign ( 'typename', get_typename($type_id) );
	$smarty->assign ( 'pageId', $pageid );
	$smarty->assign ( 'pages', $pages );
	$smarty->assign ( 'action', 'setStatus' );
 */
// TODO::批量激活
if ($_REQUEST ['act'] == 'setStatus') {
	$data = array( 'status'=>0);
	$ids = (array)$_REQUEST['ids'];
	if( empty($ids)  ){
		$data['desc'] = '请选择要激活的卡号';
		exit( json_encode($data));
	}else {
		$where = " WHERE card_id IN (" . implode(',', $ids) .")";
		$sql = "UPDATE " . $ecs->table ( 'ks_cards' ) . " SET " . "status =1" . $where ;
		$db->query ( $sql );
		$data['status'] = 1;
		$data['desc'] = '激活成功';
		exit( json_encode($data));
	}
}
/**
 * 获得水果卡实卡页码
 */
function get_card_page($pagesize, $type_id) {
	if ($type_id == 0) {
		$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' );
	} else {
		$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_type = '$type_id'";
	}
	$total = $GLOBALS ['db']->getOne ( $sql );
	
	$total = intval ( $total );
	$pagesize = intval ( $pagesize );
	
	$pages = ceil ( $total / $pagesize ); // 计算总分页
	
	for($i = 1; $i <= $pages; $i ++) {
		if ($type_id == 0) {
			$pagestr .= "<a href=\"ks_card.php?act=list&page=" . $i . "\">第" . $i . "页</a>&nbsp;&nbsp;";
		} else {
			$pagestr .= "<a href=\"ks_card.php?act=list&tid=" . $type_id . "&page=" . $i . "\">第" . $i . "页</a>&nbsp;&nbsp;";
		}
	}
	
	return $pagestr;
}
//TODO://查询卡号分类
function get_typename( $type_id )
{
	$sql = "SELECT cat_id,cat_name FROM " . $GLOBALS ['ecs']->table ( 'ks_cardcats' );
	$result = $GLOBALS ['db']->getAll ( $sql );
	$cate =array();
	foreach ( $result as $k=>$v ){
		$cate[$k]['id'] = $v['cat_id'];
		$cate[$k]['cat_name'] = $v['cat_name'];
		$cate[$k]['selected'] = $v['cat_id'] == $type_id ? "selected='selected'" : "";
	}
	return $cate;
}



/* ------------------------------------------------------ */
// -- 生成礼品实卡
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'card_update') {
	
	/* 初始化数据 */
	$type_id = ! empty ( $_REQUEST ['tid'] ) ? intval ( $_REQUEST ['tid'] ) : 0;
	$bnum = ! empty ( $_REQUEST ['bnum'] ) ? intval ( $_REQUEST ['bnum'] ) : 0;
	$cnum = ! empty ( $_REQUEST ['cnum'] ) ? intval ( $_REQUEST ['cnum'] ) : 0;
	
	if ($type_id != 0) {
		create_card ( $type_id, $bnum, $cnum );
	}
	
	$url = "ks_card.php?act=list&tid=$type_id";
	
	ecs_header ( "Location: $url\n" );
	exit ();
}

/* ------------------------------------------------------ */
// -- 删除水果卡实卡
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'delsn') {
	check_authz_json ( 'card_and_card' );
	
	$id = intval ( $_GET ['id'] );
	$tid = intval ( $_GET ['tid'] );
	
	// $exc->drop($id);
	
	/* 删除水果卡 */
	$db->query ( "DELETE FROM " . $ecs->table ( 'ks_cards' ) . " WHERE card_id = '$id'" );
	
	$url = "ks_card.php?act=list&tid=$tid";
	
	ecs_header ( "Location: $url\n" );
	exit ();
}

/* ------------------------------------------------------ */
// -- 水果卡订单详情
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'order_info') {
	
	/* 初始化数据 */
	$order_id = ! empty ( $_REQUEST ['id'] ) ? intval ( $_REQUEST ['id'] ) : 0;
	
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '订单详情' );
	$smarty->assign ( 'action_link', array (
			'text' => '订单列表',
			'href' => "ks_card.php?act=order" 
	) );
	$smarty->assign ( 'action', 'order_info' );
	
	$smarty->assign ( 'form_act', 'order_update' );
	$smarty->assign ( 'cfg_lang', $_CFG ['lang'] );
	
	$list = $db->getRow ( "SELECT * FROM " . $ecs->table ( 'ks_order' ) . " WHERE order_id = '$order_id'" );
	
	$smarty->assign ( 'order', $list );
	
	assign_query_info ();
	$smarty->display ( 'ks_order_info.htm' );
}
/* ------------------------------------------------------ */
// -- 订单编辑页面
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'order_update') {
	
	/* 对数据的处理 */
	$id = ! empty ( $_POST ['id'] ) ? intval ( $_POST ['id'] ) : 0;
	$order_user = ! empty ( $_POST ['order_user'] ) ? trim ( $_POST ['order_user'] ) : '';
	$order_address = ! empty ( $_POST ['order_address'] ) ? trim ( $_POST ['order_address'] ) : '';
	$order_tel = ! empty ( $_POST ['order_tel'] ) ? trim ( $_POST ['order_tel'] ) : '';
	$order_phone = ! empty ( $_POST ['order_phone'] ) ? trim ( $_POST ['order_phone'] ) : '';
	$order_bak = ! empty ( $_POST ['order_bak'] ) ? trim ( $_POST ['order_bak'] ) : '';
	$shipping_time = ! empty ( $_POST ['shipping_time'] ) ? trim ( $_POST ['shipping_time'] ) : '';
	
	$sql = "UPDATE " . $ecs->table ( 'ks_order' ) . " SET " . "order_user        = '$order_user', " . "order_address        = '$order_address', " . "order_tel        = '$order_tel', " . "order_phone         = '$order_phone', " . "order_bak         = '$order_bak', " . "shipping_time         = '$shipping_time' " . "WHERE order_id    = '$id'";
	
	$db->query ( $sql );
	
	/* 清除缓存 */
	clear_cache_files ();
	
	/* 提示信息 */
	$link [] = array (
			'text' => '返回此订单',
			'href' => "ks_card.php?act=order_info&id=$id" 
	);
	sys_msg ( $_LANG ['edit'] . ' ' . $_POST ['type_name'] . ' ' . $_LANG ['attradd_succed'], 0, $link );
}

/* ------------------------------------------------------ */
// -- 订单列表
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'order') {
	$keywords = trim ( $_POST ['keywords'] );
	$order_id = ! empty ( $_REQUEST ['id'] ) ? intval ( $_REQUEST ['id'] ) : 0;
	
	$smarty->assign ( 'ur_here', '水果卡订单列表' );
	$smarty->assign ( 'action_link', array (
			'text' => '水果卡类型',
			'href' => 'ks_card.php?act=cat' 
	) );
	$smarty->assign ( 'full_page', 1 );
	
	$list = get_order_list ( $keywords, $order_id );
	
	$smarty->assign ( 'type_list', $list ['item'] );
	$smarty->assign ( 'filter', $list ['filter'] );
	$smarty->assign ( 'record_count', $list ['record_count'] );
	$smarty->assign ( 'page_count', $list ['page_count'] );
	
	$sort_flag = sort_flag ( $list ['filter'] );
	$smarty->assign ( $sort_flag ['tag'], $sort_flag ['img'] );
	
	assign_query_info ();
	$smarty->display ( 'ks_order_list.htm' );
}

/* ------------------------------------------------------ */
// -- 水果卡商品配送信息
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'goods') {
	$id = $_GET ['gid'];
	
	$smarty->assign ( 'ur_here', '水果卡配送商品' );
	$smarty->assign ( 'action_link', array (
			'text' => '水果卡订单列表',
			'href' => 'ks_card.php?act=order' 
	) );
	$smarty->assign ( 'full_page', 1 );
	
	$list = get_order_goods_list ( $id );
	
	$smarty->assign ( 'type_list', $list );
	
	assign_query_info ();
	$smarty->display ( 'ks_order_goods.htm' );
}

/* ------------------------------------------------------ */
// -- 删除水果卡类型
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'remove') {
	check_authz_json ( 'card_and_card' );
	
	$id = intval ( $_GET ['tid'] );
	
	// $exc->drop($id);
	
	/* 删除关联商品 */
	$db->query ( "DELETE FROM " . $ecs->table ( 'ks_cardgoods' ) . " WHERE cg_catid = '$id'" );
	
	/* 删除水果卡类型 */
	$db->query ( "DELETE FROM " . $ecs->table ( 'ks_cardcats' ) . " WHERE cat_id = '$id'" );
	
	/* 删除水果卡实卡 */
	$db->query ( "DELETE FROM " . $ecs->table ( 'ks_cards' ) . " WHERE card_type = '$id'" );
	
	$url = "ks_card.php?act=cat";
	
	ecs_header ( "Location: $url\n" );
	exit ();
}

/* ------------------------------------------------------ */
// -- 水果卡类型添加
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'add') {
	admin_priv ( 'card_and_card' );
	
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '添加水果卡类型' );
	$smarty->assign ( 'action_link', array (
			'href' => 'ks_card.php?act=cat',
			'text' => '水果卡类型列表' 
	) );
	$smarty->assign ( 'action', 'add' );
	
	$smarty->assign ( 'form_act', 'insert' );
	$smarty->assign ( 'cfg_lang', $_CFG ['lang'] );
	
	$next_month = local_strtotime ( '+1 months' );
	$bonus_arr ['send_start_date'] = local_date ( 'Y-m-d' );
	$bonus_arr ['use_start_date'] = local_date ( 'Y-m-d' );
	$bonus_arr ['send_end_date'] = local_date ( 'Y-m-d', $next_month );
	$bonus_arr ['use_end_date'] = local_date ( 'Y-m-d', $next_month );
	
	$smarty->assign ( 'bonus_arr', $bonus_arr );
	
	assign_query_info ();
	$smarty->display ( 'ks_card_type_info.htm' );
}

/* ------------------------------------------------------ */
// -- 红包类型添加的处理
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'insert') {
	/* 去掉红包类型名称前后的空格 */
	$type_name = ! empty ( $_POST ['type_name'] ) ? trim ( $_POST ['type_name'] ) : '';
	$type_mark = ! empty ( $_POST ['type_mark'] ) ? trim ( $_POST ['type_mark'] ) : '';
	$type_desc = ! empty ( $_POST ['type_desc'] ) ? trim ( $_POST ['type_desc'] ) : '';
	$type_num = ! empty ( $_POST ['type_num'] ) ? trim ( $_POST ['type_num'] ) : '';
	
	/* 初始化变量 */
	// $type_id = !empty($_POST['type_id']) ? intval($_POST['type_id']) : 0;
	// $min_amount = !empty($_POST['min_amount']) ? intval($_POST['min_amount']) : 0;
	
	/*
	 * 检查类型是否有重复 $sql = "SELECT COUNT(*) FROM " .$ecs->table('bonus_type'). " WHERE type_name='$type_name'"; if ($db->getOne($sql) > 0) { $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)'); sys_msg($_LANG['type_name_exist'], 0, $link); }
	 */


    /* 插入数据库。 */
    $sql = "INSERT INTO " . $ecs->table ( 'ks_cardcats' ) . " (cat_name, cat_mark, cat_desc, cat_sgn)
    VALUES ('$type_name',
            '$type_mark',
            '$type_desc',
            '$type_num')";
	
	$db->query ( $sql );
	
	/* 记录管理员操作 */
	// admin_log($_POST['type_name'], 'add', 'bonustype');
	
	/* 清除缓存 */
	clear_cache_files ();
	
	/* 提示信息 */
	$link [0] ['text'] = '添加水果卡类型';
	$link [0] ['href'] = 'ks_card.php?act=add';
	
	$link [1] ['text'] = '水果卡类型列表';
	$link [1] ['href'] = 'ks_card.php?act=cat';
	
	sys_msg ( $_LANG ['add'] . "&nbsp;" . $_POST ['type_name'] . "&nbsp;" . $_LANG ['attradd_succed'], 0, $link );
}

/* ------------------------------------------------------ */
// -- 水果卡类型编辑页面
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'edit') {
	admin_priv ( 'card_and_card' );
	
	/* 获取水果卡类型数据 */
	$type_id = ! empty ( $_GET ['tid'] ) ? intval ( $_GET ['tid'] ) : 0;
	$bonus_arr = $db->getRow ( "SELECT * FROM " . $ecs->table ( 'ks_cardcats' ) . " WHERE cat_id = '$type_id'" );
	
	// $bonus_arr['send_start_date'] = local_date('Y-m-d', $bonus_arr['send_start_date']);
	// $bonus_arr['send_end_date'] = local_date('Y-m-d', $bonus_arr['send_end_date']);
	// $bonus_arr['use_start_date'] = local_date('Y-m-d', $bonus_arr['use_start_date']);
	// $bonus_arr['use_end_date'] = local_date('Y-m-d', $bonus_arr['use_end_date']);
	
	$smarty->assign ( 'lang', $_LANG );
	$smarty->assign ( 'ur_here', '水果卡类型编辑' );
	$smarty->assign ( 'action_link', array (
			'href' => 'ks_card.php?act=cat',
			'text' => '返回水果卡类型列表' 
	) );
	$smarty->assign ( 'form_act', 'update' );
	$smarty->assign ( 'bonus_arr', $bonus_arr );
	
	assign_query_info ();
	$smarty->display ( 'ks_card_type_info.htm' );
}

/* ------------------------------------------------------ */
// -- 水果卡类型编辑的处理
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'update') {
	/*
	 * 获得日期信息 $send_startdate = local_strtotime($_POST['send_start_date']); $send_enddate = local_strtotime($_POST['send_end_date']); $use_startdate = local_strtotime($_POST['use_start_date']); $use_enddate = local_strtotime($_POST['use_end_date']);
	 */

    /* 对数据的处理 */
    $type_name = ! empty ( $_POST ['type_name'] ) ? trim ( $_POST ['type_name'] ) : '';
	$type_mark = ! empty ( $_POST ['type_mark'] ) ? trim ( $_POST ['type_mark'] ) : '';
	$type_desc = ! empty ( $_POST ['type_desc'] ) ? trim ( $_POST ['type_desc'] ) : '';
	$type_num = ! empty ( $_POST ['type_num'] ) ? intval ( $_POST ['type_num'] ) : 0;
	$type_id = ! empty ( $_POST ['type_id'] ) ? intval ( $_POST ['type_id'] ) : 0;
	// $min_amount = !empty($_POST['min_amount']) ? intval($_POST['min_amount']) : 0;
	
	$sql = "UPDATE " . $ecs->table ( 'ks_cardcats' ) . " SET " . "cat_name        = '$type_name', " . "cat_mark        = '$type_mark', " . "cat_desc        = '$type_desc', " . "cat_sgn         = '$type_num' " . "WHERE cat_id    = '$type_id'";
	
	$db->query ( $sql );
	/*
	 * 记录管理员操作 admin_log($_POST['type_name'], 'edit', 'bonustype');
	 */
   
   /* 清除缓存 */
   clear_cache_files ();
	
	/* 提示信息 */
	$link [] = array (
			'text' => '返回水果卡类型列表',
			'href' => 'ks_card.php?act=cat' 
	);
	sys_msg ( $_LANG ['edit'] . ' ' . $_POST ['type_name'] . ' ' . $_LANG ['attradd_succed'], 0, $link );
}
/* ------------------------------------------------------ */
// -- 修改订单状态
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'order_status') {
	check_authz_json ( 'card_and_card' );
	
	$id = intval ( $_GET ['id'] );
	$stat = intval ( $_GET ['stat'] );
	
	switch ($stat) {
		case 0 :
			$sqlstat = "order_status        = 1 ";
			break;
		
		case 1 :
			$sqlstat = "order_status        = 2 ";
			break;
		
		case 2 :
			$sqlstat = "order_status        = 3 ";
			break;
		
		case 3 :
			$sqlstat = "order_status        = 0 ";
			break;
		
		default :
			$sqlstat = "order_status        = 0 ";
	}
	
	$sql = "UPDATE " . $ecs->table ( 'ks_order' ) . " SET " . $sqlstat . "WHERE order_id    = '$id'";
	
	$db->query ( $sql );
	
	$url = "ks_card.php?act=order";
	
	ecs_header ( "Location: $url\n" );
	exit ();
}

/* ------------------------------------------------------ */
// -- 处理红包的发送页面
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'send_by_user') {
	$user_list = array ();
	$start = empty ( $_REQUEST ['start'] ) ? 0 : intval ( $_REQUEST ['start'] );
	$limit = empty ( $_REQUEST ['limit'] ) ? 10 : intval ( $_REQUEST ['limit'] );
	$validated_email = empty ( $_REQUEST ['validated_email'] ) ? 0 : intval ( $_REQUEST ['validated_email'] );
	$send_count = 0;
	
	if (isset ( $_REQUEST ['send_rank'] )) {
		/* 按会员等级来发放红包 */
		$rank_id = intval ( $_REQUEST ['rank_id'] );
		
		if ($rank_id > 0) {
			$sql = "SELECT min_points, max_points, special_rank FROM " . $ecs->table ( 'user_rank' ) . " WHERE rank_id = '$rank_id'";
			$row = $db->getRow ( $sql );
			if ($row ['special_rank']) {
				/* 特殊会员组处理 */
				$sql = 'SELECT COUNT(*) FROM ' . $ecs->table ( 'users' ) . " WHERE user_rank = '$rank_id'";
				$send_count = $db->getOne ( $sql );
				if ($validated_email) {
					$sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table ( 'users' ) . " WHERE user_rank = '$rank_id' AND is_validated = 1" . " LIMIT $start, $limit";
				} else {
					$sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table ( 'users' ) . " WHERE user_rank = '$rank_id'" . " LIMIT $start, $limit";
				}
			} else {
				$sql = 'SELECT COUNT(*) FROM ' . $ecs->table ( 'users' ) . " WHERE rank_points >= " . intval ( $row ['min_points'] ) . " AND rank_points < " . intval ( $row ['max_points'] );
				$send_count = $db->getOne ( $sql );
				
				if ($validated_email) {
					$sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table ( 'users' ) . " WHERE rank_points >= " . intval ( $row ['min_points'] ) . " AND rank_points < " . intval ( $row ['max_points'] ) . " AND is_validated = 1 LIMIT $start, $limit";
				} else {
					$sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table ( 'users' ) . " WHERE rank_points >= " . intval ( $row ['min_points'] ) . " AND rank_points < " . intval ( $row ['max_points'] ) . " LIMIT $start, $limit";
				}
			}
			
			$user_list = $db->getAll ( $sql );
			$count = count ( $user_list );
		}
	} elseif (isset ( $_REQUEST ['send_user'] )) {
		/* 按会员列表发放红包 */
        /* 如果是空数组，直接返回 */
        if (empty ( $_REQUEST ['user'] )) {
			sys_msg ( $_LANG ['send_user_empty'], 1 );
		}
		
		$user_array = (is_array ( $_REQUEST ['user'] )) ? $_REQUEST ['user'] : explode ( ',', $_REQUEST ['user'] );
		$send_count = count ( $user_array );
		
		$id_array = array_slice ( $user_array, $start, $limit );
		
		/* 根据会员ID取得用户名和邮件地址 */
		$sql = "SELECT user_id, email, user_name FROM " . $ecs->table ( 'users' ) . " WHERE user_id " . db_create_in ( $id_array );
		$user_list = $db->getAll ( $sql );
		$count = count ( $user_list );
	}
	
	/* 发送红包 */
	$loop = 0;
	$bonus_type = bonus_type_info ( $_REQUEST ['id'] );
	
	$tpl = get_mail_template ( 'send_bonus' );
	$today = local_date ( $_CFG ['date_format'] );
	
	foreach ( $user_list as $key => $val ) {
		/* 发送邮件通知 */
		$smarty->assign ( 'user_name', $val ['user_name'] );
		$smarty->assign ( 'shop_name', $GLOBALS ['_CFG'] ['shop_name'] );
		$smarty->assign ( 'send_date', $today );
		$smarty->assign ( 'sent_date', $today );
		$smarty->assign ( 'count', 1 );
		$smarty->assign ( 'money', price_format ( $bonus_type ['type_money'] ) );
		
		$content = $smarty->fetch ( 'str:' . $tpl ['template_content'] );
		
		if (add_to_maillist ( $val ['user_name'], $val ['email'], $tpl ['template_subject'], $content, $tpl ['is_html'] )) {
			/* 向会员红包表录入数据 */
			$sql = "INSERT INTO " . $ecs->table ( 'user_bonus' ) . "(bonus_type_id, bonus_sn, user_id, used_time, order_id, emailed) " . "VALUES ('$_REQUEST[id]', 0, '$val[user_id]', 0, 0, " . BONUS_MAIL_SUCCEED . ")";
			$db->query ( $sql );
		} else {
			/* 邮件发送失败，更新数据库 */
			$sql = "INSERT INTO " . $ecs->table ( 'user_bonus' ) . "(bonus_type_id, bonus_sn, user_id, used_time, order_id, emailed) " . "VALUES ('$_REQUEST[id]', 0, '$val[user_id]', 0, 0, " . BONUS_MAIL_FAIL . ")";
			$db->query ( $sql );
		}
		
		if ($loop >= $limit) {
			break;
		} else {
			$loop ++;
		}
	}
	
	// admin_log(addslashes($_LANG['send_bonus']), 'add', 'bonustype');
	if ($send_count > ($start + $limit)) {
		/* */
		$href = "bonus.php?act=send_by_user&start=" . ($start + $limit) . "&limit=$limit&id=$_REQUEST[id]&";
		
		if (isset ( $_REQUEST ['send_rank'] )) {
			$href .= "send_rank=1&rank_id=$rank_id";
		}
		
		if (isset ( $_REQUEST ['send_user'] )) {
			$href .= "send_user=1&user=" . implode ( ',', $user_array );
		}
		
		$link [] = array (
				'text' => $_LANG ['send_continue'],
				'href' => $href 
		);
	}
	
	$link [] = array (
			'text' => $_LANG ['back_list'],
			'href' => 'bonus.php?act=list' 
	);
	
	sys_msg ( sprintf ( $_LANG ['sendbonus_count'], $count ), 0, $link );
}

/* ------------------------------------------------------ */
// -- 发送邮件
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'send_mail') {
	/* 取得参数：红包id */
	$bonus_id = intval ( $_REQUEST ['bonus_id'] );
	if ($bonus_id <= 0) {
		die ( 'invalid params' );
	}
	
	/* 取得红包信息 */
	include_once (ROOT_PATH . 'includes/lib_order.php');
	$bonus = bonus_info ( $bonus_id );
	if (empty ( $bonus )) {
		sys_msg ( $_LANG ['bonus_not_exist'] );
	}
	
	/* 发邮件 */
	$count = send_bonus_mail ( $bonus ['bonus_type_id'], array (
			$bonus_id 
	) );
	
	$link [0] ['text'] = $_LANG ['back_bonus_list'];
	$link [0] ['href'] = 'bonus.php?act=bonus_list&bonus_type=' . $bonus ['bonus_type_id'];
	
	sys_msg ( sprintf ( $_LANG ['success_send_mail'], $count ), 0, $link );
}

/* ------------------------------------------------------ */
// -- 按印刷品发放红包
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'send_by_print') {
	@set_time_limit ( 0 );
	
	/* 红下红包的类型ID和生成的数量的处理 */
	$bonus_typeid = ! empty ( $_POST ['bonus_type_id'] ) ? $_POST ['bonus_type_id'] : 0;
	$bonus_sum = ! empty ( $_POST ['bonus_sum'] ) ? $_POST ['bonus_sum'] : 1;
	
	/* 生成红包序列号 */
	$num = $db->getOne ( "SELECT MAX(bonus_sn) FROM " . $ecs->table ( 'user_bonus' ) );
	$num = $num ? floor ( $num / 10000 ) : 100000;
	
	for($i = 0, $j = 0; $i < $bonus_sum; $i ++) {
		$bonus_sn = ($num + $i) . str_pad ( mt_rand ( 0, 9999 ), 4, '0', STR_PAD_LEFT );
		$db->query ( "INSERT INTO " . $ecs->table ( 'user_bonus' ) . " (bonus_type_id, bonus_sn) VALUES('$bonus_typeid', '$bonus_sn')" );
		
		$j ++;
	}
	
	/* 记录管理员操作 */
	admin_log ( $bonus_sn, 'add', 'userbonus' );
	
	/* 清除缓存 */
	clear_cache_files ();
	
	/* 提示信息 */
	$link [0] ['text'] = $_LANG ['back_bonus_list'];
	$link [0] ['href'] = 'bonus.php?act=bonus_list&bonus_type=' . $bonus_typeid;
	
	sys_msg ( $_LANG ['creat_bonus'] . $j . $_LANG ['creat_bonus_num'], 0, $link );
}

/* ------------------------------------------------------ */
// -- 导出线下发放的信息
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'gen_excel') {
	@set_time_limit ( 0 );
	
	/* 获得此线下红包类型的ID */
	$tid = ! empty ( $_GET ['tid'] ) ? intval ( $_GET ['tid'] ) : 0;
	$type_name = $db->getOne ( "SELECT type_name FROM " . $ecs->table ( 'bonus_type' ) . " WHERE type_id = '$tid'" );
	
	/* 文件名称 */
	$bonus_filename = $type_name . '_bonus_list';
	if (EC_CHARSET != 'gbk') {
		$bonus_filename = ecs_iconv ( 'UTF8', 'GB2312', $bonus_filename );
	}
	
	header ( "Content-type: application/vnd.ms-excel; charset=utf-8" );
	header ( "Content-Disposition: attachment; filename=$bonus_filename.xls" );
	
	/* 文件标题 */
	if (EC_CHARSET != 'gbk') {
		echo ecs_iconv ( 'UTF8', 'GB2312', $_LANG ['bonus_excel_file'] ) . "\t\n";
		/* 红包序列号, 红包金额, 类型名称(红包名称), 使用结束日期 */
		echo ecs_iconv ( 'UTF8', 'GB2312', $_LANG ['bonus_sn'] ) . "\t";
		echo ecs_iconv ( 'UTF8', 'GB2312', $_LANG ['type_money'] ) . "\t";
		echo ecs_iconv ( 'UTF8', 'GB2312', $_LANG ['type_name'] ) . "\t";
		echo ecs_iconv ( 'UTF8', 'GB2312', $_LANG ['use_enddate'] ) . "\t\n";
	} else {
		echo $_LANG ['bonus_excel_file'] . "\t\n";
		/* 红包序列号, 红包金额, 类型名称(红包名称), 使用结束日期 */
		echo $_LANG ['bonus_sn'] . "\t";
		echo $_LANG ['type_money'] . "\t";
		echo $_LANG ['type_name'] . "\t";
		echo $_LANG ['use_enddate'] . "\t\n";
	}
	
	$val = array ();
	$sql = "SELECT ub.bonus_id, ub.bonus_type_id, ub.bonus_sn, bt.type_name, bt.type_money, bt.use_end_date " . "FROM " . $ecs->table ( 'user_bonus' ) . " AS ub, " . $ecs->table ( 'bonus_type' ) . " AS bt " . "WHERE bt.type_id = ub.bonus_type_id AND ub.bonus_type_id = '$tid' ORDER BY ub.bonus_id DESC";
	$res = $db->query ( $sql );
	
	$code_table = array ();
	while ( $val = $db->fetchRow ( $res ) ) {
		echo $val ['bonus_sn'] . "\t";
		echo $val ['type_money'] . "\t";
		if (! isset ( $code_table [$val ['type_name']] )) {
			if (EC_CHARSET != 'gbk') {
				$code_table [$val ['type_name']] = ecs_iconv ( 'UTF8', 'GB2312', $val ['type_name'] );
			} else {
				$code_table [$val ['type_name']] = $val ['type_name'];
			}
		}
		echo $code_table [$val ['type_name']] . "\t";
		echo local_date ( 'Y-m-d', $val ['use_end_date'] );
		echo "\t\n";
	}
}

/* ------------------------------------------------------ */
// -- 搜索商品
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'get_goods_list') {
	include_once (ROOT_PATH . 'includes/cls_json.php');
	$json = new JSON ();
	
	$filters = $json->decode ( $_GET ['JSON'] );
	
	$arr = get_goods_list ( $filters );
	$opt = array ();
	
	foreach ( $arr as $key => $val ) {
		$opt [] = array (
				'value' => $val ['goods_id'],
				'text' => $val ['goods_name'],
				'data' => $val ['shop_price'] 
		);
	}
	
	make_json_result ( $opt );
}

/* ------------------------------------------------------ */
// -- 添加发放红包的商品
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'add_bonus_goods') {
	include_once (ROOT_PATH . 'includes/cls_json.php');
	$json = new JSON ();
	
	check_authz_json ( 'card_and_card' );
	
	$add_ids = $json->decode ( $_GET ['add_ids'] );
	$args = $json->decode ( $_GET ['JSON'] );
	$type_id = $args [0];
	
	foreach ( $add_ids as $key => $val ) {
		$sql = "UPDATE " . $ecs->table ( 'goods' ) . " SET bonus_type_id='$type_id' WHERE goods_id='$val'";
		$db->query ( $sql, 'SILENT' ) or make_json_error ( $db->error () );
	}
	
	/* 重新载入 */
	$arr = get_bonus_goods ( $type_id );
	$opt = array ();
	
	foreach ( $arr as $key => $val ) {
		$opt [] = array (
				'value' => $val ['goods_id'],
				'text' => $val ['goods_name'],
				'data' => '' 
		);
	}
	
	make_json_result ( $opt );
}

/* ------------------------------------------------------ */
// -- 删除发放红包的商品
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'drop_bonus_goods') {
	include_once (ROOT_PATH . 'includes/cls_json.php');
	$json = new JSON ();
	
	check_authz_json ( 'card_and_card' );
	
	$drop_goods = $json->decode ( $_GET ['drop_ids'] );
	$drop_goods_ids = db_create_in ( $drop_goods );
	$arguments = $json->decode ( $_GET ['JSON'] );
	$type_id = $arguments [0];
	
	$db->query ( "UPDATE " . $ecs->table ( 'goods' ) . " SET bonus_type_id = 0 " . "WHERE bonus_type_id = '$type_id' AND goods_id " . $drop_goods_ids );
	
	/* 重新载入 */
	$arr = get_bonus_goods ( $type_id );
	$opt = array ();
	
	foreach ( $arr as $key => $val ) {
		$opt [] = array (
				'value' => $val ['goods_id'],
				'text' => $val ['goods_name'],
				'data' => '' 
		);
	}
	
	make_json_result ( $opt );
}

/* ------------------------------------------------------ */
// -- 搜索用户
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'search_users') {
	$keywords = json_str_iconv ( trim ( $_GET ['keywords'] ) );
	
	$sql = "SELECT user_id, user_name FROM " . $ecs->table ( 'users' ) . " WHERE user_name LIKE '%" . mysql_like_quote ( $keywords ) . "%' OR user_id LIKE '%" . mysql_like_quote ( $keywords ) . "%'";
	$row = $db->getAll ( $sql );
	
	make_json_result ( $row );
}

/* ------------------------------------------------------ */
// -- 红包列表
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'bonus_list') {
	$smarty->assign ( 'full_page', 1 );
	$smarty->assign ( 'ur_here', $_LANG ['bonus_list'] );
	$smarty->assign ( 'action_link', array (
			'href' => 'bonus.php?act=list',
			'text' => $_LANG ['04_bonustype_list'] 
	) );
	
	$list = get_bonus_list ();
	
	/* 赋值是否显示红包序列号 */
	$bonus_type = bonus_type_info ( intval ( $_REQUEST ['bonus_type'] ) );
	if ($bonus_type ['send_type'] == SEND_BY_PRINT) {
		$smarty->assign ( 'show_bonus_sn', 1 );
	}	

	/* 赋值是否显示发邮件操作和是否发过邮件 */
	elseif ($bonus_type ['send_type'] == SEND_BY_USER) {
		$smarty->assign ( 'show_mail', 1 );
	}
	
	$smarty->assign ( 'bonus_list', $list ['item'] );
	$smarty->assign ( 'filter', $list ['filter'] );
	$smarty->assign ( 'record_count', $list ['record_count'] );
	$smarty->assign ( 'page_count', $list ['page_count'] );
	
	$sort_flag = sort_flag ( $list ['filter'] );
	$smarty->assign ( $sort_flag ['tag'], $sort_flag ['img'] );
	
	assign_query_info ();
	$smarty->display ( 'bonus_list.htm' );
}

/* ------------------------------------------------------ */
// -- 红包列表翻页、排序
/* ------------------------------------------------------ */

if ($_REQUEST ['act'] == 'query_bonus') {
	$list = get_bonus_list ();
	
	/* 赋值是否显示红包序列号 */
	$bonus_type = bonus_type_info ( intval ( $_REQUEST ['bonus_type'] ) );
	if ($bonus_type ['send_type'] == SEND_BY_PRINT) {
		$smarty->assign ( 'show_bonus_sn', 1 );
	}	

	/* 赋值是否显示发邮件操作和是否发过邮件 */
	elseif ($bonus_type ['send_type'] == SEND_BY_USER) {
		$smarty->assign ( 'show_mail', 1 );
	}
	
	$smarty->assign ( 'bonus_list', $list ['item'] );
	$smarty->assign ( 'filter', $list ['filter'] );
	$smarty->assign ( 'record_count', $list ['record_count'] );
	$smarty->assign ( 'page_count', $list ['page_count'] );
	
	$sort_flag = sort_flag ( $list ['filter'] );
	$smarty->assign ( $sort_flag ['tag'], $sort_flag ['img'] );
	
	make_json_result ( $smarty->fetch ( 'bonus_list.htm' ), '', array (
			'filter' => $list ['filter'],
			'page_count' => $list ['page_count'] 
	) );
}

/* ------------------------------------------------------ */
// -- 删除红包
/* ------------------------------------------------------ */
elseif ($_REQUEST ['act'] == 'remove_bonus') {
	check_authz_json ( 'card_and_card' );
	
	$id = intval ( $_GET ['id'] );
	
	$db->query ( "DELETE FROM " . $ecs->table ( 'user_bonus' ) . " WHERE bonus_id='$id'" );
	
	$url = 'bonus.php?act=query_bonus&' . str_replace ( 'act=remove_bonus', '', $_SERVER ['QUERY_STRING'] );
	
	ecs_header ( "Location: $url\n" );
	exit ();
}

/* ------------------------------------------------------ */
// -- 批量操作
/* ------------------------------------------------------ */
if ($_REQUEST ['act'] == 'batch') {
	/* 检查权限 */
	admin_priv ( 'card_and_card' );
	
	/* 去掉参数：红包类型 */
	$bonus_type_id = intval ( $_REQUEST ['bonus_type'] );
	
	/* 取得选中的红包id */
	if (isset ( $_POST ['checkboxes'] )) {
		$bonus_id_list = $_POST ['checkboxes'];
		
		/* 删除红包 */
		if (isset ( $_POST ['drop'] )) {
			$sql = "DELETE FROM " . $ecs->table ( 'user_bonus' ) . " WHERE bonus_id " . db_create_in ( $bonus_id_list );
			$db->query ( $sql );
			
			admin_log ( count ( $bonus_id_list ), 'remove', 'userbonus' );
			
			clear_cache_files ();
			
			$link [] = array (
					'text' => $_LANG ['back_bonus_list'],
					'href' => 'bonus.php?act=bonus_list&bonus_type=' . $bonus_type_id 
			);
			sys_msg ( sprintf ( $_LANG ['batch_drop_success'], count ( $bonus_id_list ) ), 0, $link );
		}		

		/* 发邮件 */
		elseif (isset ( $_POST ['mail'] )) {
			$count = send_bonus_mail ( $bonus_type_id, $bonus_id_list );
			$link [] = array (
					'text' => $_LANG ['back_bonus_list'],
					'href' => 'bonus.php?act=bonus_list&bonus_type=' . $bonus_type_id 
			);
			sys_msg ( sprintf ( $_LANG ['success_send_mail'], $count ), 0, $link );
		}
	} else {
		sys_msg ( $_LANG ['no_select_bonus'], 1 );
	}
}

/**
 * 获取水果卡类型列表
 * 
 * @access public
 * @return void
 */
function get_order_goods_list($id) {
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'goods' ) . " WHERE goods_id in ($id)";
	
	$result = $GLOBALS ['db']->getAll ( $sql );
	$goods = array ();
	
	foreach ( $result as $idx => $row ) {
		
		$goods [$idx] ['goods_id'] = $row ['goods_id'];
		$goods [$idx] ['goods_sn'] = $row ['goods_sn'];
		$goods [$idx] ['goods_name'] = $row ['goods_name'];
	}
	
	return $goods;
}

/**
 * 获得水果卡实卡列表
 *
 * @access public
 * @param
 *        	s integer $isdelete
 * @param
 *        	s integer $real_goods
 * @return array
 */
function get_card_list($type_id, $card_id, $pagesize, $pageid) {
	$startrow = ($pageid - 1) * $pagesize;
	
	if ($type_id != 0) {
		$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_type = '$type_id' ORDER BY card_id desc LIMIT $startrow,$pagesize";
	} else {
		$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " ORDER BY card_id desc LIMIT $startrow,$pagesize";
	}
	if ($card_id != 0) {
		$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_id = '$card_id' ";
	}
	
	$result = $GLOBALS ['db']->getAll ( $sql );
	$cards = array ();
	
	foreach ( $result as $idx => $row ) {
		
		$cards [$idx] ['id'] = $row ['card_id'];
		$cards [$idx] ['type_id'] = $row ['card_type'];
		$cards [$idx] ['type_name'] = get_type_name ( $row ['card_type'] );
		$cards [$idx] ['card_sn'] = $row ['card_sn'];
		$cards [$idx] ['card_pwd'] = $row ['card_pwd'];
		$cards [$idx] ['add_time'] = local_date ( $GLOBALS ['_CFG'] ['time_format'], $row ['add_time'] );
		if ($row ['used_time'] == 0) {
			$cards [$idx] ['used_time'] = $row ['used_time'];
		} else {
			$cards [$idx] ['used_time'] = local_date ( $GLOBALS ['_CFG'] ['time_format'], $row ['used_time'] );
		}
		$cards [$idx] ['order_id'] = $row ['order_id'];
		//新增字段
		$cards [$idx] ['send_time'] = local_date ( $GLOBALS ['_CFG'] ['time_format'], $row ['send_time'] );
		$cards [$idx] ['pass_time'] = local_date ( $GLOBALS ['_CFG'] ['time_format'], $row ['pass_time'] );
		$cards [$idx] ['owner'] = $row ['owner'];
		$cards [$idx] ['used_name'] = $row ['used_name'];
		$cards [$idx] ['status_text'] = $row ['status'] ? '<font color=red>已激活</font>' : '<font color=green>未激活</font>';
	}
	
	return $cards;
}

/* 获取水果卡类型名称 */
function get_type_name($card_type) 

{
	$sql = "SELECT cat_name FROM " . $GLOBALS ['ecs']->table ( 'ks_cardcats' ) . " WHERE cat_id = '$card_type'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}
/* 生成水果卡 */
function create_card($type_id, $bnum, $cnum) 

{
	if ($type_id != 0) {
		
		$add_time = gmtime ();
		$sn_head = get_sn_head ( $type_id );
		$used_time = 0;
		$order_id = 0;
		$cnum = $cnum + $bnum;
		
		for($i = $bnum; $i < $cnum; $i ++) {
			$card_sn = $sn_head . str_pad ( $i, 6, '0', STR_PAD_LEFT );
			$card_pwd = rancard ( 10, '0123456789' );
			
			$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_sn = '$card_sn'" . " OR card_pwd = '$card_pwd'";
			
			$record_arr = $GLOBALS ['db']->getRow ( $sql );
			if (empty ( $record_arr )) 

			{
				$GLOBALS ['db']->query ( "INSERT INTO " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " (card_type, card_sn, card_pwd, add_time, used_time, order_id) VALUES('$type_id', '$card_sn','$card_pwd','$add_time','$used_time','$order_id')" );
			} else {
				break;
			}
		}
	}
}

/* 获取水果卡类型标识 */
function get_sn_head($card_type) 

{
	$sql = "SELECT cat_mark FROM " . $GLOBALS ['ecs']->table ( 'ks_cardcats' ) . " WHERE cat_id = '$card_type'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}

/* 水果卡序号生成器 */
function rancard($length, $string = '0123456789abcdefghijklmnopqrstuvwxyz') {
	$rstr = '';
	$strlen = strlen ( $string );
	for($i = 0; $i < $length; $i ++) {
		$rstr .= $string {mt_rand ( 0, $strlen - 1 )};
	}
	return $rstr;
}

/**
 * 获取水果卡类型列表
 * 
 * @access public
 * @return void
 */
function get_type_list() {
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_cardcats' );
	
	$result = $GLOBALS ['db']->getAll ( $sql );
	$cardtype = array ();
	
	foreach ( $result as $idx => $row ) {
		
		$cardtype [$idx] ['cat_id'] = $row ['cat_id'];
		$cardtype [$idx] ['cat_name'] = $row ['cat_name'];
		$cardtype [$idx] ['cat_mark'] = $row ['cat_mark'];
		$cardtype [$idx] ['cat_desc'] = $row ['cat_desc'];
		$cardtype [$idx] ['cat_sgn'] = $row ['cat_sgn'];
		
		$cardtype [$idx] ['all_num'] = get_all_num ( $row ['cat_id'] );
		$cardtype [$idx] ['ok_num'] = get_ok_num ( $row ['cat_id'] );
	}
	
	return $cardtype;
}

/* 获取水果卡发放数量 */
function get_all_num($card_type) 

{
	$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_type = '$card_type'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}

/* 获取水果卡使用数量 */
function get_ok_num($card_type) 

{
	$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_type = '$card_type' and order_id <> 0";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}

/**
 * 获取水果卡订单列表
 * 
 * @access public
 * @return void
 */
function get_order_list($keywords, $order_id) {
	$result = get_filter ();
	if ($result === false) {
		/* 查询条件 */
		$filter ['sort_by'] = empty ( $_REQUEST ['sort_by'] ) ? 'order_id' : trim ( $_REQUEST ['sort_by'] );
		$filter ['sort_order'] = empty ( $_REQUEST ['sort_order'] ) ? 'DESC' : trim ( $_REQUEST ['sort_order'] );
		
		$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'ks_order' );
		$filter ['record_count'] = $GLOBALS ['db']->getOne ( $sql );
		
		/* 分页大小 */
		$filter = page_and_size ( $filter );
		
		if (empty ( $keywords )) {
			$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_order' ) . " ORDER BY $filter[sort_by] $filter[sort_order]";
		} else {
			$card_id = get_card_id ( $keywords );
			$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_order' ) . " WHERE card_id = '$card_id' ";
		}
		if (! empty ( $order_id )) {
			$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'ks_order' ) . " WHERE order_id = '$order_id' ";
		}
		set_filter ( $filter, $sql );
	} else {
		$sql = $result ['sql'];
		$filter = $result ['filter'];
	}
	$arr = array ();
	$res = $GLOBALS ['db']->selectLimit ( $sql, $filter ['page_size'], $filter ['start'] );
	
	while ( $row = $GLOBALS ['db']->fetchRow ( $res ) ) {
		
		$row ['order_goodcatname'] = get_type_name ( $row ['order_goodcatid'] );
		$row ['order_time'] = local_date ( $GLOBALS ['_CFG'] ['time_format'], $row ['order_time'] );
		$arr [] = $row;
	}
	
	$arr = array (
			'item' => $arr,
			'filter' => $filter,
			'page_count' => $filter ['page_count'],
			'record_count' => $filter ['record_count'] 
	);
	
	return $arr;
}

/* 获取水果卡id */
function get_card_id($keywords) 

{
	$sql = "SELECT card_id FROM " . $GLOBALS ['ecs']->table ( 'ks_cards' ) . " WHERE card_sn = '$keywords'";
	$result = $GLOBALS ['db']->getOne ( $sql );
	
	return $result;
}

/**
 * 查询红包类型的商品列表
 *
 * @access public
 * @param integer $type_id        	
 * @return array
 */
function get_bonus_goods($type_id) {
	$sql = "SELECT goods_id, goods_name FROM " . $GLOBALS ['ecs']->table ( 'goods' ) . " WHERE bonus_type_id = '$type_id'";
	$row = $GLOBALS ['db']->getAll ( $sql );
	
	return $row;
}

/**
 * 获取用户红包列表
 * 
 * @access public
 * @param
 *        	$page_param
 * @return void
 */
function get_bonus_list() {
	/* 查询条件 */
	$filter ['sort_by'] = empty ( $_REQUEST ['sort_by'] ) ? 'bonus_type_id' : trim ( $_REQUEST ['sort_by'] );
	$filter ['sort_order'] = empty ( $_REQUEST ['sort_order'] ) ? 'DESC' : trim ( $_REQUEST ['sort_order'] );
	$filter ['bonus_type'] = empty ( $_REQUEST ['bonus_type'] ) ? 0 : intval ( $_REQUEST ['bonus_type'] );
	
	$where = empty ( $filter ['bonus_type'] ) ? '' : " WHERE bonus_type_id='$filter[bonus_type]'";
	
	$sql = "SELECT COUNT(*) FROM " . $GLOBALS ['ecs']->table ( 'user_bonus' ) . $where;
	$filter ['record_count'] = $GLOBALS ['db']->getOne ( $sql );
	
	/* 分页大小 */
	$filter = page_and_size ( $filter );
	
	$sql = "SELECT ub.*, u.user_name, u.email, o.order_sn, bt.type_name " . " FROM " . $GLOBALS ['ecs']->table ( 'user_bonus' ) . " AS ub " . " LEFT JOIN " . $GLOBALS ['ecs']->table ( 'bonus_type' ) . " AS bt ON bt.type_id=ub.bonus_type_id " . " LEFT JOIN " . $GLOBALS ['ecs']->table ( 'users' ) . " AS u ON u.user_id=ub.user_id " . " LEFT JOIN " . $GLOBALS ['ecs']->table ( 'order_info' ) . " AS o ON o.order_id=ub.order_id $where " . " ORDER BY " . $filter ['sort_by'] . " " . $filter ['sort_order'] . " LIMIT " . $filter ['start'] . ", $filter[page_size]";
	$row = $GLOBALS ['db']->getAll ( $sql );
	
	foreach ( $row as $key => $val ) {
		$row [$key] ['used_time'] = $val ['used_time'] == 0 ? $GLOBALS ['_LANG'] ['no_use'] : local_date ( $GLOBALS ['_CFG'] ['date_format'], $val ['used_time'] );
		$row [$key] ['emailed'] = $GLOBALS ['_LANG'] ['mail_status'] [$row [$key] ['emailed']];
	}
	
	$arr = array (
			'item' => $row,
			'filter' => $filter,
			'page_count' => $filter ['page_count'],
			'record_count' => $filter ['record_count'] 
	);
	
	return $arr;
}

/**
 * 取得红包类型信息
 * 
 * @param int $bonus_type_id
 *        	红包类型id
 * @return array
 */
function bonus_type_info($bonus_type_id) {
	$sql = "SELECT * FROM " . $GLOBALS ['ecs']->table ( 'bonus_type' ) . " WHERE type_id = '$bonus_type_id'";
	
	return $GLOBALS ['db']->getRow ( $sql );
}

/**
 * 发送红包邮件
 * 
 * @param int $bonus_type_id
 *        	红包类型id
 * @param array $bonus_id_list
 *        	红包id数组
 * @return int 成功发送数量
 */
function send_bonus_mail($bonus_type_id, $bonus_id_list) {
	/* 取得红包类型信息 */
	$bonus_type = bonus_type_info ( $bonus_type_id );
	if ($bonus_type ['send_type'] != SEND_BY_USER) {
		return 0;
	}
	
	/* 取得属于该类型的红包信息 */
	$sql = "SELECT b.bonus_id, u.user_name, u.email " . "FROM " . $GLOBALS ['ecs']->table ( 'user_bonus' ) . " AS b, " . $GLOBALS ['ecs']->table ( 'users' ) . " AS u " . " WHERE b.user_id = u.user_id " . " AND b.bonus_id " . db_create_in ( $bonus_id_list ) . " AND b.order_id = 0 " . " AND u.email <> ''";
	$bonus_list = $GLOBALS ['db']->getAll ( $sql );
	if (empty ( $bonus_list )) {
		return 0;
	}
	
	/* 初始化成功发送数量 */
	$send_count = 0;
	
	/* 发送邮件 */
	$tpl = get_mail_template ( 'send_bonus' );
	$today = local_date ( $GLOBALS ['_CFG'] ['date_format'] );
	foreach ( $bonus_list as $bonus ) {
		$GLOBALS ['smarty']->assign ( 'user_name', $bonus ['user_name'] );
		$GLOBALS ['smarty']->assign ( 'shop_name', $GLOBALS ['_CFG'] ['shop_name'] );
		$GLOBALS ['smarty']->assign ( 'send_date', $today );
		$GLOBALS ['smarty']->assign ( 'sent_date', $today );
		$GLOBALS ['smarty']->assign ( 'count', 1 );
		$GLOBALS ['smarty']->assign ( 'money', price_format ( $bonus_type ['type_money'] ) );
		
		$content = $GLOBALS ['smarty']->fetch ( 'str:' . $tpl ['template_content'] );
		if (add_to_maillist ( $bonus ['user_name'], $bonus ['email'], $tpl ['template_subject'], $content, $tpl ['is_html'], false )) {
			$sql = "UPDATE " . $GLOBALS ['ecs']->table ( 'user_bonus' ) . " SET emailed = '" . BONUS_MAIL_SUCCEED . "'" . " WHERE bonus_id = '$bonus[bonus_id]'";
			$GLOBALS ['db']->query ( $sql );
			$send_count ++;
		} else {
			$sql = "UPDATE " . $GLOBALS ['ecs']->table ( 'user_bonus' ) . " SET emailed = '" . BONUS_MAIL_FAIL . "'" . " WHERE bonus_id = '$bonus[bonus_id]'";
			$GLOBALS ['db']->query ( $sql );
		}
	}
	
	return $send_count;
}
function add_to_maillist($username, $email, $subject, $content, $is_html) {
	$time = time ();
	$content = addslashes ( $content );
	$template_id = $GLOBALS ['db']->getOne ( "SELECT template_id FROM " . $GLOBALS ['ecs']->table ( 'mail_templates' ) . " WHERE template_code = 'send_bonus'" );
	$sql = "INSERT INTO " . $GLOBALS ['ecs']->table ( 'email_sendlist' ) . " ( email, template_id, email_content, pri, last_send) VALUES ('$email', $template_id, '$content', 1, '$time')";
	$GLOBALS ['db']->query ( $sql );
	return true;
}

?>