﻿<?php
header("Content-type: text/html; charset=utf-8"); 
if(isset($_FILES["myfile"]))
{
$ret = array();
$uploadDir = 'images'.DIRECTORY_SEPARATOR.date("Ymd").DIRECTORY_SEPARATOR;
$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.$uploadDir;
file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
if(!is_array($_FILES["myfile"]["name"])) //single file
{
//$fileName = time().uniqid().'.'.pathinfo($_FILES["myfile"]["name"])['extension'];
$fileName = $_FILES["myfile"]["name"];
move_uploaded_file($_FILES["myfile"]["tmp_name"],$dir.iconv("UTF-8","gb2312",$fileName));//编码转换，避免中文乱码
$ret['file'] = DIRECTORY_SEPARATOR.$uploadDir.$fileName;
}
echo json_encode($ret);
}
?>