<div class="footer container">
  <div class="footerup" style="margin-top:30px;">
    <div class="footercont">
	<div style="background:#59ad31;width:100%;height:85px;">
      <ul class="nums clearfix">
        <li class="first"><span>原</span><strong>
          <label>产地</label>
          精选</strong></li>
        <li class="line">|</li>
        <li class="second"><span>原</span><strong>
          <label>生态</label>
          种植</strong></li>
		 <li class="line">|</li>
        <li class="second"><span>原</span><strong>
          <label>味道</label>
          健康</strong></li>
         <li class="line">|</li>
        <li class="third"><span>24</span><strong>
          <label>小时内</label>
          无理由退换货 </strong></li>
       </ul>
	  </div>
      <div class="service clearfix">
	  <?php $_from = get_shop_help(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');if (count($_from)):
    foreach ($_from AS $this->_var['help_cat']):
?>
        <dl>
          <dt><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
		  <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
          <dd><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo $this->_var['item']['short_title']; ?>"><?php echo $this->_var['item']['short_title']; ?></a></dd>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </dl>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <div class="online">
          <ul>
            <li class="item1"><span class="icon-common icon-common-tel"></span><?php echo $this->_var['service_phone']; ?></li>
            <li class="item2"> 周一至周六9:00-18:00 </li>
            <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im_0_00887300_1434074322');if (count($_from)):
    foreach ($_from AS $this->_var['im_0_00887300_1434074322']):
?>
      <?php if ($this->_var['im_0_00887300_1434074322']): ?>
        <li class="item3 clearfix">
      <a class="btn btn-green" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['im_0_00887300_1434074322']; ?>&site=qq&menu=yes" target="_blank"><span class="icon-common icon-common-face"></span>24小时在线客服</a></li>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
  <div class="footerbtm">
    <div class="info"> 
	版权所有：<a href="http://www.mrfruit.net/" target="_blank" title="原味水果系统解决方案服务商">水果哥</a>
	</div>
 <!--  <div class="believe"><img src="themes/www_zuimoban_com/images/f1.gif"><img src="themes/www_zuimoban_com/images/f2.gif"><img src="themes/www_zuimoban_com/images/f3.gif">
 	</div>-->
     </div>
 </div>
 <div style="margin:0 auto;width:100%;text-align:center;"><a href="###">电脑版</a>&nbsp&nbspl&nbsp&nbsp<a href="/mobile">手机版</a><span>
		  <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F6fdf827c32a0c5cb8c5e88cf6ee26622' type='text/javascript'%3E%3C/script%3E"));
</script>
</span></div>
<script type="text/javascript">
   if (Object.prototype.toJSONString){
      var oldToJSONString = Object.toJSONString;
      Object.prototype.toJSONString = function(){
        if (arguments.length > 0){
          return false;
        }else{
          return oldToJSONString.apply(this, arguments);
        }
		}
}
function ResumeError()
{
   return true;
}
window.onerror = ResumeError; 
</script>
 