<?php
//输出管理员信息
function checkAdmin($sql){
	return fetchOne($sql);
}
/*检查后台管理员是否登录*/
function checkLogined(){
	if($_SESSION['adminId']==""){
		if(!isset($_COOKIE['adminId'])){
	alertMes("请先登录","login.php");
}
}
}
/*后台点击退出后注销管理员*/
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:login.php");
}
?>