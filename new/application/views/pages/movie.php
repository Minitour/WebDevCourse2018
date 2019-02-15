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
      <a href="/" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
      <img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php?#">Home</a></li>
        <li><a href="login.php">Logout</a></li>
        <li class="nav-item"><a href="profile.php">
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

    <div class="row justify-content-center" id="comment_box">
        <div class="input-field col s9">
          <textarea id="review_title" data-length="80" class="materialize-textarea"></textarea>
          <label for="title">Title</label>
        </div>

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

        <div class="input-field col s12">
          <textarea id="textarea1" data-length="500" class="materialize-textarea"></textarea>
          <label for="textarea1">Review</label>
        </div>



        <div class="col s12">
            <a id="create_comment" class="waves-effect waves-light btn" style="width: 100%">Post</a>
        </div>
    </div>





    <h4> All Reviews</h2>
    <div class="row" id="comments_all">
        <div class="col s12">
        <ul class="collection" id="comments">

        </ul>
        </div>
    </div>




    <div class="row" style="display: flex;align-items: center;justify-content: center;">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- <script src="./pictures.js"></script> -->
  <script>
    
    var movie_data = JSON.parse('<?php echo json_encode($movie_data);?>'); 
    setup_movie(movie_data);
    var page = 1;

    get_reviews(movie_data['id'],page, (reviews) => {
        reviews.forEach( r => {
            // movie_id, user_id, comment, star_rating, created_at
            var review_item = construct_review();
            $('#comments').append(review_item);
        });

        page += 1;
    });
  </script>

</body>

</html>