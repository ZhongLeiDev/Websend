# Websend
一个基于 web-msg-sender 开源框架的服务器推送程序

#注意事项
1.本程序是基于 web-msg-sender 框架，在 Windows7-64 位系统下测试，web-msg-sender 项目地址为：<hrf>https://github.com/walkor/web-msg-sender/</hrf>
2.测试所用的 PHP 版本为 PHP7.0.9 ,程序中用到了 PHP 的文件上传功能以及上传进度显示功能，需要对 PHP.ini 设置文件进行相关设置，可自行百度设置方法
3.本程序运用 web-msg-sender 框架是在本地局域网下测试的，登陆的客户端的识别符（uid）设置为了登录机器的 IP 地址
4.本程序使用的文件上传文件 upload.php 文件在当前路径下引用时可能在文件上传时会出 BUG ,调试得到的文件数据结构不是PHP接收文件的数据结构，产生原因还未知，因此使用 upload.php 文件时如果直接在本目录下引用上传不了文件时请将该文件放到其它文件夹
5.使用本程序请先下载 web-msg-sender 框架并将本工程下载的文件拷贝到 wen-msg-sender 工程目录下的 "web" 文件夹下

#项目说明
