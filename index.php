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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
  <script src="https://unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
  <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
  
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
  
  <!-- this is the style for the vueJS -->
  <style>
    div#first_tag {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    div#first_tag .search-wrapper {
      position: relative;
    }
    div#first_tag .search-wrapper input {
      padding: 4px 12px;
      color: rgba(0, 0, 0, .70);
      border: 1px solid rgba(0, 0, 0, .12);
      transition: 0.15s all ease-in-out;
      background: white;
    }
    div#first_tag .search-wrapper input:focus {
      outline: none;
      transform: scale(1.05);
    }
    div#first_tag .search-wrapper input::-webkit-input-placeholder {
      font-size: 14px;
      color: rgba(0, 0, 0, .50);
      font-weight: 100;
    }
    div#first_tag .wrapper {
      display: flex;
      max-width: 1200px;
      flex-wrap: wrap;
      padding-top: 12px;
    }
    div#first_tag .card {
      box-shadow: rgba(0, 0, 0, 0.117647) 0px 1px 6px, rgba(0, 0, 0, 0.117647) 0px 1px 4px;
      max-width: 400px;
      margin: 12px;
      transition: 0.15s all ease-in-out;
    }
    div#first_tag .card:hover {
      transform: scale(1.1);
    }
    div#first_tag .card a {
      text-decoration: none;
      padding: 12px;
      color: black;
      font-size: 20px;
      font-weight: bold;
      display: flex;
      flex-direction: column;
    }
    div#first_tag .card a img {
      height: 400px;
    }
    div#first_tag .box {
      width: 100px;
      height: 100px;
      border: 1px solid rgba(0, 0, 0, .12);
    }
    #master_wrap {
      text-align: center;
      width: 600px;
      margin:auto;
      overflow:hidden;
    }
    #div_wrap_search {
      width: 300px;
      float:left;
    }
    #div_wrap_categories {
      width: 200px;
      padding-top:5px;
      float:right;
    }
  </style>

  <!-- this is the style for the overlay -->
  <style>
  .card {
    position: relative;
  }

  .image {
    opacity: 1;
    display: block;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
  }

  .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    /* top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%); */
    /* text-align: center; */
  }

  .card:hover .image {
    opacity: 0.3;
  }

  .card:hover .middle {
    opacity: 1;
  }

  .middle p{
    /* background-color: #4CAF50; */
    color: black;
    font-size: 16px;
    max-width: 255px;
    /* padding: 16px 32px; */
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
      <div id="master_wrap">  
        <div class="search-wrapper" id="div_wrap_search">
          <input type="text" v-model="search" placeholder="Search title.."/>
        </div>
        <div id="tabs_div_2" id="div_wrap_categories" style="width:200px;">
          <button id="cat_btn" class="waves-effect waves-light btn">Categories</button>
        </div>
      </div>
      <div class="wrapper">
        <div class="card" v-for="post in filteredList">
          <a v-bind:href="post">
          <img v-bind:src="post.img" class="image"/><br>
            {{ post.name }}
          <div class="middle">
            <h5 style="font-weight:bold;">{{ post.name }}</h5>
            <p v-html="post.stars"><?php echo"{{ post.stars }}";?></p><br>
            <p>{{ post.info }}</p>
          </div>
          </a>
        </div>
      </div>
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
  // function get_card(index,movie_name,movie_details){
  //   let cover = movie_details.cover;
  //   let title = movie_name;
  //   console.log(title);
  //   let description = movie_details.plot;
  //   let reviews_url = '/reviews.php?movie=' + index;
  //   const stars_number = 5;

  //   let star_rating = movie_details.ratings;
  //   let number_of_empty_stars = stars_number - star_rating;

  //   let ratings = "<p><span style='font-weight:bold;'></span>";
  //   for (j=0; j<star_rating; j++) {
  //     ratings += "<span class='fa fa-star checked'></span>";
  //   }
  //   for (j=0; j<number_of_empty_stars; j++) {
  //     ratings += "<span class='fa fa-star'></span>";
  //   }
  //   ratings += "</p>";

  //   let card_html = "";
  //   card_html += '<div class="col s4">'
  //   card_html += '<div class="card">'
  //   card_html += '<div class="card-image waves-effect waves-block waves-light">'
  //   card_html += '<img class="activator" src="'+ cover + '">'
  //   card_html += '</div>'
  //   card_html += '<div class="card-content">'
  //   card_html += '<span class="card-title activator grey-text text-darken-4">' + title + '<i class="material-icons right">more_vert</i></span>'
  //   card_html += ratings
  //   card_html += '<br>'
  //   card_html += '<p><a href="'+ reviews_url + '">See Reviews</a></p>'
  //   card_html += '</div>'
  //   card_html += '<div class="card-reveal">'
  //   card_html += '<span class="card-title grey-text text-darken-4">' + title + '<i class="material-icons right">close</i></span>'
  //   card_html += ratings
  //   card_html += '<p>'+ description + '</p>'
  //   card_html += '</div>'
  //   card_html += '</div>'
  //   card_html += '</div>'

  //   return card_html;
  // }
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

  

  function getCards(){
    var all_movies = [];
    readTextFile("movies_info.json", function(text){
      var data = JSON.parse(text);
      var movies = data.movies;
      var index = 0;
      for (var movie in movies) {
        let movie_name = movies[movie]['name'];
        let movie_details = movies[movie];
        //let cardHtml = get_card(index,movie_name,movie_details);
        
        // adding the stars to the modal
        let star_rating = movies[movie]['ratings'];
        let number_of_empty_stars = 5 - star_rating;

        let ratings = "";
        for (j=0; j<star_rating; j++) {
          ratings += "<span class='fa fa-star checked'></span>";
        }
        for (j=0; j<number_of_empty_stars; j++) {
          ratings += "<span class='fa fa-star'></span>";
        }
        let movie_post = new Post(movie_name, movies[movie]['cover'], ratings, movies[movie]['plot']);
      
        //console.log(ratings);
        //$('#stars_ratings').append(ratings);

        all_movies.push(movie_post);
        index += 1;
      }
    });
    return all_movies;
  }


  // console.log(all_movies);
  class Post {
    constructor(name, img, stars, info) {
      this.name = name;
      this.img = img;
      this.stars = stars;
      this.info = info;
    }
  }

  const app = new Vue ({
    el: '#first_tag',
    data: {
      search: '',
      postList : getCards()
    },
    computed: {
      filteredList() {
        return this.postList.filter(post => {
          return post.name.toLowerCase().includes(this.search.toLowerCase())
        })
      }
    }
  })
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
