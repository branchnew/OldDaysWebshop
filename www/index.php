<?php
session_start();

//skriva ut fel meddelanden
if (isset($_GET['err'])){
  switch ($_GET['err']) {
    case 1:
      $errorMessage = "Wrong password!";
      break;
    case 2:
      $errorMessage = "Database error";
      break;
    case 3:
      $errorMessage = "Password too short (min.8)";
      break;
    case 4:
      $errorMessage = "Not a valid email!";
      break;
  }
}

require "header.php";
?>

<section class="section">
  <div class="container">
    <div class="tile is-parent">
      <article class="tile is-child notification is-info is-4">
        <p class="title">Welcome!</p>
        <div class="content">
        <?php if (isset($_GET['err'])) { ?>
          <p class="has-text-warning has-text-weight-bold"><?= $errorMessage ?></p>
        <?php } ?>
          <form action="validate.php" method="post">
            <div id="name" class="field is-hidden">
              <div class="control">
                <input name="name" class="input is-primary" type="text" placeholder="Full Name">
              </div>
            </div>

            <div class="field">
              <div class="control">
                <input name="email" class="input is-primary" type="text" placeholder="Email">
              </div>
            </div>

            <div class="field">
              <div class="control">
                <input name="password" class="input is-primary" type="password" placeholder="Password">
              </div>
            </div>


            <div class="field">
              <a class="">Want to register?</a>
              <a class="is-hidden">Want to login?</a> 
                <button class="button is-white is-pulled-right">Login</button>
                <button class="button is-white is-hidden is-pulled-right">Register</button>
            </div>
          </form>

        </div>
      </article>
    </div>
  </div>
</section>
<?php
require "footer.php";
 ?>
