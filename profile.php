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
    <title>Profile Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
    
    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css/profile.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
</head>

<body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <script>
    $(document).ready(function(){
        $('.datepicker').datepicker();
        $('.sidenav').sidenav();
    });
  </script>
      <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log("hello world");
                var reader = new FileReader();
                reader.onload = function(e) {
                    console.log(e);
                    $('#avatar_picture').attr('src', e.target.result);
                    $('#avatar_picture').height($('#avatar_picture').width());
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            var input = $(document.createElement("input"));
            input.attr("type", "file");
            input.attr("accept","image/png, image/jpeg");
            input.on('change', ()=> {
                    readURL(input[0]);
            });
            
            $('#change_picture').click(()=>{
                // add onchange handler if you wish to get the file :)
                
                input.trigger("click"); // opening dialog
                return false;
            });
        });
    </script>
    <!--/row-->
    <script>
        function validateForm(){
        $(document).ready(function(){

            // set boolean flag to False -> to check if all elements are ok
            var checkAllElements = true;

            // getting all elements to check
            var first_name_field = document.getElementById("first_name").value;
            var last_name_field = document.getElementById("last_name").value;
            var email_field = document.getElementById("email").value;
            var phone_field = document.getElementById("phone").value;
            var birthday_field = document.getElementById("birthday_date").value;
            var password_field = document.getElementById("password").value;
            var password_confirm_field = document.getElementById("password-confirm").value;

            // checking all elements by conditions set before

            // check first and last name
            var names_regex = /^[A-Za-z]*$/;

            // check first name and put corrisponding message
            if ((first_name_field != "") && (first_name_field.match(names_regex) != null)) {
            //var first_name_form_message = "<h6 style='color:green;'>Valid Name</h6>";
            first_name_error_box_element.style.visibility = "hidden";
            } else {
            checkAllElements = false;
            var first_name_form_message = "<h6 style='color:red;'>Invalid Name</h6>";
            }
            

            // checking last name and put corrisponding message
            if ((last_name_field != "") && (last_name_field.match(names_regex) != null)) {
            //var last_name_form_message = "<h6 style='color:green;'>Valid Last Name</h6>";
            } else {
            checkAllElements = false;
            var last_name_form_message = "<h6 style='color:red;'>Invalid Last Name</h6>";
            }
            

            // check birthdate -> will be before today
            var date1 = new Date(birthday_field);
            if (date1 < new Date()) {
            //var birthday_form_message = "<h6 style='color:green;'>Valid Birthday</h6>";
            } else {
            checkAllElements = false;
            var birthday_form_message = "<h6 style='color:red;'>Invalid Birthday</h6>";
            }
            

            // check phone is not empty
            if (phone_field != "") {
            //var phone_form_message = "<h6 style='color:green;'>Valid Phone</h6>";
            } else {
            checkAllElements = false;
            var phone_form_message = "<h6 style='color:red;'>Invalid Phone</h6>";
            }
            
            // check email_field and put corrisponding message

            // regex for mail
            var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            // element to attach the message
            if ((email_field != "") && (email_field.match(email_regex) != null)) {

            //TODO: add ok message
            var email_form_message = "<h6 style='color:green;'>Valid Email</h6>";

            } else {
            checkAllElements = false;

            //TODO: add error message
            var email_form_message = "<h6 style='color:red;'>Invalid Email</h6>";
            }
            


            // check phone_field - not needed

            // check password_field and password_confirm_field and put corrisponding message
            var password_regex = /^[A-Za-z0-9]*$/;

            // checking if the passwords are not empty
            if ((password_field != "") && (password_confirm_field != "")) {

            // checking if the password match
            if (password_field == password_confirm_field){

                // checking if the passwords are valid
                if ((password_field.match(password_regex) != null) && (password_confirm_field.match(password_regex) != null)) {
                var password_form_message = "<h6 style='color:green;'>Valid Password</h6>";
                } else {
                checkAllElements = false;
                var password_form_message = "<h6 style='color:red;'>InValid Password</h6>";
                }
            } else {
                checkAllElements = false;
                var password_form_message = "<h6 style='color:red;'>Password Do Not Match</h6>";
            }
            } else {
            checkAllElements = false;
            var password_form_message = "<h6 style='color:red;'>No Password Entered</h6>";
            }

            $('#first_name_error_box').html(first_name_form_message);
            $('#last_name_error_box').html(last_name_form_message);
            $('#birthday_error_box').html(birthday_form_message);
            $('#phone_error_box').html(phone_form_message);
            $('#email_error_box').html(email_form_message);
            $('#password_error_box').html(password_form_message);
            $('#password_confirm_error_box').html(password_form_message);
            });
        }
    </script>
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
        <li class="nav-item active"><a href="profile.php">
            <?php echo $username; ?>
        </a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>
    <!-- <nav>
        <div class="container">
            <a class="navbar-brand" href="/"><img style="width: 100px;" src="./web_dev_pictures/logo.png" alt="Image text"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login.php">Logout</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><?php echo $username; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <div class="container" >

        <div class="row">
        
        </div>
        <div class="row" >
            <div class="col s3" style="padding-margin: 30px">
                <!--left col-->
                <div class="card">
                    <div class="card-content">
                        <div class="aspect_ratio">
                            <img id = "avatar_picture" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width: 100%; border-radius: 100px;object-fit: cover;" class="avatar img-circle img-thumbnail" alt="avatar">
                        </div>
                        <br>
                        <div>
                        <button class="btn waves-effect waves-light" style="width: 100%;" id="change_picture" name="action">Change Picture</button>
                        </div>
                        <br>

                        <ul class="list-group">
                            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                            <li class="list-group-item">
                                <i class="fas fa-film"></i>
                                <span class="pull-left"><strong>Rated Movies</strong></span> 125
                            </li>

                            <li class="list-group-item">
                                <i class="fas fa-thumbs-up"></i>
                                <span class="pull-left"><strong>Upvotes</strong></span> 13
                            </li>

                            <li class="list-group-item">
                                <i class="fas fa-comment"></i>
                                <span class="pull-left"><strong>Reviews</strong></span> 37
                            </li>

                            <li class="list-group-item">
                                <i class="fas fa-users"></i>
                                <span class="pull-left"><strong>Followers</strong></span> 78
                            </li>
                        </ul>
                    </div>
                </div>


                

            </div>
            <!--/col-3-->

            <div class="col s8">
                <div id="home">
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="input-field col s12">
    					        <input id="first_name" name="first_name" type="text" required>
                                <label for="first_name">First Name</label>
                                <div id="first_name_error_box" name="first_name_error_box">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="last_name" name="last_name" type="text" class="validate" required>
  						        <label for="last_name">Last Name</label>
                                <div id="last_name_error_box" name="last_name_error_box"></div>
  					        </div>
                        </div>

                        <div class="form-group">

                           <div class="input-field col s12">
  						        <input id="phone" type="text" class="validate" required>
  						        <label for="phone-confirm">Phone Confirmation</label>
                                <div id="phone_error_box" name="phone_error_box"></div>
  					        </div>
                        </div>
                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="email" type="text" class="validate" required>
  						        <label for="email">Email</label>
                                <div id="email_error_box" name="email_error_box"></div>
  					        </div>
                        </div>
                        <div class="form-group">
                            <div class='input-field col s12'>
                                <input id="birthday_date" type="text" class="datepicker">
                                <label for="birthday_date">Birthday</label>
                                <div id="birthday_error_box" name="birthday_error_box"></div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="password" name="location" type="password" class="validate" required>
  						        <label for="password">Password</label>
                            <div id="password_error_box" name="password_error_box"></div>
  					</div>
                        </div>
                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="password-confirm" name="password-confirm" type="password" class="validate" required>
                                <label for="password-confirm">Password Confirmation</label>
                                <div id="password_confirm_error_box" name="password_confirm_error_box"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" onclick="validateForm()"><i class="glyphicon glyphicon-ok-sign"></i>
                                    Save</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
</body>

</html>
