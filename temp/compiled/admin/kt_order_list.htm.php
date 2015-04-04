<!-- $Id: bonus_type.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<form action="kt_card.php" method="post" name="theForm" enctype="multipart/form-data">
<h1>储值卡序号:<input type='text' name='keywords' maxlength="30" value="" size='20' /><input type="submit" value="查询" class="button" /></h1>
<input type="hidden" name="act" value="order" />
</form>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<!-- start bonus_type list -->
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>编号</th>
      <th>订单号</th>
      <th>订单总价</th>
      <th>超出价格</th>
      <th>余额送礼</th>
      <th>联系人</th>
      <th>特殊要求备注</th>
      <th>创建时间</th>
      <th>订单状态</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');if (count($_from)):
    foreach ($_from AS $this->_var['type']):
?>
    <tr>
      <td align="center" class="first-cell"><span><?php echo $this->_var['type']['order_id']; ?></span></td>
      <td align="center"><?php echo $this->_var['type']['order_sn']; ?></td>
      <td align="center"><?php echo $this->_var['type']['order_fee']; ?></td>
      <td align="center"><?php echo $this->_var['type']['order_exc']; ?></td>
      <td align="center"><?php if ($this->_var['type']['order_clr'] == 0): ?>否<?php else: ?>价值:<?php echo $this->_var['type']['order_clr']; ?>元<?php endif; ?></td>
      <td align="center">联系人:<?php echo $this->_var['type']['order_user']; ?>&nbsp电话:<?php echo $this->_var['type']['order_tel']; ?>&nbsp<?php echo $this->_var['type']['order_phone']; ?><br />地址:<?php echo $this->_var['type']['order_address']; ?>&nbsp配送时间:<?php echo $this->_var['type']['shipping_time']; ?></td>
      <td align="center"><?php echo $this->_var['type']['order_bak']; ?></td>
      <td align="center"><?php echo $this->_var['type']['order_time']; ?></td>
      <td align="center">
        <a href="kt_card.php?act=order_status&id=<?php echo $this->_var['type']['order_id']; ?>&stat=<?php echo $this->_var['type']['order_status']; ?>"><?php if ($this->_var['type']['order_status'] == 0): ?>正常<?php elseif ($this->_var['type']['order_status'] == 1): ?>确认<?php elseif ($this->_var['type']['order_status'] == 2): ?>配送<?php elseif ($this->_var['type']['order_status'] == 3): ?>完成<?php endif; ?></a></td>
      <td align="center">
        <a href="kt_card.php?act=order_info&id=<?php echo $this->_var['type']['order_id']; ?>">详情</a> |
        <a href="kt_card.php?act=goods&gid=<?php echo $this->_var['type']['order_goods']; ?>">商品</a> |
        <a href="kt_card.php?act=list&id=<?php echo $this->_var['type']['card_id']; ?>">储值卡</a></td>
    </tr>
      <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
      <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
     <tr>
      <td align="right" nowrap="true" colspan="8"><?php echo $this->fetch('page.htm'); ?></td>
    </tr>
  </table>

<?php if ($this->_var['full_page']): ?>
</div>
</form>
<!-- end bonus_type list -->

<script type="text/javascript" language="JavaScript">
<!--
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  
  onload = function()
  {
     // 开始检查订单
     startCheckOrder();
  }
  
//-->
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>