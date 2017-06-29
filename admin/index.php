<?php
require_once '../include.php';
checkLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DS</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">慕课电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">慕课</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>
        <div class="link fr">
            <b>欢迎您
            <?php
 //echo $_SESSION['adminName'];当设置了cookie的时候就Notice: Undefined index: adminName需要用下边的方法，原因是什么，他们两者有冲突吗？
               if(isset($_SESSION['adminName'])){
                    echo $_SESSION['adminName'];
                }elseif(isset($_COOKIE['adminName'])){
                    echo $_COOKIE['adminName'];//之前这里写成了adminNmae,一定要记住这个常犯的错误
                }

            ?>
            </b><a href="index.php" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
                <!-- 嵌套网页开始 -->
                    <iframe src="main.php" name="mainFrame" width="100%" height="552px"></iframe>
                <!-- 嵌套网页结束 -->
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><input type="button" id="change1" onclick="show('menu1','change1')" value="+" /><label for="change1">&nbsp;&nbsp;商品管理</label></h3>
                        <dl id="menu1" style="display:none;">
                            <dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                            <dd><a href="listPro.php" target="mainFrame">商品列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><input type="button" id="change2" onclick="show('menu2','change2')" value="+" /><label for="change2">&nbsp;&nbsp;订单管理</label></h3>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="#">订单修改</a></dd>
                            <dd><a href="#">订单又修改</a></dd>
                            <dd><a href="#">订单总是修改</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><input type="button" id="change3" onclick="show('menu3','change3')" value="+" /><label for="change3">&nbsp;&nbsp;分类管理</label></h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                            <!-- 在name="mainFranme"的框架中打开该标签 -->
                        </dl>
                    </li>
                    <li>
                        <h3><input type="button" id="change4" onclick="show('menu4','change4')" value="+" /><label for="change4">&nbsp;&nbsp;管理员管理</label></h3>
                        <dl id="menu4" style="display:none;">
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                            <!-- 在name="mainFranme"的框架中打开该标签 -->
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
  <script type="text/javascript">
  function show(id1,id2){
	  var change=document.getElementById(id2);
	  temp=change.value;
	  var menu=document.getElementById(id1);

	  if(temp=="+"){
	  menu.style.display="block";
      change.value="—";
	  }else{
		  menu.style.display="none";
	      change.value="+";
	}
}
  </script>
</html>

