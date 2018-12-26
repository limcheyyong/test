<?php
require_once("dbconfig.php");
require_once("factory.php");
function updateOrder($num){
 global $db;
 $sql = "update factory set ord = ? where 1 ORDER BY fid DESC LIMIT 1";
 $stmt = mysqli_prepare($db, $sql);
 mysqli_stmt_bind_param($stmt, "i",$num);
 mysqli_stmt_execute($stmt); 
 return;
}
function addOrder($num){
 global $db;
 $sql = "insert into  factory(ord) values(0)";
 $stmt = mysqli_prepare($db, $sql);
 mysqli_stmt_bind_param($stmt, "i",$num);
 mysqli_stmt_execute($stmt); 
 return;
}
function period(){
 global $db;
 $sql = "update factory set period = period +1 Where EXISTS (select fid,max(fid) 
group by fid)";
 $stmt = mysqli_prepare($db, $sql);
 mysqli_stmt_bind_param($stmt);
 $result=mysqli_stmt_execute($stmt); 
 return $result;  
}
function orderlist(){
	global $db;
	$sql = "select * from `factory`;";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
?>