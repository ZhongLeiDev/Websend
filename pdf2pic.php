<?php
if(isset($_POST["flag"])){
define("JAVA_HOSTS", "127.0.0.1:8080");//设置javabridge监听端口，如果开启javabridge.jar设置的端口不是8089，可通过此语句更改
require_once("java/Java_re.inc");
require_once("filemethod.php");
//echo '对象开始初始化：</br>';
//$src = $_POST["srcpath"];
//$des = $_POST["despath"];
$flag = $_POST["flag"];//接收到的路径信息
$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'imgcollection'.DIRECTORY_SEPARATOR.$flag.DIRECTORY_SEPARATOR;
file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
//echo $flag;
//if($flag == "A"){
$src = "C:/webpdf/test.pdf";
$des = "C:/webimg/";
$test = new Java("com.zl.pdf2pic.Pdf2PicUtils");
$test->transPDF2Pic($src,$des);

//拷贝"C:/webimg"文件夹下分拆的图片文件到网站根目录下的对应文件夹下
xCopy($des,$dir,0);

//echo '转化成功！';

//将C盘下的临时存储文件删除
deldir($des);

//}else{
//	echo '转化失败！';
//	}

/*生成预览图，路径从$path-->$pathto*/
$path = $dir;
$pathto = dirname(__FILE__).DIRECTORY_SEPARATOR.'thumbnail'.DIRECTORY_SEPARATOR.$flag.DIRECTORY_SEPARATOR;
file_exists($pathto) || (mkdir($pathto,0777,true) && chmod($pathto,0777));

$phtypes=array(
   'image/gif'=>'IMAGETYPE_GIF',
   'image/jpeg'=>'IMAGETYPE_JPEG',
   'image/bmp'=>'IMAGETYPE_BMP',
   'image/png'=>'IMAGETYPE_PNG'
);

/*生成预览时调用的函数*/
if(!function_exists('resizes')){//避免定义同一函数多次而出错
function resizes($name,$type,$path,$pathto){
    $filename = $path.$name;
    header('Content-type:'.$type);
    list($width, $height) = getimagesize($filename);
    $new_width = 100;//新的尺寸宽度
    $new_height = 100;//新的高度
    $image_p = imagecreatetruecolor($new_width, $new_height);

    if($type=='IMAGETYPE_GIF'){
	//if($type=='image/gif'){
        $image = imagecreatefromgif($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $a=get_resource_type($image_p);
        //imagegif($image_p,$pathto.$name."copy".".gif", 100);
		imagegif($image_p,$pathto.$name, 100);//保存原文件名
    }elseif($type=='IMAGETYPE_JPEG'){
	//}elseif($type=='image/jpeg'){
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $a=get_resource_type($image_p);
        //imagejpeg($image_p,$pathto.$name."copy".".jpg", 100);
		imagejpeg($image_p,$pathto.$name, 50);//保存原文件名
    }elseif($type=='IMAGETYPE_PNG'){
	//}elseif($type=='image/png'){
        $image = imagecreatefrompng ($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $a=get_resource_type($image_p);
        //imagepng($image_p,$pathto.$name."copy".".png", 9);//注意在php5.2.1之后png图片的分辨为0-9
		imagepng($image_p,$pathto.$name, 9);//保存原文件名
    }else if($type=='image/bmp'){
        $image = imagecreatefromwbmp($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $a=get_resource_type($image_p);
        //imagewbmp($image_p,$pathto.$name."copy".".bmp", 100);
		imagewbmp($image_p,$pathto.$name, 100);//保存原文件名
    }
    imagedestroy ($image_p);
}
}

$a=opendir($path);
while($b = readdir($a)){
    if(!is_dir($b)){
        $name=$b;
        $type=getimagesize($path.$name);//获得图片的信息
        $typea=$type['mime'];//图片的类型
        $types=$phtypes[$typea];//转化为图片的格式
        resizes($name,$types,$path,$pathto);//生成缩略图
    }
};

//操作完成
echo '转化成功！';

}
?>