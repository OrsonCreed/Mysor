<?php
session_start();
require_once("../php/dbLogin.php");
require_once("user_details_customer.php");
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
             <div>
                 <img class="index-illustration" src="../../external_dependencies/images/family.svg" alt="illustration">
             </div>
             <div class="left-panel">
                <div>
                    <div>
                        <h1>
                            <span class="heading">Light your house with MobiSor</span>
                         </h1>
                         <small>
                             Did you know that you can pay progressively with MobiSor?
                         </small>
                    </div>
                </div>
                <div>
                    <ul>
                        <li> <a href="change_username.php">  Change Username </a></li>
                        <li> <a href="change_contacts.html">  Change Email and Phone </a></li>
                        <li> <a href="change_password.html">  Change Password </a></li>
                        <li> <a href="../php/log_out_session.php">  Log Out </a></li>
                    </ul>
                </div>
             </div>
         </div>
        </div>
    </div>
</body>
</html>