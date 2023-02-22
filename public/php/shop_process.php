<?php
require_once("dbLogin.php");
session_start();
$user_email = $_SESSION['USER_EMAIL'];
$user_type = $_SESSION['USER_TYPE'];
$customer_code= $_SESSION['U_CODE'];

$request_body = file_get_contents("php://input");
$request_body = json_decode($request_body);
$request_body = stripe_std_object($request_body);


//----------------GENERATING ORDER CODE -------------------
$date =  date('Y/m/d/h/i/s');
$date = explode('/',$date);
$date = implode('',$date);
$select_count = "SELECT COUNT(order_id) FROM orders";
$executor_1 = $connection->prepare($select_count);
$executor_1->execute();
$result_1 = [$executor_1->fetchAll()];
$result = $result_1[0][0];
$current_id = $result[0] + 1;
$type = "order";
$generated_token = $type.$date.$current_id;
//---------------------------------------------------------

$order_code = $generated_token;
    foreach($request_body as $key_1 => $value_1){
        print_r("1<br>");
        $product_code = $value_1['productCode'];
        $unit_price = $value_1['price'];
        $number_of_units = $value_1['numberOfUnits'];
        $insert_query = "INSERT INTO ordered_products (order_code,prod_code,number_of_units,unit_price)
                        VALUE ('$order_code','$product_code','$number_of_units','$unit_price')";
        if(!$connection->exec($insert_query)){
            throw new Exception("Failed to save data 1");
            exit;
        }
    }

$order_date = $date;
$insert_query = "INSERT INTO orders (order_code,customer_code,order_date,status)
                VALUE ('$order_code','$customer_code','$order_date','pending')";
if(!$connection->exec($insert_query)){
    throw new Exception("Failed to save data 2");
    exit;
}

function stripe_std_object($target_array){
    $returned_array = array();
    foreach ($target_array as $key => $value) {
        $returned_array[$key]= get_object_vars($value); 
    }
    return $returned_array;
}


?>