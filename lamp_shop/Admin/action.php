<?php
    //包含初始化文件
    require './init.php';
    $handler = isset($_GET['handler']) ? $_GET['handler'] : '';
    switch($handler)
    {
        case 'login':
            //验证验证码
            $yzm = strtolower($_POST['yzm']);
            $code = strtolower($_SESSION['code']);
            if($yzm != $code){
                //header('location:./login.php?error=1');exit;
                echo '验证码不正确，请重新登录';
                echo '<meta http-equiv="refresh" content="3;url=./login.php?errno=1" />';
                exit;
            }
            

            //验证用户名密码是否正确
            $name = $_POST['username'];
            $pass = md5($_POST['password']);
            $sql = "select * from `" . PIX . "users` where `name` = '{$name}' and `grade` < 2 and `status` = 1";
            
            //echo $sql;
            $user = query($sql);
            if(!empty($user))
            {
                $userInfo = $user[0];
            }
            else
            {
                echo '用户名不正确，或没有权限登录后台<br> 3秒后重新登录';
                echo '<meta http-equiv="refresh" content="3;url=./login.php?errno=2" />';exit;
            }

            if(is_array($userInfo))
            {
                //用户名存在于数据库中，判断用户名密码是否匹配
                if($name == $userInfo['name'])
                {
                    if($pass != $userInfo['pass'])
                    {
                        echo '密码不正确 3秒后重新登录';
                        echo '<meta http-equiv="refresh" content="3;url=./login.php?errno=3" />';exit;
                    }
                    else
                    {
                        $_SESSION['userInfoAdmin'] = $userInfo;
                        echo '登录成功！';
                        echo '<meta http-equiv="refresh" content="1;url=./index.php" />';exit;
                    }
                }
                
            }

            
            //验证用户是否存在
            break;
        case 'logout':
            session_destroy();
            echo '退出成功！';
            echo '<meta http-equiv="refresh" content="1;url=./login.php" />';exit;
            break;
}
