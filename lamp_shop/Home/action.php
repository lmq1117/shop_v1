<?php

    /*
     *  前台所有模块公用action
     *
     *
     */

    require './init.php';

    //接收操作
    $handler = isset($_GET['handler']) ? $_GET['handler'] : '';
    if(empty($handler))
    {
        exit('非法访问！');
    }
    
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
            $name = $_POST['user'];
            $pass = md5(trim($_POST['pwd']));
            $sql = "select * from `" . PIX . "users` where `name` = '{$name}' and `status` = 1";
            
            //echo $sql;
            $user = query($sql);
            if(!empty($user))
            {
                $userInfo = $user[0];

                //登录成功
                if(is_array($userInfo))
                {
                    //用户名存在于数据库中，判断用户名密码是否匹配
                    if($name == $userInfo['name'])
                    {
                        //验证密码
                        if($pass != $userInfo['pass'])
                        {
                            echo '密码不正确 3秒后重新登录';
                            echo '<meta http-equiv="refresh" content="3;url=./login.php?errno=3" />';exit;
                        }
                        else
                        {
                            $_SESSION['userInfo'] = $userInfo;
                            echo '登录成功！3秒后跳转到首页';
                            echo '<meta http-equiv="refresh" content="3;url=./index.php" />';exit;
                        }
                    }
                    
                }
            }
            else
            {
                echo '用户名不正确，或没有权限登录后台<br> 3秒后重新登录';
                echo '<meta http-equiv="refresh" content="3;url=./login.php?errno=2" />';exit;
            }

            break;

            //前台退出功能
        case 'logout':
            if(isset($_SESSION['userInfo']))
            {
                session_destroy();
                echo '退出成功！';
                echo '<meta http-equiv="refresh" content="3;url=./index.php" />';exit;
            }

            break;
        case 'addtocard':
            //添加商品到购物车 需要用户登录状态
             if(empty($_SESSION['userInfo']))
            {
                header('location:./login.php');exit;
            }

             //接收商品id和库存
             $id = isset($_GET['id']) ? $_GET['id'] : 0 ;
             $num = isset($_GET['num']) ? $_GET['num'] : 1 ;

             if($id == 0)
             {
                echo '添加商品到购物车失败！';
                echo '<meta http-equiv="refresh" content="3;url=./index.php" />';exit;
             }

            //该商品首次添加到购物车中
             if(empty($_SESSION['card'][$id]))
             {
                //查询出该商品的信息，写入session
                 $sql = "select * from `" . PIX . "commodity` where `id` = {$id}"; 
                 $commodity = query($sql)[0];
                 $_SESSION['card'][$id] = $commodity;
                 $_SESSION['card'][$id]['num'] = $num;
             }
             else
            {
                $_SESSION['card'][$id]['num'] += $num;
            }

            //添加购物车完成 提示用户已经加进来了，然后提示用户去购物车还是去商品详情页
             //如果三秒钟用户没点 就跳转到购物车页面
             echo '添加商品 ' . $_SESSION['card'][$id]['name'] .' '. $num . ' 件到购物车成功！<br>';
             echo '<a href="./card.php">查看购物车</a>&nbsp;&nbsp;';
             echo '<a href="./detail.php?id='.$id.'">返回商品详情</a>&nbsp;&nbsp;';
             echo '<a href="./commoditylist.php?cid=1">返回商品列表</a>&nbsp;&nbsp;';
             echo '<meta http-equiv="refresh" content="5;url=./card.php" />';exit;
             break;
        //在购物车里修改商品数量 - +
        case 'reducenum':
            $id = isset($_GET['id']) ? $_GET['id'] : 0 ;
            $num = isset($_GET['num']) ? $_GET['num'] : 0 ;
            //如果没传id 跳转回购物车给出错误
            if($id == 0)
            {
                echo '修改购物车商品信息失败';
                echo '<meta http-equiv="refresh" content="3;url=./card.php" />';exit;
            }

            $_SESSION['card'][$id]['num'] = $_SESSION['card'][$id]['num'] > 1 ? $_SESSION['card'][$id]['num'] - 1 : 1;
            header('location:./card.php');exit;

            break;
        case 'addnum':
            //每点一次加号，数量加1
            $id = isset($_GET['id']) ? $_GET['id'] : 0 ;
            $num = isset($_GET['num']) ? $_GET['num'] : 0 ;
            //如果没传id 跳转回购物车给出错误消息
            if($id == 0)
            {
                echo '修改购物车商品信息失败';
                echo '<meta http-equiv="refresh" content="3;url=./card.php" />';exit;
            }

            $_SESSION['card'][$id]['num'] = $_SESSION['card'][$id]['num'] + 1;
            header('location:./card.php');exit;
            break;
        //删除购物车中商品
        case 'deleteitem':
            $id = isset($_GET['id']) ? $_GET['id'] : 0 ;
            if($id == 0)
            {
                echo '修改购物车商品信息失败';
                echo '<meta http-equiv="refresh" content="3;url=./card.php" />';exit;
            }

            unset($_SESSION['card'][$id]);
            header('location:./card.php');exit;
            break;


        //确认订单前添加地址
        case 'addaddress':
            //当用户没有下过单，插入一条虚拟订单 标识 status=4专用标识
            $address = htmlspecialchars($_POST['address']);
            $linkman = htmlspecialchars($_POST['linkman']);
            $phone = htmlspecialchars($_POST['phone']);
            $code = htmlspecialchars($_POST['code']);
            $uid = htmlspecialchars($_POST['uid']);
            $addtime = time();
            $total = 0;

            //组合sql语句
            $sql = "insert into `" . PIX . "orders` (`uid`,`linkman`,`address`,`code`,`phone`,`addtime`,`total`,`status`) values ('{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}','4')";
            //echo $sql;
            $insertId = execu($sql);
            if($insertId)
            {
                header('location:./confirm.php');exit;
            }

            break;

            //将订单信息，订单详情写入数据库中，释放购物车中商品信息
        case 'confirmedorder':
            //查询出虚拟订单中的联系人，电话等信息
            $uid = $_SESSION['userInfo']['id'];
            $sql = "select * from `" . PIX . "orders` where `uid` = $uid order by `addtime` desc limit 0,1" ;
            //echo $sql;exit;
            $orderInfo = query($sql)[0];
            if(!empty($orderInfo))
            {
                $linkman = $orderInfo['linkman'];
                $address = $orderInfo['address'];
                $code = $orderInfo['code'];
                $phone = $orderInfo['phone'];
                $addtime = time();
                $total = $_SESSION['totalPrice'];
            }
            $sql = "insert into `" . PIX . "orders` (`uid`,`linkman`,`address`,`code`,`phone`,`addtime`,`total`,`status`) values ('{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}','0')";
            $insertId = execu($sql);
            if($insertId)
            {
                $detailId = array();
                foreach($_SESSION['card'] as $val)
                {
                    //将订单信息插入订单详情表
                    $sql = "insert into `" . PIX . "detail` (`oid`,`cid`,`name`,`price`,`num`) values ('{$insertId}','{$val['id']}','{$val['name']}','{$val['price']}','{$val['num']}')" ;
                    //echo $sql;echo '<br>';
                    $detailId[] = execu($sql);
                }
            }

            //
            if(count($detailId) == count($_SESSION['card']))
            {
                //清空购物车里的商品信息
                unset($_SESSION['card']);
                unset($_SESSION['totalPrice']);
                unset($_SESSION['totalNum']);
                if(empty($_SESSION['card']) && empty($_SESSION['totalPrice']) && empty($_SESSION['totalNum']))
                {
                    echo '<h2>确认订单成功！让包裹飞一会儿</h2>';
                    echo '<meta http-equiv="refresh" content="3;url=./index.php" />';exit;
                }
            }

            break;
        case 'register':
            //接收表单提交的验证码
            $yzm = strtolower($_POST['yzm']);           //用户提交过来的验证码
            $code = strtolower($_SESSION['code']);
            //验证验证码
            if($yzm != $code)
            {
                unset($_SESSION['code']);
                unset($yzm);
                header('location:./register.php?error=1');exit;//error1 验证码不正确
            }

            //1接收表单中提交的 需要写入数据库中的数据
            $name = trim($_POST['name']);
            $pass = md5($_POST['pass']);
            $sex = 2;
            $grade = 3;
            $addtime = time();
            $icon = 'default.jpg';
            $status = 1;
            //2验证数据..用户的数据永远不要相信
            //不用非常严谨
            //htmlspecialchars();
            //验证用户名
            $msg['name'] = '';
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
                echo '<meta http-equiv="refresh" content="5;url=./register.php" />';
                exit;
            }
            else
            {
                $name = htmlspecialchars($name);
            }

            //验证此用户名是否已经注册
            $sql = "select * from `" . PIX . "users` where `name` = '{$name}'";
            $nameResult = query($sql);
            if(!empty($nameResult))
            {
                echo '此用户名已经被注册了，请换个用户名！';
                echo '<meta http-equiv="refresh" content="3;url=./register.php" />';
            }



            //3 验证通过插入数据
            //组合sql语句
            $sql = 'insert into `' . PIX . "users` (`name`,`pass`,`sex`,`icon`,`status`,`addtime`) values('{$name}','{$pass}','{$sex}','{$icon}',{$status},{$addtime})";
            //插入
            $insertId=execu($sql);
            if($insertId)
            {
                echo '注册新用户成功！3秒后跳转到登录页。';
                echo '<meta http-equiv="refresh" content="3;url=./login.php" />';
            }
            break;
            //用户确认收货操作
        case 'received':
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            if($id)
            {
                //准备sql语句，更新status
                $sql = "update `" . PIX . "orders` set `status` = 2 where id = {$id} and `uid` = {$_SESSION['userInfo']['id']}";
                //echo $sql;exit;
                $affectRow = execu($sql);
                if($affectRow == 1)
                {
                    echo '确认收货成功！';
                    echo '<meta http-equiv="refresh" content="3;url=./myorderlist.php" />';exit;
                
                }
                else
                {
                    echo '确认收货失败！';
                    echo '<meta http-equiv="refresh" content="3;url=./myorderlist.php" />';exit;
                }
            }
            else
            {
                echo '操作非法，请不要开玩笑！';
                echo '<meta http-equiv="refresh" content="3;url=./myorderlist.php" />';exit;
                exit;
            }

            break;
        case 'addcomment':
            //判断有无订单id
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $oid = isset($_POST['oid']) ? $_POST['oid'] : '';
            $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
            if($id == '' || $oid === '' || $comment === '')
            {
                echo '评论不成功';
            }
            //准备sql
            $sql = "insert into `" .PIX. "comment` (`oid`,`cid`,`content`) values ({$oid},{$id},'$comment')";
            // echo $sql;
            $insertId = execu($sql);
            if($insertId)
            {
                //修改dteail表，设置已评论
                $sql = "update `" . PIX . "detail` set `is_comment` = 1 where `oid` = {$oid} and `cid` = {$id}";
                $affectrow = execu($sql);
                if($affectrow == 1)
                {
                    echo '提交评论成功！';
                    echo '<meta http-equiv="refresh" content="3;url=./commentlist.php" />';exit;
                }
                else
                {
                    echo '修改评论状态失败！';
                    exit;
                }
            }
            else
            {
                echo '评论失败！！！';exit;
            }

            break;
            // 评论回复功能
        case 'commentanswer':
                //商品id，用户处理完回复评论后跳转
                $id=isset($_POST['id']) ? $_POST['id'] : '';
                
                //接收表单提交的数据
                //回复评论的内容
                $words = isset($_POST['commentAnswerInput']) ? $_POST['commentAnswerInput'] : '' ;
                //谁回复的（这里应该写id）
                $uid = isset($_POST['uid']) ? $_POST['uid'] : '' ;
                //商品评论的id
                $pid = isset($_POST['pid']) ? $_POST['pid'] : '' ;
                if(empty($_SESSION['userInfo']))
        		{
        			echo '未登陆用户，不可以回复评论！';
                    echo '<meta http-equiv="refresh" content="3;url=./detail.php?id='.$id.'" />';exit;
        		}
                $sql = "insert into `" . PIX . "commentanswer` (`pid`,`words`,`uid`) values ($pid,'{$words}','{$uid}')";
                // echo $sql;
                $insertId = execu($sql);
                if($insertId)
                {
                    header("location:./detail.php?id={$id}");
                }
            break;
    }
