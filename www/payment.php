<?php
session_start();

require "header.php";

if (isset($_GET['err'])){
  switch ($_GET['err']) {
    case 1:
      $errorMessage = "Wrong address information!";
      break;
    case 2:
      $errorMessage = "Wrong payment information";
      break;
  }
}



$products = [];
foreach ($_POST as $key => $value) {
  if (strpos($key, "-") !== false) {
    $keys = explode("-", $key);
    $products[$keys[0]][$keys[1]] = $value;
  }
}

$sum = ['qty' => 0, 'price' => 0];
foreach ($products as $product) {
  if ($product['qty'] > 0) {
    $sum['qty'] += $product['qty'];
    $sum['price'] += $product['price'] * $product['qty'];
  }
}

$_SESSION['products'] = $products;
$_SESSION['sum'] = $sum;

?>
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
    <form class="form" action="receipt.php" method="post">
      <div class="columns">
          <div class="column is-6 is-offset-3">
            <label class="label">Delivery address</label>
            <?php if (isset($_GET['err'])) { ?>
              <p class="has-text-danger has-text-weight-bold"><?= $errorMessage ?></p>
            <?php } ?>
            <?php if (isset($_POST['invoice'])): ?>
            <div class="field">
              <input class="input" name="personnummer" type="text" placeholder="Personnummer">
            </div>
            <?php endif; ?>
            <div class="field">
              <input class="input" name="fullname" type="text" placeholder="Full name">
            </div>
            <div class="field">
              <input class="input" name="address" type="text" placeholder="Address">
            </div>
            <div class="field">
                <input class="input" name="postcode" type="text" placeholder="Postcode">
            </div>
            <div class="field">
                <input class="input" name="city" type="text" placeholder="City">
            </div>
            <div class="field">
                <input class="input" name="phonenumber" type="text" placeholder="Phone number">
            </div>
            <br>
            <?php if (isset($_POST['card'])): ?>
            <label class="label">Payment information</label>
            <div class="field">
              <input class="input" name="cardname" type="text" placeholder="Cardholder's name">
            </div>
            <div class="field">
              <input class="input" name="cardnumber" type="text" placeholder="Card number">
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column is-2 is-offset-3">
            <div class="field">
              <input class="input" name="expiration" type="text" placeholder="Expiration (mm/yy)">
            </div>
          </div>
          <div class="column is-2">
            <div class="field">
              <input class="input" name="securitycode" type="text" placeholder="Security Code">
            </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="columns">
          <div class="column is-6 is-offset-3">
            <button class="button is-warning is-medium is-fullwidth" type="submit" name="button">Pay</button>
          </div>
        </div>

        <input type="hidden" name="payment" value="<?= isset($_POST['card'])?'card':'invoice' ?>">

      </form>
    </div>
  </div>
</section>

<br><br><br>

<!-- <pre> <?php var_dump($_POST) ?></pre>
<pre> <?php var_dump($products) ?></pre> -->

<?php
require "footer.php";

?>
