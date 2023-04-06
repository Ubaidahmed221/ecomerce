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
        <div class="col-md-4">
 <?php include('sidebar.php');?>
        </div>
        <div class="col-md-7 mt-5">
    <h2 class="text-center">Category List</h2>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">category Description</th>
                        <th scope="col">category image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "select * from product_cat";
                    $result1 =  mysqli_query($con,$sql1);
                    if(mysqli_num_rows($result1) ){
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "<tr>
                            <th scope='row'>$row[id]</th>
                            <td>$row[cat_name]</td>
                            <td>$row[cat_des]</td>
                            <td><img src='images/$row[cat_img]' width='50px' /></td>
                            <td>
                            <a href='editcateg.php?id=$row[id]' class='btn btn-primary'>Edit</a>
                            <a href='?categorydelect=ture&id1=$row[id]' class='btn btn-dark'>Delect</a>
                            </td>
                        </tr>";
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
$delect = $_GET['categorydelect'];
$id = $_GET['id1'];

if($delect == true ){
    $sql = "delete from product_cat where id = $id";
    $result =  mysqli_query($con,$sql);
    if($result){
        header('location: listcategory.php');
        echo "<script>
        location.href = 'listcategory.php'
        </script>";
    }
}



?>
<?php include('js.php'); ?>

</body>
</html>