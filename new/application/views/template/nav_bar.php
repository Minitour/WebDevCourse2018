<nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
      <a href="/new/index.php" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
      <img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php" class="nav-item active">Home</a></li>
        <li><a href="login.php">Logout</a></li>
        <li><a href="profile.php">
            <?php echo $usr->username; ?>
        </a></li>
        <li><a href="cart.php">Cart</a></li>
      </ul>
    </div>
  </nav>