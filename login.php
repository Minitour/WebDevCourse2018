<?php
  require_once('./model/user.php');

  $cookie_name = "username";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // case post check username and password
      $email = $_POST['email-login'];
      $password = $_POST['password-login'];
      if (!($password == "Admin") || !($email == "Admin")) {
        header("Location: ./login.php?notRegistered=true");
      }else {
        $cookie_value = $email;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        header("Location: ./index.php?#");
      }
      die();
  }

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      // set username cookie to null with 1 ms expiration (remove cookie)
      setcookie($cookie_name, null, 1, "/");
  }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login / register material design form</title>
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
  <link rel="stylesheet" href="css/login_style.css">

</head>

<body>
  <script src="js/jquery.validate.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->

  <script>
    $(document).ready(function(){
        $('.datepicker').datepicker();
        $('.tabs').tabs();
    });
  </script>
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
  <div class="container white z-depth-2">
	<ul class="tabs">
		<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
		<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
	</ul>
	<div id="login" class="col s12">
		<form class="col s12" method="POST" action="login.php">
			<div class="form-container">
				<h3>Hello</h3>
        <?php
          if (isset($_GET['notRegistered'])) {
            //var_dump($_GET['notRegistered']);
            echo "<h6 style='color:red;'>The user is not registered, try again or please register</h6>";
          }
        ?>
				<div class="row">
					<div class="input-field col s12">
						<input id="email-login" name="email-login" type="text" class="validate" required>
						<label for="email-login">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password-login" name="password-login" type="password" class="validate" required>
						<label for="password-login">Password</label>
					</div>
				</div>
				<br>
				<center>
					<!-- <div class="btn waves-effect waves-light" id="action">Connect to</div> -->
          <button class="btn waves-effect waves-light" type="submit" name="action">Connect</button>
					<br>
					<br>
					<a href="">Forgotten password?</a>
				</center>
			</div>
		</form>
	</div>
	<div id="register" class="col s12" style="display:flex;flex-direction: column;min-height: 110vh;">
		<form id="register-form" name="register-form" method="post" action="login.php#register" class="col s12">
			<div class="form-container">
  				<h3>Welcome</h3>
  				<div class="row">
    				<div class="input-field col s12">
    					<input id="first_name" name="first_name" type="text" required>
              <label for="first_name">First Name</label>
              <div id="first_name_error_box" name="first_name_error_box">

              </div>
            </div>
          </div>
          <div class="row">
  				  <div class="input-field col s12">
  						<input id="last_name" name="last_name" type="text" class="validate" required>
  						<label for="last_name">Last Name</label>
              <div id="last_name_error_box" name="last_name_error_box"></div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="email" type="text" class="validate" required>
  						<label for="email">Email</label>
              <div id="email_error_box" name="email_error_box"></div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="phone" type="text" class="validate" required>
  						<label for="phone-confirm">Phone Confirmation</label>
              <div id="phone_error_box" name="phone_error_box"></div>
  					</div>
  				</div>
          <div class="row">
            <div class='input-field col s12'>
              <input id="birthday_date" type="text" class="datepicker" required>
              <label for="birthday_date">Birthday</label>
              <div id="birthday_error_box" name="birthday_error_box"></div>
            </div>
          </div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="password" type="password" class="validate" required>
  						<label for="password">Password</label>
              <div id="password_error_box" name="password_error_box">
  					</div>
            </div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="password-confirm" name="password-confirm" type="password" class="validate" required>
              <label for="password-confirm">Password Confirmation</label>
              <div id="password_confirm_error_box" name="password_confirm_error_box"></div>
            </div>
  				</div>
  				<center>
  					<button class="btn waves-effect waves-light" type="submit" id="submit_button" onclick="validateForm()" name="action">Register</button>
  				</center>
          <div style="text-align:center;" id="submit_message_div"></div>
			</div>
		</form>
	</div>
</div>

</body>

</html>
