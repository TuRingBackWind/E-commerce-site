<?php
require_once '../include.php';
@$id=$_REQUEST['id'];
$sql="select id,cName from imooc_cate where id=$id";
$row=fetchOne($sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<style type="text/css">
    td{
	border:1px solid black;
	border-collapse:collapse;}
    </style>
</head>
<body>
	<h3>修改分类</h3>
	<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
	   <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
	       <tr>
	           <td align="right">分类名称</td>
	           <td><input type="text" name="cName" placeholder="<?php echo $row['cName'];?>"/></td>
	       </tr>
	       <tr>
	           <td colspan="2"><input type="submit" value="编辑分类"/></td>
	       </tr>
	   </table>
	</form>
</body>
</html>
