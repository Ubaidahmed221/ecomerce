<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php'); include('config.php') ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
 <?php include('sidebar.php')?>
        </div>
        <div class="col-md-8 mt-5">
    <h2 class="text-center">Product List</h2>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product short Description</th>
                        <th scope="col">Product long Description</th>
                        <th scope="col">Product image</th>
                        <th scope="col">color</th>
                        <th scope="col">Category</th>
                        <th scope="col">Product Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "select * from product inner join product_cat on product.cat_id = product_cat.id inner join prod_color on product.color_id = prod_color.id";
                    $result1 =  mysqli_query($con,$sql1);
                    if(mysqli_num_rows($result1) ){

                        while($row = mysqli_fetch_assoc($result1)){
                            ?> <tr>
                            <th scope='row'><?php echo $row['prod_id'] ?></th>
                            <td><?php echo $row['product_name']?></td>
                            <td><?php echo $row['s_des']?></td>
                            <td><?php echo $row['long_des']?></td>
                            <td><img src="pimages/<?php echo $row['product_thump']?>" width='50px' /></td>
                            <td><?php echo $row['color_name']?> </td>
                            <td><?php echo $row['cat_name']?></td>";
                            <td> <?php
                            if($row['product_status'] == 1){
                                echo "<button class ='btn btn-primary'>In Stock </button>";
                            }else{
                             echo "<button class = 'btn btn-primary'>Out  Stock </button>";
                            }
                            ?>
                            
                            </td>
                         
                            <td>
                            <a href="editproduct.php?id=<?php echo $row['prod_id']?>" class='btn btn-primary'>Edit</a>
                            <a href="?categorydelect=true&id1=<?php echo $row['prod_id'] ?>" class='btn btn-dark'>Delect</a>
                            </td>
                        </tr>
                        <?php
                        }
                    }else{
                        echo "<h2>Category Not Found</h2>";
                    }


                    ?>
                 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php


if($_GET['categorydelect'] != ""){

    
    $delect = $_GET['categorydelect'];
    $id = $_GET['id1'];
    
    if($delect == true ){
        $sql = "delete from product where prod_id = $id";
        $result =  mysqli_query($con,$sql);
        if($result){
            header('location: listproduct.php');
        }
    }
    
}


?>
<?php include('js.php'); ?>

</body>
</html>