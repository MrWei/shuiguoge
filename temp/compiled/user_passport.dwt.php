<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="themes/www_zuimoban_com/style.css" rel="stylesheet" type="text/css" />
<link href="themes/www_zuimoban_com/base.css" rel="stylesheet" type="text/css" />
<link href="themes/www_zuimoban_com/flow.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js')); ?>
<body>
<div class="utop">
  <div class="ulogo"><a href="index.php"><img src="themes/www_zuimoban_com/images/mclogo.png" alt="logo" /></a></div>
</div>
<div class="uallbg clearfix">
<?php if ($this->_var['action'] == 'login'): ?>
  <div class="block950">
    <div style="padding-top:80px;">
      <div class="usleft"></div>
      <div class="usBox_1 f_r">
        <div class="usBoxtitpl">欢迎您，请登录</div>
        <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
          <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
            <tr>
              <td width="20%" align="right">用户名</td>
              <td width="80%"><input name="username" type="text" size="25" class="inputBg inputBg2" /></td>
            </tr>
            <tr>
              <td align="right">密码</td>
              <td><input name="password" type="password" size="15"  class="inputBg inputBg2"/></td>
            </tr>
			<?php if ($this->_var['enabled_captcha']): ?>
			<tr>
              <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
              <td><input name="captcha" type="text" size="5" style="width:115px"  class="inputBg inputBg2"/>
			  <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" />
			  </td>
            </tr>
			 <?php endif; ?>
            <tr>
              <td align="right"></td>
              <td><input type="checkbox" value="1" name="remember" id="remember" />
                <label for="remember">请保存我这次的登录信息。</label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="left">
			  <input type="hidden" name="act" value="act_login" />
            <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                <input type="submit" name="submit" value="" class="us_Submit" />
				</td>
            </tr>
			<tr>
            <td colspan="2" valign="middle"><table width="360" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td height="30" colspan="4">使用合作网站账号登录：</td>
                </tr>
                <tr>
                  <td><a href="user.php?act=oath&type=qq"><img src="themes/www_zuimoban_com/images/qq_login.gif"/></a>
</td>
                                   <td><a href="user.php?act=oath&type=weibo"><img src="themes/www_zuimoban_com/images/sina_login_logo.gif"/></a>
</td>                  <td><a href="user.php?act=oath&type=alipay"><img src="themes/www_zuimoban_com/images/alipay_login.png"/></a>
</td><td><a href="user.php?act=oath&type=taobao"><img src="themes/www_zuimoban_com/images/taobao_login.gif"/></a>
</td>
                </tr>
              </tbody></table></td>
          </tr>
            <tr>
              <td></td>
              <td><a href="user.php?act=get_password" class="f3">注册邮件找回密码</a></td>
            </tr>
          </table>
        </form>
        <div class="blank"></div>
        <div class="blank"></div>
        <p class="ustopline"><a href="user.php?act=register"><img src="themes/www_zuimoban_com/images/ureg.gif" /></a></p>
      </div>
    </div>
  </div>
