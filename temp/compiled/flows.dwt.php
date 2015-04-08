<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/www_zuimoban_com/base.css" rel="stylesheet" type="text/css" />
<link href="themes/www_zuimoban_com/flow.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="block box">
 <div id="ur_here">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
 </div>
</div>


<div class="blank"></div>
<div class="block">
  <?php if ($this->_var['step'] == "cart"): ?>
<img src="themes/www_zuimoban_com/images/step_1.gif" />
  
  
  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
  <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['goods_list']; ?></span></h6>
        <form id="formCart" name="formCart" method="post" action="flow.php">
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_name']; ?></th>
      <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <?php endif; ?>
              <?php if ($this->_var['show_marketprice']): ?>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['market_prices']; ?></th>
              <?php endif; ?>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['shop_prices']; ?></th>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['number']; ?></th>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['subtotal']; ?></th>
              <th bgcolor="#ffffff"><?php echo $this->_var['lang']['handle']; ?></th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr>
              <td bgcolor="#ffffff" align="center">
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                  <?php if ($this->_var['show_goods_thumb'] == 1): ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
                  <?php elseif ($this->_var['show_goods_thumb'] == 2): ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img style="width:80px; height:80px;" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a>
                  <?php else: ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img style="width:80px; height:80px;" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a><br />
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                  <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['is_gift'] > 0): ?>
                  <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                  <?php endif; ?>
                <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
                  <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
                  <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
                      <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
                        <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </div>
                <?php else: ?>
                  <?php echo $this->_var['goods']['goods_name']; ?>
                <?php endif; ?>
              </td>
              <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <td bgcolor="#ffffff"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <?php endif; ?>
              <?php if ($this->_var['show_marketprice']): ?>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['goods']['market_price']; ?></td>
              <?php endif; ?>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['goods']['goods_price']; ?></td>
              <td align="right" bgcolor="#ffffff">
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
                <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4" class="inputBg" style="text-align:center " onkeydown="showdiv(this)"/>
                <?php else: ?>
                <?php echo $this->_var['goods']['goods_number']; ?>
                <?php endif; ?>
              </td>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['goods']['subtotal']; ?></td>
              <td align="center" bgcolor="#ffffff">
                <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="f6"><?php echo $this->_var['lang']['drop']; ?></a>
                <?php if ($_SESSION['user_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="f6"><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
                <?php endif; ?>            </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td bgcolor="#ffffff">
              <?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?>
              <?php echo $this->_var['shopping_money']; ?><?php if ($this->_var['show_marketprice']): ?>，<?php echo $this->_var['market_price_desc']; ?><?php endif; ?>
              </td>
              <td align="right" bgcolor="#ffffff">
                <input type="button" value="<?php echo $this->_var['lang']['clear_cart']; ?>" class="bnt_blue_1" onclick="location.href='flow.php?step=clear'" />
                <input name="submit" type="submit" class="bnt_blue_1" value="<?php echo $this->_var['lang']['update_cart']; ?>" />
              </td>
            </tr>
          </table>
          <input type="hidden" name="step" value="update_cart" />
        </form>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
          <tr>
            <td bgcolor="#ffffff"><a href="./"><img src="themes/www_zuimoban_com/images/continue.gif" alt="continue" /></a></td>
            <td bgcolor="#ffffff" align="right"><a href="flow.php?step=checkout"><img src="themes/www_zuimoban_com/images/checkout.gif" alt="checkout" /></a></td>
          </tr>
        </table>
       <?php if ($_SESSION['user_id'] > 0): ?>
       <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
       <script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script>


  
  <?php endif; ?>
</div>
    <div class="blank"></div>
  <?php if ($this->_var['collection_goods']): ?>
  <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['label_collection']; ?></span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
      <?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td bgcolor="#ffffff"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></td>
            <td bgcolor="#ffffff" align="center" width="100"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['lang']['collect_to_flow']; ?></a></td>
          </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table> 
        </div>
      <?php endif; ?>
 
    <div class="blank5"></div>
  <?php endif; ?>

  <?php if ($this->_var['fittings_list']): ?>
  <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
  <script type="text/javascript" charset="utf-8">
  function fittings_to_flow(goodsId,parentId)
  {
    var goods        = new Object();
    var spec_arr     = new Array();
    var number       = 1;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = parentId;
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), fittings_to_flow_response, 'POST', 'JSON');
  }
  function fittings_to_flow_response(result)
  {
    if (result.error > 0)
    {
      // 如果需要缺货登记，跳转
      if (result.error == 2)
      {
        if (confirm(result.message))
        {
          location.href = 'user.php?act=add_booking&id=' + result.goods_id;
        }
      }
      else if (result.error == 6)
      {
        openSpeDiv(result.message, result.goods_id, result.parent);
      }
      else
      {
        alert(result.message);
      }
    }
    else
    {
      location.href = 'flow.php';
    }
  }
  </script>


  <div class="block" >
    <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['goods_fittings']; ?></span></h6>
    <form action="flow.php" method="post">
        <div class="flowGoodsFittings clearfix">
          <?php $_from = $this->_var['fittings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fittings');if (count($_from)):
    foreach ($_from AS $this->_var['fittings']):
