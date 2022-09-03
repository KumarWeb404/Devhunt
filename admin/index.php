<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    echo "<script>window.location.assign('admin_login.php?err')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Devhunt</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit5438.css?v=1.2.0" rel="stylesheet" />

    <link href="../assets/css/style.css" rel="stylesheet" />
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
            <div class="collapse navbar-collapse" data-nav-image="../assets/img/blurred-image-1.jpg" data-color="orange">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>home</p>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['admin_name'])) {

                    ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenu" data-toggle="dropdown">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p>Panels</p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class=" dropdown-item" href="users.php">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>users</p>
                                </a>
                                <a class="dropdown-item" href="employer.php">
                                    <i class="now-ui-icons business_badge"></i>
                                    <p>Employers</p>
                                </a>
                                <a class="dropdown-item" href="contact.php">
                                    <i class="now-ui-icons tech_mobile"></i>
                                    <p>Contact</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                <p>logout</p>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-header " filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg);"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto">
                        <div class="card card-login card-plain" data-background-color="white">
                            <div class="card-body pt-5">
                                <h1 class="card-title text-center mt-auto mb-auto">Hello, <?php
                                                                                            echo ucfirst($_SESSION['admin_name']); ?></h1>
                            </div>
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

<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/moment.min.js"></script>

<script src="../assets/js/plugins/bootstrap-switch.js"></script>

<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>

<script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>

<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>

<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script src="../assets/js/now-ui-kit5438.js?v=1.2.0" type="text/javascript"></script>
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
        '../../../../connect.facebook.net/en_US/fbevents.js'
    );

    try {
        fbq('init', '111649226022273');
        fbq('track', 'PageView');
    } catch (err) {
        console.log('Facebook Track Error:', err);
    }
</script>

</html>