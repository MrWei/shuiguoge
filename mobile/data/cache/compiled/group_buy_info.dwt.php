<?php echo $this->fetch('library/page_header.lbi'); ?> 
<script type="text/javascript" src="__TPL__/js/lefttime.js"></script>
<div class="con">
  <div class="ect-bg">
    <header class="ect-header ect-margin-tb ect-margin-lr text-center icon-write ect-bg"> <a href="javascript:history.go(-1)" class="pull-left ect-icon ect-icon1 ect-icon-history"></a> <span><?php echo $this->_var['lang']['groupbuy_goods_info']; ?></span> <a href="javascript:;"  onClick="openMune()" class="pull-right ect-icon ect-icon1 ect-icon-mune icon-write"></a></header>
    <nav class="ect-nav ect-nav-list" style="display:none;"> <?php echo $this->fetch('library/page_menu.lbi'); ?> </nav>
  </div>
  
  
  <div id="focus" class="focus goods-focus ect-padding-lr ect-margin-tb">
    <div class="hd">
      <ul>
      </ul>
    </div>
    <div class="bd">
      <ul id="Gallery">
        <li><a href="<?php echo $this->_var['gb_goods']['goods_img']; ?>"><img alt="<?php echo $this->_var['gb_goods']['goods_name']; ?>" src="<?php echo $this->_var['gb_goods']['goods_img']; ?>" /></a></li>
      </ul>
    </div>
  </div>
  
  <div class="goods-info ect-padding-tb">
    <section class="ect-margin-tb ect-margin-lr">
      <h4 class="title pull-left" style="position:static;"><?php echo $this->_var['gb_goods']['goods_name']; ?></h4>
      </section>
    <section class="ect-margin-tb ect-margin-lr ">
      <p><span class="pull-left"><?php echo $this->_var['lang']['gb_cur_price']; ?><strong class="ect-colory"><?php echo $this->_var['group_buy']['formated_cur_price']; ?></strong></span><span class="pull-right"><?php echo $this->_var['lang']['sort_sales']; ?>：<?php echo $this->_var['group_buy']['sales_count']; ?> 件</span></p>
       <?php if ($this->_var['cfg']['SHOW_GOODSSN'] && 0): ?>
        <p> <?php echo $this->_var['lang']['goods_sn']; ?><strong><?php echo $this->_var['gb_goods']['goods_sn']; ?></strong></p>
       <?php endif; ?> 
        <?php if ($this->_var['cfg']['GOODS']['BRAND_NAME'] && $this->_var['show_brand'] && 0): ?>
        <p> <?php echo $this->_var['lang']['goods_brand']; ?><strong><?php echo $this->_var['gb_goods']['brand_name']; ?></strong></p>
        <?php endif; ?>
        <?php if ($this->_var['cfg']['SHOW_GOODSWEIGHT'] && 0): ?>
        <p> <?php echo $this->_var['lang']['goods_weight']; ?><strong><?php echo $this->_var['gb_goods']['goods_weight']; ?></strong></p>
       <?php endif; ?> 
        <?php if ($this->_var['group_buy']['deposit'] > 0): ?>
        <p> <?php echo $this->_var['lang']['gb_deposit']; ?><strong><?php echo $this->_var['group_buy']['formated_deposit']; ?></strong></p>
       <?php endif; ?> 
       <?php if ($this->_var['group_buy']['restrict_amount'] > 0): ?>
        <p> <?php echo $this->_var['lang']['gb_restrict_amount']; ?><strong><?php echo $this->_var['group_buy']['restrict_amount']; ?></strong></p>
   <?php endif; ?> 
   <?php if ($this->_var['group_buy']['gift_integral'] > 0): ?>
        <p> <?php echo $this->_var['lang']['gb_gift_integral']; ?><strong><?php echo $this->_var['group_buy']['gift_integral']; ?></strong></p>
       <?php endif; ?> 
       <?php if ($this->_var['group_buy']['status'] == 0): ?>
        <p> <?php echo $this->_var['lang']['gbs_pre_start']; ?></p>
       <?php elseif ($this->_var['group_buy']['status'] == 1): ?>
        <p> <strong id="leftTime" class="price"><?php echo $this->_var['lang']['please_waiting']; ?></strong></p>
        <p> <?php echo $this->_var['lang']['gb_valid_goods']; ?><strong><?php echo $this->_var['group_buy']['valid_goods']; ?></strong></p>
        <?php elseif ($this->_var['group_buy']['status'] == 2): ?>
        <p> <?php echo $this->_var['lang']['gbs_finished']; ?></p><p><?php echo $this->_var['lang']['gb_cur_price']; ?> <strong><?php echo $this->_var['group_buy']['formated_cur_price']; ?></strong></p><p><?php echo $this->_var['lang']['gb_valid_goods']; ?> <strong><?php echo $this->_var['group_buy']['valid_goods']; ?></strong></p>
       <?php elseif ($this->_var['group_buy']['status'] == 3): ?>
        <p> <?php echo $this->_var['lang']['gbs_succeed']; ?>
            <?php echo $this->_var['lang']['gb_final_price']; ?> <strong><?php echo $this->_var['group_buy']['formated_trans_price']; ?></strong><br />
            <?php echo $this->_var['lang']['gb_final_amount']; ?> <strong><?php echo $this->_var['group_buy']['trans_amount']; ?></strong></p>
       <?php elseif ($this->_var['group_buy']['status'] == 4): ?>
        <p> <?php echo $this->_var['lang']['gbs_fail']; ?></p>
       <?php endif; ?>
       <div class="good-info-table">
        	<ul>
            	<li class="ect-diaplay-box "><h4 class="ect-box-flex"><?php echo $this->_var['lang']['gb_ladder_amount']; ?></h4><h4 class="ect-box-flex"><?php echo $this->_var['lang']['gb_ladder_price']; ?></h4></li>
                <?php $_from = $this->_var['group_buy']['price_ladder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <li class="ect-diaplay-box"><span class="ect-box-flex"><?php echo $this->_var['item']['amount']; ?></span><span class="ect-box-flex"><?php echo $this->_var['item']['formated_price']; ?></span></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
    </section>
      <form action="<?php echo url("groupbuy/buy");?>" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
        <input type="hidden" name="valid_goods" value="<?php echo $this->_var['group_buy']['restrict_amount']; ?>" />
        <input type="hidden" name="group_buy_id" value="<?php echo $this->_var['group_buy']['group_buy_id']; ?>" />
      <section class="ect-padding-lr ect-padding-tb goods-option">
        <div class="goods-optionc"> 
          <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');$this->_foreach['spec'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spec']['total'] > 0):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
        $this->_foreach['spec']['iteration']++;
