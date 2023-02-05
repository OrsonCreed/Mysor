<?php
$products = array("TV" => "100", "panel" => 200 );


$ids = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/2.css">
</head>
<body>
    <div class="container"> 
        <div class="box_1">
          <div class="nav">
              <div class="nav_content">
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Products & Ordering</a></li>
                      <li><a href="#">Payements</a></li>
                      <li>one</li>
                  </ul>
              </div>
              <div class="profile">
                  <img src="bg.jpg" alt="Profile Picture">
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
            <table id = "available_products_table">
                <tr><td colspan="4" class="title">Avairable products</td></tr>
                <tr><td>Product Image</td><td>Product Details</td><td>Amout/Item</td><td>Add to cart</td></tr>
                <?php
                    foreach ($products as $key_0 => $value_0) {
                    echo <<<_END
                    <tr><td>-</td><td>$key_0 </td><td>$value_0</td><td><button class="plus" id = "$ids">+</button></td></tr>
                    _END;
                    }
                    $ids++;
                ?>
                
    

            </table>
            <div class="cart">
               <div id = "table_3_container">
                    <table id = "selected_products_table">
                        <tr>
                            <td colspan="4" class="title">Cart</td>
                        </tr>
                        <tr><td>Pr.name</td><td>items</td><td>Amount</td><td>Actions</td></tr>
                    </table>
               </div>
            </div>
         </div>
        </div>
    </div>

    <script src="2.js"></script>
    <script>




// no loop section ----------------------------------------------------------
    let table_2 = document.getElementById("selected_products_table");
    let targetDiv = document.getElementById("table_3_container");
    let total = 0;
    let listInitiated = false;
    // --------------------------
        let selectedProducts = {
            // no loop here
        }

        let availableProducts = {
            <?php
                    foreach ($products as $key_0 => $value_0) {
                    echo "\"TV\": 200";
                    if($ids > 1){echo ",";
                    }
                }
                ?>
            
        }

        
        let row_count = 0; //no loop
        
        <?php
                    $ic = 1; //item counts
                    foreach ($products as $key_0 => $value_0) {
                    echo "
                    let item_".$ic."=1;
                    let amount_".$ic." = 0;
                    ";
                     $ic++;
                    }
                    $ic = 0;
                   
                ?>
        

//-----------------------------------------------------------
<?php
                    $ic = 1; //item counts
                    foreach ($products as $key_0 => $value_0) {
                    echo "
                    let productId_".$ic." = document.getElementById(\"".$ic."\");
                    ";
                     $ic++;
                    }
                    $ic = 0;
                   
                ?>
    //--------------------------------------------------------
    <?php
                    $ic = 1; //item counts
                    foreach ($products as $key_0 => $value_0) {
                    echo "
                    let product_active".$ic." = true";
                    
                     $ic++;
                    }
                    $ic = 0;
                   
                ?>
//-------------------------------------------------------------


<?php
                    $ic = 1; //item counts
                    foreach ($products as $key_0 => $value_0) {
                        echo "
                        productId_".$ic.".onclick = ()=>{
                            if(product_active".$ic."){
                                selectedProducts['$key_0'] = availableProducts['$value_0'];
                                amount_".$ic." += selectedProducts['$key_0'];
                                product_active".$ic." = false;
                                checkList();
                            }
                    }
                        
                        ";
                        $ic++;
           }
                    $ic = 0;
                   
                ?>


//------------------------------------------------------------------

function checkList(){
    if(!listInitiated){
        listInitiated = true;
        
}else{
    flushTable(); // this is responsible for cleaning all things in table for new data to reload
}


for (const key in selectedProducts) {
            if (selectedProducts.hasOwnProperty.call(selectedProducts, key)) {
                const value = selectedProducts[key];

                <?php
                    $ic = 1; //item counts
                    $ic2 = $ic + 1; // next ic
                    foreach ($products as $key_0 => $value_0) {
echo <<<_END
row_$ic= document.createElement('tr');
col_1_$ic= document.createElement('td');
col_2_$ic= document.createElement('td');
col_3_$ic= document.createElement('td');
col_4_$ic= document.createElement('td');
col_4_$ic.setAttribute('class','act_btns');
btn_1_$ic= document.createElement('button');
btn_1_$ic.setAttribute('id','button_add'+row_count);
btn_2_$ic= document.createElement('button');
btn_2_$ic.setAttribute('id','button_rem'+row_count);
col_2_$ic.setAttribute('id','item_'+row_count);
col_2_$ic.setAttribute('id','item_'+row_count);
btn_3_$ic= document.createElement('button');// deleting button
btn_3_$ic.setAttribute('id','button_del'+row_count);
col_1_$ic.innerHTML = key;
col_2_$ic.innerHTML = value;
col_3_$ic.innerHTML = item_$ic;
btn_1_$ic.innerHTML = '+';
btn_2_$ic.innerHTML = '-';
btn_3_$ic.innerHTML = 'x';
col_4_$ic.append(btn_1_$ic);
col_4_$ic.append(btn_2_$ic);
col_4_$ic.append(btn_3_$ic);
row_$ic.append(col_1_$ic);
row_$ic.append(col_3_$ic);
row_$ic.append(col_2_$ic);
row_$ic.append(col_4_$ic);
table_2.append(row_$ic);
total += value;





btn_1_$ic.onclick = function(){
    item_$ic++;
    col_3_$ic.innerHTML = item_$ic;
    amount_$ic = value * item_$ic;
    col_2_$ic.innerHTML = amount_$ic;
    total= amount_$ic;
    total_span.innerHTML = total;
}
btn_2_$ic.onclick = function(){
    if(item_$ic >= 1){
        item_$ic--;
        col_3_$ic.innerHTML = item_$ic;
    amount_$ic = value * item_$ic;
    col_2_$ic.innerHTML = amount_$ic;
    total= amount_$ic;
    total_span.innerHTML = total;
    }
    
}

btn_3_$ic.onclick = function(){
    product_active$ic = true;
    total -= amount_$ic;
    amount_$ic = 0;
    console.log(amount_$ic);
    table_2.removeChild(row_$ic);
    if(row_count == 0){
        item_$ic = 1;
        table_2.removeChild(row_$ic2);
    }
    
    total_span.innerHTML = total;
    
    
        listInitiated = false;
        delete selectedProducts[key];
    
}





}}

       


total_span = document.createElement('span');
total_span.setAttribute('id','o_total');
row_$ic2 = document.createElement('tr');
col_$ic= document.createElement('td');
col_$ic.setAttribute('colspan','4');
col_$ic.setAttribute('class','title');
col_$ic.innerHTML = 'Total: ';
total_span.innerHTML = total;
col_$ic.append(total_span);
col_$ic.append(' Frw');
row_$ic2.append(col_$ic);
table_2.append(row_$ic2);
_END;
                     $ic++;
                    }
                    $ic = 0;
                   
                ?>
       


        
       
 
}
function flushTable(){
    //----------------------------

    <?php
                    $ic = 1; //item counts
                    $ic2 = $ic + 1; // next ic
                    foreach ($products as $key_0 => $value_0) {
echo <<<_END
    table_2.removeChild(row_$ic);
    table_2.removeChild(row_$ic2);
    //-----------------------------------
_END;
}
?>

    </script>
</body>
</html>