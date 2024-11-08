<?php
if(isset($_REQUEST["file"])){
	// Get parameters
	$img=$_GET['file'];
    $images = array("'$img'");
	//print_r($images);
	$file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    $url="https://conceptgrammarschool.com/osps/uploads/";
 $filepath =  $url.$file;
    if(in_array($file,$images, true)){
        $filepath =  $url.$file;
    
        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit;
        }
   }
	else{
		echo "File does not exist.";
	}
}
?>