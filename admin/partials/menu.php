<?php 
    include('../config/constants.php'); 
    include('login-check.php');
?>

<html>

    <head>
        <!-- Nyitott vagyok a név választásra -->
        <title>Pizza Pozzo</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <!--Navigációs menü -->
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Kezdőlap</a></li>
                    <li><a href="manage-food.php">Étlap</a></li>
                    <li><a href="manage-order.php">Rendelések</a></li>
                    <li><a href="manage-admin.php">Adminok kezelése</a></li>
                    <li><a href="logout.php">Kijelentkezés</a></li>
                </ul>
            </div>
        </div>