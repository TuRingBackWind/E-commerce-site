<?php
//添加分类
function addCate(){
    $arr=$_POST;
    if(insert("imooc_cate", $arr)){
        $mes="添加成功!<br/><a href='addCate.php'>继续添加<a/>|<a href='listCate.php'>查看分类列表</a>";
    }else{
        $mes="添加失败！<br/><a href='addCate.php'>重新添加</a>";
    }
    return $mes;
}

//修改分类
function editCate($where){
    $array=$_POST;
    if(update("imooc_cate",$array,$where)){
        $mes="修改成功!<br/><a href='listCate.php'>查看分类列表</a>";
        }else{
            $mes="修改失败！<br/><a href='listCate.php'>重新修改</a>";
        }
        return $mes;
}

//删除分类
function delCate($id){
    $res=checkProExist($id);
    if(!$res){
        $where="id=".$id;
       if(delete("imooc_cate","id=$id")){
       $mes="删除成功!<br/><a href='listCate.php'>查看分类列表</a>|<a href='addCate.php'>继续添加<a/>";
       }else{
       $mes="删除失败！<br/><a href='listCate.php'>重新操作</a>";
       }
       return $mes;

    }else{
       alertMes("不能删除分类，请先删除分类下的商品","listPro.php");
    }
}
/**
 * 得到所有分类
 * @return array
 */

function getAllCate(){
    $sql="select id,cName from imooc_cate";
    $rows=fetchAll($sql);
    return $rows;
}




















