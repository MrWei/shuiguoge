<?php

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

$payment_lang = ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/payment/abcbank.php';
if (file_exists($payment_lang)){
    global $_LANG;
    include_once($payment_lang);
}
/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE){
    $i = isset($modules) ? count($modules) : 0;
    /* 代码 */
    $modules[$i]['code']   = basename(__FILE__, '.php');
    /* 描述对应的语言项 */
    $modules[$i]['desc']  = 'abcbank_desc';
    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';
    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';
    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';
    /* 作者 */
    $modules[$i]['author']  = 'Weiyong';
    /* 版本号 */
    $modules[$i]['version'] = 'ABCBank for ecshop 1.0';
    /* 配置信息 */
    $modules[$i]['config'] = array(
    	//订单地址		
	 	array('name' => 'OrderURL',     'type' => 'text', 'value' => 'http://'.$_SERVER['HTTP_HOST'].'/MerchantPayment/MerchantQueryOrder.php'),
    );
    return;
}
/**
 * 类
 */
class abcbank
{
    function abcbank()
    {
    	
    }
    function __construct()
    {
        $this->abcbank();
    }
    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {   
    	$http = 'http://'.$_SERVER['HTTP_HOST'];
	    $tOrderNo    = $order['order_sn'];                         //*订单编号
		$tOrderDesc = '';                           /*订单说明*/
		$tOrderDate = date("Y/m/d", $order['add_time']);           //*订单日期
		$tOrderTime = date("h:i:s", $order['add_time']);           //*订单时间
		$orderTimeoutDate = date("h:i:s", $order['add_time']+3600); //订单支付有效期 
		$tOrderAmountStr =$order['order_amount'];                  //*订单金额*/
		$tOrderURL = $http."/Payment/ABCBank/code/MerchantQueryOrder.php?OrderNo={$tOrderNo}&QueryType=1";                   //*订单查询网址*/
		$tresultnotifyurl = $http."/Payment/ABCBank/code/MerchantResult.php ";                                               //*支付结果地址*/
		
		//订单表单
		$html = '';
		$html .= '<form action="'.$http.'/Payment/ABCBank/code/MerchantPayment.php" method="post" >';
		$html .= '<input type="hidden" name="PayTypeID" value="ImmediatePay">交易类型 *必输';
		$html .= '<input type="hidden" name="OrderDate" value="'.$tOrderDate.'">订单日期';
		$html .= '<input type="hidden" name="OrderTime" value="'.$tOrderTime.'">订单时间';
		$html .= '<input type="hidden" name="orderTimeoutDate" value="'.$orderTimeoutDate.'">订单支付有效期 精确到秒，选输';
		$html .= '<input type="hidden" name="OrderNo" value="'.$tOrderNo.'">交易编号 *必输';
		$html .= '<input type="hidden" name="CurrencyCode" value="156"> 交易币种 156:人民币,*必输';
		$html .= '<input type="hidden" name="PaymentRequestAmount" value="'.$tOrderAmountStr.'">交易金额 *必输';
		$html .= '<input type="hidden" name="Fee" value="0">手续费金额';
		$html .= '<input type="hidden" name="OrderDesc" value="'.$tOrderNo.'">订单说明';
		$html .= '<input type="hidden" name="OrderURL" value="">订单地址';
		$html .= '<input type="hidden" name="ReceiverAddress" value="">收货地址';
		$html .= '<input type="hidden" name="InstallmentMark" value="0">分期标识1：分期；0：否。*必输';
		$html .= '<input type="hidden" name="CommodityType" value="0202">商品种类 *必输';
		$html .= '<input type="hidden" name="BuyIP" value="">客户交易IP';
		$html .= '<input type="hidden" name="ExpiredDate" value="30">订单保存时间';
		$html .= '<input type="hidden" name="PaymentType" value="A">支付账户类型1：农行卡支付 2：国际卡支付 3：农行贷记卡支付 5:基于第三方的跨行支付A:支付方式合并 6：银联跨行支付 *必输';
		$html .= '<input type="hidden" name="PaymentLinkType" value="1">交易渠道 *必输';
		$html .= '<input type="hidden" name="trUnionPayLinkType" value="0"> *必输';
		$html .= '<input type="hidden" name="NotifyType" value="0">  *必输';
		$html .= '<input type="hidden" name="ResultNotifyURL" value="'.$tresultnotifyurl.'">通知URL地址  *必输';
		$html .= '<input type="hidden" name="IsBreakAccount" value="0">交易是否分账  *必输';
		$html .= "<input type=submit value='" .$GLOBALS['_LANG']['pay_button']. "'></form>";
		return $html;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        
    }
}
   ?>


  
  