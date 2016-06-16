<?php
    //初始化文件，做一些项目的配置
    header("content-type:text/html;charset=utf-8");
    
    //本地路径
    $localPath = str_replace('\\','/',dirname(__FILE__)) . '/';
    //echo $localPath;
    define('LOCALPATH',$localPath);

    //导入配置文件
    require LOCALPATH . '../Common/config.php';
    //导入公共函数库
    require LOCALPATH . '../Common/functions.php';
    //开启会话控制
    session_start();

