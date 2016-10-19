# Websend
一个基于 web-msg-sender 开源框架的服务器推送程序

#注意事项
1.本程序是基于 web-msg-sender 框架，在 Windows7-64 位系统下测试，web-msg-sender 项目地址为：<hrf>https://github.com/walkor/web-msg-sender/。</hrf><br><br>
2.测试所用的 PHP 版本为 PHP7.0.9 ,程序中用到了 PHP 的文件上传功能以及上传进度显示功能，需要对 PHP.ini 设置文件进行相关设置，可自行百度设置方法。<br><br>
3.本程序运用 web-msg-sender 框架是在本地局域网下测试的，登陆的客户端的识别符（uid）设置为了登录机器的 IP 地址。<br><br>
4.本程序使用的文件上传文件 upload.php 文件在当前路径下引用时可能在文件上传时会出 BUG ,调试得到的文件数据结构不是PHP接收文件的数据结构，产生原因还未知，因此使用 upload.php 文件时如果直接在本目录下引用上传不了文件时请将该文件放到其它文件夹。<br><br>
5.使用本程序请先下载 web-msg-sender 框架并将本工程下载的文件拷贝到 wen-msg-sender 工程目录下的 "web" 文件夹下。<br><br>
6.本程序的 PDF 分割策略是用 PHP 调用后台的 JAVA 函数来实现，之前也考虑过使用 PHP下的 Imagick 程序来进行分页显示 PDF 文档，在诸多尝试之下发现 Imagick 与 PHP 版本对应机其复杂，想要配置运行成功极其艰难，后来放弃使用 Imagick 而改用 JavaBridge 进行 PHP 调用 Java 程序实现，因此要先下载 JavaBridge 程序并进行相关设置。<br><br>
7.本程序需要 Java运行环境支持，下载安装好 JDK 之后需要将本项目中的 java 文件夹中的 Pdf2PicUtils.jar 文件拷贝到 JDK 安装路径下的 "/jre/lib/ext" 目录下。<br><br>

#项目说明
1.界面说明：<br><br>
web-msg-sender 主界面：<br>

![image](https://github.com/ZhongLeiDev/ZhongLeiDev.github.io/blob/master/websendimg/index.png)

此界面是 web-msg-sender 项目的使用主界面，查看 HTML 源码可以了解此项目的使用方法。

本项目的服务器配置界面：<br>

![image](https://github.com/ZhongLeiDev/ZhongLeiDev.github.io/blob/master/websendimg/Console.png)

此界面是本项目的服务器设置界面，在本机的访问连接为 'http://localhost:2123/client.html'
