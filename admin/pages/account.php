<?php
require_once("dbLogin.php");
session_start();
require_once("user_details_accountant.php");
$query_0 = "SELECT * FROM `orders`";
$executor_0 = $connection->prepare($query_0);
$executor_0->execute();
$result_0 = $executor_0->fetchAll();


$query_1 = "SELECT * FROM `products` WHERE prod_status = 'active'";
$executor_1 = $connection->prepare($query_1);
$executor_1->execute();
$result_1 = $executor_1->fetchAll();


$query_2 = "SELECT COUNT(pay_id) FROM `payments`";
$executor_2 = $connection->prepare($query_2);
$executor_2->execute();
$result_2 = $executor_2->fetchAll();


$query_3 = "SELECT COUNT(order_id) FROM `orders` WHERE status = 'pending'";
$executor_3 = $connection->prepare($query_3);
$executor_3->execute();
$result_3 = $executor_3->fetchAll();
$data_3 = $result_3[0][0];


$query_4 = "SELECT COUNT(order_id) FROM `orders` WHERE status = 'confirmed'";
$executor_4 = $connection->prepare($query_4);
$executor_4->execute();
$result_4 = $executor_4->fetchAll();
$data_4 = $result_4[0][0];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/2.css">
</head>
<body>
    <div class="container">
        <div class="box_1">
      <?php
      require_once("nav.php"); 
      ?>
         <div class="main-content">
             <div>
                 <table>
                     <tr>
                        <td colspan="2">
                           ESSENTIAL SUMMARY
                        </td>
                     </tr>
<?php
echo <<<_END
 <tr>
                         <td>Pending Requests</td><td>$data_3</td>
                     </tr>

                     <tr>
                        <td>Successful Orders</td><td>$data_4</td>
                    </tr>
_END;


?>

                 </table>
             </div>
             <div class="left-panel">
                <table>
                    <tr>
                        <td colspan="2">
                           STOCK SHORT SUMMARY
                        </td>
                     </tr>
                     <tr>
                         <td>Avairable Products</td><td>left</td>
                     </tr>

                    <?php
                    foreach ($result_1 as $key_0 => $value_0) {
                        $product_code =$value_0['prod_code'];
                        $product_name =$value_0['prod_name'];

                        $query_5 = "SELECT * FROM `stock` WHERE prod_code = '$product_code'";
                        $executor_5 = $connection->prepare($query_5);
                        $executor_5->execute();
                        $result_5 = $executor_5->fetchAll();
                        $left_items = $result_5[0]['num_of_com'];
                        echo "
                        <tr>
                        <td>$product_name</td><td>$left_items</td>
                        </tr>
                        ";
                    }
                   
                    ?>
      
                    
                 </table>
             </div>
         </div>
        </div>
    </div>
</body>
</html>