?>
            <ul class="clearfix">
              <li class="goodsimg">
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['fittings']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['fittings']['name']); ?>" class="B_blue" /></a>
              </li>
              <li>
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>" class="f6"><?php echo htmlspecialchars($this->_var['fittings']['short_name']); ?></a><br />
                <?php echo $this->_var['lang']['fittings_price']; ?><font class="f1"><?php echo $this->_var['fittings']['fittings_price']; ?></font><br />
                <?php echo $this->_var['lang']['parent_name']; ?><?php echo $this->_var['fittings']['parent_short_name']; ?><br />
                <a href="javascript:fittings_to_flow(<?php echo $this->_var['fittings']['goods_id']; ?>,<?php echo $this->_var['fittings']['parent_id']; ?>)"><img src="themes/www_zuimoban_com/images/bnt_buy.gif" alt="<?php echo $this->_var['lang']['collect_to_flow']; ?>" /></a>
              </li>
            </ul>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </form>
    </div>
  </div>
  <div class="blank5"></div>
  <?php endif; ?>

  <?php if ($this->_var['favourable_list']): ?>
  <div class="block">
    <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['label_favourable']; ?></span></h6>
        <?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
        <form action="flow.php" method="post">
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_name']; ?></td>
              <td bgcolor="#ffffff"><strong><?php echo $this->_var['favourable']['act_name']; ?></strong></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_period']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_range']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br />
              <?php echo $this->_var['favourable']['act_range_desc']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_amount']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_type']; ?></td>
              <td bgcolor="#ffffff">
                <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
                <?php if ($this->_var['favourable']['act_type'] == 0): ?>
                <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                  <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                  <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank" class="f6"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>          </td>
            </tr>
            <?php if ($this->_var['favourable']['available']): ?>
            <tr>
              <td align="right" bgcolor="#ffffff">&nbsp;</td>
              <td align="center" bgcolor="#ffffff"><input type="image" src="themes/www_zuimoban_com/images/bnt_cat.gif" alt="Add to cart"  border="0" /></td>
            </tr>
            <?php endif; ?>
          </table>
          <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
          <input type="hidden" name="step" value="add_favourable" />
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  </div>
  <?php endif; ?>


        <?php if ($this->_var['step'] == "consignee"): ?>
        
