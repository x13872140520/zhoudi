<?php
// 检查PHP运行环境，以及是否打开GD phpinfo();
//phpinfo();
$image=imagecreatetruecolor(160,40);
$bgcolor=imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$bgcolor);
$fontfile=array('msyh.ttf','msyhbd.ttf','simfang.ttf','simhei.ttf','simkai.ttf');
for($i=0;$i<4;$i++){
	$fontsize=16;
	$color=imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
	$x=$i*40+rand(0,24);
	$y=rand(16,30);
	$content=rand(0,9);
	$angle=rand(-30,30);
	$fontfiles="../fonts/".$fontfile[rand(0,count($fontfile)-1)];
	imagettftext($image,$fontsize,$angle,$x,$y,$color,$fontfiles,$content);
}

header('Content-type:image/png');
imagepng($image);
imagedestroy($image);


?>