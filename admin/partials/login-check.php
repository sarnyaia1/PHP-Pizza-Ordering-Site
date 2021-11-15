<?php 
    if(!isset($_SESSION['user'])) {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Kérlek jelentkezz be a felület használatához!</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>