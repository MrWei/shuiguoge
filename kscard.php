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

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

$action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';

// 不需要登录的操作或自己验证是否登录（如ajax处理）的act
$not_login_arr = array('act_login','update_kscard');

/* 显示页面的action列表 */
$ui_arr = array('default');

/* 未登录处理 */
if (empty($_SESSION['user_id']))
{
    if (!in_array($action, $not_login_arr))
    {
        if (in_array($action, $ui_arr))
        {
            if (!empty($_SERVER['QUERY_STRING']))
            {
                $back_act = 'kscard.php?' . $_SERVER['QUERY_STRING'];
            }
            $action = 'default';
        }
        else
        {
            //未登录提交数据。非正常途径提交数据！
            die('已经记录此非法操作IP');
        }
    }
}

/* 登陆礼品卡界面 */
if ($action == 'default')
{
	
    assign_template();
    $smarty->assign('page_title', '用户礼品卡管理');    
    $smarty->assign('ur_here',    '礼品卡'); 
    $smarty->assign('helps',      get_shop_help());    
    $smarty->assign('act',    'act_login');    
    $smarty->assign('action',      $action);   
    $smarty->assign('back_act',      $back_act);        
    
    $smarty->display('kscard.dwt');
    
}

/* 处理礼品卡登陆界面 */ 
if ($action == 'act_login') {

	$card_sn    = isset($_REQUEST['card_sn'])? trim($_REQUEST['card_sn']): '0';
 
	$card_pwd   = isset($_REQUEST['card_pwd'])? trim($_REQUEST['card_pwd']): '0';

        if ($card_sn != '0')

        {

               $sql = "SELECT * FROM " .$ecs->table('ks_cards').
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'"; 

               $record_arr = $db->getRow($sql);

             if (empty($record_arr))

             {
                 show_message('卡号或密码错误'); 
                 return 0;
             }
             else 
             { 
             	  if($record_arr['order_id'] == 0)
             	  {
             	  assign_template();
                $smarty->assign('page_title', '用户礼品卡管理');    
                $smarty->assign('ur_here',    '礼品卡'); 
                $smarty->assign('helps',      get_shop_help());    
                $smarty->assign('act',    'update_kscard');    
                $smarty->assign('action',      $action);   
                $smarty->assign('back_act',     $back_act);  
                $smarty->assign('card_sn',      $card_sn);
                $smarty->assign('card_id',      $record_arr['card_id']);
                $smarty->assign('card_pwd',     $card_pwd); 
                $smarty->assign('card_type',    $record_arr['card_type']);  
                $smarty->assign('goods_list',    get_order_goods_list($record_arr['card_type'])); 
                $smarty->assign('sel_num',    get_goods_num($record_arr['card_type']));     
                $smarty->display('kscard.dwt');
                }
                else
                {
                 assign_template();
                $smarty->assign('page_title', '用户礼品卡管理');    
                $smarty->assign('ur_here',    '礼品卡'); 
                $smarty->assign('helps',      get_shop_help());    
                $smarty->assign('act',        'order_info');    
                $smarty->assign('action',     'order_info');   
                
                $order_id = $record_arr['order_id'];
                $list = $db->getRow("SELECT * FROM " .$ecs->table('ks_order'). " WHERE order_id = '$order_id'");
                $order_time = local_date("Y-h-d H:i:s", $list[order_time]);
                $smarty->assign('order_time',    $order_time);
                $smarty->assign('order',    $list);  
                $smarty->display('kscard.dwt');
                }
                
             }
        }

}
    
/* 提交客户订单 */