?>
          <div class="goods-option-con"> <span><?php echo $this->_var['spec']['name']; ?>：</span>
            <div class="goods-option-conr"> 
            
              
                        <?php if ($this->_var['spec']['attr_type'] == 1): ?> 
                        <?php if ($this->_var['cfg']['GOODSATTR_STYLE'] == 1): ?> 
                        <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                        <input type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?>/>
                               <label for="spec_value_<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?></label>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                        <?php else: ?>
                        <select name="spec_<?php echo $this->_var['spec_key']; ?>" >
                            <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                            <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </select>
                        <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                        <?php endif; ?> 
                        <?php else: ?> 
                        <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                        <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>"  />
                        <label for="spec_value_<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>]</label>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                        <?php endif; ?> 
            </div>
          </div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        </div>
        <div class="goods-num"> <span class="pull-left"><?php echo $this->_var['lang']['number']; ?>：</span> 
          <div class="input-group pull-left wrap"><span class="input-group-addon sup" onClick="changeNum('1')">-</span>
            <input type="text" class="form-contro form-num"  name="number" id="goods_number" autocomplete="off" value="1" />
            <span class="input-group-addon plus" onClick="changeNum('3')">+</span></div>
        </div>
      </section>
      <div class="ect-padding-lr ect-padding-tb goods-submit">
        <a href="javascript:;" class="btn btn-info ect-btn-info ect-colorf" onClick="document.getElementById('ECS_FORMBUY').submit()"><?php echo $this->_var['lang']['button_buy']; ?></a> 
      </div>
      <div class="tab-info"><?php echo $this->_var['gb_goods']['goods_desc']; ?></div>
    </form>
  </div>
</div>
<?php echo $this->fetch('library/search.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?> 
<script type="text/javascript">
$(function() {
/*判断user-tab内容高度不够时撑开*/
	var user_tab_height = $(".group-buy-infos");
	var window_height = $(window).height()/3;
	user_tab_height.css("min-height",window_height);
});
var gmt_end_time = "<?php echo empty($this->_var['group_buy']['gmt_end_date']) ? '0' : $this->_var['group_buy']['gmt_end_date']; ?>";
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function()
{
  try
  {
    onload_leftTime();
  }
  catch (e)
  {}
}
function changeNum( type ){
	var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
	var valid = document.forms['ECS_FORMBUY'].elements['valid_goods'].value;
    if(type == 1){qty--;}
    if(type == 3){qty++;}
    if(qty <=0 ){qty=1;}
	if(qty > valid){qty--;}
    if(!/^[0-9]*$/.test(qty)){qty = document.getElementById('back_number').value;}
    document.getElementById('goods_number').value = qty;
  }


document.addEventListener('DOMContentLoaded', function(){Code.photoSwipe('a', '#Gallery');}, false);
</script>
</body></html>