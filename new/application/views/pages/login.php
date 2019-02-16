<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login / Register </title>
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login_style.css');?>">

</head>

<body>
	<script src="<?php echo base_url('assets/vendor/jquery.validate.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/login.js'); ?>"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>

  <div class="container white z-depth-2">
	<ul class="tabs">
		<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
		<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
	</ul>
	<div id="login" class="col s12">
		<form class="col s12" method="POST" action="signin">
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
		<form id="register-form" name="register-form" method="post" action="create" class="col s12">
			<div class="form-container">
					<h3>Welcome</h3>
					<div class="row">
    				<div class="input-field col s12">
    					<input id="username" name="username" type="text" required>
              <label for="username">Username</label>
              <div id="username_error_box" name="username_error_box">
              </div>
            </div>
          </div>
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
  						<input id="email-register" type="text" class="validate" required>
  						<label for="email">Email</label>
              <div id="email_error_box" name="email_error_box"></div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="phone-register" type="text" class="validate" required>
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
  						<input id="password-register" type="password" class="validate" required>
  						<label for="password-register">Password</label>
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
