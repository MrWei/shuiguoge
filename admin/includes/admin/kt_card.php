<?php

/**
 * ECSHOP 储值卡类型的处理
 * ============================================================================
 * 版权所有 2005-2008 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: sunxiaodong $
 * $Id: bonus.php 15589 2009-02-10 09:24:05Z sunxiaodong $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

/* act操作项的初始化 */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'cat';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/* 初始化$exc对象 */
$exc = new exchange($ecs->table('kt_bcards'), $db, 'card_id', 'card_sn');

/*------------------------------------------------------ */
//-- 翻页、排序
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'query')
{
    $list = get_order_list();

    $smarty->assign('type_list',    $list['item']);
    $smarty->assign('filter',       $list['filter']);
    $smarty->assign('record_count', $list['record_count']);
    $smarty->assign('page_count',   $list['page_count']);

    $sort_flag  = sort_flag($list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('ks_order_list.htm'), '',
        array('filter' => $list['filter'], 'page_count' => $list['page_count']));
}

/*------------------------------------------------------ */
//-- 修改储值卡价格
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_fee')
{
     /* 初始化数据 */
    $card_id     = !empty($_REQUEST['id'])    ? intval($_REQUEST['id'])    : 0;
    
    $smarty->assign('lang',         $_LANG);
    $smarty->assign('ur_here',     '修改储值卡价格');
    $smarty->assign('action_link', array('text' => '储值卡列表', 'href' => "kt_card.php?act=list"));
    $smarty->assign('action',       'edit_fee');
    $smarty->assign('form_act',     'update_fee');
    $smarty->assign('cfg_lang',     $_CFG['lang']);

    $list = $db->getRow("SELECT * FROM " .$ecs->table('kt_bcards'). " WHERE card_id = '$card_id'");

    $smarty->assign('card',    $list);

    assign_query_info();
    $smarty->display('kt_card_fee.htm');
}


/*------------------------------------------------------ */
//-- 修改储值卡价格
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'update_fee')
{
     /* 初始化数据 */
    $card_id     = !empty($_REQUEST['id'])    ? intval($_REQUEST['id'])    : 0;
    $card_type   = !empty($_REQUEST['card_type'])    ? intval($_REQUEST['card_type'])    : 0;
    
    $sql = "UPDATE " .$ecs->table('kt_bcards'). " SET ".
           "card_type        = '$card_type', ".
           "card_bonus        = '$card_type' ".
           "WHERE card_id    = '$card_id'";

   $db->query($sql);
    
    /* 记录管理员操作 */
    $log_info = "初始化储值卡余额" . $card_type . "元,储值卡id为:".$card_id ;

    $sql = 'INSERT INTO ' . $ecs->table('admin_log') . ' (log_time, user_id, log_info, ip_address) ' .
            " VALUES ('" . gmtime() . "', $_SESSION[admin_id], '" . stripslashes($log_info) . "', '" . real_ip() . "')";
    $db->query($sql);
    
    $url = "kt_card.php?act=list";

    ecs_header("Location: $url\n");
    exit;
 
}

/*------------------------------------------------------ */
//-- 导出线下发放的信息
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'excel')
{
    @set_time_limit(0);


    /* 文件名称 */
    $bonus_filename = "储值卡" .'_bonus_list';
    if (EC_CHARSET != 'gbk')
    {
        $bonus_filename = ecs_iconv('UTF8', 'GB2312',$bonus_filename);
    }

    header("Content-type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=$bonus_filename.xls");

    /* 文件标题 */
    if (EC_CHARSET != 'gbk')
    {
        echo ecs_iconv('UTF8', 'GB2312', '储值卡序号') ."\t";
        echo ecs_iconv('UTF8', 'GB2312', '储值卡密码') ."\t\n";
    }
    else
    {
        echo "储值卡序号" ."\t";
        echo "储值卡密码" ."\t\n";
    }

    $val = array();
    $sql = "SELECT card_sn, card_pwd ".
           "FROM ".$ecs->table('kt_bcards').
           "ORDER BY card_id";
    $res = $db->query($sql);

    $code_table = array();
    while ($val = $db->fetchRow($res))
    {
        echo $val['card_sn'] . "\t";
        echo $val['card_pwd'] . "\t";
        echo "\t\n";
    }
}

