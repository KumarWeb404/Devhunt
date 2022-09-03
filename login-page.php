<?php
session_start();
($_GET['msg'] == 'dev') ? $role = "user" : $role = "employer";
$msg = $_GET['msg'];
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Devhunt</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-kit5438.css?v=1.2.0" rel="stylesheet" />

  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php"> Devhunt </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" data-nav-image="assets/img/blurred-image-1.jpg" data-color="orange">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="now-ui-icons design_app"></i>
              <p>home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="about-us.php" class="nav-link">
              <i class="now-ui-icons files_paper" aria-hidden="true"></i>
              <p>about-us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="projects.php" class="nav-link">
              <i class="now-ui-icons design_image" aria-hidden="true"></i>
              <p>projects</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="contact-us.php" class="nav-link">
              <i class="now-ui-icons tech_mobile" aria-hidden="true"></i>
              <p>contact-us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="login_as.php" class="nav-link ">
              <i class="now-ui-icons users_circle-08" aria-hidden="true"></i>
              Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header " filter-color="orange">
    <div class="page-header-image" style="background-image:url(assets/img/login.jpg);"></div>
    <div class="content">
      <div class="container">
      <?php if (isset($_GET['log_msg'])) {
        if($_GET['log_msg'] =='succ'){ ?>
                <div class="alert alert-success" role="alert">
                  <div class="container">
                    <div class="alert-icon">
                      <i class="now-ui-icons ui-2_like"></i>
                    </div>
                    <strong>Well Done!!</strong> You are Successfully Registered .
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                      </span>
                    </button>
                  </div>
                </div>
              <?php }else if (($_GET['log_msg'])=='err'){ ?>
                <div class="alert alert-danger" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons objects_support-17"></i>
                        </div>
                        <strong>Oh snap!</strong> Change a few things up and try submitting again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <?php }}?>
        <div class="row">
          <div class="col-md-5 ml-auto mr-auto">
        
            <div class="card card-login card-plain p-4" data-background-color="white">
            

              <div class="card-body">
                <h2 class="card-title text-center py-2">Login</h2>
              </div>
              <?php
              if (isset($_POST['submit'])) {
                include "link.php";
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $q = "Select * from `$role` where `email` = '$email' and `password` = '$password'";
                $result = mysqli_query($link, $q);
                if (mysqli_num_rows($result) > 0) {
                  $data = mysqli_fetch_assoc($result);
                  $_SESSION['id'] = $data['id'];
                  if ($role == 'user') {
                    $_SESSION['name'] = $data['name'];
                  } else {
                    $_SESSION['emp'] = $data['name'];
                    $_SESSION['company_name'] = $data['company_name'];
                  }
                  //SESSIONS CREATED IN CASE :-
                  // $_SESSION['email'] = $data['email'];
                  // $_SESSION['qual'] = $data['qualification'];
                  // $_SESSION['exp'] = $data['experience'];
                  // $_SESSION['skills'] = $data['skills'];
                  // $_SESSION['current'] = $data['current_working'];
                  // $_SESSION['address'] = $data['address'];
                  // $_SESSION['dob'] = $data['dob'];
                  // $_SESSION['gender'] = $data['gender'];
                  echo "<script>window.location.assign('index.php')</script>";
                } else {
                  echo "<script>window.location.assign('login-page.php?msg=".$msg."&&log_msg=err')</script>";
                }
              }

              ?>
              <form class="form" method="post">
                <div class="input-group form-group-no-border input-lg mt-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="now-ui-icons ui-1_email-85 "></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Your Email...">
                </div>

                <div class="input-group form-group-no-border input-lg mb-5">
                  <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="now-ui-icons text_caps-small "></i></span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Your Password...">
                </div>
                <div class="card-footer text-center">
                  <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg btn-block">
                </div>
                <div class="pull-left">
                  <h6><a href="signup-page.php" class="link footer-link">Create Account</a></h6>
                </div>
                <div class="pull-right">
                  <h6><a href="#pablo" class="link footer-link">Need Help?</a></h6>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer" data-background-color="black">
    <div class="container">
      <nav>
        <ul>
          <li>Devhunt</li>
        </ul>
      </nav>
      <div class="copyright">
        &copy;
        <script>
          document.write(new Date().getFullYear());
        </script>
        , Coded by Kumar.
      </div>
    </div>
  </footer>
  </div>
</body>
</script>
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>

<script src="assets/js/plugins/bootstrap-switch.js"></script>

<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>

<script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>

<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

<script src="assets/js/plugins/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script src="assets/js/now-ui-kit5438.js?v=1.2.0" type="text/javascript"></script>
<script type="text/javascript">
  // Facebook Pixel Code Don't Delete
  !(function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) :
        n.queue.push(arguments);
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s);
  })(
    window,
    document,
    'script',
    'connect.facebook.net/en_US/fbevents.js'
  );

  try {
    fbq('init', '111649226022273');
    fbq('track', 'PageView');
  } catch (err) {
    console.log('Facebook Track Error:', err);
  }
</script>

</html>