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
    <link href="css/reviews.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>

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
                    <?php echo $usr->username; ?>
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

    <div class="container" id="personal" style="display:cell;">

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
                        <div id="change_picture_div" style="padding-bottom:5px;">
                        <button class="btn waves-effect waves-light" style="width: 100%;" id="change_picture" name="action">Change Picture</button>
                        </div>
                        <div id="upload_file_div">
                        <button class="btn waves-effect waves-light" style="width: 100%;" id="edit_profile" onclick="edit_profile()" name="action">Edit Profile</button>
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
                <div id="display_actions" style="display:cell;">
                  <button class="btn waves-effect waves-light" style="width: 100%;" id="user_actions" name="action">Actions</button>
                </div>
                <div id="actions_for_user" class="card" style="display:none;">
                  <div style="padding:5px;text-align:center;">
                    <h5 style="font-weight:bold;">Actions</h5>
                  </div>
                  <div style="padding-bottom:5px;padding-top:5px;padding-left:5px;padding-right:5px;">
                    <button class="btn waves-effect waves-light" style="width: 100%;" id="get_reviews" name="action">Past Reviews</button>
                  </div>
                  <?php
                    function user_has_permissions($user) {
                      // the permissions will change according to the excersize.
                      // for now its for Admin user only
                      return $user->isAdmin();
                    }

                    if (user_has_permissions($usr)) {
                      echo '<div style="padding-bottom:5px;padding-left:5px;padding-right:5px;">';
                      echo '<button class="btn waves-effect waves-light" style="width: 100%;" id="upload_file" name="action">Upload File</button>';
                      echo '</div>';
                    }
                  ?>
                </div>
            </div>

            <!--/col-3-->
            <div>
            </div>
            <div class="col s8">
                <div id="home">
                    <div  id="registrationForm">
                        <div class="form-group">

                            <div class="input-field col s12">
    					        <input id="first_name" name="first_name" type="text" disabled value="<?php echo $usr->first_name; ?>" required>
                                <label for="first_name">First Name</label>
                                <div id="first_name_error_box" name="first_name_error_box">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="last_name" name="last_name" type="text" class="validate" disabled value="<?php echo $usr->last_name; ?>" required>
  						        <label for="last_name">Last Name</label>
                                <div id="last_name_error_box" name="last_name_error_box"></div>
  					        </div>
                        </div>

                        <div class="form-group">

                           <div class="input-field col s12">
  						        <input id="phone" type="text" class="validate" disabled value="<?php echo $usr->phone; ?>" required>
  						        <label for="phone-confirm">Phone Confirmation</label>
                                <div id="phone_error_box" name="phone_error_box"></div>
  					        </div>
                        </div>
                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="email" type="text" class="validate" disabled value="<?php echo $usr->email; ?>" required>
  						        <label for="email">Email</label>
                                <div id="email_error_box" name="email_error_box"></div>
  					        </div>
                        </div>
                        <div class="form-group">
                            <div class='input-field col s12'>
                                <input id="birthday_date" type="text" class="datepicker" disabled value="<?php echo $usr->birthday; ?>">
                                <label for="birthday_date">Birthday</label>
                                <div id="birthday_error_box" name="birthday_error_box"></div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="password" name="location" type="password" class="validate" disabled value="<?php echo $usr->password; ?>" required>
  						        <label for="password">Password</label>
                            <div id="password_error_box" name="password_error_box"></div>
  					</div>
                        </div>
                        <div class="form-group">

                            <div class="input-field col s12">
  						        <input id="password-confirm" name="password-confirm" type="password" class="validate" disabled value="<?php echo $usr->password; ?>" required>
                                <label for="password-confirm">Password Confirmation</label>
                                <div id="password_confirm_error_box" name="password_confirm_error_box"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button id="save_info_button" class="btn btn-lg btn-success" onclick="validateForm()" name="action" disabled><i class="glyphicon glyphicon-ok-sign"></i>
                                    SAVE</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    </div>

    <div class="row" id="comments_all" style="display:none;">
        <?php 
            $reviewsCount = count($reviews['reviews']);
        ?>
        <div class="col s12">
            <h3 style="font-weight:bold;padding-bottom: 20px">Past Reviews: <?php echo $reviewsCount?></h3>
            <ul class="collection" id="past_reviews">
                <?php
                    // construct reviews
                    function construct_comment($profile_img,$name,$review,$score) {
                        $comment_item = "";
                        $comment_item .= '<li class="collection-item avatar">';
                        $comment_item .= '<img src="' . $profile_img . '" alt="" class="circle">';
                        $comment_item .= '<p>' . $name . '<br><br>';
                        $comment_item .= $review;
                        $comment_item .= '</p>';
                        $comment_item .= '<a href="#!" class="secondary-content">';
                        for($i = 0; $i < $score; $i++){
                            $comment_item .= '<i class="material-icons">grade</i>';
                        }
                        $comment_item .= '</a>';
                        $comment_item .= '</li>';
                
                        return $comment_item;
                    } 
                    
                    foreach($reviews as $entry) {
                        //$reviewItem = new Review($entry);
                        $reviewText = $entry['comment'];
                        $number_of_stars = $entry['star_rating'];
                        $profile_image = $entry['profile_picture'];
                        $name = $entry['username'];

                        
                        $reviewView = construct_comment($profile_image,$name,$reviewText,$number_of_stars);
                        echo $reviewView;
                    }
                ?>
            </ul>
      </div>

    </div>

<script src="<?php echo base_url('assets/js/toggles.js'); ?>"></script>

</body>

</html>