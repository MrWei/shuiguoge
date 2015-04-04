 
 <script type="text/javascript" src="themes/www_zuimoban_com/js/jquery-1.4.2.min.js"></script>
<script src="themes/www_zuimoban_com/js/organictabs.jquery.js"></script>
<script>
$(function() {

	$("#example-one").organicTabs();
	
});
</script>
<style>
a{text-decoration:none;}
a:focus{outline:0;}
.bottom{width:990px;margin:0 auto;margin-top:40px;background:#fff;}
/* Generic Utility */
.hide{position:absolute;top:-9999px;left:-9999px;}
#example-one .nav{overflow:hidden;margin:0 0 10px 20px;}
#example-one .nav li{width:120px;float:left;margin:15px 20px 0 0;}
#example-one .nav li.last{margin-right:0;}
#example-one .nav li a{display:block;padding:5px;background:#FE4902;color:white;font-size:15px;text-align:center;border:0;height:30px;line-height:30px;}
#example-one .nav li a:hover{background-color:#3ca30a;}

#example-one ul{list-style:none;}
#example-one ul li a{display:block;border-bottom:1px solid #666;padding:4px;color:#666;}
#example-one ul li a:hover{background:#FE4902;color:white;}
#example-one ul li:last-child a{border:none;}

#example-one ul li.nav-one a.current, #example-one ul.featured li a:hover{background-color:#0575f4;color:white;}
#example-one ul li.nav-two a.current, #example-one ul.core li a:hover{background-color:#0575f4;color:white;}
#example-one ul li.nav-three a.current, #example-one ul.jquerytuts li a:hover{background-color:#0575f4;color:white;}
#example-one ul li.nav-four a.current, #example-one ul.classics li a:hover{background-color:#0575f4;color:white;}

 </style>
<div class="bottom" >
  <div id="example-one">
	<ul class="nav">
		<li class="nav-one"><a href="#featured" class="current">安全监测</a></li>
		<li class="nav-two"><a href="#core">冷链物流</a></li>
		<li class="nav-three"><a href="#jquerytuts">全球精选</a></li>
		<li class="nav-four last"><a href="#classics">售后服务</a></li>
	</ul>
	<img src="themes/www_zuimoban_com/images/bottom/tou.jpg">
   <div class="list-wrap">		
		<ul id="featured"><li><img src="themes/www_zuimoban_com/images/bottom/2.jpg"></li></ul>
		
 		<ul id="core" class="hide"><li><img src="themes/www_zuimoban_com/images/bottom/1.jpg"></li></ul>
		
		<ul id="jquerytuts" class="hide"><li><img src="themes/www_zuimoban_com/images/bottom/0.jpg"></li></ul>
		
		<ul id="classics" class="hide"><li><img src="themes/www_zuimoban_com/images/bottom/3.jpg"></li></ul>
     </div> 
	</div>
</div>
