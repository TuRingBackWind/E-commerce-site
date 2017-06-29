<?php
function addAlbum($arr){
    insert("imooc_album", $arr);
}

/**
 * 根据商品的id返回一张图片
 * @param int $id
 * @return array
 */
function getproImgById($id){
    $sql = "select albumPath from imooc_album where pid=$id limit 1";
    $row=fetchOne($sql);
    return $row;
}


/**
 * 根据商品的id得到商品的所有图片
 * @param int $id
 * @return array
 */
function getProImgsById($id){
    $sql = "select albumPath from imooc_album where pid=$id";
    $rows = fetchAll($sql);
    return $rows;
}