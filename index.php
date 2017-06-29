<?php
require_once 'include.php';
$cates=getAllCate();
if(!($cates&&is_array($cates))){
    alertMes("网站维护中!","http://www.imooc.com");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>主页</title>
<link rel="stylesheet" href="style/reset.css" type="text/css" />
<link rel="stylesheet" href="style/main.css" type ="text/css" />



</head>
<body>
<div class="header">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="#" class="collection">收藏网站</a>
			</div>
			<div class="rightArea">
				欢迎来到慕课网！<a href="login.php">[登录]</a><a href="register.php">[免费注册]</a>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="慕课网" /></a>
			</div>
			<div class="search_box fl">
				<input type="text" class="search_text fl" />
				<input type="button" class="search_btn fr" value="搜索"/>
			</div>
			<div class="shopCar fr">
				<span class="shopText">购物车</span>
				<span class="shopNum">220</span>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth">
			<div class="shopClass fl">
				<h3>全部商品分类<i></i></h3>
				<div class="shopClass_Show">
					<dl class="shopClass_item shopClass_active"><!-- dl定义列表 dd dt 定义列表中的项目 -->
						<dt><a href="#"class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item"><!-- dl定义列表 dd dt 定义列表中的项目 -->
						<dt><a href="#"class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item"><!-- dl定义列表 dd dt 定义列表中的项目 -->
						<dt><a href="#"class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item"><!-- dl定义列表 dd dt 定义列表中的项目 -->
						<dt><a href="#"class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item"><!-- dl定义列表 dd dt 定义列表中的项目 -->
						<dt><a href="#"class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
				</div>
				<div class="shopClass_List hide">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd><a href="#">文字文字</a><a href="#">文字文</a><a href="#">文字字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">字文字</a></dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd><a href="#">文字文字</a><a href="#">文字文</a><a href="#">文字字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">字文字</a></dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd><a href="#">文字文字</a><a href="#">文字文</a><a href="#">文字字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">字文字</a></dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd><a href="#">文字文字</a><a href="#">文字文</a><a href="#">文字字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">字文字</a></dd>
						</dl><dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd><a href="#">文字文字</a><a href="#">文字文</a><a href="#">文字字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">文字文字</a><a href="#">文字文字</a></dd>
						</dl>
						<div class="shopList_links">
							<a href="#">文字测试内容等等<span></span></a><a href="#">文字测试内容<span></span></a>
						</div>
					</div>
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">数码城</a></li>
				<li><a href="#">天黑黑</a></li>
				<li><a href="#">团购</a></li>
				<li><a href="#">发现</a></li>
				<li><a href="#">二手特卖</a></li>
				<li><a href="#">名品会</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="banner comWidth clearfix">
	<div class="banner_bar banner_big">
		<ul class="imgBox">
			<li><a href="#"><img src="images/banner/banner_01.jpg" alt="banner" /></a></li>
			<li><a href="#"><img src="" alt="banner" /></a></li>
		</ul>
		<div class="imgNum">
			<a href="#"class="active"></a><a href="#"></a>
		</div>
	</div>
</div>
<?php foreach($cates as $cate){?>
<div class="shopTitle comWidth">
	<span class="icon"></span><h3><?php echo $cate['cName'];?></h3><a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
		<ul class="imgBox">
			<li><a href="#"><img src="images/banner/banner_sm_01.jpg" alt="banner" /></a></li>
			<li><a href="#"><img src="images/banner/banner_sm_02.jpg" alt="banner" /></a></li>
		</ul>
		<div class="imgNum">
			<a href="#"class="active"></a><a href="#"></a>
		</div>
	</div>
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
		<?php $cid=$cate['id'];
		      $pros=getProsByCid($cid);
		      //print_r($pros);
		      if($pros&&is_array($pros)){
		          foreach($pros as $pro){
		          $proImg=getproImgById($pro['id']);
		?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetials.php?id=<?php echo $pro['id'];?>" target="_blank"><img width="187px" height="200px" src="image_220/<?php echo $proImg['albumPath'];?>" alt="图片1" /></a>
				</div>
				<h3><?php echo $pro['pName'];?></h3>
				<p><?php echo $pro['mPrice'];?>元</p>
			</div>
			<?php }}?>
		</div>
		<div class="shopList_sm clearfix">
	        <?php $smallPros=getsmallProsById($cate['id']);
	              if($smallPros&&is_array($smallPros)){
	              foreach($smallPros as $smallPro){
	              $proSmallImg=getproImgById($smallPro['id']);
	        ?>
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href="proDetials.php?id=<?php echo $smallPro['id'];?>" target="_blank"><img width="95" height="95" src="image_220/<?php echo $proSmallImg['albumPath'];?>" alt="图片二" /></a>
				</div>
				<div class="shopItem_text">
					<p><?php echo $smallPro['pName'];?></p>
					<h3>￥<?php echo $smallPro['mPrice'];?></h3>
				</div>
			</div>
			<?php }}?>
		</div>
	</div>
</div>
<?php }?>
<div class="footer">
	<p><a href="#">公司简介</a><i>|</i><a href="#">公司公告</a><i>|</i><a href="#">招贤纳士</a><i>|</i><a href="#">联系我们：400-765-1234</a></p>
	<p>Copyright 2014-2020版权所有</p>
	<p><a href=""><img src="images/webLogo.jpg" alt="logo" /></a></p>
</div>
</body>
</html>