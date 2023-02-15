<?php
require_once("dbLogin.php");
require_once("../../external_dependencies/php/grobal_functions.php");

if(
    !empty($_POST['first_name'])&&
    !empty($_POST['other_names'])&&
    !empty($_POST['email'])&&
    !empty($_POST['gender'])&&
    !empty($_POST['nationality'])&&
    !empty($_POST['phone_number'])&&
    !empty($_POST['password'])&&
    !empty($_POST['password_retype'])
){
       $first_name = $_POST['first_name'];
       $nationality = $_POST['nationality'];
       $other_names = $_POST['other_names'];
       $phone_number = $_POST['phone_number'];
       $password = $_POST['password'];
       $password_retype = $_POST['password_retype'];
       $email = $_POST['email'];
       $gender = $_POST['gender'];
       //----------------CHECKING USER EXISTANCE------------------

       $select_qry = "SELECT * FROM credentials WHERE email = '$email'";
       $executor_0 = $connection->prepare($select_qry);
       $executor_0->execute();
       $result_1 = [$executor_0->fetchAll()];
       if(empty(!$result_1)){
           echo "<script>
           alert('user already exist, please try with other login credentials');
           window.history.go(-1);
           </script>";
           exit;
           
       }
       

       //---------------------------------------------------------
       
       //----------------GENERATING USER TOKEN -------------------
       $date =  date('Y/m/d/h/i/s');
       $date = explode('/',$date);
       $date = implode('',$date);
       $select_count = "SELECT COUNT(cust_id) FROM customers";
       $executor_1 = $connection->prepare($select_count);
       $executor_1->execute();
       $result_1 = [$executor_1->fetchAll()];
       $result = $result_1[0][0];
       $current_id = $result[0] + 1;
       $type = "cust";
       $generated_token = $type.$date.$current_id;
       //--------------------------------------------------------

       if($password !==$password_retype){
           echo "
           <script>
           alert('Please Enter matching Password');
           window.history.go(-1);
           </script>
           ";
           exit;
       }
       $insert_query = "INSERT INTO customers (u_code,first_name,other_names,gender,nationality,phone_number)
        VALUES('$generated_token','$first_name','$other_names','$gender','$nationality','$phone_number')";
       if($connection->Exec($insert_query)){
        $insert_query = "INSERT INTO credentials(u_code,user_type,email,password) VALUES('$generated_token','$type','$email','$password')";
       if($connection->Exec($insert_query)){
           echo"<script>
           alert('you have successfuly created your account, please login to continue');
           document.location.replace('../../index.html');
           </script>";
       }};

}else{
    echo " <script>
    alert('Please fill all required fields');
    window.history.go(-1);
    </script>";
}

?>