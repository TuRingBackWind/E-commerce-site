<?php
function addPro(){
    $arr = $_POST;
//     print_r($_FILES);
    $arr['pubTime'] = time();
    $uploadpath="./uploads";
//     echo "<pre>";
//     var_dump($_REQUEST);
//     var_dump($_FILES);
//     echo "</pre>";
    $uploadFiles = uploadFile(null,array('jpeg','jpg','gif','png','wbmp'),true,2097152,$uploadpath);
//     print_r($uploadFiles);
//     $uploadFiles = array();
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $key=>$uploadFile){
           thumb($uploadpath."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],$scale=0.5,50,50);
           thumb($uploadpath."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],$scale=0.5,220,220);
           thumb($uploadpath."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],$scale=0.5,350,350);
           thumb($uploadpath."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],$scale=0.5,800,800);
        }
    }
    $res = insert("imooc_pro", $arr);//写这一句的时候一定要注意，表单里的每一个字段的name值一定要和数据库里的字段值一样
    $pid = getInsertId();
    if($res&&$pid){
       if(is_array($uploadFiles)&&$uploadFiles){
       foreach($uploadFiles as $uploadFile){
           $arr1['pid'] = $pid;
           $arr1['albumPath'] = $uploadFile['name'];
           addAlbum($arr1);
       }
       }
    $mes = "<p>添加成功</p><a href='addPro.php' target = 'mainFrame'>继续添加</a>|<a href='listPro.php' target = 'mainFrame'>查看商品列表</a>";
    }else{
        if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile['name'])){
                unlink("../image_800/".$uploadFile['name']);
            }
            if(file_exists("../image_50/".$uploadFile['name'])){
                unlink("../image_50/".$uploadFile['name']);
            }
            if(file_exists("../image_220/".$uploadFile['name'])){
                unlink("../image_220/".$uploadFile['name']);
            }
            if(file_exists("../image_350/".$uploadFile['name'])){
                unlink("../image_350/".$uploadFile['name']);
            }
        }
        }
     $mes = "<p>添加失败</p><a href='addPro.php' target = 'mainFrame'>重新添加</a>";
   }
return $mes;
}

/**
 * 根据商品的Id得到的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){
   $sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.Id={$id}";
   $row = fetchOne($sql);
   return $row;
}

function editPro($id){
    $arr = $_POST;
    $uploadpath="./uploads";
    $uploadFiles = uploadFile(null,array('jpeg','jpg','gif','png','wbmp'),true,2097152,$uploadpath);
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $key=>$uploadFile){
            thumb($uploadpath."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],$scale=0.5,50,50);
            thumb($uploadpath."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],$scale=0.5,220,220);
            thumb($uploadpath."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],$scale=0.5,350,350);
            thumb($uploadpath."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],$scale=0.5,800,800);
        }
    }
    $where="id={$id}";
    $res = update("imooc_pro", $arr,$where);//写这一句的时候一定要注意，表单里的每一个字段的name值一定要和数据库里的字段值一样
    $pid = $id;
//     var_dump($res);
//     var_dump($pid);
    if($res&&$pid){
        if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $uploadFile){
            $arr1['pid'] = $pid;
            $arr1['albumPath'] = $uploadFile['name'];
            addAlbum($arr1);
        }
        }
        $mes = "<p>编辑成功</p><a href='listPro.php' target = 'mainFrame'>查看商品列表</a>";
    }else{
        if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile['name'])){
                unlink("../image_800/".$uploadFile['name']);
            }
            if(file_exists("../image_50/".$uploadFile['name'])){
                unlink("../image_50/".$uploadFile['name']);
            }
            if(file_exists("../image_220/".$uploadFile['name'])){
                unlink("../image_220/".$uploadFile['name']);
            }
            if(file_exists("../image_350/".$uploadFile['name'])){
                unlink("../image_350/".$uploadFile['name']);
            }
        }
        }
        $mes = "<p>编辑失败</p><a href='listPro.php' target = 'mainFrame'>重新修改</a>";
    }
    return $mes;
}


/**
 * 得到图片
 * @param unknown $id
 * @return multitype:multitype:
 */
function getAllImgById($id){
    $sql="select a.albumPath from imooc_album a where pid={$id}";
    $rows=fetchAll($sql);
    return $rows;
}

function delPro($id){
    $where="id={$id}";
    $res=delete("imooc_pro",$where);
    $proImgs=getAllImgById($id);
//     print_r($proImgs);
    $res1=true;
    if($proImgs&&is_array($proImgs)){
        foreach($proImgs as $proImgs){
            if(file_exists("./uploads/".$proImgs['albumPath'])){
                unlink("./uploads/".$proImgs['albumPath']);
            }
            if(file_exists("../image_220/".$proImgs['albumPath'])){
                unlink("../image_220/".$proImgs['albumPath']);
            }
            if(file_exists("../image_350/".$proImgs['albumPath'])){
                unlink("../image_350/".$proImgs['albumPath']);
            }
            if(file_exists("../image_50/".$proImgs['albumPath'])){
                unlink("../image_50/".$proImgs['albumPath']);
            }
            if(file_exists("../image_800/".$proImgs['albumPath'])){
                unlink("../image_800/".$proImgs['albumPath']);
            }
        }
        $where1 = "pid={$id}";
        $res1 = delete("imooc_album",$where1);
    }
    if($res&&$res1){
        $mes="删除成功！</br><a href='listPro.php'>查看商品列表</a>";
    }else{
        $mes="删除失败！</br><a href='listPro.php'>重新删除</a>";
    }
    return $mes;
}

/**
 * 检查分类下是否有产品
 * @param int $cid
 * @return array
 */
function checkProExist($cid){
    $sql="select * from imooc_pro where cId={$cid}";
    $rows =fetchAll($sql);
    return $rows;
}

/**
 * 得到前四条商品
 * @param int $cid
 * @return array
 */
function getProsByCid($cid){
    $sql= "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 得到下四条商品
 * @param int $cid
 * @return array
 */
function getsmallProsById($cid){
    $sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
    $rows=fetchAll($sql);
    return $rows;
}












