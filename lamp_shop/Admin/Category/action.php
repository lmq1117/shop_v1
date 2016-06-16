<?php
    //包含初始化文件
    require '../init.php';
    //验证用户是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }
    //echo "<pre>";
        //print_r($_GET);
        //print_r($_POST);
    //echo "</pre>";
    //接收操作类型
    $handler = isset($_GET['handler']) ? $_GET['handler'] : '';

    switch($handler)
    {
        case 'addtopcategory':
            echo '添加顶级分类';
            //接收form表单传过来的分类名，父id，路径等信息
            $catename = $_POST['catename'];
            $pid = $_POST['pid'];
            $path = $_POST['path'];
            $addtime = time();

            //拼接sql
            $sql = "insert into `" . PIX . "category` (`pid`,`name`,`path`,`addtime`) values ({$pid},'{$catename}','{$path}',{$addtime})";
            //echo $sql;
            if($insertid = execu($sql))
            {
                echo '插入顶级分类成功！id是'.$insertid;
                echo '<meta http-equiv="refresh" content="2;url=./showcategory.php" />';exit;
            }

            break;
        case 'showcategory':
            echo '商品分类列表';
            $sql = "select * from `" . PIX . "category`";
            $categoryInfo = query($sql);

            break;
        case 'deletecategory':
            echo '删除商品分类';
            echo "<pre>";
                print_r($_GET);
            echo "</pre>";
            //接收url传过来的分类id
            $cid = $_GET['cid'];

            //判断该分类下面是否有子分类,有的话，不能删除，否则可以删除
            $sql = "select * from `" . PIX . "category` where `pid` = {$cid}";
            $hasChildCategory = query($sql);
//            echo '<pre>';
//            print_r($hasChildCategory);
//            echo '</pre>';
//            echo count($hasChildCategory);
//            exit;

            if(count($hasChildCategory) > 0)
            {
                echo '该分类下有子分类，不能删除<br>请先删除所有子分类再删除该分类';
                echo '<meta http-equiv="refresh" content="2;url=./showcategory.php?errno=c1" />';exit;


            }
            else
            {
                //判断该分类下有无商品，有商品不能删除
                $sql = "select * from `" . PIX . "commodity` where `cateid` = {$cid}";
                //echo $sql;
                $hasCommoditys = query($sql);

                if(count($hasCommoditys > 0))
                {
                    echo '该分类下还有商品吆，你考虑过他们的感受了么，不能删除！';
                    echo '<meta http-equiv="refresh" content="5;url=./showcategory.php" />';exit;
                }
                $sql = "delete from `" . PIX . "category` where `id` = {$cid}";
                $affectedRows = execu($sql);
                if($affectedRows == 1)
                {
                    echo '删除分类成功！';
                    echo '<meta http-equiv="refresh" content="3;url=./showcategory.php" />';exit;
                }
            }
            break;
        case 'editcategory':
            echo '修改商品分类';
            //接收表单提交过来的分类数据
            $id = $_GET['cid'];
            $name = htmlspecialchars($_POST['name']);
            $sql = "update `" . PIX . "category` set `name` = '{$name}' where `id` = {$id}";
            $affectedRows = execu($sql);
            if($affectedRows == 1)
            {
                echo '修改分类成功！2秒后跳转到分类列表';
                echo '<meta http-equiv="refresh" content="2;url=./showcategory.php" />';exit;
            }
            break;

        case 'addchildcategory':

            $pid = $_GET['pid'];
            //拼接path
            $path = $_POST['path'] . $pid . ',';
            $name = htmlspecialchars($_POST['categoryname']);
            $time = time();
            $sql = "insert into `" . PIX . "category` (`pid`,`name`,`path`,`addtime`) values ({$pid},'{$name}','{$path}',{$time})";
            if($insertid = execu($sql))
            {
                echo '增加子分类成功！2秒后跳转到分类列表';
                echo '<meta http-equiv="refresh" content="3;url=./showcategory.php" />';exit;
            }
            break;
    }

