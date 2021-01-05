<?php
//Disable error reporting
error_reporting(0); 

//Get Base64 string from DDEScanner 
$image = $_POST['image']; //<- This parameter is required

//base64 decode process
$bin = base64_decode($image);

//Get mime info from base64 decode file and define file extension
function GetFileExt($buffer){
	$file_info = new finfo(FILEINFO_MIME_TYPE);
	$mime_type = $file_info->buffer($buffer);
	$arr = array(
		"application/pdf"=>"pdf",
		"image/jpeg"=>"jpg",
		"image/png"=>"png"
	);
	return ".".$arr[$mime_type];
}

//Define filename if not set from webapp and set filename by Datetime
$filename = (!ISSET($_GET['name'])||$_GET['name']===""?date("YmdHis"):$_GET['name']).GetFileExt($bin);

//Put decoded base64 into file
if (file_put_contents($filename, $bin)){
	$result = array(
		"status" =>200,
		"description" => "Upload Document Success [".$filename."] with token [".$_GET['token']."]"
	);
	//of course you have to change the description of $result, the data above is just an example to show how the data was received from the Web App
}else{
	$result = array(
		"status" =>422,
		"description" => "Upload Document Failed"
	);
}

//Send information to DDEScanner that the upload process has Success or Failed
echo json_encode($result);
?>

