<?php 

    include('../config/constants.php');
    
    //Lekérdezés adatbázisból, majd törlés
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    //Visszajelzés, hogy sikeres vagy siekrtelen volt a törlés
    if($res==true) {
        $_SESSION['delete'] = "<div class='success'>Admin sikeresen törölve!</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Admin törlése sikertelen!</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>