<?php
require_once __DIR__ . '/vendor/vendor/autoload.php';
include('connection.php');
// include('head1.php');

$id = isset($_GET['id']) ? mysqli_real_escape_string($link, $_GET['id']) : '';
$query = "SELECT * FROM productsentry WHERE sno='$id' ORDER BY id DESC";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Error: " . mysqli_error($link));
}

$r = mysqli_fetch_array($result, MYSQLI_ASSOC);

ob_start(); // Start output buffering
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Manager Approve Products PDF</title>
    <style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
    
</head>
<body>

		<!-- <a href="../dashboard.php">	<img src="OSPS TELECOM.png"  class="img-fluid"/></a> -->

    <table>
        <tr>
            <td>Inv No: <?php echo htmlspecialchars($r['uid']); ?></td>
            <td>Site Name: <?php echo htmlspecialchars($r['sitename']); ?></td>
            <td>Indus ID: <?php echo htmlspecialchars($r['indid']); ?></td>
            <td>R.No: <?php echo htmlspecialchars($r['sno']); ?></td>
            <td>Date: <?php $d = $r['data']; echo date('d-m-Y', strtotime($d)); ?></td>
        </tr>
    </table>
    <form name="frm" method="post" action="">
                <table id="customers" style="width:100%; border:1px solid;">
                    <tr>
                        <th><b>Product Name</b></th>
                        <th>Unit Name</th>
                        <th>Qnty</th>
                    </tr>

                    <?php
                    $id = $_GET['id'];
                    $a = "SELECT * FROM productsentry WHERE sno='$id' ORDER BY id DESC";
                    $sq = mysqli_query($link, $a);
                    $cnt = mysqli_num_rows($sq);
                    ?>
                    <input type="hidden" name="cntk" value="<?php echo $cnt; ?>">
                    <?php while ($r = mysqli_fetch_array($sq)) { ?>
                        <tr>
                            <td align="center"><?php echo $r['product']; ?></td>
                            <td align="center"><?php echo $r['unit']; ?></td>
                            <td align="center"><?php echo $r['qty']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
</body>
</html>

<?php
$html = ob_get_clean(); 

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);

// Output PDF with dynamically generated filename
$filename = 'Invoice-' . date('d-m-Y') . '.pdf';
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
?>


