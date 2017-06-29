<?php
require_once '../include.php';
@$id=$_REQUEST['id'];
$sql="select id,username,password,Email from imooc_admin where id=$id";
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
	<h3>编辑管理员</h3>
	<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
	   <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
	       <tr>
	           <td align="right">管理员名称</td>
	           <td><input type="text" name="username" placeholder="<?php echo $row['username'];?>"/></td>
	       </tr>
	       <tr>
	           <td align="right">管理员密码</td>
	           <td><input type="password" name="password" value="<?php echo $row['password'];?>"/></td>
	       </tr>
	       <tr>
	           <td align="right">管理员邮箱</td>
	           <td><input type="text" name="email" placeholder="<?php echo $row['Email'];?>"/></td>
	       </tr>
	       <tr>
	           <td colspan="2"><input type="submit" value="编辑管理员"/></td>
	       </tr>
	   </table>
	</form>
</body>
</html>

