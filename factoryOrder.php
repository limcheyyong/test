<?php
require_once("fOrderView.php");
$num = (int)$_POST["num"];
 period();
updateOrder($num);

addOrder($num);
header("Location: factory.php");
?>