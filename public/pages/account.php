<?php
session_start();
require_once("../php/dbLogin.php");
$user_email = $_SESSION['USER_EMAIL'];
$user_type = $_SESSION['USER_TYPE'];
$u_code = $_SESSION['U_CODE'];

$tr_query = "SELECT * FROM customers WHERE u_code = '$u_code'";
$executor = $connection->prepare($tr_query);
$executor->execute();
$result = [$executor->fetchAll()][0];
$first_name = $result[0]['first_name'];
$other_names = $result[0]['other_names'];
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
          <div class="nav">
              <div class="nav_content">
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Products & Ordering</a></li>
                      <li><a href="#">Payements</a></li>
                      <!-- <li>one</li> -->
                  </ul>
              </div>
              <div class="profile">
                  <img src="../../external_dependencies/images/bg.jpg" alt="Profile Picture">
                  <div>
                      <?php
                      echo "
                        <p>$other_names $first_name</p> 
                        <p>$user_email </p> 
                        ";?>

                  </div>
              </div>
              <div class="logo">
                  <h1>
                    MySor
                  </h1>
              </div>
          </div>
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