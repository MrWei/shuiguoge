<!-- $Id: bonus_type.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<h1>页码:  <?php echo $this->_var['pages']; ?></h1>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<!-- start bonus_type list -->
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>编号</th>
      <th>礼品卡类型</th>
      <th>礼品卡序号</th>
      <th>礼品卡密码</th>
      <th>创建时间</th>
      <th>使用时间</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');if (count($_from)):
    foreach ($_from AS $this->_var['type']):
?>
    <tr>
      <td align="center" class="first-cell"><span><?php echo $this->_var['type']['id']; ?></span></td>
      <td align="center"><?php echo $this->_var['type']['type_name']; ?></td>
      <td align="center"><?php echo $this->_var['type']['card_sn']; ?></td>
      <td align="center"><?php echo $this->_var['type']['card_pwd']; ?></td>
      <td align="center"><?php echo $this->_var['type']['add_time']; ?></td>
      <td align="center"><?php if ($this->_var['type']['used_time'] == '0'): ?>未使用<?php else: ?><?php echo $this->_var['type']['used_time']; ?><?php endif; ?></td>
      <td align="center">
      	<?php if ($this->_var['type']['order_id'] != '0'): ?>
        <a href="ks_card.php?act=order&id=<?php echo $this->_var['type']['order_id']; ?>">订单</a> |
        <?php endif; ?>
        <a href="ks_card.php?act=edit_card_type&cid=<?php echo $this->_var['type']['id']; ?>&tid=<?php echo $this->_var['type']['type_id']; ?>">编辑</a> |
        <a href="ks_card.php?act=delsn&amp;id=<?php echo $this->_var['type']['id']; ?>&tid=<?php echo $this->_var['type']['type_id']; ?>">作废</a></span></td>
    </tr>
      <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
      <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>

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