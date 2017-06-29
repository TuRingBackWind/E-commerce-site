<?php
/* require_once '../include.php';
$sql="select * from imooc_admin";
$totalRows=getResultNum($sql);
$pageSize=2;
//得到总页数
$totalPage=ceil($totalRows/$pageSize);
// echo $totalPage;
  
@$page=$_REQUEST['page']?$_REQUEST['page']:1;//用$page来表示当前页
if($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if($page>=$totalPage){
    $page=$totalPage;
}
$offset=($page-1)*$pageSize;//偏移量，控制每一页从第几条开始输出
$sql="select * from imooc_admin limit $offset,$pageSize";//设置分页是通过查询数据库时进行条件限制，来设置每一页显示的条数
$rows=fetchAll($sql);


foreach ($rows as $row){
   echo $row['username']."&nbsp".$row['Email']."<br/>"; 
}

echo showPage($totalPage, $page); */
function showPage($totalPage,$page,$where=null,$sep="&nbsp"){
$where=$where==null?null:"&".$where;    
$url=$_SERVER['PHP_SELF'];//当前页的链接地址
$index=($page==1)?"首页":"<a href='$url?page=1$where'>首页</a>";
$last=($page==$totalPage)?"尾页":"<a href='$url?page=$totalPage$where'>尾页</a>";
$prePage=($page==1)?"上一页":"<a href='$url?page=".($page-1)."$where'>前一页</a>";
$nextPage=($page==$totalPage)?"下一页":"<a href='$url?page=".($page+1)."$where'>下一页</a>";
$str="总共{$totalPage}页/当前是第{$page}页";
for($i=1;$i<=$totalPage;$i++){
  //当前页无链接，这里是一个难点，想不出如何设置当前页无链接
    if($page==$i){
        @$p.="[$i]"."&nbsp";
    }else{
        @$p.="<a href='$url?page=$i'>[$i]</a>"."&nbsp";
    }
}
$pageStr=$str.$sep.$index.$sep.$prePage.$sep.$p.$sep.$nextPage.$sep.$last;
return $pageStr;    

/* if($page==1){
    echo "共".$totalPage."页"."&nbsp"."首页"."&nbsp"."前一页"."&nbsp".$p."&nbsp"."<a href='$url?page=$nextPage'>下一页</a>"."&nbsp"."<a href='$url?page=$totalPage'>尾页</a>";
}elseif($page==$totalPage){
    echo "共".$totalPage."页"."&nbsp"."<a href='$url?page=1'>首页</a>"."&nbsp"."<a href='$url?page=$prePage'>前一页</a>"."&nbsp".$p."&nbsp"."下一页"."&nbsp"."尾页";
}else{
    echo "共".$totalPage."页"."&nbsp"."<a href='$url?page=1'>首页</a>"."&nbsp"."<a href='$url?page=$prePage'>前一页</a>"."&nbsp".$p."&nbsp"."<a href='$url?page=$nextPage'>下一页</a>"."&nbsp"."<a href='$url?page=$totalPage'>尾页</a>";
}
 */
}










