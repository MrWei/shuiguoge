
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
            <script type="text/javascript" src="js/transport.js"></script>
            <script type="text/javascript" src="js/utils.js"></script>
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

   <p><a href="flows.php"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></a></p>
     </div> </div>
      
      <!--<div style="position: absolute;right: 31px;top: 78px;"><a target="_blank" id="kaifanggm" href="#">下轮开放购买：9月17日中午12点</a></div>-->
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
    <div class="showlist snone" id="div_all_cat">
      <ul class="lists">
	  <?php $_from = get_categories_tree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
        <li onmouseover="this.className='navhover'" onmouseout="this.className=''"><a class="tit" href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a><em class="icon-common icon-common-arrowright"></em>
		<?php if ($this->_var['cat']['cat_id']): ?>
          <label class="tri"><i></i></label>
          <div class="show clearfix">
            <div class="lt">
              <dl class="firstdl">
			  <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
                <dd><a  href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></dd>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </dl>
            </div>
          </div>
		  <?php endif; ?>	
        </li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
      </ul>
    </div>
  </div>
</div>
<!--<script type="text/javascript" src="themes/www_zuimoban_com/js/jquery.js"></script>-->
<script type="text/javascript" src="themes/www_zuimoban_com/js/xm.js"></script>