if ($action == 'update_kscard')
{
	$order_user    = isset($_REQUEST['order_user'])? trim($_REQUEST['order_user']): '0';
	$order_address    = isset($_REQUEST['order_address'])? trim($_REQUEST['order_address']): '0';
	$order_tel    = isset($_REQUEST['order_tel'])? trim($_REQUEST['order_tel']): '0';
	$order_phone    = isset($_REQUEST['order_phone'])? trim($_REQUEST['order_phone']): '0';
	$order_bak    = isset($_REQUEST['order_bak'])? trim($_REQUEST['order_bak']): '0';
	$shipping_time    = isset($_REQUEST['shipping_time'])? trim($_REQUEST['shipping_time']): '0';
	
	$arr       = array();
	$arr       = $_POST['goods'];
  $goods_num = count($arr);
	$goods     = !empty($arr) ? join(",",$arr) : '0';
	
  $card_sn    = isset($_REQUEST['card_sn'])? trim($_REQUEST['card_sn']): '0';
	$card_pwd   = isset($_REQUEST['card_pwd'])? trim($_REQUEST['card_pwd']): '0';
	$card_type   = !empty($_REQUEST['card_type'])? intval($_REQUEST['card_type']): 0;
	
	$sel_num   = !empty($_REQUEST['sel_num'])? intval($_REQUEST['sel_num']): 0;
	
	$card_id   = !empty($_REQUEST['card_id'])? intval($_REQUEST['card_id']): 0;

            if (empty($order_user) OR (empty($order_tel) AND empty($order_phone)))
             {
                 show_message('联系人为必填项,电话任选其一.'); 
                 return 0;
             }
             if (empty($arr))
             {
                 show_message('请选择商品'); 
                 return 0;
             }
             if ($sel_num <> $goods_num)
             {
                 show_message("商品限定只选择($sel_num)种,请重新选择."); 
                 return 0;
             }
             
              if ($card_sn != '0')

            {

               $sql = "SELECT * FROM " .$ecs->table('ks_cards').
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'"; 

               $record_arr = $db->getRow($sql);

             if (empty($record_arr))

             {
                 show_message('卡号或密码错误'); 
                 return 0;
             }
             else 
             { 
             	 $order_sn = get_order_sn();  
             	 $order_time = gmtime();
             	  
             	 $GLOBALS['db']->query("INSERT INTO ".$GLOBALS['ecs']->table('ks_order')." (order_sn, card_id, order_goodcatid, order_user, order_address, order_tel, order_phone, order_bak, shipping_time, order_time, order_goods, order_status) VALUES('$order_sn','$card_id','$card_type','$order_user','$order_address','$order_tel','$order_phone','$order_bak','$shipping_time','$order_time','$goods',0)");
             	 
             	 $sql = 'SELECT order_id FROM ' . $GLOBALS['ecs']->table('ks_order') . " WHERE order_time = '$order_time'";
               $order_id = $GLOBALS['db']->getOne($sql);
               
                $sql = "UPDATE " .$ecs->table('ks_cards'). " SET ".
                      "order_id         = '$order_id' ,".
                      "used_time         = '$order_time' ".
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'";

           $db->query($sql);
               $action = 'default';
             	 show_message('已经成功提交订单!', '返回礼品卡管理', 'kscard.php','default');
             }
           }
  echo 'asdfasdffffffffffffffffffffffffffffffffffffffff';
}

/**
 * 得到新订单号
 * @return  string
 */
function get_order_sn()
{
    /* 选择一个随机的方案 */
    mt_srand((double) microtime() * 1000000);

    return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}

/**
 * 获取礼品卡商品列表
 * @access  public
 * @return void
 */
function get_order_goods_list($id)
{

   
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('ks_cardgoods') . " WHERE cg_catid = $id" ;
                            
    $result = $GLOBALS['db']->getAll($sql);
    $goods = array();
    
    foreach ($result AS $idx => $row)
    {
    	
    	  $goods[$idx]['cg_id']           = $row['cg_id'];
        $goods[$idx]['cg_catid']         = $row['cg_catid'];
        $goods[$idx]['cg_goodid']         = $row['cg_goodid'];
        $goods[$idx]['cg_goodname']        = get_goods_name($row['cg_goodid']);
        $goods[$idx]['cg_goodbak']        = get_goods_bak($row['cg_goodid']);

    }

return $goods; 
}

/* 获取配送商品名称 */

function get_goods_name($id)

{
	$sql = "SELECT goods_name FROM " .$GLOBALS['ecs']->table('goods').
               " WHERE goods_id = '$id'";
  $result = $GLOBALS['db']->getOne($sql);
  
  return $result;
               
}

/* 获取配送商品备注 */

function get_goods_bak($id)

{
	$sql = "SELECT seller_note FROM " .$GLOBALS['ecs']->table('goods').
               " WHERE goods_id = '$id'";
  $result = $GLOBALS['db']->getOne($sql);
  
  return $result;
               
}

/* 获取可选商品数量 */

function get_goods_num($id)

{
	$sql = "SELECT cat_sgn FROM " .$GLOBALS['ecs']->table('ks_cardcats').
               " WHERE cat_id = '$id'";
  $result = $GLOBALS['db']->getOne($sql);
  
  return $result;
               
}
?>