<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="330312777765262514665475144" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta property="qc:admins" content="755275344175711566654" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="themes/www_zuimoban_com/base.css" rel="stylesheet" type="text/css" />
<link href="themes/www_zuimoban_com/index.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
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
<script type="text/javascript" src="themes/www_zuimoban_com/js/jquery.js"></script>
<script type="text/javascript" src="themes/www_zuimoban_com/js/xm.js"></script>


<script type="text/javascript">
document.getElementById("div_all_cat").className = "showlist";
</script>

<div class="container">
  <div class="fpics row clearfix">

    <div class="span12">
      <div id="yc-mod-slider">
        <div id="xmFocus" class="xmFocus">
		<?php $_from = get_flash_xml(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'playerdb');$this->_foreach['get_flash_xml'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_flash_xml']['total'] > 0):
    foreach ($_from AS $this->_var['playerdb']):
        $this->_foreach['get_flash_xml']['iteration']++;
?>
          <div style="background: url(<?php echo $this->_var['playerdb']['src']; ?>) no-repeat scroll center 50% rgb(255, 255, 255); display: block;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px" index="<?php echo $this->_foreach['get_flash_xml']['iteration']; ?>"><a href="<?php echo $this->_var['playerdb']['url']; ?>" target="_blank"></a></div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
          <ul style="width: 80px; right: 50%; margin-right: -465px;">
		  <?php $_from = get_flash_xml(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'playerdb');$this->_foreach['get_flash_xml'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_flash_xml']['total'] > 0):
    foreach ($_from AS $this->_var['playerdb']):
        $this->_foreach['get_flash_xml']['iteration']++;
?>
            <li class="<?php if ($this->_foreach['get_flash_xml']['iteration'] == 1): ?>on<?php endif; ?>" index="<?php echo $this->_foreach['get_flash_xml']['iteration']; ?>"></li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
          </ul>
        </div>
        <script type="text/javascript">$(function(){Xmeb.App.xmFocus.init($("#xmFocus"),{mwidth:"auto",autoWidth:true});Xmeb.App.lazyload({defObj:".home_main",defHeight:50});});</script>
      </div>
      
    </div>
  </div>
    
     <div class="hotgoods">
	<div class="xm-box">
         <div class="bd clearfix">
               
<?php echo $this->fetch('library/ad_position.lbi'); ?>        
          </div>
		 </div>
      </div>
	    
	  <div class="hotgoods">  
 		<div class="xm-box">
 			<div class="bd clearfix">
                 
<?php echo $this->fetch('library/ad_position.lbi'); ?>

           </div>
        </div>
	</div>
 <?php echo $this->fetch('library/help.lbi'); ?>
 <?php echo $this->fetch('library/right.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>	
</body>	  
</html>
