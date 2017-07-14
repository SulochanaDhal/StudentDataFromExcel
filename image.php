<?php$xlsFile = 'student.xls';
require_once 'PHPExcel/Reader/Excel2007.php';
$objReader = new PHPExcel_Reader_Excel2007();
//$objReader->setReadDataOnly(true);
$data = $objReader->load($xlsFile);
$objWorksheet = $data->getActiveSheet();
foreach ($objWorksheet->getDrawingCollection() as $drawing) {
//for XLSX format
$string = $drawing->getCoordinates();
$coordinate = PHPExcel_Cell::coordinateFromString($string);
if ($drawing instanceof PHPExcel_Worksheet_Drawing){
$filename = $drawing->getPath();
$drawing->getDescription();
copy($filename, 'uploads/' . $drawing->getDescription());
}}
 ?>
