<?php
	// 设置字符集
	header("content-type:text/html;charset=utf-8");
	
	// 图宽
	$width = 130;
	// 图高
	$height = 34;
	// 验证码的长度
	$length = 4;
	// 字体样式
	$fontstyle = './font/MSYHBD.TTF';
	//字体大小
	$fontsize = 20;

	// 1.创建画布
	$img = imagecreatetruecolor($width,$height);

	// 分配颜色
	$bgcolor = imagecolorallocate($img,mt_rand(180,240),mt_rand(180,240),mt_rand(180,240));
	//填充
	imagefill($img,0,0,$bgcolor);


	// 画干扰
	$str = '!@#$%^&*()_+.,[]:<>'; // 手动写一些奇葩的符号
	$str_len = strlen($str);
	for($i = 0; $i < $str_len; $i++){
		// 分配字体颜色
		$fontcolor = imagecolorallocate($img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
		imagettftext($img,8,mt_rand(0,360),mt_rand(0,$width),mt_rand(0,$height),$fontcolor,	$fontstyle,$str[$i]);
	}




	// 生成随机验证码
    $code_small = range('a','z');
    unset($code_small[7]);
    unset($code_small[11]);
    unset($code_small[14]);
    $code_big = range('A','Z');
    unset($code_big[7]);
    unset($code_big[11]);
    unset($code_big[14]);
    $code_num = range(2,9);
    $code_zw = array();
    // $code_zw = array('我','是','热','人','中','过','和','在','你','吃','菜','不','洗','西','东','啊','阿','嗄','嘿','赛');

	// 合并成一个数组
	$list = array_merge($code_small,$code_big,$code_num,$code_zw);
	// 随机打乱数组
	shuffle($list);

	// 用于存储验证码
	$code = ''; 

	for($i = 0; $i < $length; $i++){
		// 分配字体颜色
		$fontcolor = imagecolorallocate($img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
		imagettftext(
			$img, // 操作谁
			$fontsize, // 字体大小
			mt_rand(-40,40), // 角度
			(($i * $fontsize) +  ($width - ($length  * $fontsize)) / 2), // 字体坐标X
			(($height - $fontsize) / 2) + $fontsize, // 字体坐标Y
			$fontcolor, // 字体颜色
			$fontstyle, // 字体样式
			$list[$i]); // 内容
			$code .= $list[$i];
	}
	
	
	// 开启会话跟踪
	session_start();
	// 将验证码存入session
	$_SESSION['code'] = $code;

	header('content-type:image/jpeg');
	imagejpeg($img);
	imagedestroy($img); 


