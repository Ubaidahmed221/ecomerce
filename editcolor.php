<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php'); include('config.php'); 
    $id = $_GET['id'];
    $sql = "select * from prod_color where id = $id ";
  $result =  mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
       $row =  mysqli_fetch_assoc($result);
       $color = $row['color_name'];
       $hexa = $row['color_hexa'];
    }else{
        header('location: listcolor.php');
    }
    
    ?>
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
    <input type="text" name="name" value="<?php echo $color; ?>" class="form-control" >
    
  <div class="mb-3">
    <label class="form-label">Color Hexa</label>
    <input type="text" class="form-control" value="<?php echo $hexa; ?>" name="hexa" >
  </div>
  
  <button type="submit" class="btn btn-primary" name="Update">Update</button>
</form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['Update'])){
      $cnmae =  $_POST['name'];
       $hexa = $_POST['hexa'];

       $sql = "UPDATE `prod_color` SET `color_name`='$cnmae',`color_hexa`='$hexa' WHERE id = $id";
       $result = mysqli_query($con,$sql);
       if($result){
        header('location: listcolor.php');
       }


    }


?>



<?php include('js.php'); ?>

</body>
</html>