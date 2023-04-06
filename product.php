<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php') ?>
</head>
<body>
<?php include('navbar.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php include('css.php') ?>
</head>
<body>
<?php  include('config.php')?>

<div class="homemain">
<img src="images/our.jpg" alt="">
</div>

    <div class="container">
        <h1 class="text-center mt-3">All Product</h1>
        <div class="row mt-4">
            <?php
            $sql = "select * from product ";
            $result =  mysqli_query($con,$sql) or die('quary failed');




        
                while($row = mysqli_fetch_assoc($result)){
                  ?>
                  
                    <div class='col-md-4 mt-4'>
                    <div class='card'>
                        <?php  
                        if($row['product_status'] == 0){
              echo   " <button class='btn btn-danger w-25 p-2'>Out Stock</button>";


                        }
                        
                        ?>
                        <img src='pimages/<?php echo $row['product_thump']?>' width='100%' height='250px' alt=''>
                        <h2 class = 'text-center'><?php echo $row['product_name']?></h2>
                        <p><?php echo $row['s_des']?></p>
                        
                        
                        <div class="d-flex justify-content-between">
                                <a href="productinfo.php?id=<?php echo $row['prod_id'] ?>">
                                    <button class="btn btn-primary">More</button>
                                </a>
                            <button class="btn btn-success">Add to Cart</button>
                        </div>
                    </div>
                </div>

                    
                    
                  <?php
                }
            
            ?>
           

           

        </div>

    </div>




<?php include('js.php') ?>

</body>
</html>



<?php include('js.php') ?>

</body>
</html>