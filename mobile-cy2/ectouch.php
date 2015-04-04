<?php

/**
 * EcTouch 内容展示页
 * ============================================================================
 * * 版权所有 2014 上海商创网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: wanganlin $
 * $Id: ectouch.php 17217 2014-02-19 06:29:08Z wanganlin $
*/

define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/include/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */

$action = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'default';

/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

/* 公司简介+联系我们 */
if($_REQUEST['act'] == 'contact'){
	assign_template();
        /* 关于我们 文章详情 */
        $article = get_article_info(5);
        $smarty->assign('article', $article);
	$smarty->assign('action',     $action);
	$smarty->display('ectouch.dwt');
}

/* 分享页 */
elseif($_REQUEST['act'] == 'share'){
	assign_template();
	$smarty->assign('HTTP_REFERER',     $_SERVER['HTTP_REFERER']);
	$smarty->assign('action',     $action);
	$smarty->display('ectouch.dwt');
}

/* 地图页 */
elseif($_REQUEST['act'] == 'map'){
	
	$smarty->assign('action',     $action);
	$smarty->display('ectouch.dwt');
}

/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */

/**
 * 获得指定的文章的详细信息
 *
 * @access  private
 * @param   integer     $article_id
 * @return  array
 */
function get_article_info($article_id)
{
    /* 获得文章的信息 */
    $sql = "SELECT a.*, IFNULL(AVG(r.comment_rank), 0) AS comment_rank ".
            "FROM " .$GLOBALS['ecs']->table('article'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ecs']->table('comment'). " AS r ON r.id_value = a.article_id AND comment_type = 1 ".
            "WHERE a.is_open = 1 AND a.article_id = '$article_id' GROUP BY a.article_id";
    $row = $GLOBALS['db']->getRow($sql);

    if ($row !== false)
    {
        $row['comment_rank'] = ceil($row['comment_rank']);                              // 用户评论级别取整
        $row['add_time']     = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']); // 修正添加时间显示

        /* 作者信息如果为空，则用网站名称替换 */
        if (empty($row['author']) || $row['author'] == '_SHOPHELP')
        {
            $row['author'] = $GLOBALS['_CFG']['shop_name'];
        }
    }

    return $row;
}
?>