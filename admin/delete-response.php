<?php 

    include('../config/constants.php');
    
    //Lekérdezés adatbázisból, majd törlés
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_response WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    //Visszajelzés, hogy sikeres vagy siekrtelen volt a törlés
    if($res==true) {
        $_SESSION['delete'] = "<div class='success'>Visszajelzés sikeresen törölve!</div>";
        header('location:'.SITEURL.'admin/response.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Visszajelzés törlése sikertelen!</div>";
        header('location:'.SITEURL.'admin/response.php');
    }

?>