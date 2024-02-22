
<?php
$user = 0;
$success = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "insert into `registration`(username,password) values('$username', '$password')";    

    // $result = mysqli_query($con, $sql);

    // if($result){
    //     echo "Data inserted succefully";

    // }
    // else{
    //     die(mysqli_error($con));
    // }
    

    $sql = "Select * from `registration` where username = '$username'"
;

$result = mysqli_query($con, $sql);
if($result){
    $num = mysqli_num_rows($result);
    if($num > 0){
        $user  = 1;
    }else{
        $sql = "insert into `registration`(username,password) values('$username', '$password')";    

    $result = mysqli_query($con, $sql);
    if($result){
        $success = 1;
    
         }
         else{
            die(mysqli_error($con));
         }
         
    }
}

}
?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>sign,up page</title>
  </head>
  <body>

  if($success)
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>success</strong>Good to GO!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
?>  
    <h1 class="text-center"> Sign'up Page </h1>
    <div class="container mt-5">

    <form action="sign.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = 
    "Enter your name" name = "username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder= "Enter your password" name = "password">
  </div>
  
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

  <?php

  if($user)
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh no Sorry </strong> Already Exists  .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

  ?>

</html>