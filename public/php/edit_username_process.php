<?php
require_once("dbLogin.php");
session_start();
if(!(empty($_POST['first_name'])&&
 empty($_POST['other_names']))){
    $u_code = $_SESSION['U_CODE'];
    $update_data = array(
        "first_name" => (string) $_POST['first_name'],
        "other_names" => $_POST['other_names']
    );
/*-------------------------------------------------------------------------------------*/
foreach ($update_data as $key => $value) {
  $update_query = "UPDATE customers SET $key = '$value' WHERE u_code = '$u_code'";
  $connection->exec($update_query);
}

//your should add an exception for the failure of the above process.
echo "
<script>
alert('User info successfuly modified!');
window.location.replace('../pages/account.php');
</script>
";

}else{
  echo "
  <script>
  alert('Please fill all provided fields!');
  window.history.go(-1);
  </script>
  ";
}


?>