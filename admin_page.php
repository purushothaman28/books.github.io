<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   <
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>



<section class="dashboard">

   <h1 class="title">dashboard<br>
   </h1>
   <h2 class="sub-title">ReadingNook</h2>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         
         <p>Total pendings
         <span class="material-symbols-outlined">&#xec09;</span>
         </p>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         
         <p>Payments Done 
         <span class="material-symbols-outlined">&#xf1cc;</span>     
         </p>
         <h3>$<?php echo $total_completed; ?>/-</h3>
      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         
         <p>Order Placed
         <span class="material-symbols-outlined">&#xf812;</span>     
         </p>
         <h3><?php echo $number_of_orders; ?></h3>
      </div>

      <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         
         <p>Products Added
         <span class="material-symbols-outlined">&#xe1d1;</span>
         </p>
         <h3><?php echo $number_of_products; ?></h3>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         
         <p>Normal Users
         <span class="material-symbols-outlined">&#xe7fd;</span>
         </p>
         <h3><?php echo $number_of_users; ?></h3>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         
         <p>Admin Users
         <span class="material-symbols-outlined">&#xf02e;</span>
         </p>
         <h3><?php echo $number_of_admins; ?></h3>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         
         <p>Total Accounts
         <span class="material-symbols-outlined">&#xe7f0;</span>
         </p>
         <h3><?php echo $number_of_account; ?></h3>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         
         <p>New Messages
         <span class="material-symbols-outlined">&#xe0d0;</span>
         </p>
         <h3><?php echo $number_of_messages; ?></h3>
      </div>

   </div>

</section>


<script src="js/admin_script.js"></script>

</body>
</html>