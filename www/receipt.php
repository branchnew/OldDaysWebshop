<?php
session_start();

if (empty($_POST['fullname']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['phonenumber']) || !preg_match('/[0-9]{5}/', $_POST['postcode'])) {
	header('location:payment.php?err=1');
  exit();
}

if ($_POST['payment'] == 'card') {
  if (empty($_POST['cardname']) || !preg_match('/[0-9]{16}/', $_POST['cardnumber']) || empty($_POST['expiration']) || !preg_match('/[0-9]{3}/', $_POST['securitycode'])) {
  	header('location:payment.php?err=2');
    exit();
  }
}
else {
  if (!preg_match('/[0-9]{10}/', $_POST['personnummer'])) {
    header('location:payment.php?err=2');
    exit();
  }
}
















//to do validate
require "database.php";
$sql = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user_id = $stmt->fetchColumn();




$sql = "INSERT INTO `order` ( user_id, full_name, address, personnummer, phone_number, postcode, city)
 VALUES ($user_id, '{$_POST['fullname']}', '{$_POST['address']}', '{$_POST['personnummer']}', '{$_POST['phonenumber']}', '{$_POST['postcode']}', '{$_POST['city']}')";

$stmt = $pdo->prepare($sql);
$stmt->execute();


$order_id = $pdo->lastInsertId();
$products = $_SESSION['products'];
$sum = $_SESSION['sum'];

foreach ($products as $product_id => $product) {
  if ($product['qty'] >0) {
    $sql = "INSERT INTO order_product (order_id, product_id, quantity, unit_price)
    VALUES ($order_id, $product_id, {$product['qty']}, {$product['price']})";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    // print_r($stmt->errorInfo());
  }

}

require "header.php";


 ?>
 <br><br><br>
<section class="content">
  <div class="content">
    <div class="columns">
      <div class="column is-6 is-offset-3 has-text-weight-bold has-background-info has-text-white">
        Thanks for your order!
      </div>
    </div>
  </div>
</section>
 <section class="section">
   <div class="content">
     <div class="columns">
       <div class="column is-2 is-offset-3 has-text-weight-bold">Product</div>
       <div class="column is-2 has-text-right has-text-weight-bold">Unit price</div>
       <div class="column is-1 has-text-weight-bold">Qty</div>
       <div class="column is-2 has-text-weight-bold">Sum</div>
     </div>
     <?php foreach ($products as $key => $row) : ?>
     <?php if ($row['qty'] > 0) : ?>
         <div class="columns">
           <div class="column is-2 is-offset-3"><?= $row['name']?></div>
           <div class="column is-2 has-text-right"><?= $row['price']?> kr </div>
           <div class="column is-1"><?= $row['qty']?></div>
           <div class="column is-2"><?= $row['price'] * $row['qty']?> kr</div>
         </div>
     <?php endif ?>
     <?php endforeach ?>
     <div class="columns">
       <div class="column is-2 is-offset-5 has-text-right has-text-weight-bold">Total:</div>
       <div class="column is-1 has-text-weight-bold"><?= $sum['qty']?></div>
       <div class="column is-2 has-text-weight-bold"><?= $sum['price']?> kr</div>
     </div>
   </div>
 </section>

 <section >
   <div class="content">
     <div class="columns">
       <div class="column is-6 is-offset-3">
         <label class="label">Delivery address</label>

         <p><?= $_POST['fullname'] ?></p>
         <p><?= $_POST['address'] ?></p>
         <p><?= $_POST['country'] ?></p>
         <p><?= $_POST['phonenumber'] ?></p>
      </div>
     </div>
   </div>
 </section>




 <!-- <pre> <?php var_dump($_POST) ?></pre>
 <pre> <?php var_dump($_SESSION['products']) ?></pre> -->

 <?php require "footer.php"; ?>
