<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login / register material design form</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
  <link rel="stylesheet" href="css/login_style.css">



</head>

<body>
  <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
  <script src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/1.4.1/js/bootstrap.min.js"></script>
<script>

$(document).ready(function () {

$('#register-form').validate({
    rules: {
        first_name: {
            minlength: 2,
            required: true
        },
        last_name: {
            minlength: 2,
            required: true
        }
    },
    errorPlacement: function(error, element) {
      // getting the element id to insert red style
      var elemntName = element['0']['id'] + "-error";

      // appending the error message to the element destination
      error.appendTo( element.parent("div").next("div") );

      // getting the label we added and setting the color attribute to red
      var label = document.getElementById(elemntName);
      label.setAttribute("style", "color:red;");
    }
});
});

</script>
  <div class="container white z-depth-2" style="height:900px;">
	<ul class="tabs">
		<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
		<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
	</ul>
	<div id="login" class="col s12">
		<form class="col s12" method="POST" action="index.php">
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
	<div id="register" class="col s12">
		<form id="register-form" name="register-form" method="post" action="login.php#register" class="col s12">
			<div class="form-container">
  				<h3>Welcome</h3>
  				<div class="row">
    				<div class="input-field col s12">
    					<input id="first_name" name="first_name" type="text" required>
              <label for="first_name">First Name</label>
            </div>
            <div id="first_name_error_box" name="first_name_error_box">
            </div>
          </div>
          <div class="row">
  				  <div class="input-field col s12">
  						<input id="last_name" name="last_name" type="text" class="validate" required>
  						<label for="last_name">Last Name</label>
  					</div>
            <div style="color:red;">
            </div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="email" type="email" class="validate" required>
  						<label for="email">Email</label>
              <h6 id="email_validation"></h6>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="phone" type="text" class="validate" required>
  						<label for="phone-confirm">Phone Confirmation</label>
              <h6 id="phone-confirm_validation"></h6>
  					</div>
  				</div>
          <div class="row">
            <div class="input-field col s12">
              <div class="input-field input-append date">
                <input type="text" class="form-control birthday" name="birthday" id="birthday" placeholder="MM/DD/YYYY">
                <span class="input-field-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
              <label for="birthday">Birthday</label>
              <h6 id="birthday_validation"></h6>
            </div>
          </div>
          <script type="text/javascript">
            $(document).ready(function () {
              $('.birthday').datepicker({
                format: 'mm/d/yyyy'
              });
              var birthday_field = document.getElementById("birthday");
              birthday_field.setAttribute("style", "");
            });
          </script>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="password" type="password" class="validate" required>
  						<label for="password">Password</label>
              <h6 id="password_validation"></h6>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="password-confirm" type="password" class="validate" required>
  						<label for="password-confirm">Password Confirmation</label>
              <h6 id="password-confirm_validation"></h6>
  					</div>
  				</div>
  				<center>
  					<input class="btn waves-effect waves-light" type="submit" value="Submit">
  				</center>
			</div>
		</form>
	</div>
</div>

    <!-- <script  src="js/login.js"></script> -->

</body>

</html>
