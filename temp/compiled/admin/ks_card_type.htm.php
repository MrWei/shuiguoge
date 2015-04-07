<!-- $Id: bonus_type.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<!-- start bonus_type list -->
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>礼品卡类型</th>
      <th>类型标识</th>
      <th>描述</th>
      <th>可选择数</th>
      <th>发放数量</th>
      <th>使用数量</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');if (count($_from)):
    foreach ($_from AS $this->_var['type']):
?>
    <tr>
      <td class="first-cell"><span><?php echo htmlspecialchars($this->_var['type']['cat_name']); ?></span></td>
      <td><?php echo $this->_var['type']['cat_mark']; ?></td>
      <td><?php echo $this->_var['type']['cat_desc']; ?></td>
      <td align="right"><span><?php echo $this->_var['type']['cat_sgn']; ?></span></td>
      <td align="right"><span><?php echo $this->_var['type']['all_num']; ?></span></td>
      <td align="right"><?php echo $this->_var['type']['ok_num']; ?></td>
      <td align="center">
      	<a href="ks_card.php?act=excel&tid=<?php echo $this->_var['type']['cat_id']; ?>">发放</a> |
        <a href="ks_card_goods.php?act=goods&tid=<?php echo $this->_var['type']['cat_id']; ?>">添加</a> |
        <a href="ks_card_goods.php?act=vgoods&tid=<?php echo $this->_var['type']['cat_id']; ?>">商品</a> |
        <a href="ks_card.php?act=list&amp;tid=<?php echo $this->_var['type']['cat_id']; ?>">卡号</a> |
        <a href="ks_card.php?act=edit&amp;tid=<?php echo $this->_var['type']['cat_id']; ?>">编辑</a> |
        <a href="ks_card.php?act=remove&amp;tid=<?php echo $this->_var['type']['cat_id']; ?>">移除</a></span></td>
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