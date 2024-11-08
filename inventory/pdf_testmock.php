<?php
require_once __DIR__ . '/vendor/autoload.php'; // Assuming mpdf library is 
$mpdf = new \Mpdf\Mpdf();
ob_start(); // Start output buffering
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>JTECHNO</title>
    <link rel="stylesheet" href="http://mission2cr.org/admin/qot.css1">		

       <style>
    #customTable {
        width: 100%;
        border: 1px solid #000;
        border-collapse: collapse;
    }

    #customTable th,
    #customTable td {
        border: 1px solid #000;
        padding: 5px;
    }

    #row1 {
        height: 1px; /* Adjust the height as needed */
        padding: 10px; /* Adjust the padding as needed */
    }

    #row1 th,
    #row1 td {
        text-align: left; /* Set text alignment to left */
    }
</style>

</head>
<body>
    
</body>
</html>


<?php
$html = ob_get_clean(); // Get the buffered HTML content

// Write HTML to PDF
$mpdf->WriteHTML($html);

// Generate the filename dynamically
$filename = 'hello' . '_BSP.pdf';

// Output PDF with dynamically generated filename and inline attribute
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
?>