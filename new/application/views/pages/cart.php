<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Shopping Cart</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- this is for the less shopping cart -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/cart.css'); ?>" rel="stylesheet">
   </head>
   <body>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
      <script src="<?php echo base_url('assets/js/cart.js'); ?>"></script>
      <nav class="blue-grey darken-3" role="navigation">
         <div class="nav-wrapper container">
            <a href="/new/index.php" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
            <img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
               <li><a href="/new/index.php/">Home</a></li>
               <li class="nav-item active"><a>Cart</a></li>
               <li><a href="/new/index.php/login">Logout</a></li>
               <li ><a href="/new/index.php/myprofile">
               <?php echo '<img src="'. $_SESSION['profile_picture'] .'" class="circle responsive-img valign" style="width: 30px; height: 30px;position: relative;top: 16px;float: left;left: -5px;">' ?>
                  <?php echo $_SESSION['username'] ?>
                  </a>
               </li>
            </ul>
         </div>
      </nav>
      <ul class="sidenav" id="mobile-demo">
         <li><a href="sass.html">Sass</a></li>
         <li><a href="badges.html">Components</a></li>
         <li><a href="collapsible.html">Javascript</a></li>
         <li><a href="mobile.html">Mobile</a></li>
      </ul>
      <header style="float:right; padding-top:10px; padding-right:5px;">
         <button style="height: auto;" onclick="location.href='/new/index.php'" type="button" id="cat_btn" class="waves-effect waves-light btn">Continue Browsing</button>
      </header>
      <div class="container" style="padding-top:60px; float: center;">
         <section id="cart" style="padding-top:10px;">
            <?php
               function item_template($cover,$title,$plot) {
                  return '<article class="product"><header><a class="remove">
                  <img src="' . $cover . '" alt=""><h3>Remove product</h3></a></header>
                  <div class="content"><h1>'. $title . '</h1>' . substr($plot,0,min(strlen($plot),280)) . ((strlen($plot) > 280) ? '...' : '' ) . '</div>
                  <footer class="content"><h2 class="full-price">$9.99</h2></footer></article>';
               }
               foreach($items as $item) {
                  echo item_template($item['cover'],$item['name'],$item['plot']);
               }
            ?>
         </section>
      </div>
      <footer id="site-footer">
         <div class="container clearfix">
            <div class="right">
               <h1 class="total">Total: <span><?php echo '$' . (count($items) * 10);?></span>€</h1>
               <a class="btn">Checkout</a>
            </div>
         </div>
      </footer>
   </body>
</html>