<?php endif; ?>

 <?php if ($this->_var['action'] == 'register'): ?>
 <div class="block950">
    <div style="padding-top:80px;">
      <div class="usBox">
        <div class="usBox_2 clearfix">
          <div class="usBoxtit">欢迎加入，请注册 &nbsp;&nbsp;<font class="zc">已有账户？<a href="user.php?act=login" class="regs">现在登陆</a></font></div>
          <form action="user.php" method="post" name="formUser" onsubmit="return register();">
            <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
              <tr>
                <td width="13%" align="right">用户名</td>
                <td width="87%"><input name="username" type="text" size="25" id="username" onblur="is_registered(this.value);" class="inputBg inputBg1"/>
                  <span id="username_notice" style="color:#FF0000"> *</span></td>
              </tr>
              <tr>
                <td align="right">email</td>
                <td><input name="email" type="text" size="25" id="email" onblur="checkEmail(this.value);"  class="inputBg inputBg1"/>
                  <span id="email_notice" style="color:#FF0000"> *</span></td>
              </tr>
              <tr>
                <td align="right">密码</td>
                <td><input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" class="inputBg inputBg1" />
                  <span style="color:#FF0000" id="password_notice"> *</span></td>
              </tr>
              <tr>
                <td align="right">密码强度</td>
                <td><table width="145" border="0" cellspacing="0" cellpadding="1">
                    <tr align="center">
                      <td width="33%" id="pwd_lower">弱</td>
                      <td width="33%" id="pwd_middle">中</td>
                      <td width="33%" id="pwd_high">强</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td align="right">确认密码</td>
                <td><input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);" class="inputBg inputBg1" />
                  <span style="color:#FF0000" id="conform_password_notice"> *</span></td>
              </tr>
			  <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
	<?php if ($this->_var['field']['id'] == 6): ?>
	<?php else: ?>
              <tr>
                <td align="right"  <?php if ($this->_var['field']['is_need']): ?>id="extend_field<?php echo $this->_var['field']['id']; ?>i"<?php endif; ?>><?php echo $this->_var['field']['reg_field_name']; ?></td>
                <td><input name="extend_field<?php echo $this->_var['field']['id']; ?>" type="text" size="25" class="inputBg inputBg1" />
                  <?php if ($this->_var['field']['is_need']): ?><span style="color:#FF0000"> *</span><?php endif; ?></td>
              </tr>
			  <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<?php if ($this->_var['enabled_captcha']): ?>
	<tr>
                <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
                <td><input name="captcha" type="text" size="25" class="inputBg inputBg1" style="width:115px" />
                  <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /></td>
              </tr>
			  <?php endif; ?>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input name="agreement" type="checkbox" value="1" checked="checked" />
                  我已看过并接受《<a href="article.php?cat_id=-1" style="color:blue" target="_blank">用户协议</a>》</label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left">
				<input name="act" type="hidden" value="act_register" >
          <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                  <input name="Submit" type="submit" value="" class="us_Submit_reg"></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="actionSub"><a href="user.php?act=login">我已有账号，我要登录</a><br />
                  <a href="user.php?act=get_password">您忘记密码了吗？</a></td>
              </tr>
			  <tr>
         <td>&nbsp;</td>
          <td>
          <a href="user.php?act=oath&type=qq"><img src="themes/www_zuimoban_com/images/qq_login.gif"/></a>&nbsp;&nbsp;
          <a href="user.php?act=oath&type=weibo"><img src="themes/www_zuimoban_com/images/sina_login_logo.gif"/></a>&nbsp;&nbsp;
		  <a href="user.php?act=oath&type=alipay"><img src="themes/www_zuimoban_com/images/alipay_login.png"/></a>&nbsp;&nbsp;
		  <a href="user.php?act=oath&type=taobao"><img src="themes/www_zuimoban_com/images/taobao_login.gif"/></a><br />&nbsp;&nbsp;
          </td>
        </tr>
             </table>
          </form>
        </div>
      </div>
    </div>
  </div>
 <?php endif; ?>
 
 <?php if ($this->_var['action'] == 'get_password'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
	<div class="block950">
    <div style="padding-top:80px;">
      <div class="usBox">
        <div class="usBox_2 clearfix">
          <div class="usBoxtit">找回密码,请输入用户名和EMAIL</div>
           <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
            <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
              <tr>
                <td width="13%" align="right">用户名</td>
                <td width="87%"><input name="user_name" type="text" size="25" id="user_name"class="inputBg inputBg1"/>
                  <span id="username_notice" style="color:#FF0000"> *</span></td>
              </tr>
              <tr>
                <td align="right">email</td>
                <td><input name="email" type="text" size="25" id="email" class="inputBg inputBg1"/>
                  <span id="email_notice" style="color:#FF0000"> *</span></td>
              </tr>
             
              <tr>
                <td>&nbsp;</td>
                <td align="left">
				<input type="hidden" name="act" value="send_pwd_email" />
                  <input name="Submit" type="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue"></td>
              </tr>
              
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
<?php endif; ?>

<?php if ($this->_var['action'] == 'reset_password'): ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
	<div class="block950">
    <div style="padding-top:80px;">
      <div class="usBox">
        <div class="usBox_2 clearfix">
          <div class="usBoxtit">请输入你的新密码</div>
           <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
            <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
              <tr>
                <td width="13%" align="right"><?php echo $this->_var['lang']['new_password']; ?></td>
                <td width="87%"><input name="new_password" type="password" size="25" id="new_password"class="inputBg inputBg1"/>
                  <span id="username_notice" style="color:#FF0000"> *</span></td>
              </tr>
              <tr>
                <td align="right"><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
                <td><input name="confirm_password" type="password" size="25" id="confirm_password" class="inputBg inputBg1"/>
                  <span id="email_notice" style="color:#FF0000"> *</span></td>
              </tr>
             
              <tr>
                <td>&nbsp;</td>
                <td align="left">
				<input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
                  <input name="Submit" type="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue"></td>
              </tr>
              
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>		
   
  <div class="blank"></div>
  <div class="block950 mt30">
    <div class="tc"> <?php echo $this->_var['copyright']; ?> </div>
  </div>
</div>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</body>

</html>
