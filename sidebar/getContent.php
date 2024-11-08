<?php
session_start();
 
 if($_SESSION['name'])
 {
     
     $uname= $_SESSION['name'] ;
     $phoneno= $_SESSION['phoneno'] ;
     $category= $_SESSION['category'] ;
     $state= $_SESSION['state'] ;
    // $inventcat= $_SESSION['inventcat'] ;
 ?>
<!DOCTYPE html>
<html>

<head>
   <?php include('headerfiles.php'); ?>
	
	</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include('smenu.php'); ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include('hmenu.php'); ?>

            <div class="row">
        <?php   $id=$_GET['id']; ?>
       
        <div class="col-sm-12">
             <a href="http://conceptgrammarschool.com/osps/uploads/<?php echo $id;?>" download>
        <img src="http://conceptgrammarschool.com/osps/uploads/<?php echo $id; ?>" class="img-responsive"/>
        </a>
        </div>
     </div>
            <div class="line"></div>

            


           
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>