<?php
session_start();
    $con = mysqli_connect("localhost", "root", "", "a16673ai_osps") or die("unable to connect to database");
    if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $token=$_POST["token"];
    $response = array();
    $response["success"] = false;  
     
    $statement = mysqli_prepare($con, "SELECT id,name,phoneno,state,category,inventory,level1 FROM register WHERE  phoneno= '$email' AND password = '$password' and newblock!='blocked'  ");
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $route,$vehicleno,$phone,$inventcat,$level1);

    
    
    while(mysqli_stmt_fetch($statement)){
         $response["success"] = "true";
        $_SESSION['name']=$name;
        $_SESSION['phoneno']=$route;
        $_SESSION['category']=$phone;
        $_SESSION['state']=$vehicleno;
        $_SESSION['inventcat']=$inventcat;
        $_SESSION['level1']=$level1;
        
       
        $response["name"] = $name;
		$response["phoneno"]=$route;
		$response["state"]=$vehicleno;
		$response["category"]=$phone;
		$response["inventcat"]=$inventcat;
		 
}

//exit;

         //echo json_encode($response);
         
          echo '<script type="text/javascript">
           window.location = "dashboard.php"
      </script>';
    }
    
?>