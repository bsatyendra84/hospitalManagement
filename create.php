<?php
//$showError=false;

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="hospital";
//make connection with database
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if($conn)
{
   // echo "connection successfully"."<br>";
}
if(!$conn)
{
  //die("connection failed").mysqli_connect_error();
}

if(isset($_REQUEST["submit"])){
   

//insert data in database by user by filling all field of form
if( ($_REQUEST["email"]=="")||($_REQUEST["pass"]==""))
{
   
    echo '<div class="alert alert-danger">
    <strong>fill all fields!</strong>
  </div>'."<br>";

     //echo "submit button clicked"."<br>";
    
}
else{  
 
    $email=$_REQUEST["email"];
    $pass=$_REQUEST["pass"];
  
//this 3 lines for checking that email exist or not in database
    $existsql= "SELECT * FROM employee1 WHERE email = '$email' AND   password = '$pass'" ;
    $result=mysqli_query($conn,$existsql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows == 1)
 //if($result>0)
      {
   //  $showError= "this username is already exist";
      /*  echo '<div class="alert alert-danger">
        <strong>error !</strong> This email is already Exists. you logged in.
       </div>';*/
       $login= true;
       session_start();
       $_SESSION['loggedin']=true;
       $_SESSION['email']=$email;
       header("location:welcome.php");
      }
    else{
        echo '<div class="alert alert-danger">
        <strong>error !</strong> Invalid Username and password.
       </div>';
    }

  
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
 
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
    <form action="create.php" method="POST">
 
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Enter your email" class="form-control">
</div>
<div class="form-group">
    <label for="pass">Password:</label>
    <input type="text" name="pass" placeholder="Enter your password" class="form-control">
</div>


<div>
                        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
                            <button type="reset" name="reset" class="btn btn-primary">Reset</button>
                    </div>
 </form>
</div>
  
</div>
</div>

</body>
</html>


