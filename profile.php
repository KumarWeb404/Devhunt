<?php
session_start();
(isset($_GET['msg'])) ? $id = $_GET['msg'] : $id = $_SESSION['id'];
include "link.php";
$q = "Select * from `user` where id='$id'";
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
    <style>
        #ico i {
            margin: 20px;
        }
    </style>
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
                    if (isset($_SESSION['name'])) {

                    ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenu" data-toggle="dropdown">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p><?php
                                    echo $_SESSION['name'];
                                    ?></p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class=" dropdown-item" href="profile.php">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>My Profile</p>
                                </a>
                                <a class="dropdown-item" href="my_projects.php">
                                    <i class="now-ui-icons design_image"></i>
                                    <p>My Projects</p>
                                </a>
                                <a href="view_messages.php?msg=<?php echo $id; ?>" class="dropdown-item">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                    <p>Messages</p>
                                </a>
                                <a class="dropdown-item" href="edit_profile.php">
                                    <i class="now-ui-icons business_badge"></i>
                                    <p>Edit Profile</p>
                                </a>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="now-ui-icons tech_mobile"></i>
                                    <p>Logout</p>
                                </a>
                            </div>
                        </li>
                    <?php } ?>
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
                    if ($data['profile_img'] !== '') {

                    ?>
                        <img src="uploads/<?php echo $data['profile_img']; ?>" height="100" alt="profile_img">
                    <?php
                    } else {
                    ?>
                        <img src="assets/img/profile-sample.png" alt="">
                    <?php
                    }
                    ?>
                </div>
                <h3 class="title"><?php echo ucfirst($data['name']); ?></h3>
                <p class="category"><?php echo $data['skills']; ?></p>
