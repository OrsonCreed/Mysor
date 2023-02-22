<?php
require_once("dbLogin.php");
$query_1 = "SELECT * FROM `products` WHERE prod_status = 'active'";
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
    <link rel="stylesheet" href="../css/4.css">
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
                        <td colspan="6">
                           Products
                        </td>
                     </tr>
                     <tr>
                         <td>Product Name</td><td>Items</td><td>Buying Price</td><td>Celling Price</td><td>Ammount carriage (BP)</td><td>Ammount carriage (SP)</td>
                     </tr>
                     <?php
        $total_profit = 0;
        $total_stock = 0;
       foreach ($result_1 as $key_0 => $value_0) {
        $product_code =$value_0['prod_code'];
        $product_name =$value_0['prod_name'];

        $query_2 = "SELECT * FROM `stock` WHERE prod_code = '$product_code' AND prod_status = 'active'";
        $executor_2 = $connection->prepare($query_2);
        $executor_2->execute();
        $result_2 = $executor_2->fetchAll();

        $query_3 = "SELECT * FROM `stock_mgr` WHERE prod_code = '$product_code' AND prod_status = 'active'";
        $executor_3 = $connection->prepare($query_3);
        $executor_3->execute();
        $result_3 = $executor_3->fetchAll();


        $left_items = $result_2[0]['num_of_com'];
        $buying_price = $result_3[0]['buying_price'];
        $selling_price = $result_3[0]['selling_price'];
        $ammount_cariage_bp = $buying_price * $left_items;
        $ammount_cariage_sp = $selling_price * $left_items;
        $profit_per_item = $ammount_cariage_sp - $ammount_cariage_bp;
        $total_profit += $profit_per_item;
        $total_stock += $ammount_cariage_bp;
        echo "
        <tr>
            <td>$product_name</td><td>$left_items</td><td>$buying_price RWF</td><td>$selling_price RWF</td><td>$ammount_cariage_bp  RWF</td><td>$ammount_cariage_sp  RWF</td>
    </tr>
        ";
       }
       echo "
       <tr>
           <td colspan = 3>TOTAL STOCK: $total_stock</td><td colspan = 3>PROFIT EXPECTED: $total_profit</td></td>
   </tr>
       ";

?>
                     
                  

                 </table>
             </div>
         </div>
        </div>
    </div>
</body>
</html>