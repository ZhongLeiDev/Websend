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
8.本程序在搜狗浏览器上测试，对于不同浏览器可能会存在兼容问题而导致显示问题或者函数调用问题，需要特别注意。<br><br>

#项目说明
1.界面说明：<br><br>
（1）web-msg-sender 主界面：<br>

![image](https://github.com/ZhongLeiDev/ZhongLeiDev.github.io/blob/master/websendimg/index.png)

此界面是 web-msg-sender 项目的使用主界面，查看 HTML 源码可以了解此项目的使用方法，本机下的访问链接为'http://localhost:2123/'。

（2）本项目的服务器配置界面：<br>

![image](https://github.com/ZhongLeiDev/ZhongLeiDev.github.io/blob/master/websendimg/console.png)

此界面是本项目的服务器设置界面，在本机的访问连接为 'http://localhost:2123/client.html'（如果你将自己的PC机当做服务器的话）， 当在非服务器的 PC 上
访问时，就要将 localhost 设置为服务器的 IP 地址。在这个界面中，可以对整个程序的后台进行设置，包括：

上传 PDF 文档到服务器，拆分 PDF 文档为分页图片，将分页好的图片显示在客户端以及向全部已登录的客户端或者特定的客户端发送消息等。

在图片显示区域可以显示对应标签的 PDF 分割成的图片分页文件的预览图，点击任意预览图会在页面以蒙版的形式显示原始图片。

在信息分发框中输入 "SHOW" 并点击"发送"按钮，客户端会显示当前客户端是第几号客户端，这也是由客户端的IP地址决定的，比如说 192.168.1.101 号 IP 对应的客户端即为 1 号客户端，界面会显示红色的 "1"。

（3）本项目的客户端界面：<br>

![image](https://github.com/ZhongLeiDev/ZhongLeiDev.github.io/blob/master/websendimg/client.png)

此界面用来接收服务器设置界面发送过来的指令，达到显示图片以及信息的作用。项目默认最大可以支持 12 个客户端同时在线正常运行，这 12 个客户端的 IP 地址分别是从 192.168.1.100~192,。168.1.111 ，如果需要支持超过 12 个客户端，需要在本项目文件夹下的 client.html(设置 IP 以及 uid )、Console.html (设置图片预览的幅数)文件进行相关信息的添加以及 server.php(对客户端 uid 进行识别与信息分发)的重新编辑。
