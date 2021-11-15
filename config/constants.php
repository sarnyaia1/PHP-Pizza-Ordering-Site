<?php 
    session_start();

    // Konstansok, a nem ismétlődő értékek tárolására
    define('SITEURL', 'http://localhost/onlinefood-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'onlinefoodorder');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // Adatbázis kapcsolat
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // Adatbázis kiválasztó
    
?>