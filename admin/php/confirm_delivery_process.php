<?php
require_once("dbLogin.php");
if(
    !empty($_POST['payment_method'])&&
    !empty($_POST['order_code'])
){
    $payment_method = $_POST['payment_method'];
    $order_code = $_POST['order_code'];

//----------------GENERATING ORDER CODE ------------------- functioni for this is obviously needed
    $date =  date('Y/m/d/h/i/s');
    $date = explode('/',$date);
    $date = implode('',$date);
    $select_count = "SELECT COUNT(pay_id) FROM payments";
    $executor_1 = $connection->prepare($select_count);
    $executor_1->execute();
    $result_1 = [$executor_1->fetchAll()];
    $result = $result_1[0][0];
    $current_id = $result[0] + 1;
    $type = "pay";
    $generated_token = $type.$date.$current_id;
//---------------------------------------------------------



$query_1 = "SELECT * FROM `ordered_products` WHERE order_code = '$order_code'";
$executor_1 = $connection->prepare($query_1);
$executor_1->execute();
$result_1 = $executor_1->fetchAll();

foreach ($result_1 as $key => $value) {
    $prod_code = $value['prod_code'];
    $query_2= "SELECT * FROM `stock` WHERE prod_code = '$prod_code'";
    $executor_2= $connection->prepare($query_2);
    $executor_2->execute();
    $result_2= $executor_2->fetchAll();
    $availabre_items = $result_2[0]['num_of_com'];


    $product_code = $value['prod_code'];
    $left_items = $availabre_items - $value['number_of_units'];
    $update_query = "UPDATE stock set num_of_com = '$left_items' WHERE prod_code = '$prod_code'";
    $connection->Exec($update_query);
}


$insert_query = "INSERT INTO payments(pay_code,order_code,pay_method,date_due)
        VALUES('$generated_token','$order_code','$payment_method','$date')";
$update_query = "UPDATE orders set status = 'confirmed' WHERE order_code = '$order_code'";
       if($connection->Exec($insert_query) && $connection->Exec($update_query)){
        echo "
        <script>
            document.location.replace('../pages/pending_orders.php');
        </script>
        ";
        exit;
}else{
    echo "bad request, error took place";
}

}
?>