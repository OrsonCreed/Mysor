<?php
require_once("dbLogin.php");
require_once("../../external_dependencies/php/grobal_functions.php");

$user_token= "user_email";
$token_combunation = "user_password";
$basics_table = "customers";
$auth_table = "credentials";
$auth_column = "email";
$comb_column = "password";

if (!empty($_POST[$user_token]) && !empty($_POST[$token_combunation])){
   $user_combunation = $_POST[$user_token];
   $user_password = $_POST[$token_combunation];
   $query = "SELECT * FROM $auth_table WHERE $auth_column = '$user_combunation' AND $comb_column  = '$user_password'";
   $executor = $connection->prepare($query);
   $executor->execute();
   $result = $executor->fetchAll();
   $auth_column = "u_code";
   $u_code = $result[0]['u_code'];
   $query_1= "SELECT * FROM $basics_table WHERE $auth_column = '$u_code'";
   $executor_1 = $connection->prepare($query_1);
   $executor_1->execute();
   $result_1 = $executor_1->fetchAll();
   if (sizeof($result) !=0) {
      $data_1 = $result_1[0];

      $data = $result[0];
      session_start();
      $_SESSION['USER_EMAIL'] = $data['email'];
      $_SESSION['USER_TYPE'] = $data['user_type'];
      $_SESSION['USER_F_NAME'] = $data_1['first_name'];
      $_SESSION['USER_L_NAME'] = $data_1['other_names'];
      $_SESSION['U_CODE'] = $u_code;
      $cookie_name = "gfs_user_credentials";
      $cookie_value = $user_combunation.",".$user_password;
      create_cookie($cookie_name,$cookie_value,2);
      echo "
      <script>
      document.location.replace('../pages/account.php');
      </script>
      ";
 
   }else{
      $encoded_json = json_encode('1');
      echo"$encoded_json";
   }
 
}else{ 
        $d = "0";
        $encoded_json = json_encode($d);
        echo $encoded_json;
}
?>