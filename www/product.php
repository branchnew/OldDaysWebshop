<?php
session_start();

require "database.php";


$search = $_POST['search'];


$sql = "SELECT p.id, p.name, p.info, p.price, c.name AS catname
        FROM product p JOIN category c ON (p.category_id = c.id)";

if ($search) {
  $sql = $sql." WHERE p.name LIKE '%$search%'";// lägg till query search för att hitta produkt
}
$stmt = $pdo->prepare($sql);
$stmt->execute();

require "header.php";
?>
<nav class="navbar has-background-info has-text-weight-bold">
  <p class="navbar-item has-text-white">Hello <?= $_SESSION['name'] ?>!</p>
</nav>

<section class="section">
  <div class="content">
    <form action="product.php" method="post">
      <div class="columns">
        <div class="column is-offset-2 is-5">
          <input class="input" type="text" name="search" placeholder="Search for a product">
        </div>
        <div class="column is-1">
          <button class="button">Search</button>
        </div>
      </div>
    </form>
</section>
<!-- hämta produkter från databas och vill veta antal name och price för att skicka den till payment sen -->
<form class="" action="payment.php" method="post">
<section class="section">
  <div class="content">
    <?php while ($product = $stmt->fetch()) { ?>
    <div class="columns">
      <div class="column is-2"><?= $product['name']?>  </div>
      <div class="column is-6"><?= $product['info']?></div>
      <div class="column is-2 has-text-right"><?= $product['price']?> kr </div>
      <div class="column is-2">
        <input class="input" type="number" min="0" value="0" name="<?= $product['id'] ?>-qty" size="2" >
        <input type="hidden" name="<?= $product['id'] ?>-name" value="<?= $product['name'] ?>">
        <input type="hidden" name="<?= $product['id'] ?>-price" value="<?= $product['price'] ?>">
      </div>
    </div>
    <?php } ?>

  </div>
</section>
<!-- betalning sätt -->
<section>
    <div class="columns">
      <div class="column is-offset-2 is-3 has-text-centered">
        <button class="button is-warning" type="submit" name="card">
          <span class="icon">
            <i class="far fa-credit-card"></i>
          </span>
          <span>Pay with card</span>
        </button>
      </div>
      <div class="column is-3 has-text-centered">
        <button class="button is-warning" type="submit" name="invoice">
          <span class="icon">
            <i class="fas fa-file-invoice-dollar"></i>
          </span>
          <span>Pay with invoice</span>
        </button>
      </div>
    </div>
</section>
</form>



<?php


require "footer.php";
?>
