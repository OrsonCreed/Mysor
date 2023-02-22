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
                <ul>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="change_profile_picture.php">Change Profile picture</a></li>
                    <li><a href="change_username.php">Change User Name</a></li>
                    <li><a href="../php/Log_out_session.php">Log Out</a></li>
                </ul>
            </div>
         </div>
        </div>
    </div>
</body>
</html>