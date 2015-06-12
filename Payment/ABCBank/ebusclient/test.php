<?php
$tIniFile = dirname(__FILE__) . '/TrustMerchant.ini';
if( is_file($tIniFile) ){
	
	$data = @ parse_ini_file($tIniFile) ;
	echo "<pre>";
	print_r($data);
}else {
	echo 0;
}