/*------------------------------------------------------ */
//-- 订单列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'order')
{
	  $id = intval($_GET['id']);
	  $keywords      = trim($_POST['keywords']);
    $smarty->assign('ur_here',     '储值卡订单列表');
    $smarty->assign('action_link', array('text' => '礼品卡类型', 'href' => 'kt_card.php?act=order'));
    $smarty->assign('full_page',   1);

    $list = get_order_list($id,$keywords);

    $smarty->assign('type_list',    $list['item']);
    $smarty->assign('filter',       $list['filter']);
    $smarty->assign('record_count', $list['record_count']);
    $smarty->assign('page_count',   $list['page_count']);

    $sort_flag  = sort_flag($list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
    $smarty->display('kt_order_list.htm');
}

/*------------------------------------------------------ */
//-- 修改订单状态
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'order_status')
{
    check_authz_json('card_and_card');

    $id = intval($_GET['id']);
    $stat = intval($_GET['stat']);
    
    switch ($stat)
    {
    	case 0:
    	$sqlstat = "order_status        = 1 ";
    	break;
    	
    	case 1:
    	$sqlstat = "order_status        = 2 ";
    	break;
    	
    	case 2:
    	$sqlstat = "order_status        = 3 ";
    	break;
    	
    	case 3:
    	$sqlstat = "order_status        = 0 ";
    	break;
    	
    	default:
    	$sqlstat = "order_status        = 0 ";
    }
  
   $sql = "UPDATE " .$ecs->table('kt_order'). " SET ".
           $sqlstat .
           "WHERE order_id    = '$id'";

   $db->query($sql);

    $url = "kt_card.php?act=order";

    ecs_header("Location: $url\n");
    exit;

}

/*------------------------------------------------------ */
//-- 礼品卡订单详情
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'order_info')
{
	
	  /* 初始化数据 */
    $order_id     = !empty($_REQUEST['id'])    ? intval($_REQUEST['id'])    : 0;
    
    $smarty->assign('lang',         $_LANG);
    $smarty->assign('ur_here',     '订单详情');
    $smarty->assign('action_link', array('text' => '订单列表', 'href' => "kt_card.php?act=order"));
    $smarty->assign('action',       'order_info');

    $smarty->assign('form_act',     'order_update');
    $smarty->assign('cfg_lang',     $_CFG['lang']);

    $list = $db->getRow("SELECT * FROM " .$ecs->table('kt_order'). " WHERE order_id = '$order_id'");

    $smarty->assign('order',    $list);

    assign_query_info();
    $smarty->display('kt_order_info.htm');

}

/*------------------------------------------------------ */
//-- 订单编辑页面
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'order_update')
{

    /* 对数据的处理 */
    $id        = !empty($_POST['id'])    ? intval($_POST['id'])    : 0;
    $order_fee       = !empty($_POST['order_fee'])    ? floatval($_POST['order_fee'])    : 0.00;
    $order_exc      = !empty($_POST['order_exc'])    ? floatval($_POST['order_exc'])    : 0.00;
    $order_clr   = !empty($_POST['order_clr'])    ? intval($_POST['order_clr'])    : 0;
    $order_user      = !empty($_POST['order_user'])  ? trim($_POST['order_user'])    : '';
    $order_address   = !empty($_POST['order_address'])  ? trim($_POST['order_address'])    : '';
    $order_tel      = !empty($_POST['order_tel'])  ? trim($_POST['order_tel'])    : '';
    $order_phone      = !empty($_POST['order_phone'])  ? trim($_POST['order_phone'])    : '';
    $order_bak      = !empty($_POST['order_bak'])  ? trim($_POST['order_bak'])    : '';
    $shipping_time      = !empty($_POST['shipping_time'])  ? trim($_POST['shipping_time'])    : '';


    $sql = "UPDATE " .$ecs->table('kt_order'). " SET ".
           "order_fee        = '$order_fee', ".
           "order_exc        = '$order_exc', ".
           "order_clr        = '$order_clr', ".
           "order_user        = '$order_user', ".
           "order_address        = '$order_address', ".
           "order_tel        = '$order_tel', ".
           "order_phone         = '$order_phone', ".
           "order_bak         = '$order_bak', ".
           "shipping_time         = '$shipping_time' ".
           "WHERE order_id    = '$id'";

   $db->query($sql);

   
   /* 清除缓存 */
   clear_cache_files();

   /* 提示信息 */
   $link[] = array('text' => '返回此订单' , 'href' => "kt_card.php?act=order_info&id=$id");
   sys_msg($_LANG['edit'] .' '.$_POST['type_name'].' '. $_LANG['attradd_succed'], 0, $link);
   
  }
  
