
<?php
$activeNumber = array('one','two','three','four');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
</style>
</head>
<body>
<table border="1">
    <tr><td>Col_1</td><td>Col_2</td></tr>

<?php 
foreach ($activeNumber as $key_0 => $value_0) {
    echo "<button id=\"".$activeNumber[$key_0]."_add\"> add</button>  <button id=\"".$activeNumber[$key_0]."_rem\"> rem</button> <button id=\"".$activeNumber[$key_0]."_del\"> Del</button>";
    echo "<br>";
}
?>


    
</table>

 <script>

    table = document.getElementsByTagName("table")[0];


<?php
foreach ($activeNumber as $key => $value) {
    echo "button_".$value."_add = document.getElementById(\"".$value."_add\"".");";
    echo "value_".$value."= 1;";
    echo "init_".$value." = true;"; // initting status
    echo "button_".$value."_add.onclick = ()=>{";
    echo "
    if(value_".$value." > 1 && init_".$value." == false){
        if(value_".$value.">0){value_".$value."++;}
        col_1_".$value.".innerHTML = value_".$value.";
        col_2_".$value.".innerHTML = value_".$value.";
        
    }else if(init_".$value." == true){
    row_".$value." = document.createElement(\"tr\");
    col_1_".$value."= document.createElement(\"td\");
    col_2_".$value."= document.createElement(\"td\");
    col_1_".$value.".innerHTML = value_".$value.";
    col_2_".$value.".innerHTML = value_".$value.";
    row_".$value.".append(col_1_".$value.");
    row_".$value.".append(col_2_".$value.");
    table.append(row_".$value.");
    init_".$value." = false;
    // if(value_".$value.">=0){value_".$value."++;}
    }
    else if(init_".$value." == false && value_".$value." == 1){
    if(value_".$value.">=0){value_".$value."++;}
    col_1_".$value.".innerHTML = value_".$value.";
    col_2_".$value.".innerHTML = value_".$value.";
    }
}


button_".$value."_rem = document.getElementById(\"".$value."_rem\");
button_".$value."_rem.onclick = () =>{
    if (value_".$value." > 1) {
        value_".$value."--;

        col_1_".$value.".innerHTML = value_".$value.";
        col_2_".$value.".innerHTML = value_".$value.";
    }
  
}


button_".$value."_del = document.getElementById(\"".$value."_del\");
button_".$value."_del.onclick = () =>{
    value_".$value." = 1;
    init_".$value." = true;
    table.removeChild(row_".$value.");
  
}
    
    
    ";


}
    
?>




</script> 
</body>
</html>