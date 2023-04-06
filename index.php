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
<?php include('navbar.php'); include('config.php')?>

<div class="homemain">
<img src="images/our.jpg" alt="">
</div>

    <div class="container">
        <h1 class="text-center mt-3">Rescent Product</h1>
        <div class="row mt-4">
            <?php
            $sql = "select * from product order by prod_id desc limit 3";
            $result =  mysqli_query($con,$sql) or die('quary failed');

            $totalrow = mysqli_num_rows($result);

            $limit = rand(1,$totalrow);

            $sql1 = "select * from product limit $limit ,3";
            $result1 =  mysqli_query($con,$sql1);
                while($row = mysqli_fetch_assoc($result1)){
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
            <br> <br>
            <a href="product.php">

                
                <button class="btn btb-large btn-primary mx-auto mt-3 d-block">More Product</button>
            </a>

            <br><br><br>
           

        </div>

    </div>




<?php include('js.php') ?>

</body>
</html>