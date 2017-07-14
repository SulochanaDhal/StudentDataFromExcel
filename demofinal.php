<?php
$a=$_POST['hltn'];
include '/Classes/PHPExcel.php';
    $dataFfile = "C:/xampp/htdocs/abc/student2.xls";
    $objPHPExcel = PHPExcel_IOFactory::load($dataFfile);

    $st=substr($a,8,2);
    if($a=='13NM1A05A4'||$a=='14NN1A0505')
        $sheetname="CSE C";
    else if($st>='01'&&$st<='57'&&substr($a,4,2)=='1A')
        $sheetname="a";
    else if($st>='58'&&$st<='B3'&&substr($a,4,2)=='1A')
        $sheetname="CSE B";
    else
        $sheetname="CSE C";

    $sheet = $objPHPExcel->getSheetByName($sheetname);
    $data = $sheet->rangeToArray('A1:H65');
    $i=0;
    //echo "Rows available: " . count($data) . "\n";
    //foreach ($sheet->getRowIterator() as $row1) {
    //$cellIterator=$row1->getCellIterator();
    //$cellIterator->setIterateOnlyExistingCells(false);
    foreach($data as $row){
    $i=$i+1;
    //echo $i;

    if($row[1]==$a){
    $startCell=$sheet->getCellByColumnAndRow(0,$i);
   // echo $startCell;
    $cellid=$startCell->getCoordinate();
    //echo $cellid;
        //echo '<br>'.$row[1].'<br>'.$row[2].'<br>'.$row[3].'<br>'.$row[4].'<br>'.$row[5].'<br>'.$row[6].'<br>'.$row[7];
//echo getActiveRow();
    echo "<center><table border=\"2\" cellpadding=\"5\" cellspacing=\"5\"
            style=\"border-collapse: separate\" bordercolor=\"#808080\" width=\"93%\" bgcolor=\"#87CEFA\">
            <caption><font size=\"6%\">Know Your Details....</font><pre>


            <thead>
            <th>Regd_No</th>
            <th>Student Name</th>
            <th>Father's Name</th>
            <th>Mobile 1</th>
            <th>Mobile 2</th>
            <th>Mobile 3</th>
            <th>E-mail ID</th></thead>";
    echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";

foreach ($objPHPExcel->getSheetByName($sheetname)->getDrawingCollection() as $drawing) {
	if ($drawing instanceof PHPExcel_Worksheet_MemoryDrawing) {
		ob_start();
		call_user_func(
			$drawing->getRenderingFunction(),
			$drawing->getImageResource()
		);
		$imageContents = ob_get_contents();
		ob_end_clean();
		$cellId=$drawing->getCoordinates();

		//echo $str =  base64_encode(file_get_contents(getActiveSheet()));
        if($cellId==$cellid){
		$j="<img src='data:image/jpeg;base64,".base64_encode($imageContents)."' width=100 height=100/>";
		echo $j;}

	}
}
$f=true;break;
}//if close
else {$f=false;}
}
if (!$f){
echo "record not found";}
?>
