<?php
require_once("../php/dbLogin.php");
session_start();
require_once('../php/check_user_login.php');
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/search_worker.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php
       require_once("nav.php");
       ?>
        <div class="top-panel">
            
        </div>

        <div class="content">
            
            <div class="box_1" >
<?php

$tr_reg_code = $_POST['tr_reg_code'];
$tr_query = "SELECT * FROM teachers WHERE tr_reg_code = '$tr_reg_code'";
$executor = $connection->prepare($tr_query);
$executor->execute();
$result = [$executor->fetchAll()][0];
$first_name = $result[0]['first_name'];
$other_names = $result[0]['other_names'];
$sex = $result[0]['sex']; 
$phone = $result[0]['phone'];
$email = $result[0]['email'];
echo <<<_END
 <form action="../php/edit_teacher_info_process.php" method="post">
 <input type = "hidden" name = "tr_reg_code" value = "$tr_reg_code">
 <input type="text" name = "first_name" value = "$first_name">
 <input type="text" name = "other_names" value="$other_names">
 <select name="gender" style="margin-left:50%;transform:translate(-50%);">
    <option value="$sex">$sex</option>
     <option value="male">Male</option>
     <option value="female">Female</option>
 </select>
 <input type= "text" name = "phone" placeholder="phone" value = "$phone">
 <input type="email" name = "email" placeholder="Email" value = "$email">

_END
               ?> 
               <input type="submit" value="Save User">
</form>
                 <p style="text-align: center;padding-top: 20px;"><a style="color: wheat;" class="highlight" href="users.php">Return Back</a></p>
            </div>

        </div>
        
    </div>
    <div class="footer">
        <span>copyright &copy; 2022 www.goodfoundation.com</span>
    </div>
</div>
</body>
</html>