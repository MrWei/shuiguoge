<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['keywords']; ?>_美果源水果哥商城</title>
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="icon" href="animated_favicon.gif" type="image/gif"/>
<link href="themes/www_zuimoban_com/style.css" rel="stylesheet" type="text/css"/>
<link href="themes/www_zuimoban_com/base.css" rel="stylesheet" type="text/css"/>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<script type="text/javascript">
function $id(element) {
  return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str){
    var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
} 
</script>
<script type="text/javascript">
function picturs(){
	var goodsimg = document.getElementById("goodsimg");
	var imglist = document.getElementById("imglist");
	var imgnum = imglist.getElementsByTagName("li");
	for(var i = 0; i<imgnum.length; i++){
		imgnum[i].onclick=function(){
			var lang = this.getAttribute("lang");
			goodsimg.setAttribute("src",lang);
			for(var j=0; j<imgnum.length; j++){
				if(imgnum[j].getAttribute("class") =="onbg" || imgnum[j].getAttribute("className") =="onbg"){
					imgnum[j].className = "autobg";
					break;
				}
			}
			this.className = "onbg";
		}
	}
}
</script>
</head>
<body><?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="blank"></div>
<div class="block clearfix">
  <div class="goods-detail-info">
    <div class="goods-pic-box">
      <div id="goodsInfo" class="clearfix">
        <div class="goods-big-pic">
          <div class="thumb"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" id="goodsimg" style="cursor:pointer;" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;"  /></div>
          <div class="blank5"></div>
          <div class="goods-small-pic clearfix">
            <ul id="imglist">
			<?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');if (count($_from)):
    foreach ($_from AS $this->_var['picture']):
