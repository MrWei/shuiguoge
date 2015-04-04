<span id="append_parent"></span>
<?php if ($this->_var['user_info']): ?>
<font>
<?php echo $this->_var['lang']['hello']; ?>，<font class="f4_b"><?php echo $this->_var['user_info']['username']; ?></font>, <?php echo $this->_var['lang']['welcome_return']; ?>！
<a href="user.php"><?php echo $this->_var['lang']['user_center']; ?></a>|
 <a href="user.php?act=logout"><?php echo $this->_var['lang']['user_logout']; ?></a>
</font>
<?php else: ?>
 <a href="user.php">登录</a> / <a href="user.php?act=register">注册</a>
 <a href="user.php?act=oath&type=qq"><img src="themes/www_zuimoban_com/images/qq_logins_24.png"></a>
<a href="user.php?act=oath&type=weibo"><img src="themes/www_zuimoban_com/images/sina_login_logo.gif"></a>
<a href="user.php?act=oath&type=alipay"><img src="themes/www_zuimoban_com/images/alipay_login_20.png"></a>
<a href="user.php?act=oath&type=taobao"><img src="themes/www_zuimoban_com/images/taobao_login_logo.gif"></a>
<?php endif; ?>