/*------------------------------------------------------ */
//-- 储值卡商品配送信息
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'goods')
{
	  $id = $_GET['gid'];
	  
    $smarty->assign('ur_here',     '储值卡配送商品');
    $smarty->assign('action_link', array('text' => '储值卡订单列表', 'href' => 'kt_card.php?act=order'));
    $smarty->assign('full_page',   1);

    $list = get_order_goods_list($id);

    $smarty->assign('type_list',    $list);

    assign_query_info();
    $smarty->display('kt_order_goods.htm');
}

/*------------------------------------------------------ */
//-- 储值实卡列表
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list')
{
	  $id   = intval($_GET['id']);
	  $pageid = !empty($_REQUEST['page'])    ? intval($_REQUEST['page'])    : 1;
	  $pagesize = 50;
    
    $smarty->assign('ur_here',     '储值卡实卡');
    $smarty->assign('action_link', array('text' => '生成储值卡', 'href' => "kt_card.php?act=edit_card"));
    $smarty->assign('full_page',   1);

    $list = get_card_list($id,$pagesize,$pageid);
    $pages = get_card_page($pagesize);

    $smarty->assign('type_list',    $list);
    $smarty->assign('pages',    $pages);

    assign_query_info();
    $smarty->display('kt_card_list.htm');
}

/**
 * 获得礼品卡实卡页码
 */
function get_card_page($pagesize)
{

    $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('kt_bcards');              
    $total = $GLOBALS['db']->getOne($sql);
    
    $total = intval($total);
    $pagesize = intval($pagesize);
    
    $pages = ceil($total/$pagesize); //计算总分页
    
    for ($i = 1; $i <= $pages; $i++)
    {
      $pagestr.="<a href=\"kt_card.php?act=list&page=".$i."\">第".$i."页</a>&nbsp;&nbsp;";
    }

return $pagestr; 

}

/**
 * 获得礼品卡实卡列表
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goods
 * @return  array
 */
function get_card_list($id,$pagesize,$pageid)
{
	$startrow = ($pageid-1)*$pagesize;
  
	if(empty($id))
	{
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_bcards') . " ORDER BY card_id desc LIMIT $startrow,$pagesize";
   }
   else
   {
   	$sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_bcards') . "WHERE card_id = '$id' ORDER BY card_id desc" ;
  }
                            
    $result = $GLOBALS['db']->getAll($sql);
    $cards = array();
    
    foreach ($result AS $idx => $row)
    {
    	
    	  $cards[$idx]['card_id']           = $row['card_id'];
        $cards[$idx]['card_sn']         = $row['card_sn'];
        $cards[$idx]['card_pwd']         = $row['card_pwd'];
        $cards[$idx]['add_time']        = local_date($GLOBALS['_CFG']['time_format'],$row['add_time']);
        $cards[$idx]['used_time']        = local_date($GLOBALS['_CFG']['time_format'],$row['used_time']);
        $cards[$idx]['card_type']        = $row['card_type'];
        $cards[$idx]['card_bonus']        = $row['card_bonus'];
        
        if($row['used_time'] == 0)
        {
        $cards[$idx]['used_time']        = $row['used_time'];
        }
        else
        {
        $cards[$idx]['used_time']        = local_date($GLOBALS['_CFG']['time_format'],$row['used_time']);
        }
        
        $cards[$idx]['order_id']        = $row['order_id'];

    }

return $cards; 

}

/**
 * 获得礼品卡实卡列表
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goods
 * @return  array
 */
if ($_REQUEST['act'] == 'edit_card')
{
	
    
    $smarty->assign('lang',         $_LANG);
    $smarty->assign('ur_here',     '储值卡列表');
    $smarty->assign('action_link', array('text' => '储值卡列表', 'href' => "kt_card.php?act=list"));
    $smarty->assign('action',       'edit_card');

    $smarty->assign('form_act',     'card_update');
    $smarty->assign('cfg_lang',     $_CFG['lang']);

    assign_query_info();
    $smarty->display('kt_edit_card.htm');

}

/*------------------------------------------------------ */
//-- 生成储值实卡
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'card_update')
{
	
	  /* 初始化数据 */
	  $sn_head      = !empty($_POST['sn_head'])  ? trim($_POST['sn_head'])    : '';
    $bnum     = !empty($_REQUEST['bnum'])    ? intval($_REQUEST['bnum'])    : 0;
    $cnum     = !empty($_REQUEST['cnum'])    ? intval($_REQUEST['cnum'])    : 0;
    $card_type     = !empty($_REQUEST['card_type'])    ? intval($_REQUEST['card_type'])    : 0;
    
    if($cnum != 0)
    {
    create_card($sn_head,$bnum,$cnum,$card_type);
    }
  
    $url = "kt_card.php?act=list";

    ecs_header("Location: $url\n");
    exit;
}

