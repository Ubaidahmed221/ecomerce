<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php');  include('config.php');

      $id = $_GET['id'];
      $sql = "select * from product_cat where id = $id";
    $result =  mysqli_query($con,$sql);

      if(mysqli_num_rows($result) > 0 ){

         $row =  mysqli_fetch_assoc($result);
         $cat_name =  $row['cat_name'];
       $des = $row['cat_des'];
       $img = $row['cat_img'];

      }else{
          header('location: listcategory.php');
      }
    
    
    ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
 <?php include('sidebar.php');?>
        </div>
        <div class="col-md-6 mt-4">
    <h2 class="text-center">Update Category</h2>
    <form action="" method="POST" class="mt-5" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo  $cat_name; ?>" >
  </div>
    
  <div class="mb-3">
    <label class="form-label">Category Description</label>
    <textarea    rows="6" name="cat_des" class="form-control"><?php echo $des; ?></textarea>
</div>
  <div class="mb-3">
    <label class="form-label">Category Image</label>
    <input type="file" class="form-control" name="img"  >
    <img src="images/<?php echo $img; ?>" width="120px" alt="">
    <input type="hidden" name="oldimg" value="<?php echo $img; ?>" >
  </div>
  
  <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update'])){
      $cat_name =  $_POST['name'];
       $des = $_POST['cat_des'];
       $oldimg = $_POST['oldimg'];
       $newimg =  $_FILES['img'];
      

       if(isset($_FILES['img'])){

            if($newimg != null){

                
                $name = $_FILES['img']['name'];
                $tmp = $_FILES['img']['tmp_name'];
                $type = $_FILES['img']['type'];
                
                if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
                    $sql = "UPDATE `product_cat` SET `cat_name`='$cat_name',`cat_img`='$name',`cat_des`='$des' WHERE id = $id";
                    
                    $result = mysqli_query($con,$sql);
                    
                    if($result){
                        move_uploaded_file($tmp,"images/".$name);
                        unlink("images/".$oldimg);
                        header('location: listcategory.php');
                    }
                }else{
                    $sql = "UPDATE `product_cat` SET `cat_name`='$cat_name',`cat_img`='$oldimg',`cat_des`='$des' WHERE id = $id";

                    $result = mysqli_query($con,$sql);
        
                    if($result){
                      
                     header('location: listcategory.php');
                    }
                }


        }
       }



    }


?>



<?php include('js.php'); ?>

</body>
</html>