<?php
require_once("check_user_login.php");
$user_email = $_SESSION['USER_EMAIL'];
$user_type = $_SESSION['USER_TYPE'];
$u_code = $_SESSION['U_CODE'];
$tr_query = "SELECT * FROM admins WHERE u_code = '$u_code'";
$executor = $connection->prepare($tr_query);
$executor->execute();
$result = [$executor->fetchAll()][0];
$first_name = $result[0]['first_name'];
$other_names = $result[0]['other_names']; 
?>