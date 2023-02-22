
<?php
session_start();
require_once("../dbLogin_ad.php");
require_once("../../external_dependencies/php/grobal_functions.php");
require_once("user_details_accountant.php");

$query_1 = "SELECT * FROM `orders`WHERE status = 'pending'";
$executor_1 = $connection->prepare($query_1);
$executor_1->execute();
$result_1 = $executor_1->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/3.css">
</head>
<body>
    <div class="container">
        <div class="box_1">
        <?php
            require_once("nav.php");
            ?>
         <div class="main-content">
            <div class="menu">
             <table>
             <tr><td colspan = "3">Please Choose Order</td></tr>
             <tr><td>Date</td><td>Order Code</td><td>Action</td></tr>
<?php  
foreach ($result_1 as $key => $value) {
        $order_date = $value['order_date'];
        $order_code =  $value['order_code'];

       echo "<tr><td>$order_date</td><td>$order_code</td><td><a href = 'order.php?order_code=$order_code' >Check</a></td></tr>"; 
    
}
?>
          
                 
                 
             </table>
            </div>
         </div>
        </div>
    </div>
</body>
</html>