<?php
session_start();
/*
in this file, serious error encountered as the image is changing its extension unexpectedly, and in un meanig full way,
check in the previous version (backup version).
*/
//-------------------------------------profile_picture-----------------------------------  
  if (!$_FILES[$image_name]['type']) {
    echo "
    <script>
    alert('Please choose image on your device.');
    window.history.go(-1);
    </script>";
    exit;
  }


  switch($_FILES[$image_name]['type'])
  {
  case 'image/jpeg': $ext ='jpeg'; break;
  case 'image/gif': $ext = 'gif'; break;
  case 'image/png': $ext = 'png'; break;
  case 'image/tif': $ext = 'tif'; break;
  case 'image/jpg': $ext = 'jpg'; break;
  default: $ext = ''; break;
  }
  if ($ext)
  {
  $n = "$reference_id.$ext";
  move_uploaded_file($_FILES[$image_name]['tmp_name'], $n);
  
  if (!rename($n,$target_dir_name.'/'.$n)){
      exit;
      echo "
          <script>
          alert('image processing error, change profile picture type or contact technician.');
          window.history.go(-1);
          </script>";
          ;
  }}


/*-------------------------------------------------------------------------------------*/

?>