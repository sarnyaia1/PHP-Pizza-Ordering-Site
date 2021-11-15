<?php 

    include('../config/constants.php');

    //Id és kép ellenőrzése
    if(isset($_GET['id']) && isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "") {
            $path = "../images/food/".$image_name;
            $remove = unlink($path);

            if($remove==false) {
                $_SESSION['upload'] = "<div class='error'>Kép eltávolítása sikertelen!</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        //Piza törlés az adatbázisból
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] = "<div class='success'>Pizza törlése sikeres!</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        } else {
            $_SESSION['delete'] = "<div class='error'>Pizza törlése sikertelen!</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    } else {
        $_SESSION['unauthorize'] = "<div class='error'>Hozzáférrés megtagadva!</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>