<?php

/**
 * 连接数据库
 * @return resource
 */
function connect(){
	$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
	mysqli_set_charset($link,DB_CHARSET);
// 检查连接
if (!$link)
{
    die("连接错误: " . mysqli_connect_error());
} 
	return $link;
}

function connect(){
	$link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
	return $link;
}
/**
 * 完成记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
 $keys=join(",",array_keys($array));
 $vals="'".join("','",array_values($array))."'";
 $sql="insert {$table} ($keys) values({$vals})";
 mysqli_query($link, $sql);
 return mysqli_insert_id($link);
}

/**update imooc_admin set username='zhoudi' where id=1;
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */

function update($table,$array,$where){
	$str="";
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
		
		}
		$sql="update {$table} set {$str}".($where==null?null:"where".$where);
		mysqli_query($link,$sql);
		mysqli_affected_rows($link);
}

/**
 *	删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
 function delete($table,$where){
 	$where=$where ==null? null:"where".$where;
 	$sql="delete from {$table} {$where} ";
 	mysqli_query($link,$sql);
 	return mysqli_affected_rows($link);
 }

/**
 *得到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
 function fet($sql,$result_type=MYSQLI_BOTH){
 	$result=mysqli_query($link,$sql);
 	$row=mysqli_fetch_array($result,$result_type);
 	return $row;

 }
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result,$result_type);
	return $row;
}
/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQLI_BOTH){
	$resutl=mysqli_query($link,$sql);
	$rows=mysqli_fetch_all($result,$result_type);
	return $rows;
}
/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql){
	$result=mysqli_query($link,$sql);
	return mysqli_num_rows($result);
}
/**
 * 得到上一步插入记录的ID号
 * @return number
 */
 function getInsertId(){
	return mysqli_insert_id($link);
 }
 ?>