<?php
require_once '../include.php';
checkLogined();
$rows=getAllCate();
if(!$rows){
    alertMes("没有相应分类，请先添加", "addCate.php");
}
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
<h3>添加商品</h3>
<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data">
    <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
        <tr>
            <td align="right">商品名称</td>
            <td><input type="text" name="pName" placeholder="请输入商品名称"/></td>
        </tr>
        <tr>
            <td align="right">商品分类</td>
            <td>
                <select name="cId">
                <?php foreach($rows as $row){?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['cName'];?></option>
                <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">商品货号</td>
            <td><input type="text" name="pSn" placeholder="请输入商品货号"/></td>
        </tr>
        <tr>
            <td align="right">商品数量</td>
            <td><input type="text" name="pNum" placeholder="请输入商品数量"/></td>
        </tr>
        <tr>
            <td align="right">商品市场价</td>
            <td><input type="text" name="mPrice" placeholder="请输入商品市场价"/></td>
        </tr>
        <tr>
            <td align="right">商品描述</td>
            <td><input type="text" name="pDesc" placeholder="请输入商品信息"/></td>
        </tr>
        <tr>
            <td align="right">商品图像</td>
            <td><input type="file" name="myFile[]"/><input type="file" name="myFile[]"/></td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="发布商品"/></td></tr>
    </table>
</form>
</body>
</html>