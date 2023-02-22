<?php
require_once("../dbLogin_ad.php");
require_once("../../external_dependencies/php/grobal_functions.php");
if(
    !empty($_POST['prod_name'])&&
    !empty($_POST['prod_waranty'])&&
    !empty($_FILES['prod_image'])

){
       $prod_name = $_POST['prod_name'];
       $prod_waranty = $_POST['prod_waranty'];
       $prod_desc = $_POST['prod_desc'];
       $prod_image = $_FILES['prod_image']['name'];
       
              //----------------GENERATING USER TOKEN -------------------
       $date =  date('Y/m/d/h/i/s');
       $date = explode('/',$date);
       $date = implode('',$date);
       $select_count = "SELECT COUNT(prod_id) FROM products";
       $executor_1 = $connection->prepare($select_count);
       $executor_1->execute();
       $result_1 = [$executor_1->fetchAll()];
       $result = $result_1[0][0];
       $current_id = $result[0] + 1;
       $type = "prod";
       $generated_token = $type.$date.$current_id;
       //----------------------------------------------------------------
       
       $reference_id =  $generated_token;
       $image_name = "prod_image";
       $target_dir_name = "../products_images";
       require_once("../products_images/save_image.php");
       $prod_image = $n;
       $insert_query = "INSERT INTO `products` (`prod_id`, `prod_code`, `prod_name`, `prod_waranty`, `prod_image`, `prod_description`) VALUES (NULL,'$generated_token','$prod_name',  '$prod_waranty', '$prod_image', '$prod_desc');";
       if($connection->Exec($insert_query)){
        $insert_query = "INSERT INTO stock(stock_id,prod_code,num_of_com) VALUES('NULL','$generated_token',0)";
       if($connection->Exec($insert_query)){
           echo"<script>
           let add_redirect = confirm('you have successfuly registered new product, do you want to continue to add product page');
           if(add_redirect){
            document.location.replace('../pages/add_products.php?prod_code=$generated_token');
           }else{
            document.location.replace('../pages/account.php');
           }
           
           </script>";
       }};
       exit;

}else{
    echo " <script>
    alert('Please fill all required fields');
    window.history.go(-1);
    </script>";
}

?>