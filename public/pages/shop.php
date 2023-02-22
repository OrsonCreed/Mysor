<?php
session_start();
require_once("../php/dbLogin.php");
require_once("user_details_customer.php");

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
    <link rel="stylesheet" href="../css/2.css">
</head>
<body>
    <div class="container"> 
        <div class="box_1">
        <?php
            require_once("nav.php");
         ?>
         <div class="main-content">
            <table id = "products">
                <tr><td colspan="5" class="title">Avairable products</td></tr>
                <tr><td>Product Image</td><td>Pr. name</td><td>Product Details</td><td>Amout/Item</td><td>Add to cart</td></tr>
            </table>
            <div class="cart">
               <div id = "table_3_container">
                    <table id = "cart-items">
                        <tr>
                            <td colspan="4" class="title">Cart</td>
                        </tr>
                        <tr><td>Pr. name</td><td>items</td><td>Amount</td><td>Actions</td></tr>
                        
                    </table>
               </div>
            </div>
         </div>
        </div>
    </div>
    <script src="setup.js"></script>
    <script>
   const products = [
    

<?php
$id = 0;
foreach($result_1 as $key_0 => $value_0) {
    $prod_name = $value_0['prod_name']; 
    $prod_waranty = $value_0['prod_waranty'];
    $prod_image_name = $value_0['prod_image'];
    $prod_code = $value_0['prod_code'];
    $prod_desc = $value_0['prod_description'];

    $query_0 = "SELECT * FROM `stock` WHERE `prod_code`= '$prod_code'";
    $executor_0 = $connection->prepare($query_0);
    $executor_0->execute();
    $result_0 = $executor_0->fetchAll();
    $data_array_1 = $result_0[0];
    $current_num_of_prod = $data_array_1['num_of_com'];


    $query_2 = "SELECT * FROM `stock_mgr` WHERE `prod_code`= '$prod_code'";
    $executor_2 = $connection->prepare($query_2);
    $executor_2->execute();
    $result_2 = $executor_2->fetchAll();
    $data_array_2 = $result_2[0];
    $unit_amount = $data_array_2['selling_price'];




echo <<<_END
{
id :$id,
productCode :"$prod_code",
name : "$prod_name",
price : $unit_amount ,
instock: $current_num_of_prod,
description: "$prod_desc",
imgSrc: "../../admin/products_images/$prod_image_name",

},

_END;
$id++;
}
?>

   ]
    
    </script>
    <script src="app.js"></script>
   
   
</body>
</html>