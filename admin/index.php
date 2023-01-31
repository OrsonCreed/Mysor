<?php
require_once('dbLogin_ad.php');
if (isset($_COOKIE['gfs_user_credentials_ac'])){ // ac means academics
    $credentials = $_COOKIE['gfs_user_credentials'];
    $credential_array = explode(",",$credentials);
    $user_combunation = $credential_array[0];
    $user_password = $credential_array[1];
    $query = "SELECT * FROM credentials WHERE user_reg_code = '$user_combunation' AND combunation = '$user_password'";
    $executor = $connection->prepare($query);
    $executor->execute();
    $result = $executor->fetchAll();
  
 
    $query_1 = "SELECT * FROM users WHERE user_reg_code = '$user_combunation'";
    $executor_1 = $connection->prepare($query_1);
    $executor_1->execute();
    $result_1 = $executor_1->fetchAll();
    $data_1 = $result_1[0];
 
    if (sizeof($result) !=0) {
       $data = $result[0];
       session_start();
       $_SESSION['USER_REG_CODE'] = $data['user_reg_code'];
       $_SESSION['USER_F_NAME'] = $data_1['first_name'];
       $_SESSION['USER_L_NAME'] = $data_1['other_names'];
       echo "
       <script>
       window.location.replace('pages/dashboald.php');
       </script>
       ";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search_worker.css">
    <title>Document</title>
    <link rel="stylesheet" href="../../external_dependencies/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <center><h1>GOOD FOUNDATION SCHOOL (USER LOGIN)</h1></center>
        </div>
        <div class="top-panel">
            
        </div>

        <div class="content">
            <div class="box_1" style="margin-top: 80px; font-weight: bolder;">
                <h3 style="color: white;text-align: center;">PLEASE ENTER REG CODE AND PASSWORD</h3>
                <form action="../admin/php/login_process.php" method="post">
                    <input type="text"name = "user_reg_code" style="font-weight: bolder;">
                    <input type="password"name = "password" style="font-weight: bolder;"><input type="submit" style="font-weight: bolder;" value="Login" placeholder="Enter student id">
                </form>
            </div>

        </div>
        <div class="footer">
            <span>copyright &copy; 2022 www.goodfoundation.com</span>
        </div>
    </div>
</body>
</html>