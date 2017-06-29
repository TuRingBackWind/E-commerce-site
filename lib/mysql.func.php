<?php
/*
 * 连接数据库
 * @return resource
*/
function connect(){
    mysql_connect(HOST,USERNAME,PASSWORD) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
    mysql_set_charset(CHARSET);
    mysql_select_db(DBNAME) or die("数据库打开失败");
}


//完成记录插入的操作
 function insert($table,$array){//$table表示你对那个表插入记录，插入记录的形式是插入一个数组
    $keys=join(",", array_keys($array));
    $vals="'".join("','", array_values($array))."'";//这里的错误是把"','"里边的''号写掉了
    $sql="insert $table($keys)values($vals)";//一定要注意$table之前有一个空格
    //echo $sql;
    mysql_query($sql);
    return mysql_insert_id();
}

//完成更新的操作
//update imooc_admin set username='king' where id=1
function update($table,$array,$where=null){
    $str=null;
    foreach ($array as $key=>$val){
        if($str==null){
            $sep="";//第一次的循环时$str应该为空，在次循环的时候不为空
        }else{
            $sep=",";//第二次循环的时候应该在前边加上逗号
        }
    $str.=$sep.$key."='".$val."'";
    //这里$str后边的点作用是连接数组中的每一个字段
    }
    $sql="update $table set $str".($where==null?null:" where ".$where);
    $result=mysql_query($sql);
    if($result){
    return mysql_affected_rows();
    }else{
        return false;
    }
}

//删除记录
function delete($table,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from $table $where";
    mysql_query($sql);
    return mysql_affected_rows();
}

//返回一条记录
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result,$result_type);
    return $row;
}

//返回所有的记录
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $rows=array();
    while(@$row=mysql_fetch_array($result,$result_type)){//因为 while（）里的内容应该是循环的判断语句，所以会有警告
        $rows[]=$row;
    }
    return $rows;
}


//得到结果集中的记录条数
function getResultNum($sql){
    $result=mysql_query($sql);
    return mysql_num_rows($result);
}

/**
 * 得到上一步记录插入号
 * @return number
 */
function getInsertId(){
    return mysql_insert_id();
}





















