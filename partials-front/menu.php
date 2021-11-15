<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Pozzo</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
     .navbar {
        position: sticky;
        top: 0;
        bottom: ;
        width: 100%;
        background-color: white;
        color: white;
        text-align: center;
     }

     .footer {
        position: static;
        bottom: 0;
        top: auto;
        width: 100%;
     }
    </style>
</head>

<body>
    <section class="navbar">
        <div class="container">

            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo-menu.jpg" alt="Pizzeria logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Kezdőlap</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Étlap</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Kapcsolat</a> 
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>