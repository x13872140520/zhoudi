<?php
require_once 'include.php';
checkLogined();
//session_start();
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if($verify1==$verify){
	
	$sql="select * from imooc_admin where username = '{$username}' and password='{$password}'";
	$res=checkAdmin($sql);
	if($res){
		$_SESSION['adminName']=$res['username'];
		$_SESSION['adminId']=$res['id'];
		header("location:index.php");
	}else{
		alertMes("账号/密码输入错误，请重新输入","login.php");

	}
	
}else{
	echo "<script>alert('验证码错误');</script>";
	echo "<script>window.location='login.php';</script>";
	
}
?>