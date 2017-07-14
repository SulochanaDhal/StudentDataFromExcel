<?php
require("reader.php");
$file="student.xlsx";
$connection=new Spreadsheet_Excel_Reader();
$connection->read($file);
$startrow=2;
$endrow=3;
$col=3;
for($i=$startrow;$i<$endrow;$i++){
echo $connection->sheets[0]["cells"][$i][$col]."/br";
 }
 ?>
