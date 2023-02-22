<?php
require_once("../dbLogin_ad.php");
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
    <link rel="stylesheet" href="..\css\1.css">
</head>
<body>
    <div class="container">
        <div class="sign_up">
            <form action="../php/confirm_delivery_process.php" method="post" id = "confirm_delivery">

                <div class="inputs">
                    <label for="">Payment Method</label>
                    <select name ="payment_method">
                        <option value = "mtn_mobile_money">MTN mobile money</option>
                        <option value = "bank_account">Bank Account</option>
                        <option value = "cash_in_hand">Cash in hand</option>
                    </select>
                </div>

                    <?php
                      echo "<input type='hidden' name='order_code' value = '$order_code'>";
                    ?>


                <div class="inputs">
                    <input type="submit" value="Save New Product">
                </div>
            </form>
        </div>
    </div>
    <script>
        conf = document.getElementById("confirm_delivery");
        conf.addEventListener("submit",(e)=>{
                confirmation = confirm('You are about to confirm that the payment has been made and customer has received all products requested, are sure?.');
                if(confirmation != true){
                    e.preventDefault();
                }
        });
        

        </script>
</body>
</html>