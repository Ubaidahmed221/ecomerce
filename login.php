<?php
session_start();
if(isset($_SESSION['username'])){
    header('location: dashboard.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('css.php') ?>
    <title>Document</title>
</head>
<body>
    <h1 class="text-center mt-5">Login Page</h1>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
    <form action="" method="POST">
  <div class="mb-3">
    <label  class="form-label">username</label>
    <input type="text" required class="form-control" name="username">
    
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" name="password" required class="form-control">
  </div>

  <button type="submit" name="login" class="btn btn-primary">login</button>
</form>
</div>
</div>
    </div>
    

    <?php include('js.php')?>

    <?php
    include('config.php');
    if(isset($_POST['login'])){
        $usname = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "select * from admin where username = '$usname'and password =  '$pass'";
       $result = mysqli_query($con,$sql) or die('quary failed');
        if(mysqli_fetch_assoc($result)){
            $_SESSION['username'] = $usname;
            header('location: dashboard.php');
        }
        else{
            header('location: login.php');
        }
        
        
    }

    ?>
</body>
</html>