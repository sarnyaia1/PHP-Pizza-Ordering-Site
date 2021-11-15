<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Rendelés Szerkesztése</h1>

        <br /><br /><br />

        <?php 
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <br><br>

        <!-- Címsor kiíratása -->
        <table class="tbl-full">
            <tr>
                <th width="3%">ID</th>
                <th width="10%">Rendelés ideje</th>
                <th width="10%">Név</th>
                <th width="7%">Ár</th>
                <th width="4%">DB</th>
                <th width="8%">Össz. Ár</th>
                <th width="10%">Állapot</th>
                <th width="6%">Rendelő</th>
                <th width="8%">Telszám</th>
                <th width="15%">Email</th>
                <th width="12%">Cím</th>
                <th>Műveletek</th>
            </tr>

        <!-- Adatok lekérdezése táblázatból -->
        <?php
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0) {
                while($row=mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                                
        ?>

            <tr>
                <td><?php echo $sn++; ?> </td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $food; ?></td>
                <td><?php echo $price .'FT'; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $total .'FT'; ?></td>
                                        
                <td>
                    <?php
                        if($status=="Megrendelve") {
                            echo "<label style='color: blue;'>$status</label>";
                        } elseif($status=="Folyamatban") {
                            echo "<label style='color: orange;'>$status</label>";
                        } elseif($status=="Szállítva") {
                            echo "<label style='color: green;'><b>$status</b></label>";
                        } elseif($status=="Törölve") {
                            echo "<label style='color: red;'>$status</label>";
                        }
                    ?>
                </td>

                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_address; ?></td>

                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Szerkesztés</a>
                </td>
            </tr>

                <?php

                }
            } else {
                echo "<tr><td colspan='12' class='error'>Rendelés nem elérhető</td></tr>";
            }
                ?>

 
        </table>

    </div>
    
</div>

<?php include('partials/footer.php'); ?>