<img src="themes/www_zuimoban_com/images/step_3.gif" />
        <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
        <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
        
        <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
        <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
        <?php echo $this->fetch('library/consignee.lbi'); ?>
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>

        <?php if ($this->_var['step'] == "checkout"): ?>
	<img src="themes/www_zuimoban_com/images/step_checkout.gif" />

	  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  </script>
	 
        <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
	
        <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>

        <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";

	function formSubmit(fcart)
	{
		fcart.submit();
	}
        </script>
        <div class="flowBox-0" >

	<form id="formCart" name="formCart" method="post" action="flows.php" autocomplete="off">
        <table width="100%" align="center" border="0" cellpadding="2" cellspacing="0"  style="background:#fff8f2;border-left:1px solid #ffbc91;border-right:1px solid #ffbc91;border-bottom:1px solid #ffbc91;" >
            <tr >
              <th style="text-align:center;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;">图片</th>
              <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;"><?php echo $this->_var['lang']['goods_name']; ?></th>
              <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <?php if ($this->_var['show_marketprice']): ?>
              <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;"><?php echo $this->_var['lang']['market_prices']; ?></th>
              <?php endif; ?>
              <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;"><?php if ($this->_var['gb_deposit']): ?><?php echo $this->_var['lang']['deposit']; ?><?php else: ?><?php echo $this->_var['lang']['shop_prices']; ?><?php endif; ?></th>
              <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;">购买数量</th>
              <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;"><?php echo $this->_var['lang']['subtotal']; ?></th>
	      <th style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;">操作</th>
            </tr>

            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr>
              <td bgcolor="#fff8f2" align=center>
              <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" ><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="70" height="70" border=0 ></a>
              </td>

              <td bgcolor="#fff8f2">
	      <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
	      <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
	      <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
	          <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
		    <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
	          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	      </div>
	      <?php else: ?>
	      <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
                <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
               <?php elseif ($this->_var['goods']['is_gift']): ?>
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->_var['goods']['is_shipping']): ?>(<span style="color:#FF0000"><?php echo $this->_var['lang']['free_goods']; ?></span>)<?php endif; ?>
	      </td>
              <td align="left" bgcolor="#fff8f2"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <?php if ($this->_var['show_marketprice']): ?>
              <td align="left" bgcolor="#fff8f2"><font class="market"><?php echo $this->_var['goods']['formated_market_price']; ?></a></td>
              <?php endif; ?>
              <td bgcolor="#fff8f2" align="left"><?php echo $this->_var['goods']['formated_goods_price']; ?></td>
              <td bgcolor="#fff8f2" align="left">	      
	                      
		<a href="javascript:minus_num(document.getElementById('formCart'), <?php echo $this->_var['goods']['rec_id']; ?>);"><img src="themes/www_zuimoban_com/images/bag_close.gif" border=0></a><input type="text" onKeyDown='if(event.keyCode == 13) event.returnValue = false' name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4" class="inputBg" style="text-align:center;" onblur="formSubmit(this.form)"/><input type="hidden" id="hidden_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>"><a href="javascript:add_num(document.getElementById('formCart'),<?php echo $this->_var['goods']['rec_id']; ?>)" ><img src="themes/www_zuimoban_com/images/bag_open.gif" border=0></a>
			      
	      </td>
              <td bgcolor="#fff8f2" align="left" id="subtotal_<?php echo $this->_var['goods']['rec_id']; ?>" ><?php echo $this->_var['goods']['formated_subtotal']; ?></td>
	      <td bgcolor="#fff8f2" align="left"><a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flows.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="f6"><?php echo $this->_var['lang']['drop']; ?></a></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php if (! $this->_var['gb_deposit']): ?>

	    <tr>
              <td bgcolor="#fff8f2" colspan="7">
	      <hr size=1 width="98%" color="#dddddd">
	      </td>
	     </tr>
            <tr>
              <td bgcolor="#fff8f2" colspan="5" style="padding-left:10px;">
              <?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?>
              <span id="cart_amount_desc"><?php echo $this->_var['shopping_money']; ?></span><?php if ($this->_var['show_marketprice']): ?>，<span id="market_amount_desc"><?php echo $this->_var['market_price_desc']; ?></span><?php endif; ?>
              </td>
	      <td colspan=2 align=right>&nbsp;</td>
            </tr>
            <?php endif; ?>
          </table>

	  
	  <script>
	  function add_num(f, rec_id)
	 {
		document.getElementById("goods_number_"+rec_id+"").value++;
		//var number = document.getElementById("goods_number_"+rec_id+"").value;
		//Ajax.call('flows.php', 'step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
		f.submit();
	 }

	function minus_num(f, rec_id)
	{
		if (document.getElementById("goods_number_"+rec_id+"").value>1)
		{
			document.getElementById("goods_number_"+rec_id+"").value--;
		}
		//var number = document.getElementById("goods_number_"+rec_id+"").value;
		//Ajax.call('flows.php', 'step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
		f.submit();
	}

