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
    <h2 class="text-center">Color List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Haxza</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from prod_color";
                    $result =  mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > 0 ){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>
                            <th scope='row'>$row[id]</th>
                            <td>$row[color_name]</td>
                            <td>$row[color_hexa]</td>
                            <td>
                            <a href='editcolor.php?id=$row[id]' class='btn btn-primary'>Edit</a>
                            <a href='?colordelect=ture&id=$row[id]' class='btn btn-dark'>Delect</a>
                            </td>
                        </tr>";
                        }
                    }else{
                        echo "<h2>Color Not Found</h2>";
                    }

                    ?>
                 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$delect = $_GET['colordelect'];
$id = $_GET['id'];

if($delect == true ){
    $sql = "delete from prod_color where id = $id";
    $result =  mysqli_query($con,$sql);
    if($result){
        header('location: listcolor.php');
    }
}



?>
<?php include('js.php'); ?>

</body>
</html>