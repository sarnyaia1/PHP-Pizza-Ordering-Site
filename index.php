<?php include('partials-front/menu.php'); ?>
<style>
    .main-content {
        background-color: #ececec;
        padding: 3% 0;
    }
    .description {
        background-color: white;
        padding: 1%;
        width: 50%;
        margin: 0 auto;
        border-radius: 15px;
        font-size: 20px;
    }
    .wrapper {
        background-color: white;
        padding: 1%;
        width: 80%;
        margin: 0 auto;
        background-color: white;
        border-radius: 15px;
    }
    .tbl-full {
        width: 100%;
    }
    .tbl-30 {
        width: 30%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    table tr th {
        border-bottom: 1px solid black;
        padding: 1%;
        text-align: left;
        font-size: 20px;
    }

    table tr td {
        padding: 1%;
    }
</style>

<section class="food-search text-center">
    <div class="container">
        
        <h1 class="contact">Üdvözlünk a <strong>Pizza Pozzo</strong> weboldalán!</h1>

    </div>
</section>
<section class="main-content">
    <div class="description">
        <ul><br>
            <p>Nálunk találod meg a környék legjobb pizzáit!</p><br>
            <p>Ismerd meg a kínálatunkat az <strong>Étlap</strong> fülön!</p><br>
            <p>Amennyiben rendelni szeretnél, használd a lentebb lévő gombot!</p><br>
            <p>Viszont, ha a helyszínen fogyasztanál, a <strong>Kapcsolat</strong> fülön megtalálhatsz minket!</p><br>
            <p>Észrevételeidet jelezd nekünk bátran a <strong>Kapcsolat</strong> fülön lévő elérhetősigeink valamelyikén!</p><br>
        </ul>
    </div>
</section>
<section class="food-menu">
    <p class="text-center">
        <a class="btn btn-primary" href="<?php echo SITEURL; ?>foods.php">Rendelni szeretnék</a>
    </p>
</section>

<section>
    <div class="main-content">
    <div class="wrapper">

        <?php 
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <br><br>

        <table class="tbl-full">
            <tr>
                <th width="30%">Vásárlók</th>
                <th width="70%">Vásárlói visszajelzések</th>
            </tr>

        <?php
          $sql = "SELECT * FROM tbl_response ORDER BY RAND() DESC LIMIT 5";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          $sn = 1;

          if($count>0) {
              while($row=mysqli_fetch_assoc($res)) {
                $customer_name = $row['customer_name'];
                $customer_response = $row['customer_response'];                
        ?>

            <tr>
                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_response; ?></td>
            </tr>

        <?php

          }
          } else {
              echo "<tr><td colspan='12' class='error'>Még nincs visszajelzés</td></tr>";
          }
        ?>
      </table>

        <br><br><br>

    </div>
    
</div>
</section>
<hr>

<?php include('partials-front/footer.php'); ?>