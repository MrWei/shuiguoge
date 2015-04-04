<?php

/**
 * ECSHOP 管理中心配送方式管理语言文件
 * ============================================================================
 * 版权所有 2005-2008 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: testyang $
 * $Id: shipping.php 15040 2008-10-24 06:52:11Z testyang $
*/

$_LANG['shipping_name'] = '配送方式名称';
$_LANG['shipping_version'] = '插件版本';
$_LANG['shipping_desc'] = '配送方式描述';
$_LANG['shipping_author'] = '插件作者';
$_LANG['insure'] = '保价费用';
$_LANG['support_cod'] = '货到付款？';
$_LANG['shipping_area'] = '设置区域';
$_LANG['shipping_print_edit'] = '编辑打印模板';
$_LANG['shipping_print_template'] = '快递单模板';
$_LANG['shipping_template_info'] = '订单模板变量说明:<br/>{$shop_name}表示网店名称<br/>{$province}表示网店所属省份<br/>{$city}表示网店所属城市<br/>{$shop_address}表示网店地址<br/>{$service_phone}表示网店联系电话<br/>{$order.order_amount}表示订单金额<br/>{$order.region}表示收件人地区<br/>{$order.tel}表示收件人电话<br/>{$order.mobile}表示收件人手机<br/>{$order.zipcode}表示收件人邮编<br/>{$order.address}表示收件人详细地址<br/>{$order.consignee}表示收件人名称<br/>{$order.order_sn}表示订单号';

/* 表单部分 */
$_LANG['shipping_install'] = '安装配送方式';
$_LANG['install_succeess'] = '配送方式 %s 安装成功！';

/* 提示信息 */
$_LANG['no_shipping_name'] = '对不起，配送方式名称不能为空。';
$_LANG['no_shipping_desc'] = '对不起，配送方式描述内容不能为空。';
$_LANG['repeat_shipping_name'] = '对不起，已经存在一个同名的配送方式。';
$_LANG['uninstall_success'] = '配送方式 %s 已经成功卸载。';
$_LANG['add_shipping_area'] = '为该配送方式新建配送区域';
$_LANG['no_shipping_insure'] = '对不起，保价费用不能为空，不想使用请将其设置为0';
$_LANG['not_support_insure'] = '该配送方式不支持保价,保价费用设置失败';
$_LANG['invalid_insure'] = '配送保价费用不是一个合法价格';
$_LANG['no_shipping_install'] = '您的配送方式尚未安装，暂不能编辑模板';
$_LANG['edit_template_success'] = '快递模板已经成功编辑。';

/* JS 语言 */
$_LANG['js_languages']['lang_removeconfirm'] = '您确定要卸载该配送方式吗？';
$_LANG['js_languages']['shipping_area'] = '设置区域';

?>