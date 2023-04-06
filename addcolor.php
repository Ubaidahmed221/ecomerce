<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php'); ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
 <?php include('sidebar.php');?>
        </div>
        <div class="col-md-6 mt-5">
    <h2 class="text-center">Add Color</h2>
    <form action="" method="POST" class="mt-5">
  <div class="mb-3">
    <label class="form-label">Color Name</label>
    <input type="text" name="name" class="form-control" >
  </div>
    
  <div class="mb-3">
    <label class="form-label">Color Hexa</label>
    <input type="text" class="form-control" name="hexa" >
  </div>
  
  <button type="submit" class="btn btn-primary" name="insart">Insart</button>
</form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['name'])){
      $cnmae =  $_POST['name'];
       $hexa = $_POST['hexa'];  

       $sql = "insert into prod_color(color_name,color_hexa) values('$cnmae','$hexa');";
       $result = mysqli_query($con,$sql);
       if($result){
        header('location: listcolor.php');
       }


    }


?>



<?php include('js.php'); ?>

</body>
</html>