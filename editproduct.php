<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php');  include('config.php')?>
</head>
<?php 
$pid = $_GET['id'];

$sql = "select * from product where prod_id = $pid";
$result = mysqli_query($con,$sql) or die('quary failed');
$row = mysqli_fetch_assoc($result);

$pname = $row['product_name'];
$psdes = $row['s_des'];
$pldes = $row['long_des'];
$pthump = $row['product_thump'];
$pcolor = $row['color_id'];
$pcate = $row['cat_id'];
$pstatus = $row['product_status'];



?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
 <?php include('sidebar.php');?>
        </div>
        <div class="col-md-6 mt-5">
    <h2 class="text-center">Edit Product</h2>
    <form action="" method="POST" class="mt-5" enctype="multipart/form-data" >
  <div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $pname ?>" >
  </div>
    
  <div class="mb-3">
    <label class="form-label">Prod-Short Description</label>
    <textarea    rows="6" name="pros_des" class="form-control"><?php echo $psdes ?></textarea>
</div>
<div class="mb-3">
    <label class="form-label">Prod-long Description</label>
    <textarea    rows="3" name="prod_des" class="form-control"><?php echo $pldes ?></textarea>
</div>
<label class="form-label">chose color</label>
  <select name="color" class="form-control form-select">
    <?php
     include('config.php');
     $sql = "select * from prod_color";
     $result = mysqli_query($con,$sql) or die('quary failed');
    while($row = mysqli_fetch_assoc($result)){
        if($row['id'] == $pcolor){
            $sel = "Selected";
        }else{
            $sel = "";
        }

        echo "<option $sel value='$row[id]'>$row[color_name]</option>";
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
        if($row['id'] == $pcate){
            $sel = "Selected";
        }else{
            $sel = "";
        }

        echo "<option $sel value='$row[id]'>$row[color_name]</option>";
        echo "<option value='$row[id]'>$row[cat_name]</option>";
    }
    ?>
    
  </select>
  <label class="form-label mt-4">Choose Status </label>
  <select name="status" id="" class="form-control form-select">
    <?php
    if( $status == 1 ){
        echo "<option selected  value='1'>In stock</option>
        <option  value='0'>out stock</option>";
    }else{
       
        echo "<option  value='1'>In stock</option>
        <option selected value='0'>out stock</option>";
    }
   

    ?>
    
  </select>

  <div class="mb-3 mt-4">
    <label class="form-label">Product Image</label>
    <input type="file" class="form-control" name="pimg" >
  </div>
  <img src="pimages/<?php echo $pthump ?>" width="50px" alt="">
  <input type="hidden" name="oldimg" width="50px" value="<?php echo $pthump ?>">
  
  <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>
        </div>
    </div>
    
</div>

<?php

if(isset($_POST['update'])){
      $pname =  $_POST['name'];
       $psdes = $_POST['pros_des'];
       $pldes = $_POST['prod_des'];
       $pcolor = $_POST['color'];
       $pcategory = $_POST['category'];
       $status = $_POST['status'];
       $oldimg = $_POST['oldimg'];

       if(isset($_FILES['pimg']['name'])){


        if($_FILES['pimg']['name'] != null) {

        echo "images set with  check name ";

        
        $name = $_FILES['pimg']['name'];
        $tmp = $_FILES['pimg']['tmp_name'];
        $type = $_FILES['pimg']['type'];
        
        move_uploaded_file($tmp,"pimages/".$name);
            if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
        echo "images set without check name or img ";

                $sql = "UPDATE product  SET `product_name`='$pname',`s_des`='$psdes',`long_des`='$pldes',`color_id`=$pcolor,`cat_id`= $pcategory,`product_thump`='$name',`product_status`= $status WHERE prod_id = $pid";
                
                $result = mysqli_query($con,$sql) or die('query expired update with image ');
                if($result){
                    if($oldimg == ""){
                    }else{
                        unlink("images/".$name);
                    }       
                    echo "<script>
                    location.href= 'listproduct.php'
                    </script>";
                }
            }

            
        }
        else{
        
            echo "images Not set with out image ";
    
    
            $sql = "UPDATE `product` SET `product_name`='$pname',`s_des`='$psdes',`long_des`='$pldes',`color_id`=' $pcolor',`cat_id`=' $pcategory',`product_thump`='$oldimg',`product_status`='$status' WHERE prod_id = $pid";
                $result = mysqli_query($con,$sql);
                if($result){
                    
                    // echo "<script>
                    // location.href= 'listproduct.php'
                    // </script>";
    
               }
    }
    } else{
        
        echo "not runnong with out image ";
    }
    
       }




    


?>



<?php include('js.php'); ?>

</body>
</html>