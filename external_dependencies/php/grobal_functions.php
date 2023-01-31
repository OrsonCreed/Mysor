<?php

function destroy_cookie($cookie_name,$cookie_value){
    // rember, cookies are case insensitive, it is recommanded to use number values or another fit substitute
    setcookie($cookie_name, $cookie_value, time() - 9999999, '/');
    }


    function create_cookie($cookie_name,$cookie_value,$time /*in days*/){
        // rember, cookies are case insensitive, it is recommanded to use number values or another fit substitute
       setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 24 * $time, '/');
   }

  
   



?>