<?php
    require '../init.php';
    $handler = isset($_GET['handler']) ? $_GET['handler'] : '';

    switch($handler)
    {
        case 'addcommodity':
            //echo '执行的的商品添加操作';

            //接收表单提交过来的商品信息
            $cateid = $_POST['cateid'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $store = $_POST['store'];
            $describe = $_POST['describe'];
            $display = $_POST['display'];
            $status = $_POST['status'];
            $addtime = time();

            //验证数据
            $name = htmlspecialchars($name);
            $price = htmlspecialchars($price);
            $store = htmlspecialchars($store);
            $describe = htmlspecialchars($describe);

            //商品价格不能小于0
            if($price < 0)
            {
                echo '商品价格不能为负数';
                echo '<meta http-equiv="refresh" content="3;url=./addcommodity.php" />';exit;
            } 

            if($store < 0)
            {
                echo '商品库存不能为负数';
                echo '<meta http-equiv="refresh" content="3;url=./addcommodity.php" />';exit;
            }

            if(empty($cateid))
            {
                echo '商品分类必填';
                echo '<meta http-equiv="refresh" content="3;url=./addcommodity.php" />';exit;
            }

            //上传并处理图片
            if($_FILES['picture']['error'] == 0)
            {
                $picture = 'picture';
                //echo LOCALPATH;
                //C:/wamp/Apache24/htdocs/objiect04/lamp_shop/Admin/
                $savePath = LOCALPATH . "../Common/Public/images/commodity/";
                $allowType = array('image/gif','image/png','image/jpeg','image/jpg');
                $maxSize = 1024000;//1M 23891 23K 单位是字节
                $uploadedInfo = upload($picture,$savePath,$allowType,$maxSize);
            }

            if($uploadedInfo['status'])
            {
                //缩放用户上传的图片
                $srcPath = $savePath . $uploadedInfo['imageName'];
                $zoomInfo = zoom($srcPath,$savePath,200,200);
            }

            if($zoomInfo)
            {   
                //删除用户上传的大图
                unlink($srcPath);
                $picName = $zoomInfo;
            }

            //上传缩放完成 准备sql
            $sql = "insert into `" . PIX . "commodity` (`cateid`,`name`,`picture`,`price`,`store`,`describe`,`display`,`status`,`addtime`) values ('{$cateid}','{$name}','{$picName}','{$price}','{$store}','{$describe}','{$display}','{$status}','{$addtime}')";
            $affectRows = execu($sql);
            if($affectRows)
            {
                echo '添加商品成功！3秒后跳转到商品列表';
                echo '<meta http-equiv="refresh" content="3;url=./showcommodity.php" />';exit;
            }
            break;

        case 'editcommodity':

            //接收url传来的id
            $id = $_GET['id'];
            //接收表单提交来的数据
            //接收表单提交过来的商品信息
            $cateid = $_POST['cateid'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $store = $_POST['store'];
            $describe = $_POST['describe'];
            $display = $_POST['display'];
            $status = $_POST['status'];
            $addtime = time();

            //验证数据
            $name = htmlspecialchars($name);
            $price = htmlspecialchars($price);
            $store = htmlspecialchars($store);
            $describe = htmlspecialchars($describe);

            //商品价格不能小于0
            if($price < 0)
            {
                echo '商品价格不能为负数';
                echo '<meta http-equiv="refresh" content="3;url=./addcommodity.php" />';exit;
            } 

            if($store < 0)
            {
                echo '商品库存不能为负数';
                echo '<meta http-equiv="refresh" content="3;url=./addcommodity.php" />';exit;
            }

            if(empty($cateid))
            {
                echo '商品分类必填';
                echo '<meta http-equiv="refresh" content="3;url=./editcommodity.php?id='.$id.'" />';exit;
            }
            
            $originalPicPath = LOCALPATH . "../Common/Public/images/commodity/" . $_POST['originalpic'];
            //上传并处理图片
            if($_FILES['picture']['error'] == 0)
            {
                $picture = 'picture';
                //echo LOCALPATH;
                //C:/wamp/Apache24/htdocs/objiect04/lamp_shop/Admin/
                $savePath = LOCALPATH . "../Common/Public/images/commodity/";

                $allowType = array('image/gif','image/png','image/jpeg','image/jpg');
                $maxSize = 1024000;//1M 23891 23K 单位是字节
                $uploadedInfo = upload($picture,$savePath,$allowType,$maxSize);

                            if($uploadedInfo['status'])
            {
                //缩放用户上传的图片
                $srcPath = $savePath . $uploadedInfo['imageName'];
                $zoomInfo = zoom($srcPath,$savePath,200,200);
            }

            if($zoomInfo)
            {   
                //删除用户上传的大图
                unlink($srcPath);
                $picName = $zoomInfo;
                //删除原来的图片
                
                unlink($originalPicPath);
            }
            }


            //如果没有图片上传，图片名用原来的
            if(empty($picName))
            {
                $picName = basename($originalPicPath);
            }
            //准备sql语句
            $sql = "update `" . PIX . "commodity` set `cateid`='{$cateid}',`name`='{$name}',`picture`='{$picName}',`price`='{$price}',`store`='{$store}',`describe`='{$describe}',`display`='{$display}',`status`='{$status}',`addtime`='{$addtime}' where `id` = {$id}";
            //echo $sql;
            $affectrows = execu($sql);
            if($affectrows == 1)
            {
                echo '修改商品成功！2秒后跳转到商品列表';
                echo '<meta http-equiv="refresh" content="2;url=./showcommodity.php" />';exit;
                
            }

            break;

        case 'deletecommodity':

                //接收id
                $id = isset($_GET['id']) ? $_GET['id'] : '' ;
                
                //准备sql语句
                $sql = "delete from `" . PIX . "commodity` where `id` = {$id}";

                $affectrows = execu($sql);
                if($affectrows == 1)
                {
                echo '删除商品成功！2秒后跳转到商品列表';
                echo '<meta http-equiv="refresh" content="2;url=./showcommodity.php" />';exit;
                }
            break;
    }
