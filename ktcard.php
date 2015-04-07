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
$not_login_arr = array('act_login','update_ktcard','next_ktcard');

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
                $back_act = 'ktcard.php?' . $_SERVER['QUERY_STRING'];
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

/* 登陆储值卡界面 */
if ($action == 'default')
{
	
    assign_template();
    $smarty->assign('page_title', '用户储值卡管理');    
    $smarty->assign('ur_here',    '储值卡'); 
    $smarty->assign('helps',      get_shop_help());    
    $smarty->assign('act',    'act_login');    
    $smarty->assign('action',      $action);   
    $smarty->assign('back_act',      $back_act);        
    
    $smarty->display('ktcard.dwt');
    
}

/* 处理储值卡登陆界面 */ 
if ($action == 'act_login') {

	$card_sn    = isset($_REQUEST['card_sn'])? trim($_REQUEST['card_sn']): '0';
 
	$card_pwd   = isset($_REQUEST['card_pwd'])? trim($_REQUEST['card_pwd']): '0';

        if ($card_sn != '0')

        {

               $sql = "SELECT * FROM " .$ecs->table('kt_bcards').
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

             	  assign_template();
                $smarty->assign('page_title', '用户储值卡管理');    
                $smarty->assign('ur_here',    '储值卡'); 
                $smarty->assign('helps',      get_shop_help());    
                $smarty->assign('act',    'next_ktcard');    
                $smarty->assign('action',      $action);   
                $smarty->assign('back_act',     $back_act);  
                $smarty->assign('card_sn',      $card_sn);
                $smarty->assign('card_pwd',     $card_pwd); 
                $smarty->assign('card_bonus',    $record_arr['card_bonus']);  
                $smarty->assign('goods_list',    get_order_goods_list());    
                $smarty->display('ktcard.dwt');
                
             }
        }

}

/* 登陆储值卡界面 */
if ($action == 'next_ktcard')
{
	  $arr       = array();
	  $arr       = $_POST['goods'];
	  $goods     = !empty($arr) ? join(",",$arr) : '0';
	
    $card_sn    = isset($_REQUEST['card_sn'])? trim($_REQUEST['card_sn']): '0';
	  $card_pwd   = isset($_REQUEST['card_pwd'])? trim($_REQUEST['card_pwd']): '0';
	
  	$sql = "SELECT * FROM " .$ecs->table('kt_bcards').
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'"; 

    $record_arr = $db->getRow($sql);
    $card_bonus = $record_arr['card_bonus'];
    
    $sql = "SELECT SUM(shop_price) FROM " .$GLOBALS['ecs']->table('goods').
               " WHERE goods_id in ($goods)";
    $fee = $GLOBALS['db']->getOne($sql);
             
             if ($fee > $card_bonus)
             {
             	show_message('订单超出储值卡余额,请重新选择商品');
             	return 0;
//              	$order_msg = $fee - $card_bonus;
//              	$order_msg = "订单超出储值卡余额 $order_msg 元,收货时还需补交 $order_msg 元.";
             }
            else
             {
            	$order_msg = $card_bonus - $fee;
             	$order_msg = "订单总额: $fee 元,提交当前订单之后储值卡余额为: $order_msg 元.";
             }
             if (empty($record_arr))

             {
                 show_message('卡号或密码错误'); 
                 return 0;
             }
            if (empty($arr))
             {
                 show_message('请选择商品'); 
                 return 0;
             }

    assign_template();
    $smarty->assign('page_title', '用户储值卡管理');    
    $smarty->assign('ur_here',    '储值卡'); 
    $smarty->assign('helps',      get_shop_help());    
    $smarty->assign('act',    'update_ktcard');    
    $smarty->assign('action',      $action);   
    $smarty->assign('back_act',      $back_act);  
    $smarty->assign('card_sn',      $card_sn);
    $smarty->assign('card_pwd',     $card_pwd);  
    $smarty->assign('goods_id',     $goods); 
    $smarty->assign('card_bonus',    $record_arr['card_bonus']); 
    $smarty->assign('fee',    $fee); 
    $smarty->assign('order_msg',    $order_msg); 
    
    $smarty->display('ktcard.dwt');
    
}
    
/* 提交客户订单 */

