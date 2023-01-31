<?php
function attendence_combination(){
    $comb_1 = rand(1000000000,1999999999);
    $comb_2 = rand(1000000000,1999999999);
    $ret_value = $comb_1.$comb_2;
    return $ret_value;
}



function NumberOfRows($connection,$table_name,$id_name){
    $query = "SELECT COUNT($id_name) FROM $table_name";
    $executor = $connection->prepare($query);
    $executor->execute();
    $result = $executor->fetchAll();
    $numOfRows = $result[0][0];
    return $numOfRows;
}

function  extract_cols($connection,$table_name,$ex_first = TRUE,$inc_insert = TRUE){
    $query = "DESC $table_name";
    $exclude_first = $ex_first;
    $include_insert = $inc_insert;
    if($exclude_first){
        $start_from = 1;
    }else{
        $start_from = 0;
    }
    
    if($include_insert) {
        $col_string = "INSERT INTO $table_name(";
    }else{
        $col_string = "(";
    }
    
    
    $executor = $connection->prepare($query);
    $executor->execute();
    $result = $executor->fetchAll();
    for ($i=$start_from; $i < sizeof($result) ; $i++) { 
       if ($i == $start_from) {
        $col_name = $result[$i]['Field'];
        $col_string = $col_string.$col_name;
       }else{
            $col_name = $result[$i]['Field'];
        $col_string = $col_string.",".$col_name;
       }
    }
    $col_string  = $col_string.")";
    
    return $col_string ;
}
?>