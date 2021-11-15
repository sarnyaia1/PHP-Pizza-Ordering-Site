<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Visszajelzések</h1>

        <?php 

            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

        ?>
        <br /><br /><br />

        <?php 
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <br><br>

        <table class="tbl-full">
            <tr>
                <th width="3%">ID</th>
                <th width="15%">Visszajelzés ideje</th>
                <th width="10%">Visszajelző</th>
                <th width="8%">Telszám</th>
                <th width="15%">Email</th>
                <th width="42%">Visszajelzés</th>
                <th width="10%">Törlés</th>
            </tr>

        <?php
          $sql = "SELECT * FROM tbl_response ORDER BY id DESC";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          $sn = 1;

          if($count>0) {
              while($row=mysqli_fetch_assoc($res)) {
                  $id = $row['id'];
                  $response_date = $row['response_date'];
                  $customer_name = $row['customer_name'];
                  $customer_contact = $row['customer_contact'];
                  $customer_email = $row['customer_email'];
                  $customer_response = $row['customer_response'];                
        ?>

            <tr>
                <td><?php echo $sn++; ?> </td>
                <td><?php echo $response_date; ?></td>
                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_response; ?></td>
                <td><a href="<?php echo SITEURL; ?>admin/delete-response.php?id=<?php echo $id; ?>" class="btn-danger">Törlés</a></td>

                <?php

                }
                } else {
                    echo "<tr><td colspan='12' class='error'>Még nincs visszajelzés</td></tr>";
                }
                ?>

                <?php 
                    $sql = "SELECT * FROM tbl_response";
                    $res = mysqli_query($conn, $sql);
                    if($res==TRUE) {
                        $count = mysqli_num_rows($res);
                        $sn=1;

                        if($count>0) {
                            while($rows=mysqli_fetch_assoc($res)) {
                                $id=$rows['id'];
                                $response_date=$rows['response_date'];
                                $customer_name=$rows['customer_name'];
                                $customer_contact=$rows['customer_contact'];
                                $customer_email=$rows['customer_email'];
                                $customer_response=$rows['customer_response'];
                ?>
                        </tr>
                    <?php
                    } 
                }
        }
        ?>
                        
      </table>

    </div>
    
</div>

<?php include('partials/footer.php'); ?>