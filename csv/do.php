<?php


$action = $_GET['action'];
if ($action == 'import') { //导入CSV
	$filename = $_FILES['file']['tmp_name'];
	if (empty ($filename)) {
		echo '请选择要导入的CSV文件！';
		exit;
	}
	$handle = fopen($filename, 'r');
	$result = input_csv($handle); //解析csv
	$len_result = count($result);
	if($len_result==0){
		echo '没有任何数据！';
		exit;
	}
	for ($i = 1; $i < $len_result; $i++) { //循环获取各字段值
		$typeid = $result [$i] [0];
		$cardSN = $result[$i][1];
		$cardPWD = $result[$i][2];
		$sendTime = strtotime($result[$i][3]);
		$passTime = strtotime($result[$i][4]);
		$owner = iconv('gb2312', 'utf-8', $result[$i][5]); //中文转码
		$data_values .= "('$typeid','$cardSN','$cardPWD', '$add_time','$passTime','$sendTime','$owner','$used_time', '$order_id'),";
	}
	$data_values = substr($data_values,0,-1); //去掉最后一个逗号
	fclose($handle); //关闭指针
	
	echo "insert into student (name,sex,age) values $data_values";
	exit();
} elseif ($action=='export') { //导出CSV
    $result = mysql_query("select * from student");
    $str = "姓名,性别,年龄\n";
    $str = iconv('utf-8','gb2312',$str);
    while($row=mysql_fetch_array($result)){
        $name = iconv('utf-8','gb2312',$row['name']);
        $sex = iconv('utf-8','gb2312',$row['sex']);
    	$str .= $name.",".$sex.",".$row['age']."\n";
    }
    $filename = date('Ymd').'.csv';
    export_csv($filename,$str);
}
function input_csv($handle) {
	$out = array ();
	$n = 0;
	while ($data = fgetcsv($handle, 10000)) {
		$num = count($data);
		for ($i = 0; $i < $num; $i++) {
			$out[$n][$i] = $data[$i];
		}
		$n++;
	}
	return $out;
}

function export_csv($filename,$data) {
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
}
?>
