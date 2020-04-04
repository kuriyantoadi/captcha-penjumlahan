<?php
session_start();
header("Content-type: image/png");
function GenerateCode() {
	$possible ='123456789';
	$operator ='+x-';
	$admin    = array('?', '!', '&');
	$a = substr($possible, mt_rand(0, strlen($possible)-1), 1);
	$b = substr($possible, mt_rand(0, strlen($possible)-1), 1);
	$opr = substr($operator, mt_rand(0, strlen($operator)-1), 1);
	if($opr=='+'){
		$res = $a + $b;
	}
	else if($opr=='x'){
		$res = $a * $b;
	}
	else{
		$res = $a - $b;
	}
	$code['adm']  = $admin[mt_rand(0, strlen($operator)-1)];
	$code['res']  = $res;
	$code['text'] = $a.' '.$opr.' '.$b.' = ?';
	return $code ;
}
$font='./broadway.ttf';
$images='background.png';
$im = imagecreatefrompng($images)or die("Cannot Initialize new GD image stream");
$black = imagecolorallocate($im, 0, 0, 0);
$grey  = imagecolorallocate($im, 255, 99, 00);
// The text to draw
$string=GenerateCode();
$_SESSION['key']=$string['res'];
imagettftext($im, 15, 0, 10, 20, $black, $font, $string['text']);
imagettftext($im, 10, 0, 130, 10, $grey, $font, $string['adm']);
imagettftext($im, 8, 0, 50, 34, $grey, $font, '-_-');
imagepng($im);
imagedestroy($im);
