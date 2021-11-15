<?php include('partials/menu.php'); ?>

    <div class="main-content">

        <div class="wrapper">

            <h1>Admin hozzáadás</h1>

            <br><br>

            <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <!-- Új elem rögzízése -->
            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Teljes név: </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Teljes neved:">
                        </td>
                    </tr>

                    <tr>
                        <td>Felhasználónév: </td>
                        <td>
                            <input type="text" name="username" placeholder="Felhasználóneved:">
                        </td>
                    </tr>

                    <tr>
                        <td>Jelszó: </td>
                        <td>
                            <input type="password" name="password" placeholder="Jelszavad">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Admin hozzáadás" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>

        </div>
    </div>

<?php include('partials/footer.php'); ?>


<?php
    //Adatok ellenőrzése
    if(isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //Új admin hozzáadás táblázathoz
        $sql = "INSERT INTO tbl_admin SET full_name='$full_name', username='$username', password='$password' ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //Hozzáadás ellenőrzése
        if($res==TRUE) {   
            $_SESSION['add'] = "<div class='success'>Admin sikeresen hozzáadva!</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        } else {
            $_SESSION['add'] = "<div class='error'>Admin hozzáadás sikertelen!</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>