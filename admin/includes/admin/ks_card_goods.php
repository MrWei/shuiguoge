<?php

/**
 * ECSHOP 红包类型的处理
 * ============================================================================
 * 版权所有 2005-2008 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: sunxiaodong $
 * $Id: bonus.php 15589 2009-02-10 09:24:05Z sunxiaodong $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

/* act操作项的初始化 */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'cat';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/* 初始化$exc对象 */
$exc = new exchange($ecs->table('bonus_type'), $db, 'type_id', 'type_name');


/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'query')
{
	  $type_id     = !empty($_REQUEST['tid'])    ? intval($_REQUEST['tid'])    : 0;
	
    $is_delete = empty($_REQUEST['is_delete']) ? 0 : intval($_REQUEST['is_delete']);
    $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
    $goods_list = goods_list($is_delete, ($code=='') ? 1 : 0);

    $handler_list = array();
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=card', 'title'=>$_LANG['card'], 'img'=>'icon_send_bonus.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=replenish', 'title'=>$_LANG['replenish'], 'img'=>'icon_add.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=batch_card_add', 'title'=>$_LANG['batch_card_add'], 'img'=>'icon_output.gif');

    if (isset($handler_list[$code]))
    {
        $smarty->assign('add_handler',      $handler_list[$code]);
    }

    $smarty->assign('goods_list',   $goods_list['goods']);
    $smarty->assign('filter',       $goods_list['filter']);
    $smarty->assign('record_count', $goods_list['record_count']);
    $smarty->assign('page_count',   $goods_list['page_count']);
    $smarty->assign('list_type',    $is_delete ? 'trash' : 'goods');
    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);
    

    /* 排序标记 */
    $sort_flag  = sort_flag($goods_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    $smarty->assign('type_id',     $type_id);

    $tpl = $is_delete ? 'ks_card_goods_list.htm' : 'ks_card_goods_list.htm';

    make_json_result($smarty->fetch($tpl), '',
        array('filter' => $goods_list['filter'], 'page_count' => $goods_list['page_count']));
}

/*------------------------------------------------------ */
//-- 添加水果卡配备商品
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'goods')
{
    check_authz_json('card_and_card');

    /* 初始化数据 */
    $type_id     = !empty($_REQUEST['tid'])    ? intval($_REQUEST['tid'])    : 0;
    
    $cat_id = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
    $code   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);

    $handler_list = array();
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=card', 'title'=>$_LANG['card'], 'img'=>'icon_send_bonus.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=replenish', 'title'=>$_LANG['replenish'], 'img'=>'icon_add.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=batch_card_add', 'title'=>$_LANG['batch_card_add'], 'img'=>'icon_output.gif');

    if ($_REQUEST['act'] == 'list' && isset($handler_list[$code]))
    {
        $smarty->assign('add_handler',      $handler_list[$code]);
    }

    /* 模板赋值 */
    $goods_ur = array('' => $_LANG['01_goods_list'], 'virtual_card'=>$_LANG['50_virtual_card_list']);
    $ur_here = '添加水果卡关联商品';
    $smarty->assign('ur_here', $ur_here);

    $action_link2  = array('href' => "ks_card_goods.php?act=goods&tid=$type_id", 'text' => '添加关联商品');
    $action_link = array('href' => "ks_card_goods.php?act=vgoods&tid=$type_id", 'text' => '已加关联商品');
    
    $smarty->assign('action_link',  $action_link);
    $smarty->assign('action_link2',  $action_link2);
    $smarty->assign('code',     $code);
    $smarty->assign('cat_list',     cat_list(0, $cat_id));
    $smarty->assign('brand_list',   get_brand_list());
    $smarty->assign('intro_list',   get_intro_list());
    $smarty->assign('lang',         $_LANG);
    $smarty->assign('list_type',    $_REQUEST['act'] == 'list' ? 'goods' : 'trash');
    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);

    $goods_list = goods_list($_REQUEST['act'] == 'goods' ? 0 : 1, ($_REQUEST['act'] == 'goods') ? (($code == '') ? 1 : 0) : -1);
    $smarty->assign('goods_list',   $goods_list['goods']);
    $smarty->assign('filter',       $goods_list['filter']);
    $smarty->assign('record_count', $goods_list['record_count']);
    $smarty->assign('page_count',   $goods_list['page_count']);
    $smarty->assign('full_page',    1);

    /* 排序标记 */
    $sort_flag  = sort_flag($goods_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);
    
    $smarty->assign('type_id',     $type_id);

    /* 显示商品列表页面 */
    assign_query_info();
    $smarty->display('ks_card_goods_list.htm');
    
  
}

