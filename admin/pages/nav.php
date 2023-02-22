<?php
$query_0 = "SELECT * FROM `profile_pictures` WHERE user_id = '$u_code' ORDER BY id DESC LIMIT 1";
$executor_0 = $connection->prepare($query_0);
$executor_0->execute();
$result_0 = $executor_0->fetchAll();
if(empty($result_0[0])){
    $image = "default_img.jpg";
}else{
    $image = $result_0[0]['picture_name'];
}


echo <<<_END
<div class="nav">
<div class="nav_content">
    <ul>
        <li><a href="account.php">Home</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="stock.php">Stock</a></li>
        <li><a href="accountant.php">Accountant</a></li>
    </ul>
</div>
<div class="profile">
    <img src="../profile_images/$image" alt="Profile Picture">
    <div>
_END;
        
    echo "
      <p>$other_names $first_name</p> 
      <p>$user_email </p> 
      ";
echo <<<_END
    </div>
</div>
<div class="logo">
    <h1>
      MySor
    </h1>
</div>
</div>
_END;

?>