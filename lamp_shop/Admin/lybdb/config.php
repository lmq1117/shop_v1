<?php
    header("Content-Type:text/html;charset=UTF-8");
    date_default_timezone_set("PRC");
    define('HOST','localhost');//主机名
	define('USER','root');//用户名
    define('PASS','123456');//密码
	define('DBNAME','g14_shop');//数据库名
	define('CHARSET','utf8');//字符集
	define('PREFIX','shop_');//数据表前缀
    define('PAGENUM',5);//每页显示数据条数