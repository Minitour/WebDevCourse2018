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




</head>

<body>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
      <a href="/new/index.php" class="brand-logo" style="float: left;text-align: center;white-space: nowrap;padding: 5px 10px;">
      <img style="width: 100px;" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Image text">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/new/index.php" class="nav-item active">Home</a></li>
        <li><a href="/new/index.php/login">Logout</a></li>
        <li><a href="/new/index.php/cart">Cart</a></li>
        <li><a href="/new/index.php/myprofile">
            <?php echo '<img src="'. $_SESSION['profile_picture'] .'" class="circle responsive-img valign" style="width: 30px; height: 30px;position: relative;top: 16px;float: left;left: -5px;">' ?>
            <?php echo $username; ?>
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
    <!-- <div class="row" style="display: flex;align-items: center;justify-content: center;">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a onclick="return app.fetchMovies(1);" href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div> -->

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
  
  <script>
    var current_page = 1;
  </script>

  <script src="<?php echo base_url('assets/js/index.js'); ?>"></script>
</body>

</html>
