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

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">

  <!-- for stars icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Compiled and minified CSS -->
  <link href="css/reviews.css" rel="stylesheet">
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
            <!-- <li class="collection-item avatar">
                <img src="http://www.bistiproofpage.com/wp-content/uploads/2018/04/cute-profile-pics-for-whatsapp-images.png" alt="" class="circle">
                <span class="title"><b>Awesome movie!</b></span>
                <p>Amy<br><br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <a href="#!" class="secondary-content">
                    <i class="material-icons">grade</i>
                    <i class="material-icons">grade</i>
                    <i class="material-icons">grade</i>
                    <i class="material-icons">grade</i>
                    <i class="material-icons">grade</i>
                </a>
            </li>
            <li class="collection-item avatar">
                <img src="https://pixel.nymag.com/imgs/daily/vulture/2018/09/05/mac-miller/04-mac-miller-2.w570.h712.jpg" alt="" class="circle">
                <span class="title"><b>It's okay</b></span>
                <p>Marc<br><br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <a href="#!" class="secondary-content">
                    <i class="material-icons">grade</i>
                    <i class="material-icons">grade</i>
                    <i class="material-icons">grade</i>
                </a>
            </li> -->
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="./pictures.js"></script> -->
  <script>
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

    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('movie');
    var i = parseInt(myParam);
    var counter = 0;

    var pictures_info;

    readTextFile("movies_info.json", function(text){
      var data = JSON.parse(text);
      //console.log(data);
      pictures_info = data.movies;
      for(var movie in pictures_info) {
          if (counter == i){

              $('#title').text(pictures_info[movie]['name']);
              var final_str = "";

                  // for taging the movies in the modal_first_div var below

              var stars_number = 5;
                  // constructing a movie
              var first_div = '<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">';
              var second_div = '<div class="card h-100">';
              var link_to_image = '<img style="width:100%;" class="card-img-top" src="' + pictures_info[movie]['cover'] + '" alt="">';
              var third_div = '<div class="card-body">';
              var h4_line = '<h4 class="card-title">';
              var title = '<a href="#">' + pictures_info[movie]['name'] + '</a>';
              var close_h4 = '</h4>';
              var description = '<p class="card-text">' + pictures_info[movie]['info'] + '</p>';
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

              var number_of_empty_stars = stars_number - pictures_info[movie]['ratings'];
              var j;
              var ratings = "<p><span style='font-weight:bold;'>Rating: </span>";
              for (j=0; j<pictures_info[movie]['ratings']; j++) {
                ratings += "<span class='fa fa-star checked'></span>";
              }
              for (j=0; j<number_of_empty_stars; j++) {
                ratings += "<span class='fa fa-star'></span>";
              }
              ratings += "</p>";
              //var ratings = '<p style="font-size:20"><span style="font-weight:bold;">Ratings</span> : ' + movies_infos[movie]['ratings'] + "</p>";
              var released = '<p style="font-size:20"><span style="font-weight:bold;">Released</span> : ' + pictures_info[movie]['released'] + "</p>";
              var genre = '<p style="font-size:20"><span style="font-weight:bold;">Genre</span> : ' + pictures_info[movie]['genre'] + "</p>";
              var plot = '<p style="font-size:20"><span style="font-weight:bold;">Plot</span> : ' + pictures_info[movie]['plot'] + "</p>";
              var actors = '<p style="font-size:20"><span style="font-weight:bold;">Actors</span> : ' + pictures_info[movie]['actors'] + "</p>";

              // appending the fields together
              fields_for_movie_info = ratings +released + genre +  plot +  actors;

              // appending the joined fields to the modal body
              var modalBody = '<div class="row" style="padding:10px;width:device-width;">  <div class="col s9"><div class="row" style="width:device-width;"><div class="col s6">'+ link_to_image +'</div> <div class="col s6">' + fields_for_movie_info + "</div></div></div></div>";

              // closing the first three divs of the modal.
              var closing_modal_first_second_third_divs ="</div></div></div>";

              // appending all movies together and put in a specific tag later
              final_str += first_div + second_div + link_to_image + third_div + h4_line + title + close_h4 + description + close_third_div + button + closing_first_second_divs_first + modal_first_div + modal_second_div + modal_third_div_and_close_div_header + modalBody + closing_modal_first_second_third_divs;


              // fetching the element we taged
              var first_tag_element = document.getElementById('first_tag');

              // attach the string we constructed above to the div we taged as "first_tag".
              first_tag_element.insertAdjacentHTML('beforeend', modalBody);

              break;
          }
          counter += 1;
      }
    });

    readTextFile("reviews_comments.json", function(text){
      var data = JSON.parse(text);
      comments = data.reviews[i];

      let posted = "";
      for (var comment in comments) {
        for (var in_comment in comments[comment]){
          for (var inside in comments[comment][in_comment]){
            console.log(comments[comment][in_comment][inside]);
            var title = comments[comment][in_comment][inside]['title'];
            var commenter = comments[comment][in_comment][inside]['commenter'];
            var number_of_stars = comments[comment][in_comment][inside]['number_of_stars'];
            var comment_posted = comments[comment][in_comment][inside]['comment'];
            posted += '<li class="collection-item avatar">';
            posted += '<img src="http://www.bistiproofpage.com/wp-content/uploads/2018/04/cute-profile-pics-for-whatsapp-images.png" alt="" class="circle">';
            posted += '<span class="title"><b>' + title + '</b></span>';
            posted += '<p>' + commenter + '<br><br>';
            posted += comment_posted;
            posted += '</p>';
            posted += '<a href="#!" class="secondary-content">';
            for (j=0; j<number_of_stars; j++) {
              posted += '<i class="material-icons">grade</i>';
            }
            posted += '</a>';
            posted += '</li>';
          }
        }
      }
      $('#comments').append(posted);
    });
        // <li class="collection-item avatar">
        //     <img src="http://www.bistiproofpage.com/wp-content/uploads/2018/04/cute-profile-pics-for-whatsapp-images.png" alt="" class="circle">
        //     <span class="title"><b>Awesome movie!</b></span>
        //     <p>Amy<br><br>
        //         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        //     </p>
        //     <a href="#!" class="secondary-content">
        //         <i class="material-icons">grade</i>
        //         <i class="material-icons">grade</i>
        //         <i class="material-icons">grade</i>
        //         <i class="material-icons">grade</i>
        //         <i class="material-icons">grade</i>
        //     </a>
        // </li>



  </script>

  <script>

    /**
     * Creates a comment list item.
     */
    function construct_comment(profile_img,title,name,review,score) {
        var comment_item = ""
        comment_item += '<li class="collection-item avatar">'
        comment_item += '<img src="' + profile_img + '" alt="" class="circle">'
        comment_item += '<span class="title"><b>' + title + '</b></span>'
        comment_item += '<p>' + name + '<br><br>'
        comment_item += review
        comment_item += '</p>'
        comment_item += '<a href="#!" class="secondary-content">'
        for(var i = 0; i < score; i++){
            comment_item += '<i class="material-icons">grade</i>'
        }
        comment_item += '</a>'
        comment_item += '</li>'

        return comment_item;
    }

    $('#create_comment').click(()=>{
        let review = $('#textarea1').val();
        let title = $('#review_title').val();
        let stars = parseInt($('input[name=rating]:checked', '#star_rating_form').val())
        let name = "<?php echo $username; ?>"

        let commentView = construct_comment("https://catking.in/wp-content/uploads/2017/02/default-profile-1.png",title,name,review,stars);
        $('#textarea1').val("");
        $('#review_title').val("");

        $('#comments').prepend(commentView);
    });


  </script>
</body>

</html>
