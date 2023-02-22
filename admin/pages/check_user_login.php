<?php
if(!isset($_SESSION['U_CODE'])){
    echo "
    <script>
    alert('IT SEEMS LIKE YOU ARE NOT LOGGED IN, PLEASE LOGIN AGAIN TO CONTINUE!');
    window.location.replace('../../index.html');
    </script>
    ";
}

?>