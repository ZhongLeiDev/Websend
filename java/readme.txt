Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; a has a deprecated constructor in Path\xxx.php on line 9.

PHP OOPʹ�ú�������ͬ�ķ�������Ϊ���췽������ PHP4 ��д����PHP 5��ͬʱ֧��__construct����ͬ����������__construct�������������ԡ�

PHP 7��ʼʹ�ú�������ͬ�ķ�������Ϊ���췽���ᱨE_DEPRECATED����Ĵ�����ʾ��δ���汾�л᳹��������ͬ��������Ϊ���캯����
��������Ȼ������ִ�С�
<?php
        class a{
                function a(){
                        
                }
        }
?>

Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP �Ľ��������ʹ��__construct��Ϊ���췽���ķ�����������
<?php
        class a{
                function __construct(){
                }
        }
?>

ע���˴���Java_re.inc��Ϊ��Java.inc���������캯����function __construct()����д��İ����ļ���