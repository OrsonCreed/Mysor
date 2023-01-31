<?php
require_once("../dbLogin_ad.php");
require_once("../../external_dependencies/php/grobal_functions.php");

if(
    !empty($_POST['buying_price'])&&
    !empty($_POST['selling_price'])&&
    !empty($_POST['currency'])
){
       $buying_price = $_POST['buying_price'];
       $selling_price = $_POST['selling_price'];
       $currency = $_POST['currency'];
       $prod_code = $_POST['prod_code'];
       $new_prod = $_POST['num_of_prod'] + 1;
       $date =  date('Y/m/d');
       $date = explode('/',$date);
       $date = implode('',$date);

       $update_query = "UPDATE `stock` SET `num_of_com` = '$new_prod' WHERE `prod_code` = '$prod_code'";
       if($connection->Exec($update_query)){
        $insert_query = "INSERT INTO stock_mgr(stm_id,prod_code,buying_price,selling_price,buying_date,currency) VALUES('NULL','$prod_code','$buying_price','$selling_price','$date','$currency')";
       if($connection->Exec($insert_query)){
           echo"<script>
         alert('you have successfuly updated a stock!');
         window.location.replace('../pages/account.html');
           </script>";
       }else{
        echo"<script>
        alert('Failure to update stock manager, please retry or contact tecnician!');
        window.history.go(-1);
          </script>";
       }}else{
        echo"<script>
        alert('Failure to update stock, please retry or contact tecnician!');
        window.history.go(-1);
          </script>"; 
       };

}else{
    echo " <script>
    alert('Please fill all required fields');
    window.history.go(-1);
    </script>";
}

?>