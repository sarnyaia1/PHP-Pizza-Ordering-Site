<?php include('partials/menu.php'); ?>

<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $glutenfree = $row2['glutenfree'];

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Pizza szerkesztése</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Név: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Feltétek: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Ár: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Kép: </td>
                <td>
                    <?php 
                        if($current_image == ""){
                            echo "<div class='error'>Kép nem elérhető!</div>";
                        } else {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Új kép választás: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Gluténmentes: </td>
                <td>
                    <input <?php if($glutenfree=="Igen") {echo "checked";} ?> type="radio" name="glutenfree" value="Igen"> Igen 
                    <input <?php if($glutenfree=="Nem") {echo "checked";} ?> type="radio" name="glutenfree" value="Nem"> Nem 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Pizza szerkesztése" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $glutenfree = $_POST['glutenfree'];

                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="") {
                        $ext = end(explode('.', $image_name));
                        $image_name = rand(0000, 9999).' Pizza'.$ext; //Pizza új neve
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/food/".$image_name;
                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false) {
                            $_SESSION['upload'] = "<div class='error'>Kép feltöltés sikertelen</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }

                        if($current_image!="") {
                            $remove_path = "../images/food/".$current_image;
                            $remove = unlink($remove_path);

                            if($remove==false) {
                                $_SESSION['remove-failed'] = "<div class='error'>Kép törlése sikertelen</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                        }
                    } else {
                        $image_name = $current_image;
                    }
                } else {
                    $image_name = $current_image; 
                }

                $sql3 = "UPDATE tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    glutenfree = '$glutenfree'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);
 
                if($res3==true) {
                    $_SESSION['update'] = "<div class='success'>Pizza szerkesztése sikeres!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                } else {
                    $_SESSION['update'] = "<div class='error'>Pizza szerkesztése sikertelen</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

                
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>