<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>添加分类</title>
	<style type="text/css">
    td{
	border:1px solid black;
	border-collapse:collapse;}
    </style>
</head>
<body>
    <h3>添加分类</h3>
	<form action="doAdminAction.php?act=addCate" method="post">
	   <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
	       <tr>
	           <td align="right">分类名称</td>
	           <td><input type="text" name="cName" placeholder="请输入分类名称"/></td>
	       </tr>
	       <tr>
	           <td colspan="2"><input type="submit" value="添加分类"/></td>
	       </tr>
	   </table>
	</form>
</body>
</html>
