<style>
.righttop{position:fixed;right:10px;bottom:10px;}
.righttop div a{display:block;width:40px;height:40px;border:1px solid #e3e3e3;margin-bottom:30px;}
.righttop div a:hover{background:#59ad31;}
.tooltips,.qq{position:relative;z-index:2;}/*����ǹؼ�*/
.tooltips:hover,.qq:hover{z-index:3;background:none;}/*û�������IE�в�����*/
.tooltips span,.tooltips p,.qq span,.qq p{display: none;}
.tooltips:hover p,.qq:hover p{display:block;position:absolute;top:0px;right:0;}
.qq:hover span{display:block;position:absolute;top:0px;right:40px;} 
.tooltips:hover span,.tel:hover span{display:block;position:absolute;top:0px;right:44px;}
.shop,.tel{position:relative;z-index:2;}/*����ǹؼ�*/
.shop:hover,.tel:hover{z-index:3;background:none;}/*û�������IE�в�����*/
.shop span,.shop p,.tel span,.tel p{display: none;}
.shop:hover p{display:block;position:absolute;top:0px;right:40px;} 
.shop:hover span,.tel:hover p{display:block;position:absolute;top:0px;right:0;}
.top,.ww{position:relative;z-index:2;}/*����ǹؼ�*/
.top:hover,.ww:hover{z-index:3;background:none;}/*û�������IE�в�����*/
.top span,.top p,.ww span,.ww p{display: none;}
.top:hover p,.ww:hover span{display:block;position:absolute;top:0px;right:40px;}
.top:hover span,.ww:hover p{display:block;position:absolute;top:0px;right:0;}
</style>
<div class="righttop">
<div class="tel">
	<a class="tel" href="###"><img src="themes/www_zuimoban_com/images/tel.png" >
	<p><img src="themes/www_zuimoban_com/images/tel1.png"></p>
	<span><img src="themes/www_zuimoban_com/images/tel.jpg"></span></a>
</div>
<div class="qq" >
<?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
     <?php if ($this->_var['im']): ?>
 	<a class="qq" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['im']; ?>&site=qq&menu=yes" target="_blank">
	<img src="themes/www_zuimoban_com/images/qq.png">
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<p><img src="themes/www_zuimoban_com/images/qq1.png"></p>
	<span><img src="themes/www_zuimoban_com/images/qq.jpg"></span></a>
 </div>
<div class="ww">
 <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
 	<a class="ww" href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" target="_blank"><img src="themes/www_zuimoban_com/images/ww.png" >	
	 <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<p><img src="themes/www_zuimoban_com/images/ww1.png"></p>
	<span><img src="themes/www_zuimoban_com/images/ww.jpg"></span></a>
  </div>
<div class="weixin" >
	<a class="tooltips" href="###"><img src="themes/www_zuimoban_com/images/weixin.png">
	<p><img src="themes/www_zuimoban_com/images/weixin1.png"></p>
	<span><img src="themes/www_zuimoban_com/images/weixin.jpg"></span></a>
 </div>
 <div class="shop">
	<a class="shop" href="flows.php"><img src="themes/www_zuimoban_com/images/shop.png" >
	<p><img src="themes/www_zuimoban_com/images/shop2.jpg"></p>
	<span><img src="themes/www_zuimoban_com/images/shop1.png"></span></a>
  </div>
 <div class="top">
	<a class="top" href="#"><img src="themes/www_zuimoban_com/images/top.png"> 
	<p><img src="themes/www_zuimoban_com/images/top2.jpg"></p>
   <span><img src="themes/www_zuimoban_com/images/top1.png"></span></a>
</a>
</div>
</div>



      
       
      

	

