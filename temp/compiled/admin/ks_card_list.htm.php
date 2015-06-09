<style type="text/css">
  .search_box{background: #F4FAFB;   border: 1px solid #BBDDE5;   color: #9CACAF;    font-size: 14px;    padding: 7px 10px;    margin: 0 0 10px 0;   overflow: hidden;}
  .fenye{text-align: center; font-size: 12px; color: #335b64}
  .inputSelect{width: 150px}
  .sch-btn{color: #666;font-size: 12px;text-decoration: none;display: block;padding: 2px 10px 2px 10px;border: 1px solid #278296;border-right: 2px solid #278296;border-bottom: 2px solid #278296;}
</style>
<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<!-- 卡搜索开始 -->
<div class="search_box">
<form id="serarch_form">
  <table>
    <tr>
      <td>分类</td>
      <td>
        <select class="inputSelect" name="type_id" id="">
         <option value="0">不限</option>
         <?php $_from = $this->_var['typename']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
         <option  <?php echo $this->_var['vo']['selected']; ?> value="<?php echo $this->_var['vo']['id']; ?>"><?php echo $this->_var['vo']['cat_name']; ?></option>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select></td>
      <td>卡号</td>
      <td><input type="text" name="card_sn" value="<?php echo $this->_var['condition']['card_sn']; ?>"></td>
      <td>状态</td>
      <td><select name="status">
        <option value="-1" <?php if ($this->_var['state'] == - 1): ?>selected='selected'<?php endif; ?>>不限</option>
        <option value="0" <?php if ($this->_var['state'] == 0): ?>selected='selected'<?php endif; ?>>未激活</option>
        <option value="1" <?php if ($this->_var['state'] == 1): ?>selected='selected'<?php endif; ?>>已激活</option>
      </select></td>
      <td>时间</td>
      <td>
        <select name="sch_time" id="">
          <option value="0" <?php if ($this->_var['schtime'] == 0): ?>selected='selected'<?php endif; ?>>不限</option>
          <option value="1" <?php if ($this->_var['schtime'] == 1): ?>selected='selected'<?php endif; ?>>近一个月</option>
          <option value="2" <?php if ($this->_var['schtime'] == 2): ?>selected='selected'<?php endif; ?>>近三个月</option>
          <option value="3" <?php if ($this->_var['schtime'] == 3): ?>selected='selected'<?php endif; ?>>近半年</option>
        </select>
      </td>
      <td>领卡人</td>
      <td><input type="text" name="owner" value="<?php echo $this->_var['condition']['owner']; ?>"></td>
      <td>
        <a class="sch-btn" href="javascript:;" id="search" url="ks_card.php?act=list">查询</a></td>
    </tr>
  </table>
</form>
  </div>
  <script type="text/javascript">
  $(function(){
      //搜索功能
      $("#search").click(function(){
        var url = $(this).attr('url');
            var query  = $('#serarch_form').serialize();
            query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
            query = query.replace(/^&/g,'');
            if( url.indexOf('?')>0 ){
                url += '&' + query ;
            }else{
                url += '?' + query ;
            }
        window.location.href = url;
      });
    })
  </script>
  <!-- 卡搜索结束 -->
<!-- start bonus_type list -->
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
<?php endif; ?>
  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>选择</th>
      <th>编号</th>
      <th>水果卡类型</th>
      <th>水果卡序号</th>
      <th>水果卡密码</th>
      <th>创建时间</th>
      <th>过期时间</th>
      <th>发卡时间</th>
      <th>领卡人</th>
      <th>状态</th>
      <th>使用时间</th>
      <th>操作</th>
      <th>使用人</th>
    </tr>
    <?php $_from = $this->_var['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');if (count($_from)):
    foreach ($_from AS $this->_var['type']):
?>
    <tr>
      <td><input type="checkbox" name="ids[]" value="<?php echo $this->_var['type']['id']; ?>"></td>
      <td align="center" class="first-cell"><span><?php echo $this->_var['type']['id']; ?></span></td>
      <td align="center"><?php echo $this->_var['type']['type_name']; ?></td>
      <td align="center"><?php echo $this->_var['type']['card_sn']; ?></td>
      <td align="center"><?php echo $this->_var['type']['card_pwd']; ?></td>
      <td align="center"><?php echo $this->_var['type']['add_time']; ?></td>
      <td align="center"><?php echo $this->_var['type']['pass_time']; ?></td>
      <td align="center"><?php echo $this->_var['type']['send_time']; ?></td>
      <td align="center"><?php echo $this->_var['type']['owner']; ?></td>
      <td align="center"><?php echo $this->_var['type']['status_text']; ?></td>
      <td align="center"><?php if ($this->_var['type']['used_time'] == '0'): ?>未使用<?php else: ?><?php echo $this->_var['type']['used_time']; ?><?php endif; ?></td>
      <td align="center">
      	<?php if ($this->_var['type']['order_id'] != '0'): ?>
        <a href="ks_card.php?act=order&id=<?php echo $this->_var['type']['order_id']; ?>">订单</a> |
        <?php endif; ?>
        <a href="ks_card.php?act=edit_card_type&cid=<?php echo $this->_var['type']['id']; ?>&tid=<?php echo $this->_var['type']['type_id']; ?>">编辑</a> |
        <a href="ks_card.php?act=delsn&amp;id=<?php echo $this->_var['type']['id']; ?>&tid=<?php echo $this->_var['type']['type_id']; ?>">作废</a></td>
       <td align="center"><?php echo $this->_var['type']['used_name']; ?></td> 
    </tr>
      <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
      <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>

  </table>
<?php if ($this->_var['full_page']): ?>
</div>
<h1>
<div class="toolbar">
  <input type="checkbox" onclick="selectOther();">选择
  <span class="action-span">
  	<input type="hidden" name='act' value='<?php echo $this->_var['action']; ?>'>
  	<input type="submit" name='' value='批量设置'>
  </span>
</div>
<div style="clear:both"></div>
</h1>
</form>
<div class="search_box fenye"> <?php echo $this->_var['fenye']; ?></div>
<script type="text/javascript">
$(function(){
  $("input[name='ids[]']").attr('checked',false);
  $(".toolbar input[type='checkbox']").attr('checked',false);
  $(".toolbar input[type='checkbox']").each(function(index){
    $(this).click(function(){
        $(this).prop('checked',true)
       $(this).siblings().prop('checked',false);
    })
  })

})  
</script>
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
