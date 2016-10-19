<?php
header("Content-type: text/html; charset=utf-8"); 
echo "start!!";
//var_dump($_FILES[0]);
print_r($_FILES);
echo $_FILES['myfile']['tmp_name'];
echo $_FILES['myfile']['error'];
if(isset($_FILES[0]["file_name"]))
{
echo "filename:".$_FILES[0]["file_name"];
$ret = array();
$uploadDir = 'images'.DIRECTORY_SEPARATOR.date("Ymd").DIRECTORY_SEPARATOR;
$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.$uploadDir;
file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
if(!is_array($_FILES[0]["file_name"])) //single file
{
//$fileName = time().uniqid().'.'.pathinfo($_FILES["myfile"]["name"])['extension'];
$fileName = $_FILES[0]["file_name"];
move_uploaded_file($fileName,$dir.iconv("UTF-8","gb2312",$fileName));//编码转换，避免中文乱码
$ret['file'] = DIRECTORY_SEPARATOR.$uploadDir.$fileName;
}
echo json_encode($ret);
}
?>