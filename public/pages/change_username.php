<?php
session_start();

require_once("../php/dbLogin.php");
require_once("../../external_dependencies/php/grobal_functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/1.css"> 
</head>
<body>
    <div class="container">
        <div class="sign_up">


            <?php

$u_code = $_SESSION['U_CODE'];
$tr_query = "SELECT * FROM customers WHERE u_code = '$u_code'";
$executor = $connection->prepare($tr_query);
$executor->execute();
$result = [$executor->fetchAll()][0];
$first_name = $result[0]['first_name'];
$other_names = $result[0]['other_names'];
echo <<<_END
<form action="../php/edit_username_process.php" method="post">
                <div class="inputs">
                    <label for="">First name</label>
                    <input type="text" name="first_name" id="" placeholder="Dusabimana" value = "$first_name">
                </div>

                <div class="inputs">
                    <label for="other_names">Other names</label>
                    <input type="text" name="other_names" id="" placeholder="Dusabimana" value = "$other_names">
                </div>

                <div class="inputs">
                    <input type="submit" value="Update">
                </div>
            </form>

_END
               ?> 

            
        </div>
    </div>
</body>
</html>