/*------------------------------------------------------ */
//-- 关联商品的处理
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'addgood')
{
    /* 初始化变量 */
    
    $good_id   = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    $type_id   = !empty($_REQUEST['tid']) ? intval($_REQUEST['tid']) : 0;


    /* 检查类型是否有重复 
    $sql = "SELECT COUNT(*) FROM " .$ecs->table('bonus_type'). " WHERE type_name='$type_name'";
    if ($db->getOne($sql) > 0)
    {
        $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
        sys_msg($_LANG['type_name_exist'], 0, $link);
    }*/


    /* 插入数据库。 */
    $sql = "INSERT INTO ".$ecs->table('ks_cardgoods')." (cg_catid, cg_goodid)
    VALUES ('$type_id',
            '$good_id')";

    $db->query($sql);
    
    /* 记录管理员操作 */
//    admin_log($_POST['type_name'], 'add', 'bonustype');

    /* 清除缓存 */
    clear_cache_files();

    /* 提示信息 */
    $link[0]['text'] = '已经关联商品列表';
    $link[0]['href'] = "ks_card_goods.php?act=vgoods&tid=$type_id";

    $link[1]['text'] = '选择关联商品列表';
    $link[1]['href'] = "ks_card_goods.php?act=goods&tid=$type_id";

    sys_msg($_LANG['add'] . "&nbsp;" .$_POST['type_name'] . "&nbsp;" . $_LANG['attradd_succed'],0, $link);

}

/*------------------------------------------------------ */
//-- 已关联商品
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'vgoods')
{
    check_authz_json('card_and_card');

    /* 初始化数据 */
    $type_id     = !empty($_REQUEST['tid'])    ? intval($_REQUEST['tid'])    : 0;
    
    $cat_id = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
    $code   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);

    $handler_list = array();
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=card', 'title'=>$_LANG['card'], 'img'=>'icon_send_bonus.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=replenish', 'title'=>$_LANG['replenish'], 'img'=>'icon_add.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=batch_card_add', 'title'=>$_LANG['batch_card_add'], 'img'=>'icon_output.gif');

    if ($_REQUEST['act'] == 'list' && isset($handler_list[$code]))
    {
        $smarty->assign('add_handler',      $handler_list[$code]);
    }

    /* 模板赋值 */
    $goods_ur = array('' => $_LANG['01_goods_list'], 'virtual_card'=>$_LANG['50_virtual_card_list']);
    $ur_here = '已加关联商品';
    $smarty->assign('ur_here', $ur_here);

    $action_link2  = array('href' => "ks_card_goods.php?act=goods&tid=$type_id", 'text' => '添加关联商品');
    $action_link = array('href' => "ks_card_goods.php?act=vgoods&tid=$type_id", 'text' => '已加关联商品');
    
    $smarty->assign('action_link',  $action_link);
    $smarty->assign('action_link2',  $action_link2);
    $smarty->assign('code',     $code);
    $smarty->assign('lang',         $_LANG);
    $smarty->assign('list_type',    $_REQUEST['act'] == 'list' ? 'goods' : 'trash');
    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);

    $goods_list = vgoods_list($type_id);
    $smarty->assign('goods_list',   $goods_list);
    $smarty->assign('full_page',    1);

    /* 排序标记 */
    $sort_flag  = sort_flag($goods_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);
    
    $smarty->assign('type_id',     $type_id);

    /* 显示商品列表页面 */
    assign_query_info();
    $smarty->display('ks_card_vgoods_list.htm');
    
}

/*------------------------------------------------------ */
//-- 删除关联商品
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'delgood')
{
    check_authz_json('card_and_card');

    $id          = intval($_GET['id']);
    $type_id     = intval($_GET['tid']);

 //   $exc->drop($id);


    /* 删除用户的红包 */
    $db->query("DELETE FROM " .$ecs->table('ks_cardgoods'). " WHERE cg_id = '$id'");

    $url = "ks_card_goods.php?act=vgoods&tid=$type_id";

    ecs_header("Location: $url\n");
    exit;
}


/**
 * 取得推荐类型列表
 * @return  array   推荐类型列表
 */
function get_intro_list()
{
    return array(
        'is_best'    => '精品',
        'is_new'     => '新品',
        'is_hot'     => '热销',
        'is_promote' => '特价',
        'all_type' => '全部推荐',
    );
}

/**
 * 获得商品列表
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goods
 * @return  array
 */
