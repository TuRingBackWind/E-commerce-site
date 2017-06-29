<?php
require_once '../include.php';
checkLogined();
@$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where p.pName like %{$keywords}%":null;
echo $where;
$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id {$where} ";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if($page>=$totalPage){
    $page=$totalPage;
}
$offset=($page-1)*$pageSize;
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id {$where} limit $offset,$pageSize";
$rows=fetchAll($sql);
if(!$rows){
//     alertMes("sorry,没有商品，请添加！","addPro.php");
//     exit;
echo "ajkh";
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
				<input type="button" value="添&nbsp;&nbsp;加" class="add"
					onclick="addPro()">
			</div>
			<div class="fr">
			 <div class="text">
			     <span>商品名称：</span>
			     <div class="bui_select">
			         <select name="" id="" class="select">
			             <option value="1">测试内容</option>
			             <option value="1">测试内容</option>
			             <option value="1">测试内容</option>
			         </select>
			     </div>
			 </div>
			 <div class="text">
			     <span>上架时间：</span>
			     <div class="bui_select">
			         <select name="" id="" class="select">
			             <option value="1">测试内容</option>
			             <option value="1">测试内容</option>
			             <option value="1">测试内容</option>
			         </select>
			     </div>
			 </div>
			 <div class="text">
			     <span>搜索</span>
			     <input type="text" value="" class="search" id="search" onkeypress="search()"/>
			 </div>
			</div>
	</div>
	<!-- 表格 -->
	<table class="table">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">商品名称</th>
                                <th width="20%">商品分类</th>
                                <th width="20%">是否上架</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $i=$offset+1;foreach($rows as $row){?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check" value=<?php echo $row['id']; ?>/><label for="c1" class="label"><?php echo $i;?></label></td>
                                <td><?php echo $row['pName']?></td>
                                <td><?php echo $row['cName']?></td>
                                <td>
                                    <?php echo $row['isShow']==1?"上架":"下架";?>
                                </td>
                                <td align="center"><input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,<?php echo $row['pName'];?>)"/><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id'];?>)"/><input type="button" value="删除" class="btn" onclick="delPro(<?php echo $row['id'];?>)"/></td>
                            </tr>
                            <?php $i++; }?>
                             <?php if($totalRows>$pageSize){?>
                            <tr ><td colspan="5"><?php echo showPage($totalPage, $page,"keywords='{$keywords}'");?></td></tr>
                            <?php }?>
                        </tbody>
                    </table>
</div>
<script type="text/javascript">
function addPro(){
	window.location="addPro.php";
}
function editPro(id){
	window.location='editPro.php?id='+id;
}
function delPro(id){
	if(window.confirm("你确定要删除吗？")){
	window.location='doAdminAction.php?act=delPro&id='+id;
	}
}
function search(){
	if(event.keyCode==13){
		var val = document.getElementById("search").value;
		window.location="listPro.php?keywords="+val;
	}
}
</script>
</body>
</html>