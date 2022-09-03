<?php
require "nav.php"

?>

<div class="page-header section-image">
   <div class="page-header-image" style="background-image:url(assets/img/bg18.jpg);"></div>
   <div class="content">
      <div class="container">
         <div class="row">
            <div class="col-md-4 ml-auto mr-auto">
               <div class="info info-horizontal">
                  <div class="icon icon-primary">
                     <i class="now-ui-icons media-2_sound-wave"></i>
                  </div>
                  <div class="description">
                     <h5 class="info-title">Marketing</h5>
                     <p class="description">
                        We've created the marketing campaign of the website. It was a very interesting collaboration.
                     </p>
                  </div>
               </div>
               <div class="info info-horizontal">
                  <div class="icon icon-primary">
                     <i class="now-ui-icons media-1_button-pause"></i>
                  </div>
                  <div class="description">
                     <h5 class="info-title">Fully Coded in HTML5</h5>
                     <p class="description">
                        We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                     </p>
                  </div>
               </div>

            </div>
            <div class="col-md-4 mr-auto">
               <div class="card card-signup">
                  <div class="card-body">
                     <h4 style=" color: black;" class="card-title text-center py-2">Register</h4>
                     <div class="social text-center">
                        <h5 class="card-description"> Let's be Classical </h5>
                     </div>
                     <?php
                     if (isset($_POST['submit'])) {
                        $_SESSION['signup_name'] = $_POST['name'];
                        $_SESSION['signup_email'] = $_POST['email'];
                        $email = $_SESSION['signup_email'];
                        $_SESSION['signup_password'] = md5($_POST['password']);
                        include "link.php";
                        $q = "Select * from `user` where email ='$email'";
                        $p = "Select * from `employer` where email='$email'";
                        $result = mysqli_query($link, $q);
                        $data = mysqli_fetch_assoc($result);
                        $result2 = mysqli_query($link, $p);
                        $e = mysqli_fetch_assoc($result2);
                        if ($data['email'] || $e['email']) {
                           echo " <div class='alert alert-danger' role='alert'>
                           Email Already Exists!!
                           </div>";
                        }
                        else {
                           echo "<script>window.location.assign('signup-page0.2.php')</script>";
                        }
                     }
                     ?>

                     <form class="form" method="post" onsubmit="return checkValues()">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                           </div>
                           <input type="text" name="name" id="name" class="form-control" placeholder="Username...">
                        </div>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                           </div>
                           <input type="email" name="email" id="email" class="form-control" placeholder="Your Email..." title="No Caps">
                        </div>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="now-ui-icons text_caps-small"></i></span>
                           </div>
                           <input type="password" name="password" id="password" class="form-control" placeholder="Your Password...">
                        </div>

                        <div class="form-check">
                           <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" required>
                              <span class="form-check-sign"></span>
                              I agree to the terms and <a href="#something">conditions.</a>.
                           </label>
                        </div>
                        <div class="card-footer text-center">
                           <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg" value="Get Started">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   require "footer.php"
   ?>