<?php
echo <<<_END
<div class="nav">
<div class="nav_content">
    <ul>
        <li><a href="account.php">Home</a></li>
        <li><a href="shop.php">Products & Ordering</a></li>
        <li><a href="#">Payements</a></li>
        <!-- <li>one</li> -->
    </ul>
</div>
<div class="profile">
    <img src="../../external_dependencies/images/bg.jpg" alt="Profile Picture">
    <div>
_END;
        
        echo "
          <p>$other_names $first_name</p> 
          <p>$user_email </p> 
          ";
echo <<<_END
    </div>
</div>
<div class="logo">
    <h1>
      MySor
    </h1>
</div>
</div>
_END;
?>