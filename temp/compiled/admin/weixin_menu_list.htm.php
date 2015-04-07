<!-- $Id: articlecat_list.htm 17020 2010-01-29 10:18:24Z liuhui $ -->

<?php if ($this->_var['full_page']): ?>

<?php echo $this->fetch('pageheader.htm'); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>



<form method="post" action="" name="listForm">

<!-- start ad position list -->

<div class="list-div" id="listDiv">

<?php endif; ?>



<table width="100%" cellspacing="1" cellpadding="2" id="list-table">

  <tr>

    <th>菜单名称</th>

    <th>菜单类型</th>

    <th>关键词</th>

    <th>排序</th>

    <th>操作</th>

  </tr>

  <?php $_from = $this->_var['articlecat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>

  <tr align="center" class="<?php echo $this->_var['cat']['level']; ?>" id="<?php echo $this->_var['cat']['level']; ?>_<?php echo $this->_var['cat']['cat_id']; ?>">

    <td align="left" class="first-cell nowrap" valign="top" >

      <?php if ($this->_var['cat']['is_leaf'] != 1): ?>

      <img src="images/menu_minus.gif" id="icon_<?php echo $this->_var['cat']['level']; ?>_<?php echo $this->_var['cat']['cat_id']; ?>" width="9" height="9" border="0" style="margin-left:<?php echo $this->_var['cat']['level']; ?>em" onclick="rowClicked(this)" />

      <?php else: ?>

      <img src="images/menu_arrow.gif" width="9" height="9" border="0" style="margin-left:<?php echo $this->_var['cat']['level']; ?>em" />

      <?php endif; ?>

      <span><?php echo htmlspecialchars($this->_var['cat']['cat_name']); ?></span>

    </td>

    <td class="nowrap" align="center" valign="top">

      <?php if ($this->_var['cat']['weixin_type'] == '0'): ?>click类型<?php else: ?><font color=red>view类型</font><?php endif; ?>

    </td>

    <td align="center" valign="top">

      <?php if ($this->_var['cat']['weixin_key']): ?><?php echo htmlspecialchars($this->_var['cat']['weixin_key']); ?><?php else: ?><font color=red><?php echo $this->_var['cat']['links']; ?></font><?php endif; ?>

    </td>

    <td width="10%" align="center" class="nowrap" valign="top"><span onclick="listTable.edit(this, 'edit_sort_order', <?php echo $this->_var['cat']['cat_id']; ?>)"><?php echo $this->_var['cat']['sort_order']; ?></span></td>

    <td width="24%" align="center" class="nowrap" valign="top">

      <a href="weixin_menu.php?act=edit&amp;id=<?php echo $this->_var['cat']['cat_id']; ?>">编辑</a>

      <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['cat']['cat_id']; ?>, '您确认要删除吗？')" title="删除">移除</a>

    </td>

  </tr>

  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  <tr><td colspan=5>

<h1><span class="action-span" style="margin-right:45%;"><a href="weixin_menu_create.php">生成菜单</a></span></h1>

  </td></tr>

</table>



<?php if ($this->_var['full_page']): ?>

</div>

</form>





<script language="JavaScript">

<!--



onload = function()

{

  // 开始检查订单

  startCheckOrder();

}



var imgPlus = new Image();

imgPlus.src = "images/menu_plus.gif";



/**

 * 折叠菜单列表

 */

function rowClicked(obj)

{

   // 当前图像

  img = obj;

  // 取得上二级tr>td>img对象

  obj = obj.parentNode.parentNode;

  // 整个菜单列表表格

  var tbl = document.getElementById("list-table");

  // 当前菜单级别

  var lvl = parseInt(obj.className);

  // 是否找到元素

  var fnd = false;

  var sub_display = img.src.indexOf('menu_minus.gif') > 0 ? 'none' : (Browser.isIE) ? 'block' : 'table-row' ;

  // 遍历所有的菜单

  for (i = 0; i < tbl.rows.length; i++)

  {

      var row = tbl.rows[i];

      if (row == obj)

      {

          // 找到当前行

          fnd = true;

          //document.getElementById('result').innerHTML += 'Find row at ' + i +"<br/>";

      }

      else

      {

          if (fnd == true)

          {

              var cur = parseInt(row.className);

              var icon = 'icon_' + row.id;

              if (cur > lvl)

              {

                  row.style.display = sub_display;

                  if (sub_display != 'none')

                  {

                      var iconimg = document.getElementById(icon);

                      iconimg.src = iconimg.src.replace('plus.gif', 'minus.gif');

                  }

              }

              else

              {

                  fnd = false;

                  break;

              }

          }

      }

  }



  for (i = 0; i < obj.cells[0].childNodes.length; i++)

  {

      var imgObj = obj.cells[0].childNodes[i];

      if (imgObj.tagName == "IMG" && imgObj.src != 'images/menu_arrow.gif')

      {

          imgObj.src = (imgObj.src == imgPlus.src) ? 'images/menu_minus.gif' : imgPlus.src;

      }

  }

}

//-->

</script>





<?php echo $this->fetch('pagefooter.htm'); ?>

<?php endif; ?>