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
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Custom styles for this template -->
  <!-- <link href="css/4-col-portfolio.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">

  <!-- for stars icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    .checked {
      color: orange;
    }
    #wrapper_div {
      width: 800px;
      margin:auto;
      overflow:hidden;
    }
    #tabs_div_1 {
      width: 400px;
      float:left;
    }
    #tabs_div_2 {
      width: 350px;
      padding-top:5px;
      float:right;
    }
    label {
      padding-left:30px;
      background-color:#353a40;
      border-color:grey;
      border-radius:2px;
      padding-right:30px;
    }
    b {
      color:white;
      font-size:13px;
    }
    tbody {
      display:inline;
    }
    td {
      padding-right:10px;
    }
    table {
      background-color:#353a40;
      border-radius:10px; 

      width:1000px;
      margin:auto;
    }
  </style>
</head>

<body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  function toggleTabs() {
    $('#table_tabs').fadeToggle('fast');
  }
</script>


  <!-- Navigation
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
  </nav> -->

  <!-- Navigation -->
  <nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
      <a href="/" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
      <img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php" class="nav-item active">Home</a></li>
        <li><a href="login.php">Logout</a></li>
        <li><a href="profile.php">
            <?php echo $username; ?>
        </a></li>
      </ul>
    </div>
  </nav>


<div>
  <div style="text-align:center;padding-top: 20px">
    <form class="search-container">
      <div id="wrapper_div">
        <div id="tabs_div_1">
          <input type="text" id="search-bar" placeholder="What movie are you looking for?">
          <a class="search-icon" href="#"><i class="fas fa-search"></i></a>
        </div>
        <div id="tabs_div_2">
          <button onclick="toggleTabs()" class="waves-effect waves-light btn">Categories</button>
        </div>
      </div>
    </form>
  </div>
  <div>
    <table id="table_tabs" style="display:none;">
      <tbody>
        <tr>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a href="?1"><b>Action</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a href="?2"><b>Adult</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a href="?1"><b>Adventure</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a href="?2"><b>Comedy</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a href="?1"><b>Drama</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a href="?2"><b>Sci-Fi</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a href="?1"><b>Sport</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a href="?2"><b>Romance</b></a>
              </span>
            </label>
          </td>
        </tr>
        <tr>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a href="?3"><b>Fantasy</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a href="?4"><b>Family</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a href="?3"><b>Crime</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a href="?4"><b>Mystery</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a href="?3"><b>Documentary</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a href="?4"><b>Horror</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a href="?3"><b>Musical</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a href="?4"><b>Animation</b></a>
              </span>
            </label>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

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
  <style>
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
    
  </style>
  <!-- Footer -->
  <footer class="page-footer blue-grey darken-3">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Antonio Zaitoun & Tomer Goldfeder Movies 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="./pictures.js"></script>
  <script>
    function get_card(index,movie_name,movie_details){
      let cover = movie_details.cover;
      let title = movie_name;
      let description = movie_details.plot;
      let reviews_url = '/reviews.php?movie=' + index;

      let card_html = "";
      card_html += '<div class="col s3">'
      card_html += '<div class="card">'
      card_html += '<div class="card-image waves-effect waves-block waves-light">'
      card_html += '<img class="activator" src="'+ cover + '">'
      card_html += '</div>'
      card_html += '<div class="card-content">'
      card_html += '<span class="card-title activator grey-text text-darken-4">' + title + '<i class="material-icons right">more_vert</i></span>'
      card_html += '<p><a href="'+ reviews_url + '">See Reviews</a></p>'
      card_html += '</div>'
      card_html += '<div class="card-reveal">'
      card_html += '<span class="card-title grey-text text-darken-4">' + title + '<i class="material-icons right">close</i></span>'
      card_html += '<p>'+ description + '</p>'
      card_html += '</div>'
      card_html += '</div>'
      card_html += '</div>'
      return card_html;
    }

    var movies = movies_infos;
    var index = 0;
    for (var movie in movies) {
      let movie_name = movie;
      let movie_details = movies[movie_name];
      let cardHtml = get_card(index,movie_name,movie_details);
      console.log(cardHtml);
      $('#first_tag').append(cardHtml);
      index += 1;
    }


    
  </script>

</body>

</html>
