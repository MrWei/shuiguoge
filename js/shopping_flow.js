/* $Id : shopping_flow.js 4865 2007-01-31 14:04:10Z paulgao $ */

var selectedShipping = null;
var selectedPayment  = null;
var selectedPack     = null;
var selectedCard     = null;
var selectedSurplus  = '';
var selectedBonus    = 0;
var selectedIntegral = 0;
var selectedOOS      = null;
var alertedSurplus   = false;

var groupBuyShipping = null;
var groupBuyPayment  = null;

/* *
 * 改变配送方式
 */
function selectShipping(obj)
{

	/* start by jianhualiucheng */
  var theForm = obj.form;
  var con_country = theForm.elements['country'].value;
  var con_province = theForm.elements['province'].value;
  var con_city = theForm.elements['city'].value;
  var con_district = theForm.elements['district'].value;
  if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请先选择配送区域（省市县），并且要选择完全哦！');
	  obj.checked= false;
	  return ;
  }
  else
	{
	document.getElementById('shippingBox_msg').innerHTML='';
  }
  /* end by jianhualiucheng */

  if (selectedShipping == obj)
  {
    return;
  }
  else
  {
    selectedShipping = obj;
  }

  var supportCod = obj.attributes['supportCod'].value + 0;
  var theForm = obj.form;

  for (i = 0; i < theForm.elements.length; i ++ )
  {
    if (theForm.elements[i].name == 'payment' && theForm.elements[i].attributes['isCod'].value == '1')
    {
      if (supportCod == 0)
      {
        theForm.elements[i].checked = false;
        theForm.elements[i].disabled = true;
      }
      else
      {
        theForm.elements[i].disabled = false;
      }
    }
  }

  


  if (obj.attributes['insure'].value + 0 == 0)
  {
    document.getElementById('ECS_NEEDINSURE').checked = false;
    document.getElementById('ECS_NEEDINSURE').disabled = true;
  }
  else
  {
    document.getElementById('ECS_NEEDINSURE').checked = false;
    document.getElementById('ECS_NEEDINSURE').disabled = false;
  }

  var now = new Date();
  Ajax.call('flows.php?step=select_shipping', 'shipping=' + obj.value+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, orderShippingSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/**
 *
 */
function orderShippingSelectedResponse(result)
{
  if (result.need_insure)
  {
    try
    {
      document.getElementById('ECS_NEEDINSURE').checked = true;
    }
    catch (ex)
    {
      alert(ex.message);
    }
  }

  try
  {
    if (document.getElementById('ECS_CODFEE') != undefined)
    {
      document.getElementById('ECS_CODFEE').innerHTML = result.cod_fee;
    }
  }
  catch (ex)
  {
    alert(ex.message);
  }

  orderSelectedResponse(result);
}

/* *
 * 改变支付方式
 */
function selectPayment(obj)
{

 /* start by jianhualiucheng */
	var theForm = obj.form;
	var con_country = theForm.elements['country'].value;
	var con_province = theForm.elements['province'].value;
	var con_city = theForm.elements['city'].value;
	var con_district = theForm.elements['district'].value;
	 if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请先选择配送区域（省市县），并且要选择完全哦！');
	  obj.checked= false;
	  return ;
  }
  /* end by jianhualiucheng */

  if (selectedPayment == obj)
  {
    return;
  }
  else
  {
    selectedPayment = obj;
  }  

  Ajax.call('flows.php?step=select_payment', 'payment=' + obj.value+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}
/* *
 * 团购购物流程 --> 改变配送方式
 */
function handleGroupBuyShipping(obj)
{
  if (groupBuyShipping == obj)
  {
    return;
  }
  else
  {
    groupBuyShipping = obj;
  }

  var supportCod = obj.attributes['supportCod'].value + 0;
  var theForm = obj.form;

  for (i = 0; i < theForm.elements.length; i ++ )
  {
    if (theForm.elements[i].name == 'payment' && theForm.elements[i].attributes['isCod'].value == '1')
    {
      if (supportCod == 0)
      {
        theForm.elements[i].checked = false;
        theForm.elements[i].disabled = true;
      }
      else
      {
        theForm.elements[i].disabled = false;
      }
    }
  }

  if (obj.attributes['insure'].value + 0 == 0)
  {
    document.getElementById('ECS_NEEDINSURE').checked = false;
    document.getElementById('ECS_NEEDINSURE').disabled = true;
  }
  else
  {
    document.getElementById('ECS_NEEDINSURE').checked = false;
    document.getElementById('ECS_NEEDINSURE').disabled = false;
  }

  Ajax.call('group_buy.php?act=select_shipping', 'shipping=' + obj.value, orderSelectedResponse, 'GET');
}

/* *
 * 团购购物流程 --> 改变支付方式
 */
function handleGroupBuyPayment(obj)
{
  if (groupBuyPayment == obj)
  {
    return;
  }
  else
  {
    groupBuyPayment = obj;
  }

  Ajax.call('group_buy.php?act=select_payment', 'payment=' + obj.value, orderSelectedResponse, 'GET');
}

/* *
 * 改变商品包装
 */
function selectPack(obj)
{

/* start by jianhualiucheng */
  var theForm = obj.form;
  var con_country = theForm.elements['country'].value;
  var con_province = theForm.elements['province'].value;
  var con_city = theForm.elements['city'].value;
  var con_district = theForm.elements['district'].value;
  if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请先选择配送区域（省市县），并且要选择完全哦！');
	  obj.checked= false;
	  return ;
  }
  /* end by jianhualiucheng */

  if (selectedPack == obj)
  {
    return;
  }
  else
  {
    selectedPack = obj;
  }

  Ajax.call('flows.php?step=select_pack', 'pack=' + obj.value+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/* *
 * 改变祝福贺卡
 */
function selectCard(obj)
{
  if (selectedCard == obj)
  {
    return;
  }
  else
  {
    selectedCard = obj;
  }

  Ajax.call('flows.php?step=select_card', 'card=' + obj.value, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/* *
 * 选定了配送保价
 */
function selectInsure(needInsure)
{
  needInsure = needInsure ? 1 : 0;

  Ajax.call('flows.php?step=select_insure', 'insure=' + needInsure, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/* *
 * 团购购物流程 --> 选定了配送保价
 */
function handleGroupBuyInsure(needInsure)
{
  needInsure = needInsure ? 1 : 0;

  Ajax.call('group_buy.php?act=select_insure', 'insure=' + needInsure, orderSelectedResponse, 'GET', 'JSON');
}

/* *
 * 回调函数
 */
function orderSelectedResponse(result)
{
  if (result.error)
  {
    alert(result.error);
    location.href = './';
  }

  try
  {
    var layer = document.getElementById("ECS_ORDERTOTAL");

    layer.innerHTML = (typeof result == "object") ? result.content : result;

    if (result.payment != undefined)
    {
      var surplusObj = document.forms['theForm'].elements['surplus'];
      if (surplusObj != undefined)
      {
        surplusObj.disabled = result.pay_code == 'balance';
      }
    }
  }
  catch (ex) { }
}

/* *
 * 改变余额
 */
function changeSurplus(val)
{
  if (selectedSurplus == val)
  {
    return;
  }
  else
  {
    selectedSurplus = val;
  }

  Ajax.call('flow.php?step=change_surplus', 'surplus=' + val, changeSurplusResponse, 'GET', 'JSON');
}

/* *
 * 改变余额回调函数
 */
function changeSurplusResponse(obj)
{
  if (obj.error)
  {
    try
    {
      document.getElementById("ECS_SURPLUS_NOTICE").innerHTML = obj.error;
      document.getElementById('ECS_SURPLUS').value = '0';
      document.getElementById('ECS_SURPLUS').focus();
    }
    catch (ex) { }
  }
  else
  {
    try
    {
      document.getElementById("ECS_SURPLUS_NOTICE").innerHTML = '';
    }
    catch (ex) { }
    orderSelectedResponse(obj.content);
  }
}

/* *
 * 改变积分
 */
function changeIntegral(val)
{
  if (selectedIntegral == val)
  {
    return;
  }
  else
  {
    selectedIntegral = val;
  }

  Ajax.call('flow.php?step=change_integral', 'points=' + val, changeIntegralResponse, 'GET', 'JSON');
}

/* *
 * 改变积分回调函数
 */
function changeIntegralResponse(obj)
{
  if (obj.error)
  {
    try
    {
      document.getElementById('ECS_INTEGRAL_NOTICE').innerHTML = obj.error;
      document.getElementById('ECS_INTEGRAL').value = '0';
      document.getElementById('ECS_INTEGRAL').focus();
    }
    catch (ex) { }
  }
  else
  {
    try
    {
      document.getElementById('ECS_INTEGRAL_NOTICE').innerHTML = '';
    }
    catch (ex) { }
    orderSelectedResponse(obj.content);
  }
}

/* *
 * 改变红包
 */
function changeBonus(val)
{
  if (selectedBonus == val)
  {
    return;
  }
  else
  {
    selectedBonus = val;
  }

  Ajax.call('flow.php?step=change_bonus', 'bonus=' + val, changeBonusResponse, 'GET', 'JSON');
}

/* *
 * 改变红包的回调函数
 */
function changeBonusResponse(obj)
{
  if (obj.error)
  {
    alert(obj.error);

    try
    {
      document.getElementById('ECS_BONUS').value = '0';
    }
    catch (ex) { }
  }
  else
  {
    orderSelectedResponse(obj.content);
  }
}

/**
 * 验证红包序列号
 * @param string bonusSn 红包序列号
 */
function validateBonus(bonusSn)
{
/* start by jianhualiucheng */
  var theForm = document.getElementById("theForm");
  var con_country = theForm.elements['country'].value;
  var con_province = theForm.elements['province'].value;
  var con_city = theForm.elements['city'].value;
  var con_district = theForm.elements['district'].value;
  if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请先选择配送区域（省市县），并且要选择完全哦！');
	  obj.checked= false;
	  return ;
  }
  /* end by jianhualiucheng */
  Ajax.call('flows.php?step=validate_bonus', 'bonus_sn=' + bonusSn+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, validateBonusResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

function validateBonusResponse(obj)
{

if (obj.error)
  {
    alert(obj.error);
    orderSelectedResponse(obj.content);
    try
    {
      document.getElementById('ECS_BONUSN').value = '0';
    }
    catch (ex) { }
  }
  else
  {
    orderSelectedResponse(obj.content);
  }
}

/* *
 * 改变发票的方式
 */
function changeNeedInv()
{
  var obj        = document.getElementById('ECS_NEEDINV');
  var objType    = document.getElementById('ECS_INVTYPE');
  var objPayee   = document.getElementById('ECS_INVPAYEE');
  var objContent = document.getElementById('ECS_INVCONTENT');
  var needInv    = obj.checked ? 1 : 0;
  var invType    = obj.checked ? (objType != undefined ? objType.value : '') : '';
  var invPayee   = obj.checked ? objPayee.value : '';
  var invContent = obj.checked ? objContent.value : '';
  objType.disabled = objPayee.disabled = objContent.disabled = ! obj.checked;
  if(objType != null)
  {
    objType.disabled = ! obj.checked;
  }

  Ajax.call('flow.php?step=change_needinv', 'need_inv=' + needInv + '&inv_type=' + encodeURIComponent(invType) + '&inv_payee=' + encodeURIComponent(invPayee) + '&inv_content=' + encodeURIComponent(invContent), orderSelectedResponse, 'GET');
}

/* *
 * 改变发票的方式
 */
function groupBuyChangeNeedInv()
{
  var obj        = document.getElementById('ECS_NEEDINV');
  var objPayee   = document.getElementById('ECS_INVPAYEE');
  var objContent = document.getElementById('ECS_INVCONTENT');
  var needInv    = obj.checked ? 1 : 0;
  var invPayee   = obj.checked ? objPayee.value : '';
  var invContent = obj.checked ? objContent.value : '';
  objPayee.disabled = objContent.disabled = ! obj.checked;

  Ajax.call('group_buy.php?act=change_needinv', 'need_idv=' + needInv + '&amp;payee=' + invPayee + '&amp;content=' + invContent, null, 'GET');
}

/* *
 * 改变缺货处理时的处理方式
 */
function changeOOS(obj)
{
  if (selectedOOS == obj)
  {
    return;
  }
  else
  {
    selectedOOS = obj;
  }

  Ajax.call('flow.php?step=change_oos', 'oos=' + obj.value, null, 'GET');
}

/* *
 * 检查提交的订单表单
 */
function checkOrderForm(frm)
{
  var paymentSelected = false;
  var shippingSelected = false;

//增加_start By jianhualiucheng
  var telinput=false;
  var consigneeSelected1=false;
  var consigneeSelected2=false;
  var consigneeSelected3=false;
  var addressinput=false;
  //增加_end By jianhualiucheng

  // 检查是否选择了支付配送方式
  for (i = 0; i < frm.elements.length; i ++ )
  {
    if (frm.elements[i].name == 'shipping' && frm.elements[i].checked)
    {
      shippingSelected = true;
    }

	//增加_start By jianhualiucheng
	if (frm.elements[i].name == 'tel' && frm.elements[i].value)
    {
      telinput = true;
    }
	 if (frm.elements[i].name == 'address' && frm.elements[i].value)
    {
      addressinput = true;
    }
	 if (frm.elements[i].name == 'province' && frm.elements[i].value!='0')
    {		
		consigneeSelected1 = true;	   
    }
	 if (frm.elements[i].name == 'city' && frm.elements[i].value!='0')
    {		
		consigneeSelected2 = true;	   
    }
	 if (frm.elements[i].name == 'district' && frm.elements[i].value!='0')
    {		
		consigneeSelected3 = true;	   
    }
	//增加_end By jianhualiucheng


    if (frm.elements[i].name == 'payment' && frm.elements[i].checked)
    {
      paymentSelected = true;
    }
  }


//增加_start By jianhualiucheng
  if ( ! telinput)
  {
    alert("收货人电话没有填写！！");
    return false;
  }
  if ( ! addressinput)
  {
    alert("收货地址没有填写！！");
    return false;
  }
  if ( ! consigneeSelected1 || ! consigneeSelected2 || ! consigneeSelected3)
  {
    alert("配送区域没有选择！！");
    return false;
  }
  //增加_end By jianhualiucheng

  if ( ! shippingSelected)
  {
    alert(flow_no_shipping);
    return false;
  }

  if ( ! paymentSelected)
  {
    alert(flow_no_payment);
    return false;
  }

  // 检查用户输入的余额
  if (document.getElementById("ECS_SURPLUS"))
  {
    var surplus = document.getElementById("ECS_SURPLUS").value;
    var error   = Utils.trim(Ajax.call('flow.php?step=check_surplus', 'surplus=' + surplus, null, 'GET', 'TEXT', false));

    if (error)
    {
      try
      {
        document.getElementById("ECS_SURPLUS_NOTICE").innerHTML = error;
      }
      catch (ex)
      {
      }
      return false;
    }
  }

  // 检查用户输入的积分
  if (document.getElementById("ECS_INTEGRAL"))
  {
    var integral = document.getElementById("ECS_INTEGRAL").value;
    var error    = Utils.trim(Ajax.call('flow.php?step=check_integral', 'integral=' + integral, null, 'GET', 'TEXT', false));

    if (error)
    {
      return false;
      try
      {
        document.getElementById("ECS_INTEGRAL_NOTICE").innerHTML = error;
      }
      catch (ex)
      {
      }
    }
  }
  frm.action = frm.action + '?step=done';
  return true;
}

/* *
 * 检查收货地址信息表单中填写的内容
 */
function checkConsignee(frm)
{
  var msg = new Array();
  var err = false;

  if (frm.elements['country'] && frm.elements['country'].value == 0)
  {
    msg.push(country_not_null);
    err = true;
  }

  if (frm.elements['province'] && frm.elements['province'].value == 0 && frm.elements['province'].length > 1)
  {
    err = true;
    msg.push(province_not_null);
  }

  if (frm.elements['city'] && frm.elements['city'].value == 0 && frm.elements['city'].length > 1)
  {
    err = true;
    msg.push(city_not_null);
  }

  if (frm.elements['district'] && frm.elements['district'].length > 1)
  {
    if (frm.elements['district'].value == 0)
    {
      err = true;
      msg.push(district_not_null);
    }
  }

  if (Utils.isEmpty(frm.elements['consignee'].value))
  {
    err = true;
    msg.push(consignee_not_null);
  }

  if ( ! Utils.isEmail(frm.elements['email'].value))
  {
    err = true;
    msg.push(invalid_email);
  }

  if (frm.elements['address'] && Utils.isEmpty(frm.elements['address'].value))
  {
    err = true;
    msg.push(address_not_null);
  }

  if (frm.elements['zipcode'] && frm.elements['zipcode'].value.length > 0 && (!Utils.isNumber(frm.elements['zipcode'].value)))
  {
    err = true;
    msg.push(zip_not_num);
  }

  if (Utils.isEmpty(frm.elements['tel'].value))
  {
    err = true;
    msg.push(tele_not_null);
  }
  else
  {
    if (!Utils.isTel(frm.elements['tel'].value))
    {
      err = true;
      msg.push(tele_invaild);
    }
  }

  if (frm.elements['mobile'] && frm.elements['mobile'].value.length > 0 && (!Utils.isTel(frm.elements['mobile'].value)))
  {
    err = true;
    msg.push(mobile_invaild);
  }

  if (err)
  {
    message = msg.join("\n");
    alert(message);
  }
  return ! err;
}


/* start By jianhualiucheng */
function shippingBox_change(frm)
{
	var con_country = frm.elements['country'].value;
	var con_province = frm.elements['province'].value;
	var con_city = frm.elements['city'].value;
	var con_district = frm.elements['district'].value;
	document.getElementById("shippingBox").innerHTML='<font color="#ff3300">&nbsp;&nbsp;&nbsp;正在重新导入配送区域，请稍候。。。</font>';
	Ajax.call('flows.php?step=shipping_change', 'country=' +con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district , shippingBoxchangeResponse , 'GET', 'JSON'); 
}

function shippingBoxchangeResponse(result)
{
	document.getElementById("shippingBox_msg").innerHTML= '配送区域已经变化，请重新选择物流';
	document.getElementById("shippingBox").innerHTML= result.content;
}
/* end By jianhualiucheng */