function goods_list($is_delete, $real_goods=1)
{
    /* 过滤条件 */
    $param_str = '-' . $is_delete . '-' . $real_goods;
    $result = get_filter($param_str);
    if ($result === false)
    {
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);

        $filter['cat_id']           = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        $filter['intro_type']       = empty($_REQUEST['intro_type']) ? '' : trim($_REQUEST['intro_type']);
        $filter['is_promote']       = empty($_REQUEST['is_promote']) ? 0 : intval($_REQUEST['is_promote']);
        $filter['stock_warning']    = empty($_REQUEST['stock_warning']) ? 0 : intval($_REQUEST['stock_warning']);
        $filter['brand_id']         = empty($_REQUEST['brand_id']) ? 0 : intval($_REQUEST['brand_id']);
        $filter['keyword']          = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        if ($_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['sort_by']          = empty($_REQUEST['sort_by']) ? 'goods_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order']       = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $filter['extension_code']   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
        $filter['is_delete']        = $is_delete;
        $filter['real_goods']       = $real_goods;

        $where = $filter['cat_id'] > 0 ? " AND " . get_children($filter['cat_id']) : '';

        /* 推荐类型 */
        switch ($filter['intro_type'])
        {
            case 'is_best':
                $where .= " AND is_best=1";
                break;
            case 'is_hot':
                $where .= ' AND is_hot=1';
                break;
            case 'is_new':
                $where .= ' AND is_new=1';
                break;
            case 'is_promote':
                $where .= " AND is_promote = 1 AND promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today'";
                break;
            case 'all_type';
                $where .= " AND (is_best=1 OR is_hot=1 OR is_new=1 OR (is_promote = 1 AND promote_price > 0 AND promote_start_date <= '" . $today . "' AND promote_end_date >= '" . $today . "'))";
        }

        /* 库存警告 */
        if ($filter['stock_warning'])
        {
            $where .= ' AND goods_number <= warn_number ';
        }

        /* 品牌 */
        if ($filter['brand_id'])
        {
            $where .= " AND brand_id='$filter[brand_id]'";
        }

        /* 扩展 */
        if ($filter['extension_code'])
        {
            $where .= " AND extension_code='$filter[extension_code]'";
        }

        /* 关键字 */
        if (!empty($filter['keyword']))
        {
            $where .= " AND (goods_sn LIKE '%" . mysql_like_quote($filter['keyword']) . "%' OR goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%')";
        }

        if ($real_goods > -1)
        {
            $where .= " AND is_real='$real_goods'";
        }

        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('goods'). " AS g WHERE is_delete='$is_delete' $where";
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);

        $sql = "SELECT goods_id, goods_name, goods_sn, shop_price, is_on_sale, is_best, is_new, is_hot, sort_order, goods_number, integral, " .
                    " (promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today') AS is_promote ".
                    " FROM " . $GLOBALS['ecs']->table('goods') . " AS g WHERE is_delete='$is_delete' $where" .
                    " ORDER BY $filter[sort_by] $filter[sort_order] ".
                    " LIMIT " . $filter['start'] . ",$filter[page_size]";

        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql, $param_str);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $row = $GLOBALS['db']->getAll($sql);

    return array('goods' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

/**
 * 获得已关联商品列表
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goods
 * @return  array
 */
function vgoods_list($type_id)
{
	
//    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('ks_cardgoods').
//               " WHERE cg_catid = '$type_id'";
               
      $sql = "SELECT g.goods_id, g.goods_name, g.goods_sn, g.shop_price, g.goods_number, ".
                "c.cg_id, c.cg_catid, c.cg_goodid " .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('ks_cardgoods') . ' AS c ON c.cg_goodid = g.goods_id ' .
            "WHERE c.cg_catid = '$type_id' " .
            'ORDER BY c.cg_id';       
               
               
    $result = $GLOBALS['db']->getAll($sql);
    $goods = array();
    
    foreach ($result AS $idx => $row)
    {
    	
    	  $goods[$idx]['id']           = $row['cg_id'];
        $goods[$idx]['type_id']         = $row['cg_catid'];
        $goods[$idx]['good_id']        = $row['cg_goodid'];
        $goods[$idx]['goods_id']        = $row['goods_id'];
        $goods[$idx]['goods_name']        = $row['goods_name'];
        $goods[$idx]['goods_sn']        = $row['goods_sn'];
        $goods[$idx]['shop_price']        = $row['shop_price'];
        $goods[$idx]['goods_number']        = $row['goods_number'];

    }

return $goods; 

}

?>