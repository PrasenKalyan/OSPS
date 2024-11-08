<?php
session_start();
  $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $statei=$_GET['state'];
 if($statei=='mh')
 $statei='Maharashtra';
 if($statei=='gj')
 $statei='Gujrath';
 if($statei=='kk')
 $statei='Karnataka';
 $itemcount="30";
 $counti=1;
 $pagenumber=$_GET['page'];
 $from=$pagenumber*$itemcount-($itemcount-1);
 $to=$itemcount;
 if($from=='1')
 {
 $from=0;
 $to=$to;
 }
 if($statei=='IN-issue'||$statei=='in-issue')
 {
     $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM issues  ORDER BY id desc LIMIT $from,$to  ");
 }
 
 else if($statei=='AP'|| $statei=='TS'||$statei=='Telangana')
 {
     $rty="SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where sstate='AP'or sstate='TS' or sstate='Telangana' or sstate='allstates'  ORDER BY id desc LIMIT $from,$to";
  $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where (sstate='AP'or sstate='TS' or sstate='Telangana' or sstate='allstates') and fundrequest!='not'  ORDER BY id desc LIMIT $from,$to");
     
 }
 else if($statei=='Maharashtra'||$statei=='Gujrath'){
      $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where (sstate='$statei' or sstate='allstates') and fundrequest!='not'  ORDER BY id desc LIMIT $from,$to");
 }
 else{
     $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where (phoneno='$statei' or uploadby='$statei' or date='$statei' or indid='$statei')  and fundrequest!='not'  ORDER BY id desc LIMIT $from,$to");
 }
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($iid,$id, $loc,$sname,$sref,$sarea,$sstate,$com,$date,$time,$chimage1,$chimage2,$chimage3,$chimage4,$chpdf,$category,$phoneno,$ptw,$reply,$fr);
 
 $products = array(); 
 $count=$from;
 //traversing through all the result 
 
 //displaying the result in json format 
  json_encode($products);
 
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

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <?php include('headerfiles.php'); ?>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	    <!-- (2) ATTACH AUTOCOMPLETE ON PAGE LOAD -->
    <script>
      $(function () {
        // NAME AUTO-COMPLETE
        $('#search').autocomplete({
          source: function (request, response) {
            $.ajax({
              type: "POST",
              url: "autocompletedb.php",
              data: {
                term: request.term,
                type: "user"
              },
              success: response,
              dataType: 'json',
              minLength: 2,
              delay: 100
            });
          }
        });
});
	</script>
	<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 10px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
</style>
	</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include('smenu.php'); ?>

        <!-- Page Content  -->
        <div id="content">

            <?php /*include('hmenu.php');*/ ?>
            <div align="center" style="margin-bottom:20px;">
 <b><p class="author">  <?php echo $statei; ?></p></b>
</div>
<div align="center" style="margin-bottom:20px;">
    <form action="getfundrequest.php">
        <input type="text" id="search" name="state" placeholder="Search by indus id/phoneno/name" />
        <input type="hidden" id="search1" name="page" placeholder="Search by indus id/phoneno/name" value="1" />
        <button type="submit" name="search1" >Search</button>
    </form>
