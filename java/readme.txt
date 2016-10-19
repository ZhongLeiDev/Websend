Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; a has a deprecated constructor in Path\xxx.php on line 9.

PHP OOP使用和类名相同的方法名作为构造方法，是 PHP4 的写法，PHP 5中同时支持__construct和类同名方法，但__construct方法具有优先性。

PHP 7开始使用和类名相同的方法名作为构造方法会报E_DEPRECATED级别的错误，提示在未来版本中会彻底抛弃类同名方法作为构造函数。
但程序仍然会正常执行。
<?php
        class a{
                function a(){
                        
                }
        }
?>

Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP 的解决方法是使用__construct作为构造方法的方法名。即：
<?php
        class a{
                function __construct(){
                }
        }
?>

注：此处“Java_re.inc”为“Java.inc”经过构造函数“function __construct()”重写后的包含文件。