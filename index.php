<?php
session_start();
if (isset($_SESSION['id'])) {

  $id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Devhunt</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700" rel="stylesheet" />
  <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-kit5438.css?v=1.2.0" rel="stylesheet" />

  <link href="./assets/css/style.css" rel="stylesheet" />

</head>

<body class="presentation-page">
  <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent" color-on-scroll="500">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/index.php" rel="tooltip" data-placement="bottom">
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
                  <i class="now-ui-icons now-ui-icons ui-1_email-85"></i>
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
            <?php } else if(isset($_SESSION['company_name'])){
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
                  <p>My Profile</p>
                </a>
                <a href="view_messages.php?msg=<?php echo $id; ?>" class="dropdown-item">
                  <i class="now-ui-icons now-ui-icons ui-1_email-85"></i>
                  <p>Messages</p>
                </a>
                <a class="dropdown-item" href="edit_emp.php">
                  <i class="now-ui-icons business_badge"></i>
                  <p>Edit Profile</p>
                </a>
                <a class="dropdown-item" href="logout.php">
                  <i class="now-ui-icons tech_mobile"></i>
                  <p>Logout</p>
                </a>
              </div>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a href="login_as.php" class="nav-link ">
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
    <!-- Section-1 -->
    <div class="page-header clear-filter">
      <div class="rellax-header rellax-header-sky" data-rellax-speed="-4">
        <div class="page-header-image" style="
              background-image: url('assets/img/presentation-page/nuk-pro-back-sky.jpg');
            "></div>
      </div>
      <div class="rellax-header rellax-header-buildings" data-rellax-speed="0">
        <div class="page-header-image page-header-city" style="
              background-image: url('assets/img/presentation-page/nuk-pro-buildings.png');
            "></div>
      </div>
      <div class="rellax-text-container rellax-text">
        <h1 class="h1-seo" data-rellax-speed="-1">Devhunt</h1>
      </div>
      <h3 class="h3-description rellax-text" data-rellax-speed="-1">
        Begin your journey for the Hunt.
      </h3>
    </div>
    <div class="section section-components" data-background-color="dark-red">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">
              Impressive collection of Projects <br /><small class="description">Designed to Help.</small>
            </h2>
            <h5 class="text-center description">
              Devhunt is introduced for all the Web developers/designers and
              the Employers out there, looking to hire (or) be hired.
            </h5>
            <div class="space-50"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SECTION-1 -->

  <!-- UNDER-MAINTENANCE v -->

  <!-- SECTION-2  -->
  <div class="section section-basic-components">
    <div class="container">
      <h2 class="text-center title pb-5">Are You....?</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-pricing">
            <div class="card-body">
              <h6 class="category">Developer</h6>
              <div class="icon icon-primary">
                <i class="now-ui-icons design-2_html5"></i>
              </div>

              <ul>
                <li>Publish Your Personal Projects</li>
                <li>Get Your Code Viewed Among <br> Developers</li>
              </ul>
              <a href="login-page.php" class="btn btn-primary btn-round">Publish</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-pricing">
            <div class="card-body">
              <h6 class="category">Designer</h6>
              <div class="icon icon-primary">
                <i class="now-ui-icons design_palette"></i>
              </div>
              <ul>
                <li>Publish Your Designs</li>
                <li>Get Your Work Rated Among <br> Designers</li>
              </ul>
              <a href="login-page.php" class="btn btn-primary btn-round">Publish</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-pricing">
            <div class="card-body">
              <h6 class="category">Employer</h6>
              <div class="icon icon-primary">
                <i class="now-ui-icons users_single-02"></i>
              </div>
              <ul>
                <li>View Projects, Portfolio's</li>
                <li>Get In Contact <br> and Hire </li>
              </ul>
              <a href="projects.php" class="btn btn-primary btn-round">View Projects</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- SECTION-2  -->

  <div class="separator-line separator-primary"></div>
  <!-- SECTION-3  -->
  <div class="section section-basic-components">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-7 ml-auto mr-auto">
          <h2 class="title">Basic Elements</h2>
          <h6 class="category">The core elements of your website</h6>
          <h5 class="description">We re-styled every Bootstrap 4 element to match the Now UI Kit style. All the Bootstrap 4 components that you need in a development have been re-design with the new look. Besides the numerous basic elements, we have also created additional classes. All these items will help you take your project to the next level.</h5>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="image-container">
            <img class="components-macbook" src="./assets/img/basic-ImResizer.jpg" alt="">
            <img class="table-img" src="./assets/img/presentation-page/table.jpg" alt="">
            <img class="share-btn-img" src="./assets/img/presentation-page/share-btn.jpg" alt="">
            <img class="coloured-card-btn-img" src="./assets/img/html5-without-wordmark-color-ImResizer.jpg" alt="">
            <img class="coloured-card-img" src="./assets/img/presentation-page/coloured-card.jpg" alt="">
            <img class="social-img" src="./assets/img/presentation-page/social-row.jpg" alt="">
            <img class="linkedin-btn-img" src="./assets/img/presentation-page/linkedin-btn.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SECTION-3  -->
  <div class="separator-line separator-primary"></div>
  <!-- SECTION-4  -->
  <div class="section section-cards">
    <div class="container">
      <div class="row">
        <div class="col-md-8 text-center ml-auto mr-auto">
          <div class="section-description">
            <h2 class="title"> Online Portfolio</h2>
            <h6 class="category">Efficiently Designed</h6>
            <h5 class="description">
              From cards designed for blog posts, to product cards or user
              profiles, you will have many options to choose from. All the
              cards follow the Now UI Kit style principles and have a design
              that stands out. We have gone above and beyond with options
              for you to organise your information.
            </h5>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="images-container">
            <div class="image-container1">
              <img src="assets/img/presentation-page/card3.jpg">
            </div>
            <div class="image-container2">
              <img src="assets/img/presentation-page/card6.jpg">
            </div>
            <div class="image-container3">
              <img src="assets/img/presentation-page/card7.jpg">
            </div>
            <div class="image-container4">
              <img src="assets/img/presentation-page/card5.jpg">
            </div>
            <div class="image-container5">
              <img src="assets/img/presentation-page/card4.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section section-content" data-background-color="black">
  </div>
  <!-- SECTION-4  -->
  <!-- UNDER-MAINTENANCE ^ -->

  <footer class="footer" data-background-color="black">
    <div class="container">
      <nav>
        <ul>

          <li>
            Devhunt
          </li>
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

<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/moment.min.js"></script>

<script src="./assets/js/plugins/bootstrap-switch.js"></script>

<script src="./assets/js/plugins/bootstrap-tagsinput.js"></script>

<script src="./assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>

<script src="./assets/js/plugins/jasny-bootstrap.min.js"></script>

<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

<script src="./assets/js/plugins/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script src="./assets/js/now-ui-kit5438.js?v=1.2.0" type="text/javascript"></script>

<script src="./assets/js/plugins/presentation-page/rellax.min.js" type="text/javascript"></script>

<script async defer src="../../../buttons.github.io/buttons.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if ($(window).width() >= 991) {
      setTimeout(function() {
        var rellax = new Rellax('.rellax', {
          center: true,
        });
      }, 5000);

      var rellaxHeader = new Rellax('.rellax-header');
      var rellaxText = new Rellax('.rellax-text');
    }
  });

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
    '../../../connect.facebook.net/en_US/fbevents.js'
  );

  try {
    fbq('init', '111649226022273');
    fbq('track', 'PageView');
  } catch (err) {
    console.log('Facebook Track Error:', err);
  }
</script>

</html>


<!-- Requisition:-
- Employers must go through a form to get in contact with devs/designers.
- A seperate message box for everybody!
- Create a projects and portfolio page.
- Missing a section in the home page.
- A proper logo required.
- Rating system.
- Code technolgies used 
-->