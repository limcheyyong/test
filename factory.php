<?php
require_once("dbconfig.php");
require_once("fOrderView.php");
// checkLogin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

<p>Factory </p>
<hr />
<table width="200" border="1" class="" >
  <tr>
    <td>週次</td>
    <td>到貨量</td>
    <td>庫存量</td>
    <td>需求量</td>
	<td>訂貨量</td>
	<td>當期成本</td>
	<td>成本累計</td>
  </tr>
  
<?php
$total = 0;
$result = orderlist();
while (	$rs = mysqli_fetch_assoc($result)) {
    
	$total = $total + $rs['cost'];
	echo "<tr><td>" , $rs['period'],"</td>";
	echo"<td>" , $rs['arrival'],"</td>";
	echo"<td>" , $rs['stock'],"</td>";
	echo"<td>" , "需求量","</td>";
	echo"<td>" , $rs['ord'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $total, "</td></tr>";
    }
?>
</table>

<hr/>
	<form method = "POST" action = "factoryOrder.php">
		<input type = "text" name = "num"><br>
		<input type = "submit" value = "下單"> 
	</form>
</body>
</html>
