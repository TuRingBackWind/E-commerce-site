<?php
header('Content-type:text/html;charset=utf8');
//print_r($_FILES);
function buildInfo(){
    if(!$_FILES){
        return;
    }
    $i=0;
    foreach($_FILES as $v){//使用foreach循环就相当于去掉了最外层的循环
        //单文件
        if(is_string($v['name'])){//单文件的name是一个字符串
           $files[$i]=$v;
           $i++;
        }else{
            //多文件
            foreach($v['name'] as $key=>$val){//多文件的name是一个数组，
                $files[$i]['name']=$val;//这里之所以可以直接写$val，是因为这个foreach循环的数组是$v['name']，所以可以直接使用它的值
               // echo $key;foreach循环的结束条件是$key==数组的最后一个键值,在这个循环的过程中，$key的值是会自动变化的
                $files[$i]['size']=$v['size'][$key];//而这里不写成$val,是因为这里只是借用$key的值来取出不同数组里的值
                $files[$i]['tmp_name']=$v['tmp_name'][$key];
                $files[$i]['error']=$v['error'][$key];
                $files[$i]['type']=$v['type'][$key];
                $i++;
            }
        }
    }
    return $files;
}

function uploadFile($file,$allowExt=array('jpeg','jpg','gif','png','wbmp'),$flag=true,$maxSize=2097152,$uploadpath='upload'){
    if(!file_exists($uploadpath)){
        mkdir($uploadpath,0777,true);
        chmod($uploadpath, 0777);
    }
    $files=buildInfo();
    if(!($files&&is_array($files))){
        return;
    }
//     print_r($files);
    foreach($files as $key=>$file){
    if($file['error']==0){
        $ext=pathinfo($file['name'],PATHINFO_EXTENSION);
        //$allowExt=array('jpeg','jpg','gif','png','wbmp');
        //检测文件的上传类型

        if(!in_array($ext,$allowExt)){
            exit('非法文件类型');
        }
        //$maxSize=2097152;//2M
        //检测文件的大小
        if($file['size']>$maxSize){
            exit('上传文件过大');
        }
        //检测图片是否是真实类型
        //$flag=ture;
        if($flag){
            if(!getimagesize($file['tmp_name'])){//为什么需要这个判断，因为光靠文件的类型不能判断是不是真正的图片，例如改了后缀名
                exit('不是真是图片类型');
            }
        }
        //检测文件是否是通过HTTP POST方式上传上来
        if(!is_uploaded_file($file['tmp_name'])){
            exit('文件不是通过HTTP POS方式上传上来的');
        }
        $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
        $destination=$uploadpath.'/'.$uniName;
//         $destination=$uniName;
        if(move_uploaded_file($file['tmp_name'], $destination)){//函数执行不成功的时候才会执行下边的语句
            $file['name']=$uniName;

            unset($file['error'],$file['tmp_name'],$file['size'],$file['type']);
            $uploadFiles[$key]=$file;
        }



        }else{
        switch ($file['error']){
            case 1:
                $mes= "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。";
                break;
            case 2:
                $mes= "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";
                break;
            case 3:
                $mes= "文件只有部分被上传";
                break;
            case 4:
                $mes= "没有图片被上传</br>";
                break;
            case 6:
                $mes= "找不到临时文件夹";
                break;
            case 7:
            case 8:
                $mes= "系统错误";
                break;
            }
        echo $mes;
        }
    }

    return @$uploadFiles;
}
