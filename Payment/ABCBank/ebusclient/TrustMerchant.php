<?php
return array(
	'TrustPayConnectMethod' => 'https',
	'TrustPayServerName' => 'pay.abchina.com',
	'TrustPayServerPort' => 443,
	'TrustPayNewLine' => 2,
	'TrustPayTrxURL' => '/ebus/trustpay/ReceiveMerchantTrxReqServlet',
	'TrustPayIETrxURL' => 'https://pay.abchina.com/ebus/ReceiveMerchantIERequestServlet',
	//需配置
	'MerchantErrorURL' => 'http://www.meiguoyuan.net/abc/demo/MerchantIEFailure.php',
	'TrustPayCertFile' => 'D:\Server\www\abc\abc\cert\TrustPay.cer',
	'MerchantID' => '103881199990104',
	'EnableLog' => 1,
	'LogPath' => 'D:\Server\www\abc\abc\log',
	'MerchantKeyStoreType' => '0',
	'MerchantCertFile' => 'D:\Server\www\abc\abc\cert\103881199990104.pfx',
	'MerchantCertPassword' => '87654321',
	'SignServerIP' => '',//如果使用签名服务器，请在此设定签名服务器的IP,
	'SignServerPort' => '',//如果使用签名服务器，请在此设定签名服务器的端口号,
	'SignServerPassword' => '' //如果使用签名服务器，请在此设定签名服务器的密码,
		
);