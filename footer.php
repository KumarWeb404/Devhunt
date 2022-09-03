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
  function accept(){
    let txt;
    if (confirm("Are you Sure you want to Accept the Proposal!")) {
    txt = "ok";
  } else {
    txt = "cancel";
  }
  }
  function checkAbout(){
    var name = document.getElementById('about_name').value;
    var email = document.getElementById('about_email').value;
    var skill = document.getElementById('about_skill').value;
    if (name == '' || email == ''|| skill =='') {
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
function checkContact(){
    var name = document.getElementById('contact_name').value;
    var email = document.getElementById('contact_email').value;
    var subject = document.getElementById('contact_subject').value;
    var message = document.getElementById('contact_message').value;

    if (name == '' || email == ''|| subject ==''|| message == '') {
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
<script src="https://kit.fontawesome.com/f14c42943e.js" crossorigin="anonymous"></script>
<script src="assets/js/view.php"></script>
</html>