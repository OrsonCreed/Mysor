<?php
require_once('dbLogin.php');
session_start();
require_once('../pages/user_details_accountant.php');

if(
    !empty($_POST['old_password'])&&
    !empty($_POST['new_password'])&&
    !empty($_POST['password_retype'])
){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $password_retype = $_POST['password_retype'];

    $query_0 = "SELECT * FROM `credentials` WHERE u_code = '$u_code' AND password = '$old_password'";
    $executor_0 = $connection->prepare($query_0);
    $executor_0->execute();
    $result_0 = $executor_0->fetchAll();
    if(empty($result_0[0])){
        echo "<script>
        alert('Incorect Password');
        window.history.go(-1);
        </script>";
       
    }else{
        $update_query = "UPDATE credentials SET password = '$new_password'";
        $connection->Exec($update_query);
        echo "<script>
        alert('You have successfuly change your password!');
        window.location.replace('../pages/account.php');
        </script>";
        exit;
    }
}
?>