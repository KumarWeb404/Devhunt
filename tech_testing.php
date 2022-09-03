<!DOCTYPE html>
<html lang="en">

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

    <!-- This style is only for contacts page -->
    <style>
        .error {
            color: red;
            size: 80%
        }

        .hidden {
            display: none;
        }
    </style>
    <!-- This style is only for contacts page -->

</head>

<body>
    <h4 class="card-title text-center">Technologies Known</h4>
    

</body>
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
        '../../../../connect.facebook.net/en_US/fbevents.js'
    );

    try {
        fbq('init', '111649226022273');
        fbq('track', 'PageView');
    } catch (err) {
        console.log('Facebook Track Error:', err);
    }
</script>
<script>
    function checkAbout() {
        var name = document.getElementById('about_name').value;
        var email = document.getElementById('about_email').value;
        if (name == '' || email == '') {
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

    function checkValues() {
        var name = document.getElementById('name').value;
        var password = document.getElementById('password').value;
        var email = document.getElementById('email').value;
        if (name == '' || password == '' || email == '') {
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
        var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (!re.test(password)) {
            alert('Your password must be of at least 8 Characters, must contain a Capital letter, a Small letter, a Number, a Symbol and should not contain Whitespace.');
            return false;
        }
    }
</script>

</html>