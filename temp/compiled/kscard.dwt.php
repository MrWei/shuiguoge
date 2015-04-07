<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" /><meta http-equiv=x-ua-compatible content=ie=7 />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="themes/www_zuimoban_com/base.css" rel="stylesheet" type="text/css" />
<link href="themes/www_zuimoban_com/index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.10.2.min.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<script type="text/javascript">
var isWidescreen=screen.width<1200;
if (isWidescreen){document.getElementsByTagName("body")[0].className="w950";}
</script>
<div class="header container">
  <div class="top">
    <div class="logo"><a class="icon-common-logo" href="index.php" title=""><img src="themes/www_zuimoban_com/images/logo.png" /></a></div>
    <div class="right clearfix">
      <div class="menu">
        <ul class="clearfix">
          <li>
            <script type="text/javascript" src="themes/www_zuimoban_com/js/transport.js"></script>
            <script type="text/javascript" src="themes/www_zuimoban_com/js/utils.js"></script>
            <label id="header_menu_top_login"><font id="ECS_MEMBERZONE"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></font></label>
          </li>
         </ul>
      </div>
       <div style="margin-top:3px;" class="xshop buy_car_bg clearfix"  onmouseover="this.className='xshop hover_on buy_car_bg ul1_on'" onmouseout=  "this.className='xshop buy_car_bg'">
         <img src="themes/www_zuimoban_com/images/nav_cat.gif" style="float:left; padding-right:5px; padding-left:10px; padding-top:7px;" /> 
        <div id="ECS_CARTINFO">
    <p><a href="flow.php"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></a></p>
   </div> </div>
      </div>
  </div>
  <div class="nav">
       <div class="lnks headerblock">
        <ul class="lnks-li">
          <li><a class="lnk  <?php if ($this->_var['navigator_list']['config']['index'] == 1): ?>on<?php endif; ?>" href="index.php">首页</a></li>
 		  <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
            <?php
            $GLOBALS['smarty']->assign('get_child_tree', get_child_tree($GLOBALS['smarty']->_var['nav']['cid']));
            $GLOBALS['smarty']->assign('menucatid',get_catid_byurl($GLOBALS['smarty']->_var['nav']['url']));
            ?>
          <li <?php if ($this->_var['menucatid'] && $this->_var['get_child_tree']): ?>class="phonelistarr" onmouseover="this.className='phonelistarr nhover'" onmouseout="this.className='phonelistarr'"<?php endif; ?>><a class="lnk <?php if ($this->_var['nav']['active'] == 1): ?>on<?php endif; ?>" href="<?php echo $this->_var['nav']['url']; ?>"> <?php echo $this->_var['nav']['name']; ?> </a>
            <?php if ($this->_var['menucatid'] && $this->_var['get_child_tree']): ?>
              <dl>
                <?php $_from = $this->_var['get_child_tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['child']['iteration']++;
?>             
                <dd <?php if (($this->_foreach['subcates']['iteration'] == $this->_foreach['subcates']['total'])): ?>class="last"<?php endif; ?>><a href="<?php echo $this->_var['child']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['cat']['name']); ?>"><?php echo $this->_var['child']['name']; ?></a></dd>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </dl>
            <?php endif; ?>	
          </li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      </div>
    </div>
       </ul>
    </div>
  </div>
</div>
    <?php if ($this->_var['action'] == 'default'): ?>
    <div class="container">
      <div class="module">
         <div class="content" style="padding:8px;">
         <form name="formLogin" action="kscard.php" method="post">
            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
              <tr>
                <td width="40%" align="right">礼品卡序号</td>
                <td width="60%"><input name="card_sn" type="text" size="20" class="inputBg" /></td>
              </tr>
              <tr>
                <td align="right">礼品卡密码</td>
                <td>
                <input name="card_pwd" type="text" size="20"  class="inputBg"/>
                </td>
              </tr>
                            <tr>
                <td>&nbsp;</td>
                <td align="left">
                  <input type="hidden" name="act" value="<?php echo $this->_var['act']; ?>" />
                  <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                  <input type="submit" name="submit" value="" class="us_Submit" />
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
    <?php if ($this->_var['action'] == 'act_login'): ?>
    <style type="text/css">
      .tablelist{border-collapse:collapse; margin: 0px auto; width: 600px;}
      .tablelist th{border: #ddd 1px solid;}
      .tablelist td{border: #ddd 1px solid;}
    </style>
    <div class="container">
      <div class="module">
         <div class="content" style="padding:8px;">
         <form name="formLogin" action="kscard.php" method="post">
            <table width="1000" border="0" cellpadding="3" cellspacing="5" style="margin:0px auto;">
              <tr>
                <td width="250" align="right">联系人</td>
                <td width="750"><input name="order_user" type="text" size="20" class="inputBg" /></td>
              </tr>
              <tr>
                <td align="right">联系地址</td>
                <td>
                <input name="order_address" type="text" size="20"  class="inputBg"/>
                </td>
              </tr>
              <tr>
                <td align="right">固定电话</td>
                <td>
                <input name="order_tel" type="text" size="20"  class="inputBg"/>
                </td>
              </tr>
              <tr>
                <td align="right">移动电话</td>
                <td>
                <input name="order_phone" type="text" size="20"  class="inputBg"/>
                </td>
              </tr>
              <tr>
                <td align="right">特殊要求</td>
                <td>
                <input name="order_bak" type="text" size="20"  class="inputBg"/>
                </td>
              </tr>
              <tr>
                <td align="right">配送时间</td>
                <td>
                <input type="radio" name="shipping_time" value="全天" checked="checked" />全天
                <input type="radio" name="shipping_time" value="上午" />上午
                <input type="radio" name="shipping_time" value="下午" />下午
                </td>
              </tr>
              <tr>
                <td align="right">选择商品<br /></td>
                <td>
                <span style="color:red;">可选<?php echo $this->_var['sel_num']; ?>件</span>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <table class="tablelist">
                    <tr>
                      <th>选择</th>
                      <th>商品名称</th>
                      <th>商城价</th>
                      <th>商品图片</th>
                    </tr>
                     <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <tr>
                      <td align="center"><input name="goods[]" class='goods' type="checkbox" value="<?php echo $this->_var['goods']['cg_goodid']; ?>" /></td>
                      <td><a href="/goods.php?id=<?php echo $this->_var['goods']['cg_goodid']; ?>" target="_blank"><?php echo $this->_var['goods']['cg_goodname']; ?></a></td>
                      <td align="center"><?php echo $this->_var['goods']['cg_price']; ?></td>
                      <td align="center"><img src="<?php echo $this->_var['goods']['cg_img']; ?>" alt="" width="60" height="60" /></td>
                    </tr>
                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </table>     
                </td>
              </tr>
                            <tr>
                <td>&nbsp;</td>
                <td align="left">
                  <input type="hidden" name="act" value="<?php echo $this->_var['act']; ?>" />
                  <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                  <input type="hidden" name="card_sn" value="<?php echo $this->_var['card_sn']; ?>" />
                  <input type="hidden" name="card_id" value="<?php echo $this->_var['card_id']; ?>" />
                  <input type="hidden" name="card_pwd" value="<?php echo $this->_var['card_pwd']; ?>" />
                  <input type="hidden" name="card_type" value="<?php echo $this->_var['card_type']; ?>" />
                  <input type="hidden" name="sel_num" value="<?php echo $this->_var['sel_num']; ?>" />
                  <input type="submit" name="submit" value="" style="width:145px; height:40px; background:url(themes/www_zuimoban_com/images/bnt_subOrder.gif) no-repeat 0 0; border:none; cursor:pointer;" />
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(function(){
      $("input[name='submit']").click(function(){
      var phone = $("input[name='order_tel']").val();
      var mobile = $("input[name='order_phone']").val();  
      if( !$("input[name='order_user']").val() ){
          alert('请输入联系人')
          return false;
        }
         if( !$("input[name='order_address']").val() ){
          alert('请输入联系人地址')
          return false;
        }
         if( !phone && !mobile){
          alert('请输入联系人固定电话或者手机号')
          return false;
        }
        var isPhone = /^0\d{2,3}-?\d{7,8}$/;
        var isMobile = /^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/;
        if( phone && !isPhone.test(phone)  ){
           alert('请输入正确的固定电话')
           return false;
        }
         if( mobile && !isMobile.test(mobile)  ){
           alert('请输入正确的手机号')
           return false;
        }
      })
    })
    </script>  
    <?php endif; ?>
    
     <?php if ($this->_var['action'] == 'order_info'): ?>
    <div class="container">
      <div class="module">
        <h1><span></span>已提交的订单</h1>
        <div class="content" style="padding:8px;">
         <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
	<tr>
    <td width="40%" align="right">订单号</td>
    <td width="60%" >
      <input disabled="true"　readOnly="true" type='text' name='order_id' maxlength="30" value="<?php echo $this->_var['order']['order_sn']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">联系人</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_user' maxlength="30" value="<?php echo $this->_var['order']['order_user']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">联系地址</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_address' maxlength="30" value="<?php echo $this->_var['order']['order_address']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">联系电话</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_tel' maxlength="30" value="<?php echo $this->_var['order']['order_tel']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">移动电话</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_phone' maxlength="30" value="<?php echo $this->_var['order']['order_phone']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">特殊要求备注</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_bak' maxlength="30" value="<?php echo $this->_var['order']['order_bak']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">配送时间</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='shipping_time' maxlength="30" value="<?php echo $this->_var['order']['shipping_time']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">订单创建时间</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_time' maxlength="30" value="<?php echo $this->_var['order_time']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td align="right">订单状态</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_status' maxlength="30" value="<?php if ($this->_var['type']['order_status'] == 0): ?>正常<?php elseif ($this->_var['type']['order_status'] == 1): ?>已确认<?php elseif ($this->_var['type']['order_status'] == 2): ?>已配送<?php elseif ($this->_var['type']['order_status'] == 3): ?>完成<?php endif; ?>" size='20' />    </td>
  </tr>
</table>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
    
 <?php echo $this->fetch('library/help.lbi'); ?>
 <?php echo $this->fetch('library/right.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
  </div>
</body>
</html>