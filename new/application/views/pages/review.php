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
      <!-- <link href="css/reviews.css" rel="stylesheet"> -->
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
            <img style="width: 100px;" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Image text">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
               <li><a href="index.php?#">Home</a></li>
               <li><a href="login.php">Logout</a></li>
               <li class="nav-item"><a href="profile.php">
                  <?php echo $_SESSION['username']; ?>
                  </a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container">
         <nav>
            <div class="nav-wrapper">
               <div class="col s12">
                  <a href="/new" class="breadcrumb">Home</a>
                  <a href="<?php /* movie route*/?>" class="breadcrumb"><?php /* movie name*/ ?></a>
                  <a href="<?php /*current page location */?>" class="breadcrumb"><?php /* review id*/?></a>
               </div>
            </div>
         </nav>
         <!-- The review -->
         <div class="row">
            <div class="col s12">
               <ul class="collection">
                  <li class="collection-item avatar">
                     <img src="<?php echo $profile_picture; ?>" alt="" class="circle">
                     <span class="title">
                     <b><?php echo $username; ?></b>
                     </span>
                     <p><?php echo $created_at; ?><br>
                        <br><?php echo $comment; ?>
                     </p>
                     <a class="secondary-content">
                     <?php for ($i = 0; $i < $star_rating; $i++) { echo '<i class="material-icons">grade</i>'; } ?>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <!-- comment box -->
         <div class="row justify-content-center" id="comment_box">
            <!-- review input -->
            <div class="input-field col s9">
               <textarea id="textarea1" data-length="500" class="materialize-textarea"></textarea>
               <label for="textarea1">Comment</label>
            </div>
            <!-- button -->
            <div class="col s3">
               <a id="create_comment" class="waves-effect blue waves-light btn" style="width: 100%">Post</a>
            </div>
         </div>

         <h4>All Comments</h4>

         <div class="row" id="comments_all">
            <div class="col s12">
               <ul class="collection" id="comments">
               </ul>
            </div>
         </div>
      </div>
   </body>
</html>