/*------------------------------------------------------ */
//-- 删除礼品卡实卡
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'delsn')
{
    check_authz_json('card_and_card');

    $id = intval($_GET['id']);

//   $exc->drop($id);


    /* 删除礼品卡 */
    $db->query("DELETE FROM " .$ecs->table('kt_bcards'). " WHERE card_id = '$id'");

    $url = "kt_card.php?act=list";

    ecs_header("Location: $url\n");
    exit;

}

/* 生成储值卡 */

function create_card($sn_head,$bnum,$cnum,$card_type)

{
	if($cnum != 0)
  {
    $add_time = gmtime();
    $used_time = 0;
    $cnum = $cnum + $bnum;
  
    for ($i = $bnum; $i < $cnum; $i++)
    {
        $card_sn = $sn_head . str_pad($i, 6, '0', STR_PAD_LEFT);
        $card_pwd = rancard(10,'0123456789');
        
        $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_bcards').
                      " WHERE card_sn = '$card_sn'" .
                      " OR card_pwd = '$card_pwd'"; 

        $record_arr = $GLOBALS['db']->getRow($sql);

             if (empty($record_arr))

             {
                $GLOBALS['db']->query("INSERT INTO ".$GLOBALS['ecs']->table('kt_bcards')." (card_sn, card_pwd, add_time, used_time, card_type, card_bonus) VALUES('$card_sn','$card_pwd','$add_time','$used_time','$card_type','$card_type')");
             }
             else
             {
             	break;
             }

    }
  }

}


/* 礼品卡序号生成器 */

function rancard($length,$string = '0123456789abcdefghijklmnopqrstuvwxyz') {
$rstr = '';
$strlen = strlen($string);
for ($i=0; $i<$length; $i++) {
   $rstr .= $string{mt_rand(0,$strlen-1)}; 
}
return $rstr;
}

/**
 * 获取礼品卡类型列表
 * @access  public
 * @return void
 */
function get_order_goods_list($id)
{

   
        $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('goods') . " WHERE goods_id in ($id)" ;
                            
    $result = $GLOBALS['db']->getAll($sql);
    $goods = array();
    
    foreach ($result AS $idx => $row)
    {
    	
    	  $goods[$idx]['goods_id']           = $row['goods_id'];
        $goods[$idx]['goods_sn']           = $row['goods_sn'];
        $goods[$idx]['goods_name']         = $row['goods_name'];

    }

return $goods; 
}

/* 获取储值卡配送商品名称 */

function get_goods_name($id)

{
	$sql = "SELECT goods_name FROM " .$GLOBALS['ecs']->table('goods').
               " WHERE goods_id = '$id'";
  $result = $GLOBALS['db']->getOne($sql);
  
  return $result;
               
}

/**
 * 获取礼品卡订单列表
 * @access  public
 * @return void
 */
function get_order_list($id,$keywords)
{
   
    $result = get_filter();
    if ($result === false)
    {
        /* 查询条件 */
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'order_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('kt_order');
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);
        if(empty($id))
        {
        $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_order'). " ORDER BY $filter[sort_by] $filter[sort_order]";
        }
        else
        {
        $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_order'). " WHERE card_id = '$id'" . " ORDER BY $filter[sort_by] $filter[sort_order]";
        }
         if(empty($keywords))
        {
        $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_order'). " ORDER BY $filter[sort_by] $filter[sort_order]";
        }
        else
        {
        $card_id = get_card_id($keywords);
        $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('kt_order'). " WHERE card_id = '$card_id' ";
        }  
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $arr = array();
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $row['order_time'] = local_date($GLOBALS['_CFG']['time_format'],$row['order_time']);
        $arr[] = $row;
    }

    $arr = array('item' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

    return $arr;
}

/* 获取礼品卡id */

function get_card_id($keywords)

{
	$sql = "SELECT card_id FROM " .$GLOBALS['ecs']->table('kt_bcards').
               " WHERE card_sn = '$keywords'";
  $result = $GLOBALS['db']->getOne($sql);
  
  return $result;
               
}

/* 获取礼品卡类型名称 */

function get_type_name($card_type)

{
	$sql = "SELECT cat_name FROM " .$GLOBALS['ecs']->table('ks_cardcats').
               " WHERE cat_id = '$card_type'";
  $result = $GLOBALS['db']->getOne($sql);
  
  return $result;
               
}

?>