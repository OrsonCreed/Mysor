<?php
require_once("dbLogin.php");
session_start();
require_once("user_details_accountant.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/2.css">
</head>
<body>
    <div class="container">
        <div class="box_1">
        <?php
            require_once("nav.php");
            ?>
         <div class="main-content">
            <div class="menu">
                <ul>
                    <li><a href="new_product.html">Add New Product</a></li>
                    <li><a href="select_product.php">Add Product</a></li>
                    <li><a href="check_stock.php">Check Stock</a></li>
                    <li><a href="select_to_delete.php">Remove Product</a></li>
                </ul>
            </div>
         </div>
        </div>
    </div>
</body>
</html>