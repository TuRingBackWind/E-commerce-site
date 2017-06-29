<?php
require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
//在这里使用加密后，就必须把数据库里 存的密码也进行加密，方法是在添加管理员的时候对从输入框获取的密码进行加密以后再保存到数据库里
//同时说明一个问题相同的一条信息，他们通过加密后的指纹是相同的，产生碰撞的情况是两条不同的信息有相同的信息指纹
$verify=strtolower($_POST['verify']);
$verify1=$_SESSION['verify'];
@$autoFlag=$_POST['autoFlag'];
//当我没有选择自动登录的时候，就会出现警告Notice: Undefined index: autoFlag，解决办法在可能出现这种情况的前边加上@
if($verify==$verify1){//判断验证码是否正确
    $sql="select * from imooc_admin where username='{$username}' and password='{$password}'";
    //为什么要带一个{}，因为这里要把{}中的内容当作变量使用
    //注意：在进行SQL查询之前所有字符串都必须加单引号，以避免可能的注入漏洞和SQL错误。
    $row=checkAdmin($sql);
    if($row){
        if($autoFlag){
            setcookie("adminId",$row['id'],time()+7*24*3600);
            setcookie("adminName",$row['username'],time()+7*24*3600);
        }//如果选了一周内自动登录,用setcookie函数在cookie中保存该用户的id和用户名,在不点击退出的情况下将可以在一周内进行自动登录，
        //在这里保存用户名是为了在页面中输出用
        //问题：在cookie中保存了用户的id后可以自动登录的原理是什么，因为你想加载该页面就必须先进行登录，在页面开始会进行判断
        $_SESSION['adminName']=$row['username'];//在这里可以用$_SESSION是因为在include页面已经包含了session_start函数
        $_SESSION['adminId']=$row['id'];
//         header("location:index.php");
        alertMes("登录成功", "index.php");
    }else{
        alertMes("登录失败，重新登录", "login.php");
    }
}else{
    alertMes("验证码错误", "login.php");
}