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
            <a href="/" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
            <img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
               <li><a href="/new/index.php/">Home</a></li>
               <li><a href="/new/index.php/login">Logout</a></li>
               <li ><a href="/new/index.php/myprofile">
                  <?php echo $usr->username; ?>
                  </a>
               </li>
               <li class="nav-item active"><a>Cart</a></li>
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
         <button style="height: auto;" onclick="location.href='index.php'" type="button" id="cat_btn" class="waves-effect waves-light btn">Continue Shopping</button>
      </header>
      <div class="container" style="padding-top:60px; float: center;">
         <section id="cart" style="padding-top:10px;">
            <article class="product">
               <header>
                  <a class="remove">
                     <img src="http://www.astudio.si/preview/blockedwp/wp-content/uploads/2012/08/1.jpg" alt="">
                     <h3>Remove product</h3>
                  </a>
               </header>
               <div class="content">
                  <h1>Lorem ipsum</h1>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque.
                  <!-- <div title="You have selected this product to be shipped in the color yellow." style="top: 0" class="color yellow"></div> -->
                  <!-- <div style="top: 43px" class="type small">XXL</div> -->
               </div>
               <footer class="content">
                  <span class="qt-minus">-</span>
                  <span class="qt">2</span>
                  <span class="qt-plus">+</span>
                  <h2 class="full-price">
                     29.98€
                  </h2>
                  <h2 class="price">
                     14.99€
                  </h2>
               </footer>
            </article>
            <article class="product">
               <header>
                  <a class="remove">
                     <img src="http://www.astudio.si/preview/blockedwp/wp-content/uploads/2012/08/3.jpg" alt="">
                     <h3>Remove product</h3>
                  </a>
               </header>
               <div class="content">
                  <h1>Lorem ipsum dolor</h1>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque.
                  <!-- <div title="You have selected this product to be shipped in the color red." style="top: 0" class="color red"></div>
                     <div title="You have selected this product to be shipped sized Small."  style="top: 43px" class="type small">Small</div> -->
               </div>
               <footer class="content">
                  <span class="qt-minus">-</span>
                  <span class="qt">1</span>
                  <span class="qt-plus">+</span>
                  <h2 class="full-price">
                     79.99€
                  </h2>
                  <h2 class="price">
                     79.99€
                  </h2>
               </footer>
            </article>
            <article class="product">
               <header>
                  <a class="remove">
                     <img src="http://www.astudio.si/preview/blockedwp/wp-content/uploads/2012/08/5.jpg" alt="">
                     <h3>Remove product</h3>
                  </a>
               </header>
               <div class="content">
                  <h1>Lorem ipsum dolor ipsdu</h1>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque.
                  <!-- <div title="You have selected this product to be shipped in the color blue." style="top: 0" class="color blue"></div>
                     <div style="top: 43px" class="type small">Large</div> -->
               </div>
               <footer class="content">
                  <span class="qt-minus">-</span>
                  <span class="qt">3</span>
                  <span class="qt-plus">+</span>
                  <h2 class="full-price">
                     53.99€
                  </h2>
                  <h2 class="price">
                     17.99€
                  </h2>
               </footer>
            </article>
         </section>
      </div>
      <footer id="site-footer">
         <div class="container clearfix">
            <div class="right">
               <h1 class="total">Total: <span>177.16</span>€</h1>
               <a class="btn">Checkout</a>
            </div>
         </div>
      </footer>
   </body>
</html>