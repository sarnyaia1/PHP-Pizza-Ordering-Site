<?php include('partials-front/menu.php'); ?>

<section class="food-search text-center">
        <div class="container">
            
            <h1 class="contact">Elérhetőségeink</h1>

        </div>
</section>

<section class="contact-details text-center">
    <div class="telephone">
        <br>
        <h2>Telefonos elérhetőségeink:</h2>
        <h4>Mobil: +36 20 123 45 67 </h4><br>
        <h4>Vezetékes: +36 1 123 4567 </h4><br><hr>
    </div>
    <div class="e-mail"><br>
        <div class="container">
            <form action="" method="POST" class="response">
                <fieldset class="contact-fieldset">
                    <h2>Írj visszajelzést!</h2>
                    <div class="order-label">Teljes név</div>
                    <input type="name" name="full-name" placeholder="pl. Kovács István" class="input-responsive" required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="contact" placeholder="pl. 301234567" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="pl. kovacs.istvan@gmail.com" class="input-responsive" required>

                    <div class="order-label">Üzenet</div>
                    <textarea name="response" rows="10" placeholder="Ide írd az üzenetet" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Küldés" class="btn btn-primary">
                </fieldset>
            </form>
        </div><hr>

        <?php
            if(isset($_POST['submit'])) {

                    $response_date = date("Y-m-d h:i:sa");

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_response = $_POST['response'];

                    $sql9 = "INSERT INTO tbl_response SET 
                        response_date = '$response_date',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_response = '$customer_response'";

                    $res5 = mysqli_query($conn, $sql9);

                    if($res5==true) {
                        $_SESSION['response'] = "<div class='success text-center'>Köszönjük a visszajelzését!</div>";
                        echo '<script>alert("Köszönjük a visszajelzését!")</script>';
                    } else {
                        $_SESSION['response'] = "<div class='error text-center'>A visszajelzés sikertelen!</div>";
                        echo '<script>alert("A visszajelzés sikertelen!")</script>';
                    }
            }
        ?>

        <section class="main-content">
        <h2>Itt találsz meg minket:</h2>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9319.454168591767!2d6.123482068003293!3d50.28156722994732!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x36cbd3a81e0e368b!2sPizzeria%20Il%20Vecchio%20Pozzo!5e0!3m2!1shu!2srs!4v1635798427451!5m2!1shu!2srs" width="95%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        </section>
        <br><hr>
    </div>    
</section>

<?php include('partials-front/footer.php'); ?>