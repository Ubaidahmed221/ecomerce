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
    <h2 class="text-center">Add Product</h2>
    <form action="" method="POST" class="mt-5" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" >
  </div>
    
  <div class="mb-3">
    <label class="form-label">Prod-Short Description</label>
    <textarea    rows="6" name="pros_des" class="form-control"></textarea>
</div>
<div class="mb-3">
    <label class="form-label">Prod-long Description</label>
    <textarea    rows="3" name="prod_des" class="form-control"></textarea>
</div>
<label class="form-label">chose color</label>
  <select name="color" id="" class="form-control form-select">
    <?php
     include('config.php');
     $sql = "select * from prod_color";
     $result = mysqli_query($con,$sql) or die('quary failed');
    while($row = mysqli_fetch_assoc($result)){
        echo "<option value='$row[id]'>$row[color_name]</option>";
    }
    ?>
    
  </select>
  <label class="form-label mt-3">chose Category</label>
  <select name="category" id="" class="form-control form-select">
    <?php
     include('config.php');
     $sql = "select * from product_cat";
     $result = mysqli_query($con,$sql) or die('quary failed');
    while($row = mysqli_fetch_assoc($result)){
        echo "<option value='$row[id]'>$row[cat_name]</option>";
    }
    ?>
    
  </select>
  <label class="form-label mt-4">Choose Status </label>
  <select name="status" id="" class="form-control form-select">
    <option value="1">In stock</option>
    <option value="0">out stock</option>
  </select>

  <div class="mb-3 mt-4">
    <label class="form-label">Product Image</label>
    <input type="file" class="form-control" name="pimg" >
  </div>
  
  <button type="submit" class="btn btn-primary" name="insart">Insart</button>
</form>
        </div>
    </div>
    
</div>
<?php
    if(isset($_POST['insart'])){
      $pname =  $_POST['name'];
       $psdes = $_POST['pros_des'];
       $pldes = $_POST['prod_des'];
       $pcolor = $_POST['color'];
       $pcategory = $_POST['category'];
       $status = $_POST['status'];

       if(isset($_FILES['pimg'])){
       $name = $_FILES['pimg']['name'];
       $name = time().$name;
        $tmp = $_FILES['pimg']['tmp_name'];
        $type = $_FILES['pimg']['type'];

        if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
            $sql = "INSERT INTO `product`( `product_name`, `s_des`, `long_des`, `color_id`, `cat_id`, `product_thump`, `product_status`) VALUES ('$pname','$psdes','$pldes',' $pcolor',' $pcategory','$name',' $status')";
            $result = mysqli_query($con,$sql);
            if($result){
                move_uploaded_file($tmp,"pimages/".$name);
           echo " <script>
           location.href = 'listproduct.php'
           
           </script>";
            }


        }
       }



    }


?>



<?php include('js.php'); ?>

</body>
</html>