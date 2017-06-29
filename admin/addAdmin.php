<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>添加管理员</title>
	<style type="text/css">
    td{
	border:1px solid black;
	border-collapse:collapse;}
    </style>
</head>
<body>
    <h3>添加管理员</h3>
	<form action="doAdminAction.php?act=addAdmin" method="post">
	   <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
	       <tr>
	           <td align="right">管理员名称</td>
	           <td><input type="text" name="username" placeholder="请输入管理员名称"/></td>
	       </tr>
	       <tr>
	           <td align="right">管理员密码</td>
	           <td><input type="password" name="password"/></td>
	       </tr>
	       <tr>
	           <td align="right">管理员邮箱</td>
	           <td><input type="text" name="email" placeholder="请输入管理员邮箱"/></td>
	       </tr>
	       <tr>
	           <td colspan="2"><input type="submit" value="添加管理员"/></td>
	       </tr>
	   </table>
	</form>
</body>
</html>