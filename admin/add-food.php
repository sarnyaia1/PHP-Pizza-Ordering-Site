<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Pizza hozzáadás</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <!-- Új elem feltöltése -->
        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Név: </td>
                    <td>
                        <input type="text" name="title" placeholder="A pizza neve:">
                    </td>
                </tr>

                <tr>
                    <td>Feltétek: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="A pizzán lévő szósz és feltétek:"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Ár: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Kép kiválasztás: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Gluténmentes: </td>
                    <td>
                        <input type="radio" name="glutenfree" value="Igen"> Igen 
                        <input type="radio" name="glutenfree" value="Nem"> Nem
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Pizza hozzáadás" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 
            //Adatok hitelesítése
            if(isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $glutenfree = $_POST['glutenfree'];

                if(isset($_POST['glutenfree'])) {
                    $glutenfree = $_POST['glutenfree'];
                } else {
                    $glutenfree = "Nem";
                }

                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="") {
                        $ext = end(explode('.', $image_name));
                        $image_name = rand(0000,9999) . "." . $ext; //új pizza : pl. vegetarianus.jpeg
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/food/".$image_name;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false) {
                            $_SESSION['upload'] = "<div class='error'>A kép feltöltés sikertelen!</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
                } else {
                    $image_name = "";
                }

                //Pizza hozzáadsá az adatbázishoz
                $sql2 = "INSERT INTO tbl_food SET 
                    title = '$title', 
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    glutenfree = '$glutenfree'
                ";
                $res2 = mysqli_query($conn, $sql2);

                //Hozzáadás ellenőrzése
                if($res2 == true) {
                    $_SESSION['add'] = "<div class='success'>Pizza hozzáadása sikeres!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                } else {
                    $_SESSION['add'] = "<div class='error'>Pizza hozzáadás sikertelen!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                } 
            }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>