</div>
</div>
<div class="section">
    <div class="container">
        <div class="button-container">
            <?php if (isset($_SESSION['id'])) {
                if ($_SESSION['id'] !== $data['id']) {
            ?>
                    <a href="hire.php?msg=<?php echo $data['id']; ?>" class="btn btn-primary btn-round btn-lg">Hire</a>
                <?php } ?>
            <?php } else { ?>
                <a href="#button" class="btn btn-primary btn-round btn-lg">Hire</a>

            <?php } ?>
            <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="" data-original-title="Follow me on Twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="" data-original-title="Follow me on Instagram">
                <i class="fa fa-instagram"></i>
            </a>

        </div>
        <h3 class="title">About me</h3>
        <h5 class="description text-center">
            <?php if (isset($_SESSION['name'])) {
                if ($data['user_description'] !== "") {
                    echo $data['user_description'];
                } else {
                    echo "<div class='container'>
                             <div class='row'>
                                 <div class='col-md-6 mr-auto ml-auto text-center'>
                                     <a href='edit_profile.php'> <button class='btn btn-primary btn-round btn-lg'>Add Description </button></a>
                                 </div>
                             </div>
                             </div>";
                }
            }
            ?></h5>
        <!-- UNDER-MAINTENANCE v -->
        
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title text-center">Portfolio</h4>
                    <div class="nav-align-center">
                        <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tablist">
                                    <i class="now-ui-icons design_image"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tablist">
                                    <i class="now-ui-icons design-2_ruler-pencil"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home" role="tablist">
                                    <i class="now-ui-icons travel_info"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <h4 class="title text-center">My Projects</h4>
                            <?php
                            $a = "Select * from `projects` where user_id ='$id' ";
                            $b = mysqli_query($link, $a);
                            if (mysqli_num_rows($b) > 0) {

                            ?>
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php
                                        for ($i = 0; $i < mysqli_num_rows($b); $i++) {

                                        ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {
                                                                                                                                echo "class='active'";
                                                                                                                            } ?>></li>
                                        <?php } ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php
                                        $num = 1;
                                        foreach ($b as $info) {

                                        ?>
                                            <div class="carousel-item <?php if ($num <= 1) {
                                                                            echo "active";
                                                                        } ?>">
                                                <img class="d-block w-100" style="height: 616px;" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" src="uploads/<?php echo $info['image']; ?>" data-holder-rendered="true">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <a href="view_project.php?msg=<?php echo $info['user_id']; ?>&&id=<?php echo $info['id']; ?>" class="btn btn-primary btn-round">View Project</a>
                                                </div>
                                            </div>
                                        <?php
                                            $num++;
                                        }
                                        ?>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php
                            } else {
                                echo "<div class='container'>
                                <div class='row'>
                                    <div class='col-md-6 mr-auto ml-auto text-center'>
                                        <a href='add_project.php'> <button class='btn btn-primary btn-round btn-lg'>Add Project</button></a>
                                    </div>
                                </div>
                                </div>";
                            }
                            ?>
                        </div>
                        <!-- UNDER-MAINTENANCE ^ -->

                        <!-- <div class="row">
                                <div class="col-md-6 mr-auto ml-auto text-center">
                                    <a href="add_project.php"> <button class="btn btn-primary btn-round btn-lg">Add Projects</button></a>

                                </div>
                            </div> -->


                        <!-- UNDER-MAINTENANCE v  THIS WOULD BE THE SECTION FOR DISPLAYING THE KNOWN TECHNOLOGIES -->

                        <div class="tab-pane" id="messages" role="tabpanel">
                            <h4 class="title text-center">Technologies Known</h4>
                            <div class="row">
                                <?php

                                $x = "Select * from `user` where id= '$id'";
                                $y = mysqli_query($link, $x);
                                $output = mysqli_fetch_assoc($y);

                                $input = explode(',', $output['tech_known']);
                                for ($i = 0; $i < count($input); $i++) {
                                    if ($input[$i] == "html") {
                                        echo " <div class='col-md-3'>
                             <div class='info'>
                     <div class='icon icon-primary icon-circle'>
                <i class='fa-brands fa-html5' style='color: #f96332;'></i>

                 </div>
                <h4 class='info-title'>HTML</h4>
              </div>
               </div>";
                                    } else if ($input[$i] == "css") {
                                        echo " <div class='col-md-3'>
                      <div class='info'>
                 <div class='icon icon-info icon-circle'>
                <i class='fa-brands fa-css3-alt' style='color: #007bff;'></i>
            </div>
            <h4 class='info-title'>CSS</h4>
        </div>
    </div>";
                                    } else if ($input[$i] == "bootstrap") {
                                        echo " <div class='col-md-3'>
        <div class='info'>
            <div class='icon icon-circle' style='-webkit-box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);'>
                <i class='fa-brands fa-bootstrap' style='color:#563d7c;' ></i>

            </div>
            <h4 class='info-title'>Bootstrap</h4>
        </div>
    </div>";
                                    } else if ($input[$i] == "javascript") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-warning icon-circle'>
            <i class='fa-brands fa-js' style='color: #f7df1e;'></i>

        </div>
        <h4 class='info-title'>Javascript</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "php") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-circle' style = '-webkit-box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);
        box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);'>
            <i class='fa-brands fa-php' style='color:#474A8A;'></i>

        </div>
        <h4 class='info-title'>PHP</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "mysql") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-solid fa-database'></i>

        </div>
        <h4 class='info-title'>MySQL</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "react") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-info icon-circle'>
            <i class='fa-brands fa-react' style='color: #61DBFB;'></i>

        </div>
        <h4 class='info-title'>React</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "vue.js") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-success icon-circle'>
            <i class='fa-brands fa-vuejs' style='color: #41B883;'></i>

        </div>
        <h4 class='info-title'>Vue.Js</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "angular") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-angular' style='color: #B52E31;'></i>

        </div>
        <h4 class='info-title'>Angular</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "node.js") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-success icon-circle'>
            <i class='fa-brands fa-node' style='color: #68A063;'></i>

        </div>
        <h4 class='info-title'>Node.Js</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "swift") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-swift' style='color: #f05138;'></i>

        </div>
        <h4 class='info-title'>Swift</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "git") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-git' style='color: #F1502F;'></i>

        </div>
        <h4 class='info-title'>Git</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "sass") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-sass'></i>

        </div>
        <h4 class='info-title'>Sass</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "java") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-info icon-circle'>
            <i class='fa-brands fa-java' style='color: #5382a1;'></i>

        </div>
        <h4 class='info-title'>Java</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "rust") {
                                        echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-rust'></i>

        </div>
        <h4 class='info-title'>Rust</h4>
    </div>
</div>";
                                    } else if ($input[$i] == "ps") {
                                        echo "<div class='col-md-3'>
                                          <div class='info'>
                                           <div class='icon icon-info icon-circle'>
                                               <img class='mt-4' src='assets/img/photoshop.png' width='30'>
 
                                               </div>
                                               <h4 class='info-title'>Photoshop</h4>
                                           </div>
                                           </div>";
                                    } else if ($input[$i] == "ai") {
                                        echo " <div class='col-md-3'>
                                          <div class='info'>
                                              <div class='icon icon-primary icon-circle'>
                                                 <img class='mt-4' src='assets/img/illustrator.png' width='30'>

                                              </div>
                                              <h4 class='info-title'>Illustrator</h4>
                                          </div>
                                      </div>";
                                    } else if ($input[$i] == "xd") {
                                        echo "  <div class='col-md-3'>
                                            <div class='info' >
                                                <div class='icon icon-circle' style = '-webkit-box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);
                                                  box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);'>
                                                   <img class='mt-4' src='assets/img/xd.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>XD</h4>
                                            </div>
                                        </div>";
                                    } else if ($input[$i] == "excel") {
                                        echo " <div class='col-md-3'>
                                         <div class='info'>
                                             <div class='icon icon-success icon-circle'>
                                                <img class='mt-4' src='assets/img/excel.png' width='30'>

                                             </div>
                                             <h4 class='info-title'>MS Excel</h4>
                                         </div>
                                     </div>";
                                    } else if ($input[$i] == "in") {
                                        echo "<div class='col-md-3'>
                                            <div class='info'>
                                                <div class='icon icon-danger icon-circle'>
                                                   <img class='mt-4' src='assets/img/indesign.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>Indesign</h4>
                                            </div>
                                        </div>";
                                    } else if ($input[$i] == "word") {
                                        echo "  <div class='col-md-3'>
                                            <div class='info'>
                                                <div class='icon icon-info icon-circle'>
                                                   <img class='mt-4' src='assets/img/word.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>MS Word</h4>
                                            </div>
                                        </div>";
                                    } else if ($input[$i] == "ppt") {
                                        echo "
                                            <div class='col-md-3'>
                                                <div class='info'>
                                                    <div class='icon icon-primary icon-circle'>
                                                       <img class='mt-4' src='assets/img/powerpoint.png' width='30'>

                                                    </div>
                                                    <h4 class='info-title'>MS PowerPoint</h4>
                                                </div>
                                            </div>";
                                    } else if ($input[$i] == "figma") {
                                        echo " <div class='col-md-3'>
                                            <div class='info'>
                                                <div class='icon icon-primary icon-circle'>
                                                   <img class='mt-4' src='assets/img/figma.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>Figma</h4>
                                            </div>
                                        </div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- UNDER-MAINTENANCE ^ -->

                        <div class="tab-pane" id="home" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8 col-md-10 mx-auto">
                                    <div class="card card-contact card-raised">

                                        <div class="card-header text-center mt-2">
                                            <h4 class="card-title">Personal Info</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="info info-horizontal">
                                                        <div class="icon icon-primary">
                                                            <i class="now-ui-icons education_hat"></i>
                                                        </div>
                                                        <div class="description">
                                                            <h5 class="info-title">Education</h5>
                                                            <p><?php echo $data['qualification']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info info-horizontal">
                                                        <div class="icon icon-primary">
                                                            <i class="now-ui-icons business_briefcase-24"></i>
                                                        </div>
                                                        <div class="description">
                                                            <h5 class="info-title">Employment State</h5>
                                                            <p><?php echo ucfirst($data['current_working']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="info info-horizontal">
                                                        <div class="icon icon-primary">
                                                            <i class="now-ui-icons education_glasses"></i>
                                                        </div>
                                                        <div class="description">
                                                            <h5 class="info-title">Experience</h5>
                                                            <p><?php echo $data['experience'] . " year"; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info info-horizontal">
                                                        <div class="icon icon-primary">
                                                            <i class="now-ui-icons emoticons_satisfied"></i>
                                                        </div>
                                                        <div class="description">
                                                            <h5 class="info-title">Gender</h5>
                                                            <p><?php echo ucfirst($data['gender']); ?></p>
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
                                                            <h5 class="info-title">Date Of Birth</h5>
                                                            <p><?php echo $data['dob']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info info-horizontal">
                                                        <div class="icon icon-primary">
                                                            <i class="now-ui-icons location_pin"></i>
                                                        </div>
                                                        <div class="description">
                                                            <h5 class="info-title">Address</h5>
                                                            <p><?php echo $data['address']; ?></p>
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
    </div>
</div>
<?php
if (isset($_GET['msg'])) {
if($_GET['msg'] !== $_SESSION['id']){


?>
    <div class="contactus-2">

        <div class="col-lg-8 col-md-10 mx-auto">
            <h4 class="title text-center">Contact Me</h4>
            <div class="card card-contact card-raised px-5">
                <?php
                if (isset($_POST['submit'])) {
                    if (isset($_SESSION['name'])|| isset($_SESSION['emp'])) {
                        include "link.php";
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        $n = "Insert into `user_message`(`user_id`,`name`, `email`, `message`) values('$id','$name','$email','$message')";
                        $p = mysqli_query($link, $n);

                        if ($p > 0) { ?>
                          <div class="alert alert-success" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons ui-2_like"></i>
                        </div>
                        <strong>Message Sent!</strong> Your Message is Successfully Delivered.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
                       <?php } else {?>
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
                      <?php  }
                    } else {
                        echo "<script>window.location.assign('login_as.php')</script>";
                    }
                }
                ?>
                <form id="contact-form" method="post" onsubmit="return checkprofile()">
                    <div class="row my-4">
                        <div class="col-md-6 pr-2 ">
                            <label>Full name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                                </div>
                                <input type="text" id="profile_name" name="name" class="form-control" placeholder="Your Name..." required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-2">
                            <label>Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                                </div>
                                <input type="email" name="email" id="profile_email" class="form-control" placeholder="Your Email...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="6" id="profile_message" placeholder="Your Message..." required></textarea>
                    </div>
                    <div class="submit text-center mb-3">
                        <input type="submit" name="submit" class="btn btn-primary btn-raised btn-round" value="Send Message" />
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } }?>
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
<script>
    function checkprofile() {
        var name = document.getElementById('profile_name').value;
        var email = document.getElementById('profile_email').value;
        var message = document.getElementById('profile_message').value;
        if (name == '' || email == ''|| message == '') {
            alert('Please fill complete form.');
            return false;
        }
        var namePatt = /^[a-zA-Z'-'\s]*$/;
        if (!namePatt.test(name)) {
            alert('Enter Valid Name');
            return false;
        }
        var emailPatt = /^[a-zA-Z0-9\.\_\-]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/;
        if (!emailPatt.test(email)) {
            alert('Enter Valid Email');
            return false;
        }
    }
</script>
<script src="https://kit.fontawesome.com/f14c42943e.js" crossorigin="anonymous"></script>

</html>