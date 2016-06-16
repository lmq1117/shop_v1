<?php
    //包含初始化文件
    require '../init.php';
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }

    $handler = isset($_GET['handler']) ? $_GET['handler'] : '';
    //echo '操作是'.$handler;
    $msg = array('name'=>'','tel'=>'','email'=>'');
    switch($handler)
    {       
                /**
                 *  添加用户
                 *  date 2016-04-12
                 *  kevin
                 *  添加用户数据验证
                 *
                 *  bug1 用户名太短时 notice错误 已修复
                 */

            case 'doadduser':

                
                //echo 'switch->里面的操作是：' . $handler;
                //接收表单提交的验证码
                $yzm = strtolower($_POST['yzm']);           //用户提交过来的验证码
                $code = strtolower($_SESSION['code']);
                //验证验证码
                if($yzm != $code)
                {
                    unset($_SESSION['code']);
                    unset($yzm);
                    header('location:./useradd.php?error=1');exit;//error1 验证码不正确
                }

                //上传头像
                if($_FILES['myfile']['error'] == 0 )
                {
                    $allowType = array('image/jpeg','image/jpg','image/png','image/gif');
                    $uploadedInfo = upload('myfile','../../Common/Public/images/user/header/',$allowType);
                    //缩放一下
                    $srcPath ='../../Common/Public/images/user/header/' . $uploadedInfo['imageName'];
                    $zoomedPic = zoom($srcPath,dirname($srcPath),150,150);
                    //删除没卵用的大图
                    unlink($srcPath);
                }

                //1接收表单中提交的 需要写入数据库中的数据
                $name = trim($_POST['name']);
                $pass = md5($_POST['pass']);
                $sex = $_POST['sex'];
                $tel = trim($_POST['tel']);
                $email = trim($_POST['email']);
                $grade = $_POST['grade'];
                $addtime = time();
                $icon = empty($zoomedPic) ? 'default.jpg' : $zoomedPic;
                $status = 1;
                //2验证数据..用户的数据永远不要相信
                //不用非常严谨
                //htmlspecialchars();
                //验证用户名
                if(strlen($name) < 6)
                {
                    $msg['name'] .= '用户名太短了<br>';
                }
                //特殊字符
                $pattern = "/[<>?@#$%^&*()!]+/";
                if(preg_match($pattern,$name))
                {
                    $msg['name'] .= '用户名不能有特殊字符<br>';
                }
                if(!empty($msg['name']))
                {
                    echo $msg['name'];
                    echo '<meta http-equiv="refresh" content="3;url=./useradd.php" />'; 
                    exit;
                }
                else
                {
                    $name = htmlspecialchars($name);
                }
                
                //验证密码
                //$pattern = "//";



                //验证手机号码
                $pattern = "/^1[34578]\d{9}$/";
                if(!preg_match($pattern,$tel))
                {
                    $msg['tel'] .= '手机号码不合法';
                    echo $msg['tel'];
                    echo '<meta http-equiv="refresh" content="3;url=./useradd.php"';
                    exit;
                }


                //验证邮箱
                $pattern = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
                if(!preg_match($pattern,$email))
                {
                    $msg['email'] .= '手机号码不合法';
                    echo $msg['email'];
                    echo '<meta http-equiv="refresh" content="3;url=./useradd.php"';
                    exit;
                }
                else
                {
                    $email = htmlspecialchars($email);
                }
                
                //3 插入数据
                //组合sql语句
                $sql = 'insert into `' . PIX . "users` (`name`,`pass`,`sex`,`tel`,`email`,`icon`,`grade`,`status`,`addtime`) values('{$name}','{$pass}','{$sex}','{$tel}','{$email}','{$icon}',{$grade},{$status},{$addtime})";
                //插入
                execu($sql);
                //header('location:./userlist.php');exit;
                echo '添加用户成功！3秒后跳转到用户列表。';
                echo '<meta http-equiv="refresh" content="3;url=./userlist.php" />';
                
                break;

                /*
                 *  删除用户
                 */
            case 'dodeluser':
                // 1 接收用户的id
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                // 2 准备sql
                $sql = "delete from `" . PIX . "users` where `id` = {$id}";
                // 3 执行sql
                $affectedRows = execu($sql);
                if($affectedRows == 1)
                {
                    //header('location:./userlist.php');exit;
                    echo '删除用户成功！3秒后跳转到用户列表。';
                    echo '<meta http-equiv="refresh" content="3;url=./userlist.php" />';
                }
                break;
                /*
                 *  登录部分,已经挪到admin/action.php里                 
                 */
                
                /*
                 *  修改用户信息
                 */
            case 'doedituser':
                //接收get过来的 id
                $id = $_GET['uid'];

                //接收post过来的用户信息
                $name = $_POST['username'];
                $sex = $_POST['sex'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $grade = $_POST['grade'];
                $status = $_POST['status'];
                $addtime = time();
                //当两次密码输入不一致时，退回重改
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                if($pass != $repass)
                {
                    echo '两次密码输入不一致，3秒后退回重改';
                    echo '<meta http-equiv="refresh" content="3;url=./useredit.php?uid='.$id.'"/>';
                    exit;
                }

                if(empty($pass))
                {   //去数据库里取出新密码
                    $sql = "select `id`,`name`,`pass` from `" . PIX . "users` where id = {$id}";
                    $val = query($sql)[0];
                    $pass = $val['pass'];
                }
                else
                {   //MD5后待用
                    $pass = md5($pass);
                }

                //处理头像
                if($_FILES['myfile']['error'] == 0)
                {
                    //处理文件上传
                    //上传头像
                    $allowType = array('image/jpeg','image/jpg','image/png','image/gif');
                    $uploadedInfo = upload('myfile','../../Common/Public/images/user/header/',$allowType);
                    $srcPath = '../../Common/Public/images/user/header/' . $uploadedInfo['imageName'];

                    //缩放一下
                    $icon = zoom($srcPath,dirname($srcPath),100,100);
                    unlink($srcPath);
                }
                else
                {
                    $icon = $_POST['icon'];
                }

                //验证name字段唯一性
                $sql = "select `name` from `" . PIX . "users` where `name` = '{$name}' or `id` = {$id}";
                $result = query($sql);
                $names = [];
                foreach($result as $key=>$val)
                {
                    foreach($val as $k=>$v)
                    {
                        $names[] = $v;
                    }
                }

                if(count($names ) > 1){
                    $msg['name'] .= "新名字在数据库中已存在,改一下用户名";
                    echo $msg['name'];
                    echo '<meta http-equiv="refresh" content="3;url=./useredit.php?uid='.$id.'" />'; 
                    exit;
                    
                }
                

                //准备sql
                $sql = "update `" . PIX . "users` set `name`='{$name}',`pass`='{$pass}',`sex`='{$sex}',`tel`='{$tel}',`email`='{$email}',`icon`='{$icon}',`grade`='{$grade}',`status`='{$status}',`addtime`='{$addtime}' where `id` = {$id}";
                //执行sql
                $info = execu($sql);
                if($info){
                    echo '修改成功，3秒后返回用户列表';
                    echo '<meta http-equiv="refresh" content="3;url=./userlist.php" />';
                }

                break;
                /*
                 *  修改用户状态
                 */
            case 'doeditstatus':
                $status = $_GET['stat'];
                $id = $_GET['uid'];
                if($status)
                {
                    $status = '0';
                }
                else
                {
                    $status = '1';
                }

                $sql = "update `" . PIX . "users` set `status` = {$status} where `id` = {$id}";
                $affetctedrow = execu($sql);
                if($affetctedrow == 1)
                {
                    header('location:./userlist.php');exit;
                }
            break;
    }
