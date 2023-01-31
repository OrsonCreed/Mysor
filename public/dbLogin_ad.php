<?php
require_once("../external_dependencies/php/dbConClass_B.php");
$conn = new myConnection();
$conn->setCredentials("localhost","nicole","nicole_123","mysor");
$connection = $conn->usePDO(); 
if($conn->checkCon()){
    $GLOBALS['CONNECTION_PROOF'] = true;
  }else{
      $GLOBALS['CONNECTION_PROOF'] = false;
  }
?>