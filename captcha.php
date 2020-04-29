<?php
session_start();
$text=rand(10000,99999);
$_SESSION['vercode']=$text;
$hight=25;
$width=70;
$image=imagecreate($width, $hight);
$black=imagecolorallocate($image, 0, 0, 0);
$white=imagecolorallocate($image, 255, 255, 255);
imagestring($image, 14, 5, 5, $text, $white);
imagejpeg($image,null,80);

?>