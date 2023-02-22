<?php

session_start();
$u_code = $_SESSION['U_CODE'];
if(!isset($_GET['terminate_session'])){
   // require_once('check_user_login.php');
}
require_once("../../external_dependencies/php/grobal_functions.php");
if (isset($_COOKIE['gfs_user_credentials'])){
    $cookie_name = "0000token5555".$u_code;
    $cookie_value = $_COOKIE['gfs_user_credentials'];
    destroy_cookie($cookie_name,$cookie_value);
    session_destroy();
    echo "
    <script>
    alert('You have successfuly logged out the session on this device!');
    window.location.replace('../../index.html');
    </script>
    ";

}else{
    echo "no user found on this device!";
}
?>