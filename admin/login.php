<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Pizza Pozzo - Bejelentkezés</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Admin Bejelentkezés</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        
            <!-- Bejelentkezés -->
            <form action="" method="POST" class="text-center">
            <p class="login-label">Felhasználónév:</p> <br>
            <input class="login-input" type="text" name="username" placeholder="Felhasználónév..."><br><br>

            <p class="login-label">Jelszó:</p> <br>
            <input class="login-input" type="password" name="password" placeholder="Jelszó..."><br><br>

            <input type="submit" name="submit" value="Bejelentkezés" class="btn-primary">
            <br><br>
            </form>
            
        </div>

    </body>

</html>

<?php 
    // Lekérdezés adatbázisból az adatok alapján
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        //Visszajelzés az ellenőrzésről
        if($count==1) {
            $_SESSION['login'] = "<div class='success'>Sikeres bejelentkezés</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/');
        } else {
            $_SESSION['login'] = "<div class='error text-center'>Helytelen felhasználónév vagy jelszó!</div>";
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>