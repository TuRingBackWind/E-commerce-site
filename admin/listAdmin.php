<?php
require_once '../include.php';
    $sql="select * from imooc_admin";
    $totalRows=getResultNum($sql);
    $pageSize=2;
    $totalPage=ceil($totalRows/$pageSize);
    @$page=$_REQUEST['page']?$_REQUEST['page']:1;
    if($page<1||$page==null||!is_numeric($page)){
        $page=1;
    }
    if($page>=$totalPage){
        $page=$totalPage;
    }
    $offset=($page-1)*$pageSize;
    $sql="select id,username,Email from imooc_admin limit $offset,$pageSize";
    $rows=fetchAll($sql);
    if(!$rows){
        alertMes("sorry,没有管理员，请添加！", "addAdmin.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="styles/backstage.css" />
</head>
<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addAdmin()">
                        </div>

                    </div>
                    <!--表格-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">管理员名称</th>
                                <th width="30%">管理员邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=$offset+1;foreach($rows as $row){?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"/><label for="c1" class="label"><?php echo $i;?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['Email'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"/><input type="button" value="删除" class="btn" onclick="delAdmin(<?php echo $row['id'];?>)"/></td>
                            </tr>
                            <?php $i++;}?>
                            <?php if($totalRows>$pageSize){?>
                            <tr ><td colspan="4"><?php echo showPage($totalPage, $page);?></td></tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">
function addAdmin(){
	window.location="addAdmin.php";
}
function editAdmin(id){
	window.location="editAdmin.php?id="+id;//用window.location表示在本地窗口打开该页面
}
function delAdmin(id){
	if(window.confirm("您确定要删除吗？")){
		window.location="doAdminAction.php?act=delAdmin&id="+id;
		}
}
</script>
</html>
