<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php');  include('config.php')?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
 <?php include('sidebar.php');?>
        </div>
        <div class="col-md-6 mt-5">
    <h2 class="text-center">Add Category</h2>
    <form action="" method="POST" class="mt-5" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" >
  </div>
    
  <div class="mb-3">
    <label class="form-label">Category Description</label>
    <textarea    rows="6" name="cat_des" class="form-control"></textarea>
</div>
  <div class="mb-3">
    <label class="form-label">Category Image</label>
    <input type="file" class="form-control" name="img" >
  </div>
  
  <button type="submit" class="btn btn-primary" name="insart">Insart</button>
</form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['insart'])){
      $cat_name =  $_POST['name'];
       $des = $_POST['cat_des'];

       if(isset($_FILES['img'])){
       $name = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        $type = $_FILES['img']['type'];

        if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
            $sql = "INSERT INTO `product_cat`( `cat_name`, `cat_img`, `cat_des`) VALUES ('$cat_name','$name','$des')";
            $result = mysqli_query($con,$sql);
            if($result){
                move_uploaded_file($tmp,"images/".$name);
             header('location: listcategory.php');
            }


        }
       }



    }


?>



<?php include('js.php'); ?>

</body>
</html>