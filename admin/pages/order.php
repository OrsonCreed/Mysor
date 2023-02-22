
<?php
require_once("../dbLogin_ad.php");
require_once("../../external_dependencies/php/grobal_functions.php");
$order_code = $_GET['order_code'];
$query_1 = "SELECT * FROM `ordered_products` WHERE order_code = '$order_code'";
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
             <tr><td colspan = "4">Order Details</td></tr>
             <tr><td>Product Name</td><td>Unit Price</td><td>Number Of Units</td><td>Sub Total</td> </tr>
<?php
$total = 0;
foreach ($result_1 as $key => $value) {
        $product_code = $value['prod_code'];
        $query_2 = "SELECT * FROM products WHERE prod_code = '$product_code'";
        $executor_2 = $connection->prepare($query_2);
        $executor_2->execute();
        $result_2 = $executor_2->fetchAll();

        $query_3 = "SELECT * FROM stock_mgr WHERE prod_code = '$product_code'";
        $executor_3 = $connection->prepare($query_3);
        $executor_3->execute();
        $result_3 = $executor_3->fetchAll();
        $product_name = $result_2[0]['prod_name'];
        $unit_price = $result_3[0]['selling_price'];
        $number_of_units = $value['number_of_units'];
        $sub_total = $unit_price * $number_of_units;
        $total += $sub_total;
       echo "<tr><td>$product_name</td><td>$unit_price</td><td>$number_of_units</td><td>$sub_total</td></tr>";
       
}
echo "<tr><td colspan = '4'>TOTAL: $total</td></tr>";
echo "<tr><td colspan = '4'><a href = 'confirm_delivery.php?order_code=$order_code'>Confirm Delivery</a></td></tr>"; 
?>
          
                 
                 
             </table>
            </div>
         </div>
        </div>
    </div>
</body>
</html>