<?php include('partials-front/menu.php'); ?>
    
    <?php
        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>

    <section class="food-search2">
        <div class="container">
            
            <h2 class="text-center text-white">Töltsd ki a felületet a rendelés véglegesítéséhez</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Kiválasztott pizza</legend>

                    <div class="food-menu-img">
                        <?php 
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Hawaii pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price"><?php echo $price; ?> FT</p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Mennyiség</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Szállítás részletei</legend>
                    <div class="order-label">Teljes név</div>
                    <input type="text" name="full-name" placeholder="pl. Kovács István" class="input-responsive" required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="contact" placeholder="pl. 301234567" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="pl. kovacs.istvan@gmail.com" class="input-responsive" required>

                    <div class="order-label">Cím</div>
                    <input name="address" rows="10" placeholder="pl. 6722 Kossuth Lajos sugárút 1" class="input-responsive" required>

                    <input type="submit" name="submit" value="Rendelés véglegesítés" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
                if(isset($_POST['submit']))
                {
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;
                    $order_date = date("Y-m-d h:i:sa"); 
                    // státusz és price javítandó
                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'>Sikeres megrendelés!</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>A megrendelés sajnos sikertelen!</div>";
                        header('location:'.SITEURL);
                    }
                }
            
            ?>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>