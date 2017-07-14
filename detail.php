<?php
$a=$_POST['hltn'];
include '/Classes/PHPExcel.php';
    $dataFfile = "C:/xampp/htdocs/abc/student.xls";
    $objPHPExcel = PHPExcel_IOFactory::load($dataFfile);
    $sheet = $objPHPExcel->getActiveSheet();
    $data = $sheet->rangeToArray('A1:H55');
    //echo "Rows available: " . count($data) . "\n";
    foreach ($data as $row) {
    if($row[1]==$a){
        echo "$row[1]";
        //echo '<br>'.$row[1].'<br>'.$row[2].'<br>'.$row[3].'<br>'.$row[4].'<br>'.$row[5].'<br>'.$row[6].'<br>'.$row[7];
    echo "<center><table border=\"2\" cellpadding=\"5\" cellspacing=\"5\"
            style=\"border-collapse: separate\" bordercolor=\"#ff0000\" width=\"45%\" bgcolor=\"#DAF7A6\">
            <caption><font size=\"6%\">*******Details of $a*******</font>
        ";
    echo "<tr><td><strong>Number</strong></td><td>$row[1]</td></tr>
        <tr><td><strong>Name</strong></td><td>$row[2]</td></tr>
        <tr><td><strong>Father's Name</strong></td><td>$row[3]</td></tr>
        <tr><td><strong>Father's Mobile Number 1</strong></td><td>$row[4]</td></tr>
        <tr><td><strong>Father's Mobile Number 2</strong></td><td>$row[5]</td></tr>
        <tr><td><strong>Personal Mobile Number</strong></td><td>$row[6]</td></tr>
        <tr></tr><tr><td><strong>Email-Id</strong></td><td>$row[7]</td></tr>";
    //$objPHPExcel = PHPExcel_IOFactory::load("student.xls");
    $drawing=$objPHPExcel->getActiveSheet()->getDrawingCollection();
        if ($drawing instanceof PHPExcel_Worksheet_MemoryDrawing) {

            ob_start();
            call_user_func(
                $drawing->getRenderingFunction(),
                $drawing->getImageResource()
            );
            $imageContents = ob_get_contents();
            ob_end_clean();
            $h="<img src='data:image/jpeg;base64,".base64_encode($imageContents)."' height=100 width=100/>";
            echo $h;
        }

    }
}