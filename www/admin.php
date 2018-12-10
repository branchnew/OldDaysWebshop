<?php
session_start();

require "database.php";

// Delete
if ($_GET['action'] == 'delete') {
  $id = $_GET['id'];
  $sql = "DELETE FROM product WHERE ID = $id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}

// Update
elseif (isset($_POST['update'])) {
  $products = [];
  foreach ($_POST as $key => $value) {
    if (strpos($key, "-") !== false) {
      $keys = explode("-", $key);
      $products[$keys[0]][$keys[1]] = $value;
    }
  }

  foreach ($products as $id => $product) {
    $name = $product['name'];
    $info = $product['info'];
    $price = $product['price'];
    $sql = "UPDATE product SET name = '$name', info = '$info', price = $price WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  }

  if (!empty($_POST['newname'])) {
    echo "BAU";
    $name = $_POST['newname'];
    $info = $_POST['newinfo'];
    $price = round($_POST['newprice']);
    $sql = "INSERT INTO product (name, info, price, category_id) VALUES ('$name', '$info', $price, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  }
}




$sql = "SELECT p.id, p.name, p.info, p.price, c.name AS catname
        FROM product p JOIN category c ON (p.category_id = c.id)";


$stmt = $pdo->prepare($sql);
$stmt->execute();

require "header.php";
?>
<nav class="navbar has-background-info has-text-weight-bold">
  <p class="navbar-item has-text-white">Hello <?= $_SESSION['name'] ?>!</p>
  <a class="navbar-item has-text-white is-pulled-right" href="product.php">Products</a>
</nav>

<form class="" action="admin.php" method="post">
<section class="section">
  <div class="content">
    <?php while ($product = $stmt->fetch()) { ?>
    <div class="columns">
      <div class="column is-2">
        <input class="input" name="<?= $product['id'] ?>-name" value="<?= $product['name'] ?>">
      </div>
      <div class="column is-7">
        <input class="input" name="<?= $product['id'] ?>-info" value="<?= $product['info'] ?>">
      </div>
      <div class="column is-2 has-text-right">
        <input class="input" name="<?= $product['id'] ?>-price" value="<?= $product['price'] ?>">
      </div>
      <div class="column is-1 has-text-right">
        <a class="delete is-danger" href="admin.php?action=delete&id=<?= $product['id'] ?>"></a>
      </div>
    </div>
    <?php } ?>
    <!-- ny produkt -->
    <div class="columns">
      <div class="column is-2">
        <input class="input" name="newname" placeholder="Name">
      </div>
      <div class="column is-7">
        <input class="input" name="newinfo" placeholder="Info">
      </div>
      <div class="column is-2 has-text-right">
        <input class="input" name="newprice" placeholder="Price">
      </div>
    </div>

  </div>
</section>

<section>
  <div class="columns">
    <div class="column has-text-centered">
      <button class="button is-info is-fullwidth" type="submit" name="update">
        <span>Update</span>
      </button>
    </div>
</section>
</form>



<?php


require "footer.php";
?>
