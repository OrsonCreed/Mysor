
<?php
require_once("../dbLogin_ad.php");
require_once("../../external_dependencies/php/grobal_functions.php");

$query_1 = "SELECT * FROM `products`";
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
          <div class="nav">
              <div class="nav_content">
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Orders</a></li>
                      <li><a href="#">Stock</a></li>
                      <li><a href="#">Accountant</a></li>
                  </ul>
              </div>
              <div class="profile">
                  <img src="../../external_dependencies/images/profile_picture.jpeg" alt="Profile Picture">
                  <div>
                      <p>IRADUKUNDA Bonheur</p>
                      <p>bonheurjoseph411@gmail.com</p>
                  </div>
              </div>
              <div class="logo">
                  <h1>
                    MySor
                  </h1>
              </div>
          </div>
         <div class="main-content">
            <div class="menu">
             <table>
             <tr><td colspan = "3">Please Choose a Product</td></tr>
             <tr><td>Product</td><td>Remaining</td><td>Action</td></tr>
<?php  
foreach ($result_1 as $key => $value) {
        $prod_name = $value['prod_name'];
        $prod_code =  $value['prod_code'];

        $query_2 = "SELECT * FROM `stock` WHERE `prod_code`= '$prod_code'";
        $executor_2 = $connection->prepare($query_2);
        $executor_2->execute();
        $result_2 = $executor_2->fetchAll();
        $data = $result_2[0];
        $remaining_prod = $data['num_of_com'];

       echo "<tr><td>$prod_name</td><td>$remaining_prod</td><td><a href = 'add_products.php?prod' >Select</a></td></tr>";
    
}
?>
          
                 
                 
             </table>
            </div>
         </div>
        </div>
    </div>
</body>
</html>