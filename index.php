<?php session_start(); ?>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
if(isset($_POST['submit'])){
	if($_POST['captcha']==$_SESSION['key']){
		echo 'Captcha Benar';
	}
	else{
		echo 'Kode Captcha Salah';
	}
}

?>
<form method="post" action="">
Berapa Nilai dari : <img src="captcha.php" align="absmiddle" /> &raquo; <input type="text" name="captcha"> <input type="submit" name="submit" value="OK">
</form>
</body>
</html>