<?php
require_once '../include.php';
checkLogined();
$rows=getAllCate();
if(!$rows){
    alertMes("没有相应分类，请先添加", "addCate.php");
}
$id=$_REQUEST['id'];
$proInfo = getProById($id);
// print_r($proInfo);
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
<form action="doAdminAction.php?act=editPro&&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
        <tr>
            <td align="right">商品名称</td>
            <td><input type="text" name="pName" value="<?php echo $proInfo['pName'];?>"/></td>
        </tr>
        <tr>
            <td align="right">商品分类</td>
            <td>
                <select name="cId">
                <?php foreach($rows as $row){?>
                <option value="<?php echo $row['id'];?>" <?php $row['id']==$proInfo['cId']?"selected='selected'":null;?> ><?php echo $row['cName'];?></option>
                <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">商品货号</td>
            <td><input type="text" name="pSn" value="<?php echo $proInfo['pSn'];?>"/></td>
        </tr>
        <tr>
            <td align="right">商品数量</td>
            <td><input type="text" name="pNum" value="<?php echo $proInfo['pNum'];?>"/></td>
        </tr>
        <tr>
            <td align="right">商品市场价</td>
            <td><input type="text" name="mPrice" value="<?php echo $proInfo['mPrice'];?>"/></td>
        </tr>
        <tr>
            <td align="right">商品描述</td>
            <td><input type="text" name="pDesc" value="<?php echo $proInfo['pDesc'];?>"/></td>
        </tr>
        <tr>
            <td align="right">商品图像</td>
            <td><input type="file" name="myFile[]"/><input type="file" name="myFile[]"/></td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="修改商品"/></td></tr>
    </table>
</form>
</body>
</html>
