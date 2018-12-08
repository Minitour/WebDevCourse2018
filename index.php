<?php
    $username = "Unknown";
    // check if user has loging cookies
    if (isset($_COOKIE["username"])) {
      //proceed to login
      $username = $_COOKIE["username"];
    } else {
      // redirect to logout page.
      header("Location: ./login.php");
      die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Movie Reviews</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/4-col-portfolio.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">

  <!-- for stars icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .checked {
      color: orange;
    }
  </style>
</head>

<body>



  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php"> <?php echo $username; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <form class="search-container">
    <input type="text" id="search-bar" placeholder="What movie are you looking for?">
    <a class="search-icon" href="#"><i class="fas fa-search"></i></a>
  </form>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Movies
      <small>Trending</small>
    </h1>


    <div class="row" id="first_tag">

    </div>
    <!-- /.row -->


    <!-- Pagination -->
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Antonio Zaitoun & Tomer Goldfeder Movies 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./pictures.js"></script>
  <script>
  var final_str = "";

  // for taging the movies in the modal_first_div var below
  var i = 0;
  var stars_number = 5;
  for (var movie in pictures_info)
  {
    // constructing a movie
    var splited = pictures_info[movie].split('|');
    var first_div = '<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">';
    var second_div = '<div class="card h-100">';
    var link_to_image = '<img style="width:device-width;" class="card-img-top" src="' + splited[0] + '" alt="">';
    var third_div = '<div class="card-body">';
    var h4_line = '<h4 class="card-title">';
    var title = '<a href="#">' + movie + '</a>';
    var close_h4 = '</h4>';
    var description = '<p class="card-text">' + splited[1] + '</p>';
    var close_third_div = '</div>';
    var button = '<button type="button" class="btn btn-primary" style="background-color:#353a40;border-color:#353a40;" data-toggle="modal" data-target="#' + i + '">Movie Info</button>';
    var closing_first_second_divs_first = '</div></div>';

    // constructing the modal for the movie
    var modal_first_div = '<div id="'+ i +'" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
    var modal_second_div = '<div class="modal-dialog modal-lg">';
    var closeButton_modal = '<button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    var modal_third_div_and_close_div_header = '<div class="modal-content"><div class="modal-header" style="background-color:#353a40;"><h5 class="modal-title" style="color:white;">'+movie+'</h5>' + closeButton_modal + "</div>";

    // fetching the info the specific movie
    var fields_for_movie_info = "";

    var number_of_empty_stars = stars_number - movies_infos[movie]['ratings'];
    var j;
    var ratings = "<p><span style='font-weight:bold;'>Rating: </span>";
    for (j=0; j<movies_infos[movie]['ratings']; j++) {
      ratings += "<span class='fa fa-star checked'></span>";
    }
    for (j=0; j<number_of_empty_stars; j++) {
      ratings += "<span class='fa fa-star'></span>";
    }
    ratings += "</p>";
    //var ratings = '<p style="font-size:20"><span style="font-weight:bold;">Ratings</span> : ' + movies_infos[movie]['ratings'] + "</p>";
    var released = '<p style="font-size:20"><span style="font-weight:bold;">Released</span> : ' + movies_infos[movie]['released'] + "</p>";
    var genre = '<p style="font-size:20"><span style="font-weight:bold;">Genre</span> : ' + movies_infos[movie]['genre'] + "</p>";
    var plot = '<p style="font-size:20"><span style="font-weight:bold;">Plot</span> : ' + movies_infos[movie]['plot'] + "</p>";
    var actors = '<p style="font-size:20"><span style="font-weight:bold;">Actors</span> : ' + movies_infos[movie]['actors'] + "</p>";

    // appending the fields together
    fields_for_movie_info = ratings +released + genre +  plot +  actors;

    // appending the joined fields to the modal body
    var modalBody = '<div class="row" style="padding:10px;width:device-width;">  <div class="col-sm-9"><div class="row" style="width:device-width;"><div class="col-8 col-sm-6">'+ link_to_image +'</div> <div class="col-8 col-sm-6">' + fields_for_movie_info + "</div></div></div></div>";

    // closing the first three divs of the modal.
    var closing_modal_first_second_third_divs ="</div></div></div>";

    // appending all movies together and put in a specific tag later
    final_str += first_div + second_div + link_to_image + third_div + h4_line + title + close_h4 + description + close_third_div + button + closing_first_second_divs_first + modal_first_div + modal_second_div + modal_third_div_and_close_div_header + modalBody + closing_modal_first_second_third_divs;
    i++;
  }

  // fetching the element we taged
  var first_tag_element = document.getElementById('first_tag');

  // attach the string we constructed above to the div we taged as "first_tag".
  first_tag_element.insertAdjacentHTML('beforeend', final_str);
  </script>

</body>

</html>
