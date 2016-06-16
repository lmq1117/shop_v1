<?php
    /**
     * Created by PhpStorm.
     * User: kevin
     * Date: 2016/4/13
     * Time: 22:27
     */
    //导入初始化文件
    require '../init.php';
//导入分页类
    require '../../Common/class/page.class.php';
    //验证是否登录
    if(empty($_SESSION['userInfoAdmin']))
    {
        header('location:../login.php');exit;
    }
    //处理搜索
    $where = '';

    $s = isset($_POST['s']) ? $_POST['s'] : '' ;
    if($s)
    {
    	$key = isset($_POST['key']) ? $_POST['key'] : '' ;
    	if($key){
    		switch ($s) {
    			case 'sid':
    				$where = " where `id` = $key";
    				break;
    			
    			case 'sname':
    				$where = " where `name` like '%{$key}%'";
    				break;
    		}
    	}
    }
    else
    {
    	$where = '';
    }


    //处理分页
    $sql = "select * from `". PIX ."commodity` {$where}";
    $result = query($sql,true);
    $total = $result['total'];
    //每页显示几条
    $prePage = 5;

    //实例化分页类
    $page = new Page($total,$prePage);
    //准备sql
    $sql = "select * from `" . PIX . "commodity` {$where} {$page->limit}";
    $goodsList = query($sql);
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title></title>

</head>
<body>
    <h2>商品列表</h2>
    <div style="margin-left:0px;margin-bottom:10px;">
        <form action="" method="post">
            <select name="s">
                <option value="sid">搜商品ID</option>
                <option value="sname">搜商品名</option>
            </select>
            <input type="text" name="key"/>
            <input type="submit" value="搜索">
        </form>
    </div>
<table border="1" cellspacing="0" cellpadding="5">
    <!--表头数据-->
    <tr>
        <th>ID</th>
        <th>CATEID</th>
        <th>商品名称</th>
        <th>商品图片</th>
        <th>价格</th>
        <th>库存</th>
        <th>点击量</th>
        <th>已售</th>
        <th>描述</th>
        <th>是否显示</th>
        <th>状态</th>
        <th>添加时间</th>

        <th>操作</th>
    </tr>

    <!--遍历-->
    <?php if(!empty($goodsList)): ?>
    <?php foreach($goodsList as $key => $val): ?>
        <tr>
            <td><?= $val['id']?></td>
            <td><?= $val['cateid']?></td>
            <td><?= $val['name']?></td>
            <td>
            <?php
            echo '<img src="../../Common/Public/images/commodity/'.$val['picture'].'" style="width:35px;height:35px;" />';
            ?>
            </td>
            <td><?= $val['price'] ?></td>
            <td><?= $val['store']?></td>
            <td><?= $val['views']?></td>
            <td><?= $val['buy'] ?></td>
            <td><p style="width:100px;height:35px;overflow:hidden;text-overflow:ellipsis;"><?=  $val['describe'] ;?></p></td>
            <td><?=  $val['display'] ;?></td>
            <td><?=  $val['status'] ;?></td>

            <td><?= date('Y-m-d H:i:s',$val['addtime'])?></td>

                <td><a href="./editcommodity.php?id=<?= $val['id'];?>">编辑</a>/<a href="action.php?handler=deletecommodity&id=<?= $val['id']?>">删除</a></td>
        </tr>
    <?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="13"><?php echo '查无数据！'; ?></td>
	<tr>
	<?php endif; ?>
    <tr>
        <td colspan="13" align="left">
            <?php
                echo $page->config();
            ?>
        </td>
    </tr>

</table>
</body>
</html>
