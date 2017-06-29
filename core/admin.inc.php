<?php
function checkAdmin($sql){
    return fetchOne($sql);
}
// 检测是否由于管理员登录
function checkLogined(){
    if(@$_SESSION['adminId']==""&&@$_COOKIE['adminId']==""){
        //这个$_session是在dologin.php页面中设置的，服务器怎么判断是哪个session文件保存的该变量
        alertMes("请先登录", "login.php");
    }
}//在这里虽然没有定义，这些$_session $_cookie变量，但不影响实际的使用，具体怎么找到是哪个cookie文件不是很清楚

// 添加管理员
function addAdmin(){
    $array=$_POST;
    $array['password']=md5($_POST['password']); 
    if(insert("imooc_admin",$array)){
        $mes="添加成功!<br/><a href='addAdmin.php'>继续添加<a/>|<a href='listAdmin.php'>查看管理员列表</a>";
        //在这里因为""中不能用""所以a标签里的href用''
    }else{
        $mes="添加失败！<br/><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

//管理员列表展示
function getAllAdmin(){
    $sql="select id,username,Email from imooc_admin";
    $rows=fetchAll($sql);
    return $rows;
}

//编辑管理员
function editAdmin($id){
    $array=$_POST;
    $array['password']=md5($_POST['password']);
    if(update("imooc_admin",$array,"id=$id")){
        $mes="编辑成功! <a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="编辑失败! <a href='listAdmin.php'>重新修改</a>";
    }
    return $mes;
}

//删除管理员
function delAdmin($id){
    if(delete("imooc_admin","id=$id")){
        $mes="删除成功! <a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败! <a href='listAdmin.php'>重新删除</a>";
    }
    return $mes;
}

// 注销管理员
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}