<?php
require_once("../dbLogin_ad.php");
$prod_code = $_GET['prod_code'];// this is not secure as a user can alter the product code.
$query_1 = "SELECT * FROM `products` WHERE `prod_code`= '$prod_code'";
$executor_1 = $connection->prepare($query_1);
$executor_1->execute();
$result_1 = $executor_1->fetchAll();

$query_2 = "SELECT * FROM `stock` WHERE `prod_code`= '$prod_code'";
$executor_2 = $connection->prepare($query_2);
$executor_2->execute();
$result_2 = $executor_2->fetchAll();

$data_array = $result_1[0];
$prod_name = $data_array['prod_name'];
$prod_waranty = $data_array['prod_waranty'];
$prod_image_name = $data_array['prod_image'];
$prod_image_ext = explode('.',$data_array['prod_image']);
$prod_image = $prod_code.'.'.$prod_image_ext[1];
$data_array_1 = $result_2[0];
$current_num_of_prod = $data_array_1['num_of_com'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\css\1.css">
</head>
<body>
    <div class="container">
        <div class="sign_up">
            <form action="../php/add_products_process.php" method="post">
                <div class="inputs">
                    <label for="">Buying price</label>
                    <input type="text" name="buying_price" placeholder="200">
                </div>
                <div class="inputs">
                    <label for="">Selling price</label>
                    <input type="text" name="selling_price" placeholder="300">
                </div>

                <div class="inputs">
                    <label for="">Product Image</label>
                    <select name="currency">
                        <option value="rwf">RWF</option>
                        <option value="usd">USD</option>
                    </select>
                </div>


                <div class="inputs">
                    <input type="submit" value="Save">
                </div>
                <!-- HIDDEN INPUTS -->
                <?php echo "<input type='hidden' name='prod_code' value = '$prod_code'>"?>
                <?php echo "<input type='hidden' name='num_of_prod' value = '$current_num_of_prod'>"?>
            </form>
        </div>
        <div class="right_tab">
            <h3>Product Details</h3>
            <table>
<?php
echo "
<tr>
                    <td>Product Name</td> <td>$prod_name</td></tr>
                    <tr><td>Product Waranty</td> <td>$prod_waranty months</td></tr>
                    <tr><td>Product Code</td> <td>$prod_code</td></tr>
                    <tr><td>Current Stock</td> <td>$current_num_of_prod</td></tr>
                    <tr><td>Product image</td><td>
                        <img src=\"../products_images/$prod_image\"></td></tr>
";

?>

            </table>
        </div>
    </div>

   
</body>
</html>