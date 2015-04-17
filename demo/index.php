<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
	<style type="text/css">
	a{color: #333; text-decoration: none;}
	#daijinka{  width: 600px; margin: 0px auto;   border-collapse:collapse;}
	#daijinka td{ border: #ccc 1px solid; line-height: 30px; height: 30px;}
	</style>
	<script type="text/javascript">
		function editnum  ( obj, num) {
			var _this = $(obj).parents('form');
			var _checkbox = $(obj).parents('tr').find("input[name='goods[]']");
			var _num = $(obj).parent().find(".goods_num");
			var _value = parseInt(_num.val());
			if( num > 0 ){
				_num.val( _value+1 );
				_checkbox.prop("checked",true);
				//提交数据验证
			   $.post( "news.php", _this.serialize(), function(data){
			   		console.log(data)
			   }, "json");
				//
				if( _value >= num ){
					_num.val( num );
					alert('达到商品最大数量') ;
					return false;
				}
			}else{
				if( _value <= 1 ){
				 	_checkbox.prop("checked",false);
					_num.val( 0 );
				}else{
					_num.val( _value-1 );
					_checkbox.prop("checked",true);
				};
			}
		}
	</script>
</head>
<body>
	<form action="news.php" method="post" enctype="multipart/form-data">
		<table id="daijinka">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>数量</td>
				<td>操作</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="goods[]" value="10"/></td>
				<td></td>
				<td>
					<a href="javascript:;" onclick="editnum( this, 0)">-</a>
					<input type="text" class='goods_num' name="goods_num[10]" style="width:30px;" value="0"/>
					<a href="javascript:;" onclick="editnum( this, 5 )">+</a>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="goods[]" value="11"/></td>
				<td></td>
				<td>
					<a href="javascript:;" onclick="editnum( this, 0 )">-</a>
					<input type="text" class='goods_num' name="goods_num[11]" style="width:30px;" value="0"/>
					<a href="javascript:;" onclick="editnum( this, 5 )">+</a>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="goods[]" value="12"/></td>
				<td></td>
				<td>
					<a href="javascript:;" onclick="editnum( this, 0 )">-</a>
					<input type="text" class='goods_num' name="goods_num[12]" style="width:30px;" value="0"/>
					<a href="javascript:;" onclick="editnum( this, 5 )">+</a>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="goods[]" value="13"/></td>
				<td></td>
				<td>
					<a href="javascript:;" onclick="editnum( this, 0 )">-</a>
					<input type="text" class='goods_num' name="goods_num[13]" style="width:30px;" value="0"/>
					<a href="javascript:;" onclick="editnum( this, 5 )">+</a>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="goods[]" value="14"/></td>
				<td></td>
				<td>
					<a href="javascript:;" onclick="editnum( this, 0 )">-</a>
					<input type="text" class='goods_num' name="goods_num[14]" style="width:30px;" value="0"/>
					<a href="javascript:;" onclick="editnum( this, 5 )">+</a>
				</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4"><input type="submit" value="提交" /></td>
			</tr>
		</table>		
	</form>
</body>
</html>