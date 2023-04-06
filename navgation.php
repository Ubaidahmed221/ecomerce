<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css" integrity="sha512-+oRH6u1nDGSm3hH8poU85YFIVTdSnS2f+texdPGrURaJh8hzmhMiZrQth6l56P4ZQmxeZzd2DqVEMqQoJ8J89A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>slide bar</title>
</head>
<style>
    *{
        margin: 0; padding: 0;
        box-sizing: border-box;
    }
    body{
        min-height: 100vh;
        background: #365fa1;
    }
    .navgation{
        position: fixed;
        inset: 20px;
        background: #287bff;
        width: 80px;
       
        border-left: 10px solid #287bff;
        border-radius: 50px;
        overflow: hidden;
        box-shadow: 15px 15px 25px rgba(0, 0, 0, .05);
        transition: 0.5s;
    }
    .navgation.active{
        width: 300px;
        border-radius: 20px;

    }
    .toggle{
        position: absolute;
        bottom: 15px;
        right: 15px;
        width: 50px;
        height: 50px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, .15);
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .toggle::before{
        content: "";
        position: absolute;
        width: 26px;
        height: 3px;
        border-radius: 3px;
        background: #365fa1;
        transform: translateY(-5px);
        transition: 1s;
    }
    .toggle::after{
        content: "";
        position: absolute;
        width: 26px;
        height: 3px;
        border-radius: 3px;
        background: #365fa1;
        transform: translateY(5px);
        transition: 1s;
    }
    .navgation.active .toggle::before{
        transform: translateY(0px) rotate(-405deg);

    }
    .navgation.active .toggle::after{
        transform: translateY(0px) rotate(225deg);

    }
    .navgation ul li:nth-child(1){
        top: 20px;
        margin-bottom: 40px;
        background: none;
    }
    .navgation ul{
        position: absolute;
        top: 0; left: 0;
        width: 100%;
    }
    .navgation ul li{
        position: relative;
        list-style: none;
        width: 100%;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }
    .navgation ul li:nth-child(2):hover{
        background: #fff;
        
    }
    .navgation ul li:nth-child(3):hover{
        background: #fff;
        
    }
    .navgation ul li:nth-child(4):hover{
        background: #fff;
        
    }
    .navgation ul li:nth-child(5):hover{
        background: #fff;
        
    }
    .navgation ul li:nth-child(6):hover{
        background: #fff;
        
    }
    .navgation ul li:nth-child(7):hover{
        background: #fff;
        
    }
    .navgation ul li:nth-child(8):hover{
        background: #fff;
        
    }
    
    
    .navgation ul li a{
        position: relative;
        display: block;
        width: 100%;
        text-decoration: none;
        display: flex;
        color: #fff;
    }
    .navgation ul li:hover:not(:first-child) a{
        color: #365fa1;
    }
    .navgation ul li a .icon{
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 70px;
        text-align: center;
    }
    .navgation ul li a .icon .fa-solid {
        font-size: 1.75rem;
    }
    .navgation ul li a .icon .fa-brands {
        font-size: 1.75rem;
    }
    .navgation ul li a .tittle{
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
    }

</style>
<body>
    <div class="navgation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-brands fa-apple"></i> </span>
                    <span class="tittle">Dashboard </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-house"></i> </span>
                    <span class="tittle">List color</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"> <i class="fa-solid fa-user"></i></span>
                    <span class="tittle">Add color</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-message"></i> </span>
                    <span class="tittle">list category </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-sharp fa-solid fa-question"></i> </span>
                    <span class="tittle">Add Category </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-sharp fa-solid fa-gear"></i> </span>
                    <span class="tittle">List Product</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <span class="tittle">Add Product</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-right-from-bracket"></i> </span>
                    <span class="tittle">Login out </span>
                </a>
            </li>
        </ul>
        <div class="toggle">

        </div>
    </div>
    <script>
        let navgation = document.querySelector('.navgation');
        let toggle = document.querySelector('.toggle');

        toggle.onclick = function(){
            navgation.classList.toggle('active')
        }
    </script>
</body>
</html>