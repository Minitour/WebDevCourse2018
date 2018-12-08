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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/4-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>

<body>
    <hr>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
    </nav>
    <div class="container bootstrap snippet">

        <div class="row">
            <div class="col-sm-3">
                <!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="border-radius: 100px" class="avatar img-circle img-thumbnail"
                        alt="avatar">

                </div>
                <br>
                <div>
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload">
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
            <!--/col-3-->
            <div class="col-sm-9">
                <div id="home">
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h5>First name</h5>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name"
                                    title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h5>Last name</h5>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name"
                                    title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>Phone</h5>
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone"
                                    title="enter your phone number if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h5>Email</h5>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com"
                                    title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="birthday">
                                    <h5>Birthdate</h5>
                                </label>
                                <div class="input-group input-append date">
                                  <input type="text" class="form-control birthday" name="birthday" id="birthday" placeholder="MM/DD/YYYY">
                                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                        </div>
                        <script type="text/javascript">
                          $(document).ready(function () {
                            $('.birthday').datepicker({
                              format: 'mm/d/yyyy'
                            });
                          });
                        </script>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="location">
                                    <h5>Location</h5>
                                </label>
                                <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h5>Password</h5>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password"
                                    title="enter your password.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok-sign"></i>
                                    Save</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                </div>
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
</body>

</html>