</div>
            <div class="row">
                
			<?php
			while($stmt->fetch())
			{

?>

			<div class="col-sm-4">
        <div class="slideshow-container">
           
<div class="mySlides<?php echo $counti?>">
     <?php
if($chimage1!='noimage')
{?>
<a href="getContent.php?id=photo1<?php echo $iid ?>.jpg" class="openPopup"> <img src="http://conceptgrammarschool.com/osps/uploads/photo1<?php echo $iid ?>.jpg" width="100%" height="200" class="img-responsive"/></a>
  <p class="author"><?php echo $date." ".$time;?></p>
 <?php }
  else{
  ?>
<img src="noimage.jpg" width="100%" height="200" class="img-responsive"/>
 <p class="author"><?php echo $date." ".$time;?></p>
<?php } ?>
</div>
<div class="mySlides<?php echo $counti?>">
     <?php
if($chimage2!='noimage')
{?>
  <img src="http://conceptgrammarschool.com/osps/uploads/photo2<?php echo $iid ?>" width="100%" height="200" class="img-responsive"/>
  <p class="author"><?php echo $date." ".$time;?></p>
  <?php }
  else{
  ?>
<img src="noimage.jpg" width="100%" height="200" class="img-responsive"/>
 <p class="author"><?php echo $date." ".$time;?></p>
<?php } ?>
</div>
<div class="mySlides<?php echo $counti?>">
    <?php
if($chimage3!='noimage')
{?>
  <img src="http://conceptgrammarschool.com/osps/uploads/photo3<?php echo $iid ?>" width="100%" height="200" class="img-responsive"/>
  <p class="author"><?php echo $date." ".$time;?></p>
 <?php }
  else{
  ?>
<img src="noimage.jpg" width="100%" height="200" class="img-responsive"/>
 <p class="author"><?php echo $date." ".$time;?></p>
<?php } ?>
</div>

 
<div class="mySlides<?php echo $counti?>">
    <?php
if($chimage4!='noimage')
{?>
  <img src="http://conceptgrammarschool.com/osps/uploads/photo4<?php echo $iid ?>" width="100%" height="200" class="img-responsive"/>
  <p class="author"><?php echo $date." ".$time;?></p>
<?php }
  else{
  ?>
<img src="noimage.jpg" width="100%" height="200" class="img-responsive"/>
 <p class="author"><?php echo $date." ".$time;?></p>
<?php } ?>
</div>

<a class="prev" onclick="plusSlides(-1,<?php echo $counti?>)">❮</a>
<a class="next" onclick="plusSlides(1,<?php echo $counti?>)">❯</a>

</div>


    </div>
    
    <div class="col-sm-8">
        <form action='updatefundrequest.php' method='POST'>
        <table style="width:100%">
            <tr>
            <p style="color:black;"><b>Name:</b> <?php echo $id; ?></p>
            </tr>
            <tr> <p style="color:blue;"><b>Comments: </b><?php echo $com;
           ?></p>
           </tr>
           <?php if($fr!='not'){ ?>
           <tr> <input type="text" style='width:100%' name="fundrequest" value="<?php echo $fr ?>" />
           <input type="hidden" style='width:100%' name="id" value="<?php echo $iid ?>" />
           </tr>
           
         <?php } ?>
            <tr><p style="color:black;"><b>Location: </b><?php echo $loc; ?></p></tr>
            <tr style="width:100%">
       <th style="width:33%"><p style="color:black;"><b>Indus Id: </b><?php echo $sref; ?></p></th>  
    <th style="width:44%">  <p style="color:black;"><b>Site Area: </b><?php echo $sarea; ?></p></th>
     <th style="widht:23%"><p style="color:black;"><b>Ptw No: </b><?php echo $ptw; ?></p></th>
        
        </tr>
        
        <tr>  
        <td><p style="color:black;"><b>State: </b><?php echo $sstate; ?></p></td>
           <td><p style="color:black;"><b>Site Name: </b><?php echo $sname; ?></p></td>  
      </tr>
        <tr>
          
        </tr>
        
        <!--  <p>Category:<?php echo $category; ?></p>
        <p>Phoneno:<?php echo $phoneno; ?></p>-->
        
          
          
          </table>
         <button type='submit' name='approve' > Approve </button>  
         </form>
    </div>
	   
        <div class="line"></div>
         
        <?php
        $counti++;
 } ?>
        
     </div>
           

            

        </div>
    </div>
<script>
for(i = 1;i< 31; i++)
{
      var slideIndex=1;
showSlides(slideIndex,i);
 } 


function plusSlides(n,iu) {
  showSlides(slideIndex += n,iu);
}

function currentSlide(n,iu) {
  showSlides(slideIndex = n,iu);
}

function showSlides(n,iu) {
  var i;
  var slides = document.getElementsByClassName("mySlides"+iu);
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
 
  slides[slideIndex-1].style.display = "block";  

}
</script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
            
            
            
            
            
            
        });
    </script>
    
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bootstrap Modal with Dynamic Content</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
</div>
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