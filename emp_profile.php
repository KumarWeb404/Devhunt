<?php
session_start();
(isset($_GET['msg'])) ?  $id = $_GET['msg'] : $id = $_SESSION['id'];
include "link.php";
$q = "Select * from `employer` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
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

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700" rel="stylesheet" />
    <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit5438.css?v=1.2.0" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body class="profile-page">

    <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent" color-on-scroll="300">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="index.php" rel="tooltip" data-placement="bottom">
                    Devhunt
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" data-nav-image="assets/img/blurred-image-1.jpg" data-color="orange">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="now-ui-icons design_app"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="about-us.php" class="nav-link">
                            <i class="now-ui-icons files_paper" aria-hidden="true"></i>
                            <p>About-us</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="projects.php" class="nav-link ">
                            <i class="now-ui-icons design_image" aria-hidden="true"></i>
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contact-us.php" class="nav-link">
                            <i class="now-ui-icons tech_mobile" aria-hidden="true"></i>
                            <p>contact-us</p>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['emp'])) {

                    ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenu" data-toggle="dropdown">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p><?php
                                    echo $_SESSION['emp'];
                                    ?></p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class=" dropdown-item" href="emp_profile.php">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>my profile</p>
                                </a>
                                <a href="view_messages.php?msg=<?php echo $id; ?>" class="dropdown-item">
                                    <i class="now-ui-icons now-ui-icons ui-1_email-85"></i>
                                    <p>Messages</p>
                                </a>
                                <a class="dropdown-item" href="edit_emp.php">
                                    <i class="now-ui-icons business_badge"></i>
                                    <p>edit profile</p>
                                </a>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="now-ui-icons tech_mobile"></i>
                                    <p>logout</p>
                                </a>
                            </div>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a href="login-page.php" class="nav-link ">
                                <i class="now-ui-icons users_circle-08" aria-hidden="true"></i>
                                Login
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image " data-parallax="true" style="background-image: url(assets/img/bg5.jpg); transform: translate3d(0px, 0px, 0px);">
            </div>
            <div class="content-center">
                <div class="photo-container">
                    <?php
                    if ($data['image'] !== '') {

                    ?>
                        <img src="uploads/<?php echo $data['image']; ?>" style="width: 100px; height:100px;" alt="profile_img">
                    <?php
                    } else {
                    ?>
                        <img src="assets/img/profile-sample.png" style="width: 100px; height:100px;" alt="">
                    <?php
                    }
                    ?>
                </div>
                <h3 class="title"><?php echo ucfirst($data['name']); ?></h3>
                <p class="category"><?php echo "Employer"; ?></p>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="button-container">
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="" data-original-title="Follow me on Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="" data-original-title="Follow me on Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>

                </div>
                <h3 class="title">About Me</h3>
                <h5 class="description text-center">
                    <?php if ($data['emp_desc'] !== "") {
                        echo $data['emp_desc'];
                    } else {
                        echo "<div class='container'>
                             <div class='row'>
                                 <div class='col-md-6 mr-auto ml-auto text-center'>
                                     <a href='edit_emp.php'> <button class='btn btn-primary btn-round btn-lg'>Add Description </button></a>
                                 </div>
                             </div>
                             </div>";
                    } ?></h5>
                <!-- UNDER-MAINTENANCE v -->

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title text-center">Personal Info</h4>
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto">
                                <div class="card card-contact card-raised">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="info info-horizontal">
                                                    <div class="icon icon-primary">
                                                        <i class="now-ui-icons business_bank"></i>
                                                    </div>
                                                    <div class="description">
                                                        <h5 class="info-title">Company Name</h5>
                                                        <p><?php echo ucwords($data['company_name']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info info-horizontal">
                                                    <div class="icon icon-primary">
                                                        <i class="now-ui-icons location_world"></i>
                                                    </div>
                                                    <div class="description">
                                                        <h5 class="info-title">Website (URL)</h5>
                                                        <p><?php echo $data['website']; ?></p>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="info info-horizontal">
                                                    <div class="icon icon-primary">
                                                        <i class="now-ui-icons ui-1_calendar-60"></i>
                                                    </div>
                                                    <div class="description">
                                                        <h5 class="info-title">Company Established In</h5>
                                                        <p><?php echo $data['started_in'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info info-horizontal">
                                                    <div class="icon icon-primary">
                                                        <i class="now-ui-icons location_pin"></i>
                                                    </div>
                                                    <div class="description">
                                                        <h5 class="info-title">Company Address</h5>
                                                        <p><?php echo $data['company_address']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) {
        ?>
            <div class="contactus-2">

                <div class="col-lg-8 col-md-10 mx-auto">
                    <h4 class="title text-center">Contact Me</h4>
                    <div class="card card-contact card-raised px-5">
                        <?php
                        if (isset($_POST['submit'])) {
                            if (isset($_SESSION['name'])) {
                                include "link.php";
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $message = $_POST['message'];

                                $n = "Insert into `user_message`(`user_id`,`name`, `email`, `message`) values('$id','$name','$email','$message')";
                                $p = mysqli_query($link, $n);

                                if ($p > 0) {
                                    echo " <div class='alert alert-primary' role='alert'>
              Message Sent!!
            </div>";
                                } else {
                                    echo " <div class='alert alert-danger' role='alert'>
              Something Went Wrong!!
            </div>";
                                }
                            } else {
                                echo "<script>window.location.assign('login-page.php')</script>";
                            }
                        }
                        ?>
                        <form id="contact-form" method="post" onsubmit="return checkAbout()">
                            <div class="row my-4">
                                <div class="col-md-6 pr-2 ">
                                    <label>Full name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                                        </div>
                                        <input type="text" id="about_name" name="name" class="form-control" placeholder="Your Name..." required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-2">
                                    <label>Email address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                                        </div>
                                        <input type="email" name="email" id="about_email" class="form-control" placeholder="Your Email...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" rows="6" placeholder="Your Message..." required></textarea>
                            </div>
                            <div class="submit text-center mb-3">
                                <input type="submit" name="submit" class="btn btn-primary btn-raised btn-round" value="Send Message" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
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