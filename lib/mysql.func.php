<?php
/*
 * �������ݿ�
 * @return resource
*/
function connect(){
    mysql_connect(HOST,USERNAME,PASSWORD) or die("���ݿ�����ʧ��Error:".mysql_errno().":".mysql_error());
    mysql_set_charset(CHARSET);
    mysql_select_db(DBNAME) or die("���ݿ��ʧ��");
}


//��ɼ�¼����Ĳ���
 function insert($table,$array){//$table��ʾ����Ǹ�������¼�������¼����ʽ�ǲ���һ������
    $keys=join(",", array_keys($array));
    $vals="'".join("','", array_values($array))."'";//����Ĵ����ǰ�"','"��ߵ�''��д����
    $sql="insert $table($keys)values($vals)";//һ��Ҫע��$table֮ǰ��һ���ո�
    //echo $sql;
    mysql_query($sql);
    return mysql_insert_id();
}

//��ɸ��µĲ���
//update imooc_admin set username='king' where id=1
function update($table,$array,$where=null){
    $str=null;
    foreach ($array as $key=>$val){
        if($str==null){
            $sep="";//��һ�ε�ѭ��ʱ$strӦ��Ϊ�գ��ڴ�ѭ����ʱ��Ϊ��
        }else{
            $sep=",";//�ڶ���ѭ����ʱ��Ӧ����ǰ�߼��϶���
        }
    $str.=$sep.$key."='".$val."'";
    //����$str��ߵĵ����������������е�ÿһ���ֶ�
    }
    $sql="update $table set $str".($where==null?null:" where ".$where);
    $result=mysql_query($sql);
    if($result){
    return mysql_affected_rows();
    }else{
        return false;
    }
}

//ɾ����¼
function delete($table,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from $table $where";
    mysql_query($sql);
    return mysql_affected_rows();
}

//����һ����¼
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result,$result_type);
    return $row;
}

//�������еļ�¼
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $rows=array();
    while(@$row=mysql_fetch_array($result,$result_type)){//��Ϊ while�����������Ӧ����ѭ�����ж���䣬���Ի��о���
        $rows[]=$row;
    }
    return $rows;
}


//�õ�������еļ�¼����
function getResultNum($sql){
    $result=mysql_query($sql);
    return mysql_num_rows($result);
}

/**
 * �õ���һ����¼�����
 * @return number
 */
function getInsertId(){
    return mysql_insert_id();
}





















