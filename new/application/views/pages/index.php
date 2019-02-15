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
  <link href="<?php echo base_url('assets/css/4-col-portfolio.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/index.css'); ?>" rel="stylesheet">

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

  <!-- <script src="<?php echo base_url('assets/js/index.js'); ?>"></script> -->


</head>

<body>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
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
            <?php echo $username; ?>
        </a></li>
        <li><a href="cart.php">Cart</a></li>
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
          <!--id,name,ratings,release_date,plot,actors,conver,info  -->
          <a v-bind:href="post.url">
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
            <li class="active"><a onclick="return app.fetchMovies(1);" href="#!">1</a></li>
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
  </footer>
  
  <script type="text/javascript">
    class Post {
  //id,name,ratings,release_date,plot,actors,conver,info
  constructor(name, img, stars, info, index) {
    this.name = name; // name
    this.img = img; // cover
    this.stars = stars; // ratings
    this.info = info; // plot
    this.url = "/reviews.php?movie=" + index; //id
  }
}

const app = new Vue({
  el: "#first_tag",
  data: {
    search: "",
    moviesList: []
  },
  computed: {
    filteredList() {
      return this.moviesList.filter(post => {
        return post.name.toLowerCase().includes(this.search.toLowerCase());
      });
    }
  },
  methods: {
    fetchMovies: function(page) {
      $.post("/new/index.php/movie/get_movies/"+page, {}, data => {
        returned_data = JSON.parse(data);
        console.log(returned_data);
        returned_data.forEach(i => {
          //id,name,ratings,release_date,plot,actors,conver,info
          let movie_name = i["name"];
          let movie_details = i['info'];
          //let cardHtml = get_card(index,movie_name,movie_details);

          // adding the stars to the modal
          let star_rating = i["ratings"];
          let number_of_empty_stars = 5 - star_rating;

          let ratings = "";
          for (j = 0; j < star_rating; j++) {
            ratings += "<span class='fa fa-star checked'></span>";
          }
          for (j = 0; j < number_of_empty_stars; j++) {
            ratings += "<span class='fa fa-star'></span>";
          }
          let post_item = new Post(
            movie_name,
            i["cover"],
            ratings,
            i["plot"],
            i["id"]
          );

          //console.log(ratings);
          //$('#stars_ratings').append(ratings);
          this.moviesList.push(post_item);
        });
      });
    }
  }
});

$(document).ready(() => {
  $("#cat_btn").click(() => {
    $("#table_tabs").fadeToggle("fast");
  });
  app.fetchMovies(1);
});
    </script>


</body>

</html>