?>
              <li class="onbg" lang="<?php echo $this->_var['picture']['img_url']; ?>"><img src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
            </ul>
          </div>
          <script type="text/javascript">picturs();</script>
          <div class="blank5"></div>
        </div>
        <div class="textInfo">
          <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
            <div class="linel clearfix">
              <p class="name"><?php echo $this->_var['goods']['goods_style_name']; ?></p>
              <p class="grief"><?php echo $this->_var['goods']['goods_brief']; ?></p>
            </div>
            <ul>
              <li style="height:50px;width:450px;line-height:50px;background:#5fdea3;color:#fff;font-size:18px;font-weight:800;">
                <dd class="ddR">本店原价：<!--<font class="shop" style="font-size:18px;font-weight:bold;" id="ECS_SHOPPRICE"><?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price_formated']; ?><?php endif; ?></font>-->
				<font class="market" style="font-size:18px;font-weight:bold;"><?php echo $this->_var['goods']['market_price']; ?></font>
				</dd>
 			   <dd class="ddR">净重：<?php echo $this->_var['goods']['goods_weight']; ?></dd>
              </li>
              <li style=width:200px;margin-top:20px;>优惠政策：京津冀包邮</li>
              <li>商品品牌：<?php echo $this->_var['goods']['goods_brand']; ?></li>
                
              
              <li >
              <!--   商品库存：<font style="color:#FFB03B"><?php if ($this->_var['goods']['goods_number'] == 0): ?><?php echo $this->_var['lang']['stock_up']; ?><?php else: ?><?php echo $this->_var['goods']['goods_number']; ?> <?php echo $this->_var['goods']['measure_unit']; ?><?php endif; ?></font>-->
                 商品浏览数：<font style="color:#FFB03B; font-weight:bold;"> <?php echo $this->_var['goods']['click_count']; ?></font>次
              </li>
              <li > 可使用积分：<font class="f1"><?php echo $this->_var['goods']['integral']; ?> <?php echo $this->_var['points_name']; ?></font></li>
			  <li>
  		 <?php if ($this->_var['regions']): ?>
		 	<style>
			#chromemenu b {font-weight:normal}
			.dropmenudiv {position:absolute;top: 0;z-index:100;width:200px;visibility: hidden; background:#fdffee; padding:8px; border:solid #ffbf69 2px; line-height:25px;}
			.dropmenudiv a {margin:0 5px 0 5px;}
			</style>
			<script src="themes/www_zuimoban_com/js/chrome.js" type="text/javascript"></script>
			<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
			<?php if ($this->_var['key'] == 0): ?>
			<div id="chromemenu">配送至: <a rel="dropmenu1" href="javascript:;"><b id="s_a_name" style="color:#000;font-weight:bold;"><?php echo $this->_var['value']['region_name']; ?></b><img style="margin:0 2px 0 2px;" src="themes/www_zuimoban_com/images/icon_2.jpg" align="absmiddle" /></a><b id="s_a_price">
				<?php $_from = $this->_var['value']['shippings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
					<?php echo $this->_var['shipping']['shipping_name']; ?><?php echo $this->_var['shipping']['shipping_price']; ?>元 &nbsp;
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</b>
			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<div id="dropmenu1" class="dropmenudiv">
			<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
			<a href="javascript:;" onclick="show_shipping('<?php echo $this->_var['value']['region_name']; ?>','<?php $_from = $this->_var['value']['shippings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?><?php echo $this->_var['shipping']['shipping_name']; ?><?php echo $this->_var['shipping']['shipping_price']; ?>元 &nbsp;<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>')"><?php echo $this->_var['value']['region_name']; ?></a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<script>
			function show_shipping(name,price)
			{
				document.getElementById("s_a_name").innerHTML = name;
				document.getElementById("s_a_price").innerHTML = price;
			}
			cssdropdown.startchrome("chromemenu");
			</script>
		 <?php endif; ?>
       </dd>
      </li>
                 <li class="colorh clearfix"></li>
              
              
              


 <script language="javascript">
  function changeAtt(t,src,key) {
    
	document.getElementById('spec_value_'+src).checked='checked';
    var itemObj = document.getElementById("catt_"+key);
	var elems = itemObj.getElementsByTagName("a");


    for (i = 0; i < elems.length; i ++ )
	{
		var prefix = elems[i].name.substr(0, 7);
		if (prefix == 'spec_a_')
		{
		   elems[i].className = '';
		}
	}

	t.className = "cattsel";
	changePrice();
}
</script>
  
  
 <style type="text/css">
	  <!--
	  /*--------------颜色选择器CSS添加-------------*/
 .propertySelect strong{float:left;font-weight:normal; text-align:left}
.propertySelect .catt {height:auto;overflow:hidden;}

.propertySelect .catt a{border: #c8c9cd 1px solid;text-align: center;background-color: #fff;display: block;white-space: nowrap;color: #666;text-decoration: none;float:left; margin-bottom:4px; margin-right:4px; position:relative}
.propertySelect .catt a p{border: #fff 1px solid; padding:2px 5px;background-color: #fff;}
.propertySelect .catt a p.padd{padding:0px;}
.propertySelect .catt a:hover {border:#ff6701 1px solid;}
.propertySelect .catt a:hover p{border: #ff6701 1px solid;}
.propertySelect .catt a:focus {outline-style:none;}

.propertySelect .catt .cattsel {background:#ff6701;border: #ff6701 1px solid;}
.propertySelect .catt .cattsel a:hover {border: #ff6701 1px solid;}
.propertySelect .catt .cattsel p{border: #ff6701 1px solid;}
.propertySelect .catt em{font-style:normal}
.propertySelect .catt .cattsel i{background:url(themes/www_zuimoban_com/images/test.png) no-repeat scroll right bottom transparent;bottom:0;height:16px;position:absolute;right:0;width:16px;}
.propertySelect .catt .cattsel a:hover i{background:url(themes/www_zuimoban_com/images/test.png) no-repeat scroll right bottom transparent;}
.propertySelect img{width:50px; height:50px;}
-->
</style>


           <?php if ($this->_var['specification']): ?>
            <div class="propertySelect clearfix" id="propertySelect">
            <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
              <strong><?php echo $this->_var['spec']['name']; ?>：</strong>
              <div class="catt" id="catt_<?php echo $this->_var['spec_key']; ?>">
              
              <?php if ($this->_var['spec']['attr_type'] == 1): ?>
              <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
              <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
               <a class='hover <?php if ($this->_var['key'] == 0): ?>cattsel<?php endif; ?><?php if ($this->_var['value']['thumb_url']): ?> colorImg<?php endif; ?>' <?php if ($this->_var['value']['thumb_url']): ?> rev=<?php echo $this->_var['value']['img_original']; ?> rel=goodsPic <?php else: ?>href="#"<?php endif; ?> title="<?php echo $this->_var['value']['label']; ?>" style="cursor:pointer" name="spec_a_<?php echo $this->_var['value']['id']; ?>" onclick="changeAtt(this,<?php echo $this->_var['value']['id']; ?>,<?php echo $this->_var['spec_key']; ?>)">
               <p <?php if ($this->_var['value']['thumb_url']): ?>class="padd"<?php elseif ($this->_var['value']['hex_color'] != ''): ?>style="background:#<?php echo $this->_var['value']['hex_color']; ?>; height:45px; width:45px"<?php endif; ?>>
              <?php if ($this->_var['value']['thumb_url']): ?>
              <img src="<?php echo $this->_var['value']['thumb_url']; ?>" width="50" height="50" alt="<?php echo $this->_var['value']['label']; ?>">
              <?php elseif ($this->_var['value']['hex_color']): ?>
              <?php else: ?>
               <em><?php echo $this->_var['value']['label']; ?></em>
              <?php endif; ?>
              <i></i>
              </p>
             <input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> />
              </a>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
              <?php else: ?>
              <select name="spec_<?php echo $this->_var['spec_key']; ?>">
              <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
              <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
              <?php endif; ?>
              <?php else: ?>
              <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
              <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
              <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
              <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label>
              <br />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
              <?php endif; ?>
            </div>
            <div class="blank"></div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </div>
         <?php endif; ?>



<style>
.cnum div{float:left;margin-right:20px;}


</style>


      
              
              
              <li class="buybox clearfix">
                <div class="cnum" style="padding-top:8px;">
                  <div class="f_l icur">购买数量：</div>
                  <a href="javascript:void(0);" onclick="goods_cut();changePrice()" class="imgl"></a>
                  <input name="number" type="text" id="number" class="inum" value="1" size="4" onblur="changePrice();get_shipping_list(forms['ECS_FORMBUY'],105);"/>
                  <a href="javascript:void(0);"  onclick="goods_add();changePrice()" class="imgr"></a></div>
				  <div>特价：<font id="ECS_GOODS_AMOUNT" class="shop"></font></div>
                 <script language="javascript" type="text/javascript">
			function goods_cut(){
				var num_val=document.getElementById('number');
				var new_num=num_val.value;
				 if(isNaN(new_num)){alert('请输入数字');return false}
				var Num = parseInt(new_num);
				if(Num>1)Num=Num-1;
				num_val.value=Num;
			}
			function goods_add(){
				var num_val=document.getElementById('number');
				var new_num=num_val.value;
				 if(isNaN(new_num)){alert('请输入数字');return false}
				var Num = parseInt(new_num);
				Num=Num+1;
				num_val.value=Num;
			}
	    </script>
                <div class="blank"></div>
                <div class="buyt"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/www_zuimoban_com/images/bnt_cat1.gif"/></a> &nbsp;&nbsp; <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/www_zuimoban_com/images/bnt_colles.gif" /></a></div>
              </li>
            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blank"></div>
<div class="block clearfix">
  
  <div class="AreaR xm-box">
    <h3 style="padding:10px 5px 0 0; height:32px; background:none; background:url(themes/www_zuimoban_com/images/h3_bg1.gif) 0 bottom repeat-x; border:none">
      <div id="com_b" class="history clearfix">
        <h2>产品简介</h2>
        <h2 class="h2bg">规格参数</h2>
        <h2 class="h2bg">用户评价</h2>
        <h2 class="h2bg">常见问题</h2>
      </div>
    </h3>
    <div id="com_v" style="border-top:none; padding-top:10px;" ></div>
    <div id="com_h" style="overflow:hidden;">
      <blockquote>
        <?php echo $this->_var['goods']['goods_desc']; ?>
        <div class="blank"></div>
        
      </blockquote>
      <blockquote>
        <div class="paddbox"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
        <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
        <tr>
          <th colspan="2" bgcolor="#FFFFFF"><?php echo htmlspecialchars($this->_var['key']); ?></th>
        </tr>
        <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
        <tr>
          <td bgcolor="#FFFFFF" align="left" width="30%" class="f1">[<?php echo htmlspecialchars($this->_var['property']['name']); ?>]</td>
          <td bgcolor="#FFFFFF" align="left" width="70%"><?php echo $this->_var['property']['value']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table></div>
      </blockquote>
      <blockquote>
        <div class="paddbox"><?php echo $this->fetch('library/comments.lbi'); ?></div>
      </blockquote>
      
      <blockquote>
        <div class="paddbox"><?php echo $this->fetch('library/changjian.lbi'); ?></div>
      </blockquote>
    </div>
    <script type="text/javascript">
reg("com");
</script>
    <div class="blank"></div>
   </div>
 </div>
<!--
<div class="AreaL">
 <div class="xm-box" id='history_div'>
    <div class="clearfix">
      <h3><span>你刚刚看过</span></h3>
      <div class="boxCenterList clearfix" id='history_list' style="padding:3px;border-top:none;">
        <?php 
$k = array (
  'name' => 'history',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>
    </div>
  </div>
  <script type="text/javascript">
if (document.getElementById('history_list').innerHTML.replace(/\s/g,'').length<1)
{
    document.getElementById('history_div').style.display='none';
}
else
{
    document.getElementById('history_div').style.display='block';
}
function clear_history()
{
Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
document.getElementById('history_list').innerHTML = '您已清空最近浏览过的商品';
}
</script></div>
-->
 

 <?php echo $this->fetch('library/yejiao.lbi'); ?>
<?php echo $this->fetch('library/right.lbi'); ?>
 <div class="blank5"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
   try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}
/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;
    if (document.getElementById('ECS_GOODS_AMOUNT'))
	{
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
	}
  }
}
/*
*选择信息处理
*/
function changeP(b, c) {
	var frm=document.forms['ECS_FORMBUY'];
	var cur_id="";
    document.getElementById('spec_value_' + c).checked=true;
	document.getElementById('url_' + c).className="selected";
	for (var i = 0; i < frm.elements[b].length; i++) {
		cur_id=frm.elements[b][i].id.substr(11);
        document.getElementById('url_' + cur_id).className="";
		if (frm.elements[b][i].checked)
		{
		   document.getElementById('url_' + c).className="selected";
		}
    }
	changePrice();
}
</script>
<script type="text/javascript">
var time_hide_all_cat = null;
if (document.getElementById("div_all_cat").className == 'showlist snone'){
   document.getElementById("btnnav").onmouseover = show_all_cat;
   
   document.getElementById("btnnav").onmouseout = function(e){
      time_hide_all_cat = setTimeout("hide_all_cat()",100);
   }
   
   document.getElementById("div_all_cat").onmouseover = show_all_cat;
   
   document.getElementById("div_all_cat").onmouseout = hide_all_cat;
}

function hide_all_cat(){
   document.getElementById("div_all_cat").className = 'showlist snone';
}

function show_all_cat(){
   clearTimeout(time_hide_all_cat);
   document.getElementById("div_all_cat").className = 'showlist';
}
</script>
</html>
