<?php 
 /*复制xCopy函数用法：    
  *   xCopy("feiy","feiy2",1):拷贝feiy下的文件到   feiy2,包括子目录    
  *   xCopy("feiy","feiy2",0):拷贝feiy下的文件到   feiy2,不包括子目录    
  *参数说明：    
  *   $source:源目录名    
  *   $destination:目的目录名    
  *   $child:复制时，是不是包含的子目录 
  */
function xCopy($source, $destination, $child){
    if (!file_exists($destination))
    {
        if (!mkdir(rtrim($destination, '/'), 0777))
        {
        //$err->add($_LANG['cannt_mk_dir']);
        return false;
        }
        @chmod($destination, 0777);
     }
if(!is_dir($source)){  
return 0;
}
if(!is_dir($destination)){
mkdir($destination,0777);   
}
$handle=dir($source);
while($entry=$handle->read()){
if(($entry!=".")&&($entry!="..")){
if(is_dir($source."/".$entry)){ 
if($child)
xCopy($source."/".$entry,$destination."/".$entry,$child);
}
else{
copy($source."/".$entry,$destination."/".$entry);
}
}    
}    
return 1;
}

 /*删除deldir函数用法：    
  *  deldidr("feiy"):删除feiy，包括子目录       
  *参数说明：    
  *   $dir:要删除的目录名    
  */
function deldir($dir) {
if (!file_exists($dir)){return true;
}else{@chmod($dir, 0777);}
  $dh=opendir($dir);
  while ($file=readdir($dh)) {
    if($file!="." && $file!="..") {
      $fullpath=$dir."/".$file;
      if(!is_dir($fullpath)) {
          unlink($fullpath);
      } else {
          deldir($fullpath);
      }
    }
  }
  closedir($dh);

  if(rmdir($dir)) {
    return true;
  } else {
    return false;
  }
}
?>