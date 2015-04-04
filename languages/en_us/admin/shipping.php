<?php

/**
 * ECSHOP Mangement center shipping method management language file
 * ============================================================================
 * All right reserved (C) 2005-2007 Beijing Yi Shang Interactive Technology
 * Development Ltd.
 * Web site: http://www.ecshop.com
 * ----------------------------------------------------------------------------
 * This is a free/open source software；it mean that you can modify, use and
 * republish the program code, on the premise of that your behavior is not for
 * commercial purposes.
 * ============================================================================
 * $Author: zblikai $
 * $Id: shipping.php 15646 2009-02-23 08:33:00Z zblikai $
*/

$_LANG['shipping_name'] = 'Name';
$_LANG['shipping_version'] = 'Version';
$_LANG['shipping_desc'] = 'Description';
$_LANG['shipping_author'] = 'Author';
$_LANG['insure'] = 'Insurance';
$_LANG['support_cod'] = 'COD?';
$_LANG['shipping_area'] = 'Config area';
$_LANG['shipping_print_edit'] = 'Edit print template';
$_LANG['shipping_print_template'] = 'Express a single template';
$_LANG['shipping_template_info'] = 'Order template variable description:<br/>{$shop_name}Shop name express<br/>{$province}Shop express their respective provinces<br/>{$city}Shop express-owned urban<br/>{$shop_address}Express Shop Address<br/>{$service_phone}Express Shop top<br/>{$order.order_amount}Express orders<br/>{$order.region}Express the recipient area<br/>{$order.tel}That the recipient phone<br/>{$order.mobile}Express the recipient mobile phone<br/>{$order.zipcode}Recipient express Zip<br/>{$order.address}Express the full address of the recipient<br/>{$order.consignee}Express the recipient name<br/>{$order.order_sn}Express order number';

/* Memu */
$_LANG['shipping_install'] = 'Install shipping method';
$_LANG['install_succeess'] = 'Shipping method %s install successfully!';

/* Prompting message */
$_LANG['no_shipping_name'] = 'Sorry, shipping method name can\'t be blank.';
$_LANG['no_shipping_desc'] = 'Sorry, shipping method description can\'t be blank.';
$_LANG['repeat_shipping_name'] = 'Sorry, the shipping method already exists.';
$_LANG['uninstall_success'] = 'Shipping method %s has uninstall successfully.';
$_LANG['add_shipping_area'] = 'Creat new shipping area for shipping method';
$_LANG['no_shipping_insure'] = 'Sorry, insurance money can\'t be blank, if you don\'t use it please config as 0.';
$_LANG['not_support_insure'] = 'The shipping method isn\t support insure, config insure cost has failed.';
$_LANG['invalid_insure'] = 'Shipping insurance money is invalid.';
$_LANG['no_shipping_install'] = 'Distribution means that you have not installed temporarily can not edit template';
$_LANG['edit_template_success'] = 'Express has been successfully edit the template.';

/* JS language item */
$_LANG['js_languages']['lang_removeconfirm'] = 'Are you sure uninstall the shipping method?';
$_LANG['js_languages']['shipping_area'] = 'Config area';

?>