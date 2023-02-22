
<?php
require_once("../dbLogin_ad.php");
require_once("../../external_dependencies/php/grobal_functions.php");

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
             <tr><td colspan = "3">Delete Product</td></tr>
             <tr><td>Product</td><td>Remaining</td><td>Action</td></tr>
<?php  
foreach ($result_1 as $key => $value) {
        $prod_name = $value['prod_name'];
        $prod_code =  $value['prod_code'];

        $query_2 = "SELECT * FROM `stock` WHERE `prod_code`= '$prod_code' AND prod_status = 'active'";
        $executor_2 = $connection->prepare($query_2);
        $executor_2->execute();
        $result_2 = $executor_2->fetchAll();
        $data = $result_2[0];
        $remaining_prod = $data['num_of_com'];

       echo "<tr><td>$prod_name</td><td>$remaining_prod</td><td><a href = '#' class = 'delete' onclick = 'confirm_delete(`$prod_code`)'><font color = 'red'>Delete</font></a></td></tr>"; 
    
}
?>
          
                 
                 
             </table>
            </div>
         </div>
        </div>
    </div>
<?php

echo<<<_END
<script>
function confirm_delete (code) {
    console.log(code);
    let conf = confirm("You are about to delete these product in stock, and this is irreversible action. Do you want to continue?");
    if(conf == true){
        document.location.replace('../php/select_to_delete_process.php?prod_code=' + code);
    }
}

</script>
_END;
?>
</body>
</html>