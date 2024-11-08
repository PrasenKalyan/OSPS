<?php include("head1.php"); ?>

<html lang="en">
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


<?php
$id = $_GET['id'];
$a="select * from productsentry where sno='$id'  and manager='approved' order by id desc";
$sq = mysqli_query($link, $a);
$r = mysqli_fetch_array($sq);
?>

<body>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="box box-info">
            <table style="width:100%;">
                <tr>
                    <td>Inv No: <?php echo $r['uid']; ?></td>
                    <td>Site Name: <?php echo $r['sitename']; ?></td>
                    <td>Indus ID: <?php echo $r['indid']; ?></td>
                    <td>R.No: <?php echo $r['sno']; ?></td>
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
                    $a="select * from productsentry where sno='$id'  and manager='approved' order by id desc";
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
                <table style="width:100%; margin-top:10px">
                    <tr>
                        <td align="center">
                        <a href="download1.php?id=<?php echo $id;?>" class="btn btn-primary">Download PDF</a>
                        </td> 
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
// $qtno = "managerapprove.pdf";


// ob_start();
 ?>

 <?php
// $body = ob_get_clean();
// $body = iconv("UTF-8", "UTF-8//IGNORE", $body);



// $mpdf = new mPDF(['format' => 'A4']);
// $mpdf->WriteHTML($body);
// $mpdf->Output($qtno, 'F');
?>

<!-- <script type="text/javascript">
    location.href = 'download.php?qt=<?php echo $qtno; ?>';
    setTimeout(function () {
        window.location.href = 'employeelist.php?state=<?php echo $state; ?>';
    }, 2000);
</script> -->

</body>
</html>