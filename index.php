<?php
    require_once('./controller/auth.php');
    require_once('./controller/session_manager.php');
    
    $auth = new Auth();
    $sessionManager = new SessionManager($auth);

    $usr = $sessionManager->currentUser();
    
    if ($usr == null) {
        // die
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
  <link href="css/4-col-portfolio.css" rel="stylesheet">

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
      padding:20px;
      padding-right: 50px;
    }
    table {
      background-color:#353a40;
      border-radius:5px;
      width:1000px;
      margin:auto;
    }
  </style>
</head>

<body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
            <?php echo $usr->username; ?>
        </a></li>
      </ul>
    </div>
  </nav>


<div>
  <div style="text-align:center;padding-top: 20px">
      <div id="wrapper_div" class="row">
        <div id="tabs_div_1" class="col s9">
          <input type="text" id="search-bar" placeholder="What movie are you looking for?">
          <a class="search-icon" href="#"><i class="fas fa-search"></i></a>
        </div>
        <div id="tabs_div_2" class="col s3">
          <button id="cat_btn" class="waves-effect waves-light btn">Categories</button>
        </div>
      </div>
  </div>
  <div>
    <table id="table_tabs" style="display:none;">
      <tbody>
        <tr>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a><b>Action</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a><b>Adult</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a><b>Adventure</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a><b>Comedy</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a><b>Drama</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a><b>Sci-Fi</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="1" value>
              <span>
                <a><b>Sport</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="2" value>
              <span>
                <a><b>Romance</b></a>
              </span>
            </label>
          </td>
        </tr>
        <tr>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a><b>Fantasy</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a><b>Family</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a><b>Crime</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a><b>Mystery</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a><b>Documentary</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a><b>Horror</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="3" value>
              <span>
                <a><b>Musical</b></a>
              </span>
            </label>
          </td>
          <td>
            <label>
              <input type="checkbox" name="4" value>
              <span>
                <a><b>Animation</b></a>
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
    <h3 style="font-weight:bold;padding-bottom: 20px">Trending Movies</h3>


    <div class="row" id="first_tag">

    </div>
    <!-- /.row -->


    <!-- Pagination -->
    <div class="row" style="display: flex;align-items: center;justify-content: center;">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>

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
  <!-- <script src="./pictures.js"></script> -->
  <script>
  function get_card(index,movie_name,movie_details){
    let cover = movie_details.cover;
    let title = movie_name;
    console.log(title);
    let description = movie_details.plot;
    let reviews_url = '/reviews.php?movie=' + index;
    const stars_number = 5;

    let star_rating = movie_details.ratings;
    let number_of_empty_stars = stars_number - star_rating;

    let ratings = "<p><span style='font-weight:bold;'></span>";
    for (j=0; j<star_rating; j++) {
      ratings += "<span class='fa fa-star checked'></span>";
    }
    for (j=0; j<number_of_empty_stars; j++) {
      ratings += "<span class='fa fa-star'></span>";
    }
    ratings += "</p>";

    let card_html = "";
    card_html += '<div class="col s4">'
    card_html += '<div class="card">'
    card_html += '<div class="card-image waves-effect waves-block waves-light">'
    card_html += '<img class="activator" src="'+ cover + '">'
    card_html += '</div>'
    card_html += '<div class="card-content">'
    card_html += '<span class="card-title activator grey-text text-darken-4">' + title + '<i class="material-icons right">more_vert</i></span>'
    card_html += ratings
    card_html += '<br>'
    card_html += '<p><a href="'+ reviews_url + '">See Reviews</a></p>'
    card_html += '</div>'
    card_html += '<div class="card-reveal">'
    card_html += '<span class="card-title grey-text text-darken-4">' + title + '<i class="material-icons right">close</i></span>'
    card_html += ratings
    card_html += '<p>'+ description + '</p>'
    card_html += '</div>'
    card_html += '</div>'
    card_html += '</div>'
    return card_html;
  }
  function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
  }
  readTextFile("movies_info.json", function(text){
      var data = JSON.parse(text);
      var movies = data.movies;
      var index = 0;
      for (var movie in movies) {
        let movie_name = movies[movie]['name'];
        let movie_details = movies[movie];
        let cardHtml = get_card(index,movie_name,movie_details);
        $('#first_tag').append(cardHtml);
        index += 1;
      }
  });

  </script>

  <script>
    $(document).ready(() => {
        $('#cat_btn').click(()=> {
          $('#table_tabs').fadeToggle('fast');
        });
    })
  </script>

</body>

</html>