if ($action == 'update_ktcard')
{
	$order_user    = isset($_REQUEST['order_user'])? trim($_REQUEST['order_user']): '0';
	$order_address    = isset($_REQUEST['order_address'])? trim($_REQUEST['order_address']): '0';
	$order_tel    = isset($_REQUEST['order_tel'])? trim($_REQUEST['order_tel']): '0';
	$order_phone    = isset($_REQUEST['order_phone'])? trim($_REQUEST['order_phone']): '0';
	$order_bak    = isset($_REQUEST['order_bak'])? trim($_REQUEST['order_bak']): '0';
	$shipping_time    = isset($_REQUEST['shipping_time'])? trim($_REQUEST['shipping_time']): '0';
	$order_clr     = !empty($_REQUEST['order_clr'])    ? intval($_REQUEST['order_clr'])    : 0;
	
	
  $card_sn    = isset($_REQUEST['card_sn'])? trim($_REQUEST['card_sn']): '0';
	$card_pwd   = isset($_REQUEST['card_pwd'])? trim($_REQUEST['card_pwd']): '0';
	
	$goods   = isset($_REQUEST['goods'])? trim($_REQUEST['goods']): '0';
	
	$order_sn = get_order_sn();  
  $order_time = gmtime();
  
  $sql = "SELECT * FROM " .$ecs->table('kt_bcards').
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'"; 

    $record_arr = $db->getRow($sql);
    $card_bonus = $record_arr['card_bonus'];
  
  $sql = "SELECT SUM(shop_price) FROM " .$GLOBALS['ecs']->table('goods').
               " WHERE goods_id in ($goods)";
  $fee = $GLOBALS['db']->getOne($sql);


            if (empty($order_user) OR (empty($order_tel) AND empty($order_phone) OR empty($order_address) ))
             {
                 show_message('联系人为必填项,地址为必选项,电话、手机事情任选其一.'); 
                 return 0;
             }
             
              if ($card_sn != '0')
            {

               $sql = "SELECT * FROM " .$ecs->table('kt_bcards').
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
             	 $card_id = intval($record_arr['card_id']);
             	 
                     if ($fee > $card_bonus)
                     {
                     	$order_exc = $fee - $card_bonus;
                     	 $sql = "UPDATE " .$ecs->table('kt_bcards'). " SET ".
                      "card_bonus         = 0 ".
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'";
                      $db->query($sql);
                      $order_clr = 0;
                     }
                     else
                      {
                     	$order_exc = 0;
                     	$card_bonus_last = $card_bonus - $fee;
                      $sql = "UPDATE " .$ecs->table('kt_bcards'). " SET ".
                      "card_bonus         = '$card_bonus_last' ".
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'";
                      $db->query($sql);
                                             if($order_clr <> 0)
                                            {
                       	                        $order_clr = $card_bonus_last;
                       	                        $sql = "UPDATE " .$ecs->table('kt_bcards'). " SET ".
                      "card_bonus         = 0 ".
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'";
                      $db->query($sql);
                       	                        
                                            }
                       }

             	 
             	 $GLOBALS['db']->query("INSERT INTO ".$GLOBALS['ecs']->table('kt_order')." (card_id, order_sn, order_fee, order_exc, order_clr, order_user, order_address, order_tel, order_phone, order_bak, shipping_time, order_time, order_goods, order_status) VALUES($card_id,'$order_sn','$fee','$order_exc','$order_clr','$order_user','$order_address','$order_tel','$order_phone','$order_bak','$shipping_time','$order_time','$goods',0)");
             
                $sql = "UPDATE " .$ecs->table('kt_bcards'). " SET ".
                      "used_time         = '$order_time' ".
                      " WHERE card_sn = '$card_sn'" .
                      " AND card_pwd = '$card_pwd'";

                $db->query($sql);
               $action = 'default';
             	 show_message('已经成功提交订单!', '返回商城首页', 'index.php','default');
             }
           }
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
 * 获取储值卡商品列表
 * @access  public
 * @return void
 */
function get_order_goods_list()
{

   
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('goods') . " WHERE is_on_sale = 1 ORDER BY goods_id desc" ;
                            
    $result = $GLOBALS['db']->getAll($sql);
    $goods = array();
    
    foreach ($result AS $idx => $row)
    {
    	  $goods[$idx]['goods_id']           = $row['goods_id'];
        $goods[$idx]['goods_name']         = $row['goods_name'];
        $goods[$idx]['shop_price']         = $row['shop_price'];
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


?>