<?php
require_once("dbLogin.php");
if(
    !empty($_GET['prod_code'])){
        $product_code =$_GET['prod_code'];
        $delete_query_1= "UPDATE products SET prod_status = 'inactive' WHERE prod_code = '$product_code'";
        $delete_query_2= "UPDATE stock SET prod_status = 'inactive' WHERE prod_code = '$product_code'";
        $delete_query_3= "UPDATE stock_mgr SET prod_status = 'inactive' WHERE prod_code = '$product_code'";
        if($connection->Exec($delete_query_1) && $connection->Exec($delete_query_2) && $connection->Exec($delete_query_3)){
            echo "<script>
            alert('You have successfuly removed this product, but this would not delete all its data as it can destabilize the system.');
            document.location.replace('../pages/select_to_delete.php');
            </script>";
           
        }

    }else{
        echo "<script>
        alert('Some thing went wrong!');
        window.history.go(-1);
        </script>";
        exit;
    }

?>