function change_price(rec_id,goods_id)
{
	var r = /^[1-9]+[0-9]*]*$/;
	var number = document.getElementById("goods_number_"+rec_id+"").value;
	if (!r.test(number))
	{
		alert("您输入的格式不正确！");
		document.getElementById("goods_number_"+rec_id+"").value=document.getElementById("hidden_"+rec_id+"").value;
	}
	else
	{
		Ajax.call('flows.php','step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	}
}

function changePriceResponse(result)
{
if(result.error == 1)
{
	alert(result.content);
	document.getElementById("goods_number_"+result.rec_id+"").value =result.number;
	document.getElementById("hidden_"+result.rec_id+"").value =result.number;
}
else
{
	document.getElementById("hidden_"+result.rec_id+"").value =result.number;
	document.getElementById('subtotal_'+result.rec_id).innerHTML = result.subtotal;//商品总价
	document.getElementById('cart_amount_desc').innerHTML = result.cart_amount_desc;//购物车商品总价说明
	document.getElementById('market_amount_desc').innerHTML = result.market_amount_desc;//购物车商品总市价说明
	show_div_text = "恭喜您！ 商品数量修改成功！ ";
	showdiv(document.getElementById("goods_number_"+result.rec_id));
}

}
</script>

	  <input type="hidden" name="step" value="update_cart" />
	  </form>

	  <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
	  <tr><td align=right style="padding-top:10px;"><a href="/" ><img src="themes/www_zuimoban_com/images/jxgw.jpg" border=0></a> </td></tr>
	  </table>

      </div>

      <div class="blank"></div>
      <div class="blank"></div>

	<form action="flows.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
      
      <div class="flowBox-0" style="border-left:1px solid #ffbc91;border-right:1px solid #ffbc91;">      
      <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8f2" >            
	    <th colspan=2 style="text-align:left;height:27px;line-height:27px;background:url(themes/www_zuimoban_com/images/bg_consignee.gif) repeat-x 0 0;">　1、 填写收货人信息</th>
	    <tr >
              <td width="10%" height="30" align=right style="padding-top:10px;"><?php echo $this->_var['lang']['consignee_name']; ?>：</td>
              <td width="90%" height="30" style="padding-top:10px;">
	      <input type="text" name="consignee" value="<?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?>" size=15>&nbsp;&nbsp;<?php if ($_SESSION['user_id'] > 0): ?><?php else: ?><b>【<a href="user.php?act=register"><font color=#ff3300>注册</font></a>会员可以累积折扣积分，会员点此<a href="user.php" ><font color=#ff3300>登录</font></a>】</b><?php endif; ?>
	      </td>
	      </tr>
	      <tr>
              <td align=right height="30">电话(手机)：</td>
              <td height="30"><input type="text" name="tel" value="<?php echo $this->_var['consignee']['tel']; ?>" size=15> <font color=#ff3300>(必填) </font> 请填写有效联系电话或手机</td>
            </tr>
	      <tr>
              <td height="30" align=right>配送区域：</td>
              <td height="30">
	      <input type="hidden" name="consignee_post" value="1">
	      <input name="address_id" type="hidden" value="<?php echo $this->_var['consignee']['address_id']; ?>" />
	      <select name="country" id="selCountries_0" onchange="region.changed(this, 1, 'selProvinces_0')" style="border:1px solid #ccc;">
		<option value="0">请选择国家</option>
                <option value="1" selected>中国</option>
              </select>
		<select name="province" id="selProvinces_0" onchange="region.changed(this, 2, 'selCities_0')" onblur="shippingBox_change(document.forms['theForm'])" style="border:1px solid #ccc;">
		<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
		<?php $_from = $this->_var['shop_province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
		<option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['consignee']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
		<select name="city" id="selCities_0" onchange="region.changed(this, 3, 'selDistricts_0')"  style="border:1px solid #ccc;">
		<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
		<?php $_from = $this->_var['shop_city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
		<option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['consignee']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
		<select name="district" id="selDistricts_0"  <?php if (! $this->_var['shop_district_list']): ?>style="display:none"<?php endif; ?> style="border:1px solid #ccc;">
		<option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
		<?php $_from = $this->_var['shop_district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
		<option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['consignee']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select> <font color=#ff3300>(必填) </font>
	      </td>              
            </tr>
            <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
            <tr>
              <td height="30" align=right>收货地址：</td>
              <td height="30"><input type="text" name="address" value="<?php echo htmlspecialchars($this->_var['consignee']['address']); ?>" size=45> <font color=#ff3300>(必填) </font> 请详细填写收货地址，便于及时、准确的收发货</td>
            </tr>
            <?php endif; ?>
            
             <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
            <tr>
              <td align=right valign=top>订单附言：</td>
              <td style="padding:5px 0 20px 0;"><textarea name="postscript" rows=3 cols=70></textarea> </td>              
            </tr>
            <?php endif; ?>
          </table>
      </div>

    <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
    <div class="flowBox-0" style="border-left:1px solid #ffbc91;border-right:1px solid #ffbc91;">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8f2" id="shippingTable">
    <th colspan=6 style="text-align:left;height:25px;line-height:25px;background:#ffd3b6;" >　2、 选择配送 &nbsp;&nbsp;&nbsp;  <font id="shippingBox_msg" style="font-weight:normal;color:#00c;">注：请先选择配送区域（省市县），再选择配送方式</font></th>
  
    <tr><td width=10% height="15"></td><td width="90%" >&nbsp;</td></tr>            
            <tr>
	      <td width="10%" align="right" valign="top">配送方式：</td>
	      <td width="90%" valign=top>
		<div  id="shippingBox">
			<table width="100%"  cellpadding="0" cellspacing="0" >
			<?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');$this->_foreach['shipping_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_list']['total'] > 0):
    foreach ($_from AS $this->_var['shipping']):
        $this->_foreach['shipping_list']['iteration']++;
?>
			<tr><td width="30%" height=25  valign=top>
			<input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>"  supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" /> <?php echo $this->_var['shipping']['shipping_name']; ?> 
			[<?php echo $this->_var['shipping']['format_shipping_fee']; ?>]
			</td>
			<td width="70%" valign=top>
			<?php echo $this->_var['shipping']['shipping_desc']; ?>
			</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</table>
		</div>
	      </td>	      
            </tr>            
            <tr>
              <td colspan="2" align="right"><label for="ECS_NEEDINSURE" style="display:none;">
                <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
                <?php echo $this->_var['lang']['need_insure']; ?> </label>&nbsp;</td>
            </tr>
          </table>
    </div>
        <?php else: ?>
        <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>

    <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
    <div class="flowBox-0" style="border-left:1px solid #ffbc91;border-right:1px solid #ffbc91;">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8f2" id="paymentTable">
    <th colspan=6 style="text-align:left;height:25px;line-height:25px;background:#ffd3b6;" >　3、 <?php echo $this->_var['lang']['payment_method']; ?></th>
	<tr><td colspan=6 height="15">&nbsp;</td></tr>
            <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');$this->_foreach['payment_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_list']['total'] > 0):
    foreach ($_from AS $this->_var['payment']):
        $this->_foreach['payment_list']['iteration']++;
?>
            
            <tr>
	    <td width="10%" height="25">&nbsp;</td>
              <td valign="top" height=25 width="20%"><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>"  isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/> <?php echo $this->_var['payment']['pay_name']; ?></td>              
              <td valign="top" ><?php echo $this->_var['payment']['pay_desc']; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
    </div>
    <?php else: ?>
        <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
    <?php endif; ?>

	
	<div class="flowBox-0" style="border:1px solid #ffbc91;border-top:none;">
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8f2" id="paymentTable">
	 <th  style="text-align:left;height:25px;line-height:25px;background:#ffd3b6;" >　4、 最终付款结算</th>
	<tr>
	<td  width="100%" align=center style="padding:15px 0;">

	<?php echo $this->fetch('library/order_total_flows.lbi'); ?>	

	<table width="80%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fffbe0" style="border:1px solid #d5d5d5;border-top:none;">
	<tr><td style="padding-left:20px" align=left>
	<?php if ($this->_var['pack_list']): ?>
	<input type="radio" name="pack" value="0" checked="true" onclick="selectPack(this)" /> <?php echo $this->_var['lang']['no_pack']; ?><br>
    <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
    <input type="radio" name="pack" value="<?php echo $this->_var['pack']['pack_id']; ?>"  onclick="selectPack(this)" /> <?php echo $this->_var['pack']['pack_name']; ?> ( <?php echo $this->_var['pack']['pack_desc']; ?><font color=#ff3300>+<?php echo $this->_var['pack']['format_pack_fee']; ?></font>)<br>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
    </td></tr>
    <tr>
    <td align=left style="padding:10px 0 0 20px"> <?php if ($this->_var['allow_use_bonus']): ?>   
               <?php echo $this->_var['lang']['input_bonus_no']; ?>
               <input name="bonus_sn" type="text" class="inputBg" size="15" value="<?php echo $this->_var['order']['bonus_sn']; ?>"/> 
                <input name="validate_bonus" type="button" style="background:url(themes/www_zuimoban_com/images/bg_yellow.gif) no-repeat 0 0; width:82px; height:25px;  text-align:center; line-height:25px; color:#333; border:none; cursor:pointer;overflow:hidden" value="使用红包" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" />              
            <?php endif; ?></td>
    </tr>
    <tr><td height=20>&nbsp;</td></tr>
    </table>

	</td></tr>       
	<tr>
	<td  width="100%" align=center style="padding:15px 0;">
		<input type="image" src="themes/www_zuimoban_com/images/bnt_subOrder.gif" />
	</td>
	</tr>
       </table>
    </div>
    <div class="blank"></div>
    <div class="blank"></div>
    <div class="blank"></div>


	<?php if ($this->_var['allow_use_surplus']): ?>
      <div class="flowBox">
    
      <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            
            <tr>
              <td width="20%" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_surplus']; ?>: </strong></td>
              <td bgcolor="#ffffff"><input name="surplus" type="text" class="inputBg" id="ECS_SURPLUS" size="10" value="<?php echo empty($this->_var['order']['surplus']) ? '0' : $this->_var['order']['surplus']; ?>" onblur="changeSurplus(this.value)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> />
              <?php echo $this->_var['lang']['your_surplus']; ?><?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?> <span id="ECS_SURPLUS_NOTICE" class="notice"></span></td>
            </tr>
            
       
          </table>
    </div>
    <?php endif; ?>

    <div class="blank"></div>
    
    
          
           <div align="center" style="margin:8px auto;">
            <input type="hidden" name="step" value="done" />
            </div>
    
    </form>
        <?php endif; ?>

        <?php if ($this->_var['step'] == "done"): ?>
        

        <div class="flowBox-0" style="margin:0 auto 70px auto;border:1px solid #">
         <p style="text-align:left; height:30px; line-height:30px;color:#e88003;font-size:15px;font-weight:bold;"> 您的订单已提交成功！</font></p>
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff7f2" style="font-size:14px;border:1px solid #ffbc91; margin:0 auto 20px auto;" >
            <tr>
              <td align="left" style="padding:15px 15px 15px 20px;line-height:25px;">
	      您的订单号：<font color=#ff3300><?php echo $this->_var['order']['order_sn']; ?></font>  <font style="font-size:12px;">(请牢记此号，以便您享受本网站提供的相关服务)</font><br>
	      应付金额: <font color=#ff3300><strong><?php echo $this->_var['total']['amount_formated']; ?></strong></font><br>
	      付款方式: <strong><?php echo $this->_var['order']['pay_name']; ?></strong><br>
              <?php if ($this->_var['order']['shipping_name']): ?>配送方式: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong><br><?php endif; ?>
	      <?php if ($this->_var['pay_online']): ?>
            
	    <?php echo $this->_var['pay_online']; ?>  <font style="font-size:12px;">(请在24小时内付清款项，否则订单会被自动取消)</font><br>
	    <?php endif; ?>
              </td>
            </tr>
            <tr>
              <td style="padding:5px 15px 15px 20px;">
	   
	      <font style="font-size:12px"><b>温馨提示：</b>请保持手机（电话）畅通，本网客服将尽快与您确认订单，祝您购物愉快！</font>
	      
	      </td>
            </tr>
            
          </table>
          <?php if ($this->_var['virtual_card']): ?>
          <div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
          <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
            <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
            <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
              <?php if ($this->_var['card']['card_sn']): ?>
              <li style="margin-right:50px;float:left;">
              <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span>
              </li><?php endif; ?>
              <?php if ($this->_var['card']['card_password']): ?>
              <li style="margin-right:50px;float:left;">
              <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span>
              </li><?php endif; ?>
              <?php if ($this->_var['card']['end_date']): ?>
              <li style="float:left;">
              <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?>
              </li><?php endif; ?>
              </ul>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <?php endif; ?>
          <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
        </div>
        <?php endif; ?>
        <?php if ($this->_var['step'] == "login"): ?>
		<img src="themes/www_zuimoban_com/images/step_2.gif" />
        <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?>
        <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
        

         <div class="flowBox" style="border:none; border-top:1px solid #ddd">
        <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
          <tr>
            <td width="50%" valign="top" bgcolor="#ffffff">
            <h6><span>用户登录：</span></h6>
            <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
                <table width="90%" border="0" cellpadding="8" cellspacing="0" bgcolor="#B0D8FF" class="table">
                  <tr>
                    <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['username']; ?></strong></div></td>
                    <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" /></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></div></td>
                    <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" /></td>
                  </tr>
                 <?php if ($this->_var['enabled_login_captcha']): ?>
                  <tr>
                    <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></div></td>
                    <td bgcolor="#ffffff"><input type="text" size="8" name="captcha" class="inputBg" />
                    <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                  </tr>
                  <?php endif; ?>
                  <tr>
				  <td bgcolor="#ffffff"></td>
            <td  bgcolor="#ffffff"><input type="checkbox" value="1" name="remember" id="remember" /><label for="remember"><?php echo $this->_var['lang']['remember']; ?></label></td>
          </tr>
                  <tr>
                    <td bgcolor="#ffffff" colspan="2" align="center"><a href="user.php?act=qpassword_name" class="f6"><?php echo $this->_var['lang']['get_password_by_question']; ?></a>   <a href="user.php?act=get_password" class="f6"><?php echo $this->_var['lang']['get_password_by_mail']; ?></a></td>
                  </tr>


                  <tr>
                    <td bgcolor="#ffffff" colspan="2"><div align="center">
                        <input type="submit" class="bnt_blue" name="login" value="<?php echo $this->_var['lang']['forthwith_login']; ?>" />
                        <?php if ($this->_var['anonymous_buy'] == 1): ?>
                        <input type="button" class="bnt_blue_2" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                        <?php endif; ?>
                        <input name="act" type="hidden" value="signin" />
                      </div></td>
                  </tr>
                </table>
              </form>

              </td>
            <td valign="top" bgcolor="#ffffff">
            <h6><span>用户注册：</span></h6>
            <form action="flow.php?step=login" method="post" name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)">
               <table width="98%" border="0" cellpadding="8" cellspacing="0" bgcolor="#B0D8FF" class="table">
                  <tr>
                    <td bgcolor="#ffffff" align="right" width="25%"><strong><?php echo $this->_var['lang']['username']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" onblur="is_registered(this.value);" /><br />
		    <span id="username_notice" style="color:#FF0000"></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['email_address']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email" onblur="checkEmail(this.value);" /><br />
		    <span id="email_notice" style="color:#FF0000"></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" /><br />
		    <span style="color:#FF0000" id="password_notice"></span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['confirm_password']; ?></strong></td>
                    <td bgcolor="#ffffff"><input name="confirm_password" class="inputBg" type="password" id="confirm_password" onblur="check_conform_password(this.value);" /><br />
		    <span style="color:#FF0000" id="conform_password_notice"></span></td>
                  </tr>
                  <?php if ($this->_var['enabled_register_captcha']): ?>
                  <tr>
                    <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></td>
                    <td bgcolor="#ffffff"><input type="text" size="8" name="captcha" class="inputBg" />
                    <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
                  </tr>
                  <?php endif; ?>
                  <tr>
                    <td colspan="2" bgcolor="#ffffff" align="center">
                        <input type="submit" name="Submit" class="bnt_blue_1" value="<?php echo $this->_var['lang']['forthwith_register']; ?>" />
                        <input name="act" type="hidden" value="signup" />
                    </td>
                  </tr>
                </table>
              </form>
              </td>
          </tr>
          <?php if ($this->_var['need_rechoose_gift']): ?>
          <tr>
            <td colspan="2" align="center" style="border-top:1px #ccc solid; padding:5px; color:red;"><?php echo $this->_var['lang']['gift_remainder']; ?></td>
          </tr>
          <?php endif; ?>
        </table>
        </div>
        
        <?php endif; ?>




</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
</html>
