<?php
header("Content-type:text/html;charset=utf-8");
define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/include/init.php');
require(dirname(__FILE__) . '/include/modules/integrates/saetv2.ex.class.php');

/* 载入语言文件 */
require_once(ROOT_PATH . 'lang/' .$_CFG['lang']. '/user.php');
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} 
	catch (OAuthException $e) {	
	}
}

if ($token) {
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
	
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
	$ms  = $c->home_timeline(); // done
	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信
        // print_r($user_message );
        if(check_thrid_user_exists( $uid )){
         
            //数据表中存在该账户名称
            $sql = "SELECT * FROM ".$GLOBALS['ecs']->table('users')." WHERE sina_weibo_id = ".$uid ;
            $user_info = $GLOBALS['db']->getRow($sql );
            $_SESSION['user_id']   = $user_info['user_id'];
            $_SESSION['user_name'] = $user_info['user_name'];
            $_SESSION['email']     = $user_info['email'];
            ecs_header("Location: user.php");
            exit;
            
        }
        else{
          
            $smarty->assign('uid' , $uid );
            $smarty->assign('user' , $user_message );
            $smarty->display('call_back.dwt');
        }
	
} 
else {
    echo '授权失败';
}
/**
 * 检查数据表中是否存在该微博账户
 * 
 * @param type $uid
 */
function check_thrid_user_exists( $uid ){
    
    $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('users') ." WHERE sina_weibo_id = ".$uid;
   
    return $GLOBALS['db']->getOne( $sql );
    
}
?>
