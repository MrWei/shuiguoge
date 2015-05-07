<!-- $Id: bonus_type_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<?php echo $this->fetch('pageheader.htm'); ?>
<div class="main-div">
<form action="kt_card.php" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table width="100%">
	<tr>
    <td class="label">初始化代金卡金额</td>
    <td>
      <input type='text' name='card_type' maxlength="30" value="<?php echo $this->_var['card']['card_type']; ?>" size='20' />    </td>
  </tr>
<tr>
    <td class="label">是否激活</td>
    <td><input type="radio" name="status" <?php if ($this->_var['card']['status']): ?> checked='checked' <?php endif; ?> value="1">是
      <input type="radio" name="status" <?php if (! $this->_var['card']['status']): ?> checked='checked' <?php endif; ?> value="0">否</td>
  </tr>
  <tr>
    <td class="label">发卡时间</td>
    <td><input name="send_time" type="text" id="send_time" size="22" value=''
     readonly="readonly" /><input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('send_time', '%Y-%m-%d', false, false, 'selbtn1');" value="<?php echo $this->_var['lang']['btn_select']; ?>" class="button"/>
</td>
  </tr>
  <tr>
    <td class="label">过期时间</td>
    <td><input name="pass_time" type="text" id="pass_time" size="22" value=''
     readonly="readonly" /><input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('pass_time', '%Y-%m-%d', false, false, 'selbtn1');" value="<?php echo $this->_var['lang']['btn_select']; ?>" class="button"/>
</td>
  </tr>
  <tr>
    <td class="label">领卡人</td>
    <td><input name="owner" type="text" value='<?php echo $this->_var['card']['owner']; ?>' /></td>
  </tr>
  <tr>
    <td class="label">使用人</td>
    <td><input name="used_name" type="text" value='<?php echo $this->_var['card']['used_name']; ?>' /></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value="修改" class="button" />
      <input type="hidden" name="sendtime" value="<?php echo $this->_var['card']['send_time']; ?>" />
      <input type="hidden" name="passtime" value="<?php echo $this->_var['card']['pass_time']; ?>" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />
      <input type="hidden" name="id" value="<?php echo $this->_var['card']['card_id']; ?>" />
    </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="javascript">
<!--
document.forms['theForm'].elements['type_name'].focus();
/**
 * 检查表单输入的数据
 */
function validate()
{
  validator = new Validator("theForm");
  validator.required("card_type",         "金额为空");

  return validator.passed();
}
onload = function()
{
  
  get_value = '<?php echo $this->_var['bonus_arr']['send_type']; ?>';
  

  showunit(get_value)
  // 开始检查订单
  startCheckOrder();
}
/* 红包类型按订单金额发放时才填写 */
function gObj(obj)
{
  var theObj;
  if (document.getElementById)
  {
    if (typeof obj=="string") {
      return document.getElementById(obj);
    } else {
      return obj.style;
    }
  }
  return null;
}

function showunit(get_value)
{
  gObj("1").style.display =  (get_value == 2) ? "" : "none";
  document.forms['theForm'].elements['selbtn1'].disabled  = (get_value != 1 && get_value != 2);
  document.forms['theForm'].elements['selbtn2'].disabled  = (get_value != 1 && get_value != 2);

  return;
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
