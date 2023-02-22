<?php
require_once('dbLogin.php');
session_start();
$userRegistrationNumber =  $_SESSION['U_CODE'];
//-------------------------------------profile_picture-----------------------------------  
  if (!$_FILES['profile_pic']['type']) {
    echo "
    <script>
    alert('Please choose image on your device.');
    window.history.go(-1);
    </script>";
    exit;
  }
  switch($_FILES['profile_pic']['type'])
  {
  case 'image/jpeg': $ext = 'jpg'; break;
  case 'image/gif': $ext = 'gif'; break;
  case 'image/png': $ext = 'png'; break;
  case 'image/tif': $ext = 'tif'; break;
  case 'image/jpeg': $ext = 'jpeg'; break;
  default: $ext = ''; break;
  }
  if ($ext)
  {
 
 
  $date =  date('Y/m/d/h/i/s');
  $date = explode('/',$date);
  $date = implode('',$date);
  $n = "$userRegistrationNumber.$date.$ext";
  move_uploaded_file($_FILES['profile_pic']['tmp_name'], $n);
  $query = "INSERT INTO profile_pictures (picture_name,date,user_id) VALUES ('$n','$date','$userRegistrationNumber')";
  $connection->Exec($query);
  }
  // unlink('../profile_images/'.$n);
  if (!rename($n,'../profile_images/'.$n)){
      echo "
          <script>
          alert('image processing error, change profile picture type or contact technician.');
          window.history.go(-1);
          </script>";
          ;
  }else {
    echo "
    
    <script>
    alert('You have successfully changed your profile picture!');
    window.location.replace('../pages/change_profile_picture.php');
    </script>";

    
  }

/*-------------------------------------------------------------------------------------*/

?>