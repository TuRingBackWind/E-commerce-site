<?php
require_once '../include.php';
$sql = "select * from imooc_cate";
$totalRows = getResultNum($sql);
$pageSize = 2;
$totalPage = ceil($totalRows / $pageSize);
@$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
if ($page < 1 || $page == null || ! is_numeric($page)) {
    $page = 1;
}
if ($page >= $totalPage) {
    $page = $totalPage;
}
$offset = ($page - 1) * $pageSize;
$sql = "select id,cName from imooc_cate order by id asc limit $offset,$pageSize";
$rows = fetchAll($sql);
if (! $rows) {
    alertMes("sorry,没有分类，请添加！", "addCate.php");
    exit();
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
					onclick="addCate()">
			</div>

		</div>
		<!--表格-->
		<table class="table">
			<thead>
				<tr>
					<th width="20%">编号</th>
					<th width="30%">分类名称</th>
					<th >操作</th>
				</tr>
			</thead>
			<tbody>
                        <?php $i=$offset+1;foreach($rows as $row){?>
                            <tr>
					<!--这里的id和for里面的c1 需要循环出来-->
					<td><input type="checkbox" id="c1" class="check" /><label for="c1"
						class="label"><?php echo $i;?></label></td>
					<td><?php echo $row['cName'];?></td>
					<td align="center"><input type="button" value="修改" class="btn"
						onclick="editCate(<?php echo $row['id'];?>)" /><input
						type="button" value="删除" class="btn"
						onclick="delCate(<?php echo $row['id'];?>)" /></td>
				</tr>
                            <?php $i++;}?>
                            <?php if($totalRows>$pageSize){?>
                            <tr>
					<td colspan="4"><?php echo showPage($totalPage, $page);?></td>
				</tr>
                            <?php }?>
                        </tbody>
		</table>
	</div>
</body>
<script type="text/javascript">
function addCate(){
	window.location="addCate.php";
}
function editCate(id){
	window.location="editCate.php?id="+id;//用window.location表示在本地窗口打开盖页面
}
function delCate(id){
	if(window.confirm("您确定要删除吗？")){
		window.location="doAdminAction.php?act=delCate&id="+id;
		}
}
</script>
</html>

