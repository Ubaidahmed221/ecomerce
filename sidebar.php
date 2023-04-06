<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('css.php');
       include('config.php');  ?>
    <title>Hello, world!</title>
  </head>
  <style>
    .sidebar{
      list-style: none;
      margin-right: 25px;
      padding: 5px;
      padding-top: 20px;

    }
    .sidebar ul li{
      background-color: white;
      margin-top: 30px;
      padding: 10px;
    }
    .sidebar ul li:hover{
      background-color: #ccc;
      cursor: pointer;
    }
    .sidebar ul li a{
      color: black;
      text-decoration: none;
    }
    .sidebar h3 a{
      text-decoration: none;
      color: #fff;
    }
  </style>
  <body>
  <div class="bg-dark" style="width: 260px; height: 100vh;">
  <nav class="sidebar">
    <h3 class="text-white ms-5"><a href="dashboard.php">Dashboard</a> </h3>
    <ul>
      <li><a href="listcolor.php">List Color</a></li>
      <li><a href="addcolor.php">Add Color</a></li>
      <li><a href="listcategory.php">List Category </a></li>
      <li><a href="addcategory.php">Add Category</a></li>
      <li><a href="listproduct.php">List Product</a></li>
      <li><a href="addproduct.php">Add Product</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </nav>

  </div>








































<?php include('js.php') ?>

  </body>
</html>