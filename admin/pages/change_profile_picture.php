<?php
require_once('dbLogin.php');
session_start();
require_once('user_details_accountant.php');

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
            <div>
                <h3>Enter Employee Reg Code</h3>
                <form action="../php/change_profile_picture_process.php" method="post" enctype = "multipart/form-data" class = "profile_pic">
                    <input type="file"name = "profile_pic"><input type="submit" value="Upload">
                </form>
            </div>
            </div>
         </div>
        </div>
    </div>
</body>
</html>