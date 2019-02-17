<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Movie Reviews</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">

  <!-- for stars icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Compiled and minified CSS -->
  <link href="<?php echo base_url('assets/css/reviews.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



  <style>
    .checked {
      color: orange;
    }

    
  </style>
</head>

<body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  <!-- Navigation -->
  <nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
      <a href="/new/index.php" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
      <img style="width: 100px;" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Image text">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/new/index.php">Home</a></li>
        <li><a href="/new/index.php/cart">Cart</a></li>
        <li><a href="/new/index.php/login">Logout</a></li>
        <li class="nav-item"><a href="/new/index.php/myprofile">
            <?php echo '<img src="'. $_SESSION['profile_picture'] .'" class="circle responsive-img valign" style="width: 30px; height: 30px;position: relative;top: 16px;float: left;left: -5px;">' ?>
            <?php echo $username; ?>
        </a></li>
      </ul>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading -->
    <h3 id="title">
    </h3>


    <div class="row" id="first_tag">

    </div>
    <div class="col s3">
          <button id="add_to_cart" class="waves-effect waves-light btn" style="width: 100%">Add to Cart</button>
    </div>
    <br>
    <div class="row justify-content-center" id="comment_box" <?php if ($did_comment) { echo 'style="display: none;"';}?>>        
        <!-- star input -->
        <div class="col s3">
          <form id="star_rating_form">
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                <input checked="checked" type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <!-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>  -->
          </form>
        </div>

        <!-- review input -->
        <div class="input-field col s6">
          <textarea id="textarea1" data-length="500" class="materialize-textarea"></textarea>
          <label for="textarea1">Review</label>
        </div>


        <!-- button -->
        <div class="col s3">
            <a id="create_review" class="waves-effect waves-light btn" style="width: 100%">Post</a>
        </div>
    </div>





    <h4> All Reviews</h4>
    <div class="row" id="comments_all">
        <div class="col s12">
        <ul class="collection" id="comments">

        </ul>
        </div>
    </div>

    <div id="loading_indicator" class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper center">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/create_review.js'); ?>"></script>
  
  <script>
    var movie_data = JSON.parse('<?php echo json_encode($movie_data);?>'); 
    
    var movie_id = movie_data['id'];
    var username = '<?php echo $_SESSION["username"]; ?>';
    var user_id = '<?php echo $_SESSION["id"]; ?>'
    var profile_picture = '<?php echo $_SESSION["profile_picture"]; ?>'

    var page = 1;
    var should_load_more = true;
    var isMakingRequest = false;
    
    
    
    // load movie
    setup_movie(movie_data);

    // load first reviews page.
    load_more();
  </script>

</body>

</html>