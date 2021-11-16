<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Admin irányítópult</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
                

                <div class="col-4 text-center">

                    <!-- Pizzák lekérdezése táblázatból -->
                    <?php 
                        $sql2 = "SELECT * FROM tbl_food";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h2><?php echo $count2; ?></h2>
                    <br />
                    Pizzák
                </div>

                <div class="col-4 text-center">
                    
                    <!-- Rendelések lekérdezése táblázatból -->
                    <?php 
                        $sql3 = "SELECT * FROM tbl_order";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h2><?php echo $count3; ?></h2>
                    <br />
                    Rendelések
                </div>

                <div class="col-4 text-center">
                    
                    <!-- Összesített kereslet kiszámítása, átvett pizzákból -->
                    <?php 
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Szállítva'";
                        $res4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        $total_revenue = $row4['Total'];
                    ?>

                    <h2><?php echo $total_revenue; ?> FT</h2>
                    <br />
                    Bevétel
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql5 = "SELECT * FROM tbl_order WHERE status = 'Megrendelve'";
                        $res5 = mysqli_query($conn, $sql5);
                        $count5 = mysqli_num_rows($res5);
                    ?>

                    <h2><?php echo $count5; ?></h2>
                    <br />
                    Függő megrendelések
                </div>
                

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql6 = "SELECT * FROM tbl_order WHERE status = 'Folyamatban'";
                        $res6 = mysqli_query($conn, $sql6);
                        $count6 = mysqli_num_rows($res6);
                    ?>

                    <h2><?php echo $count6; ?></h2>
                    <br />
                    Szállítás alatt
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'Törölve'";
                        $res7 = mysqli_query($conn, $sql7);
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h2><?php echo $count7; ?></h2>
                    <br />
                    Törölt rendelések
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
                        $sql8 = "SELECT * FROM tbl_admin";
                        $res8 = mysqli_query($conn, $sql8);
                        $count8 = mysqli_num_rows($res8);
                    ?>

                    <h2><?php echo $count8; ?></h2>
                    <br />
                    Adminok
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql9 = "SELECT * FROM tbl_response";
                        $res9 = mysqli_query($conn, $sql9);
                        $count9 = mysqli_num_rows($res9);
                    ?>

                    <h2><?php echo $count9; ?></h2>
                    <br>
                    Visszajelzések
                </div>

                <div class="clearfix"></div>

            </div>
        </div>

<?php include('partials/footer.php') ?>