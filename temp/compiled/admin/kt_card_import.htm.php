<?php echo $this->fetch('pageheader.htm'); ?>
<div id="excel">
    <div class="loading"><img src="images/loading.gif" alt=""></div>
    <div class="form">
    <form id="form" action="kt_card.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="typeid" value="<?php echo $this->_var['typeid']; ?>">
      <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>">
      请选择要导入的CSV文件：<input type="file" name="file" id="file" /> 
      <input type="submit" class="btn" value="导入CSV">
    </form>
    </div>
</div>
<style type="text/css">
  #excel{background: #fff; border: 1px solid #BBDDE5;  height: 250px; position: relative;}
  .tips{width: 100%; margin: 0px auto; margin-top: 70px;   text-align: center; font-size: 16px;}
  .form{width: 600px; margin: 0px auto; margin-top:30px; background: #f1f1f1; border: #ddd 1px solid; padding: 20px;}
  .loading{width: 32px; height: 32px; position: absolute; top: 20px; left: 49%; margin: 0px auto; display: none;}
</style>


