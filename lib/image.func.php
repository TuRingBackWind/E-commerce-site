<?php
    function verifyImage(){
    //通过session存储验证信息，把信息记录到服务器端，便于以后输入做校验
    session_start();
    //session_start()必须处于脚本最顶部，不明白session_start()必须处于脚本最顶端的用意是什么？
    //多服务器情况，需要考虑集中管理session信息

    $image= imagecreatetruecolor(100, 30);//生成一个宽100高30的黑色图片
    $bgcolor= imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $bgcolor);

   /* for($i=0;$i<4;$i++){
        $fontsize=6;
        $fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));//设置每一个数字的颜色随机，这里0-120是深色区间
        $fontcontent=rand(0,9);

        $x=($i*100/4)+rand(5,10);
        $y=rand(5,10);

        imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);


    }*/

    $captcha_code='';
    //用这个变量来保存验证码的信息

    //用字母和数字混合的方式来生成随机码
    for($i=0;$i<4;$i++){
        $fontsize=6;
        $fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
        // imagecolorallocate() 必须被调用以创建每一种用在 image 所代表的图像中的颜色，说明下边的字符就是图片
        $data=abcdefghjkmnpqrstuvwxy3456789;//定义一个字符串
        $fontcontent=substr($data, rand(0,strlen($data)),1);//用截取字符串的方式来生成字符，每一次从字符串中截取一个字符

        $captcha_code.=$fontcontent;

        $x=($i*100/4)+rand(5,10);
        $y=rand(5,10);//这两行主要用来设置字符的生成位置，用随机数字来设置每一个字符的位置

        imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
        //imagestring — 水平地画一行字符串，这里的每一个字符被当作一张图片来处理

    }

    $_SESSION['verify']=$captcha_code;//$_SESSION是系统定义的变量,把需要验证的内容保存在该变量中

    for($i=0;$i<200;$i++){
        $pointcolor=imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
        imagesetpixel($image, rand(0,99), rand(0,29), $pointcolor);//该方法是用来在底图上添加一些干扰的点
    }

    for($i=0;$i<3;$i++){
        $linecolor=imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
        imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);
        //在底图上添加一些干扰的线，因为线需要两个点来确定，所以有两个坐标
    }


    ob_clean();
    header('content-type:image/png');//再输出之前一定要加上header指明输出的图片的类型
    imagepng($image);


    //end
    imagedestroy($image);


    }
    /**
     * 生成缩略图
     * @param string $filename
     * @param string $destination
     * @param real $scale
     * @param int $dst_w
     * @param int $dst_h
     * @param true $isReservedSource
     * @return string
     */
function thumb($filename,$destination=null,$scale=0.5,$dst_w=null,$dst_h=null,$isReservedSource=true){

    list($src_w,$src_h,$imagetype)=getimagesize($filename);
    if(is_null($dst_w)&&is_null($dst_h)){
        $dst_w=ceil($src_w*$scale);
        $dst_h=ceil($src_h*$scale);
    }
    $mime=image_type_to_mime_type($imagetype);
    //echo mime;
    //结果：image/png
    $createFun=str_replace("/", "createfrom", $mime);
    //echo $createFun;
    //结果：imagecreatefrompng，后边直接在其后加上()就可以当作函数使用，问题：这里不用连接符连接以后再使用吗
    $outFun=str_replace("/", null, $mime);
    $src_image=$createFun($filename);//在内存中建立一个和图片类型一样的图像
    $dst_image=imagecreatetruecolor($dst_w, $dst_h);//创建一个画布
    imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);//把原图象按照一定的比列复制到画布上
    if($destination&&!file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);//在别的文件里可以为什么在这里是无效的？可能也是因为创建的文件目录问题

    }
    $dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;//输出文件存放的地方
    $outFun($dst_image,$dstFilename);//输出图像
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$isReservedSource){
        unlink($filename);
    }
    return $dstFilename;
}
?>