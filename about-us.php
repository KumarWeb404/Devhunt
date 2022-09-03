<?php
require "nav.php";
?>

<div class="wrapper">

  <!-- HEADER START -->

  <div class="page-header page-header-small" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/bg32.jpg')"></div>
    <div class="content-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h1 class="title">About Us</h1>
          <h4>
            Get to know our goal behind this project and find out more
            about how we work.
          </h4>
        </div>
      </div>
    </div>
  </div>

  <!-- HEADER END -->
  <div class="section">

    <!-- SECTION-1  -->

    <div class="about-description text-center">
      <div class="features-3">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
              <h2 class="title">Simpler. Smarter. Faster.</h2>
              <h3 class="description">
                This Platform (Devhunt) provides
                full visibility and control to reduce time, improve
                the quality and provide a Good User Experience.
              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="info info-hover">
                <div class="icon icon-primary icon-circle">
                  <i class="now-ui-icons objects_globe"></i>
                </div>
                <h4 class="info-title">Simpler</h4>
                <p class="description">
                  Provides a simplified view over projects and portfolio's and easy to navigate.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info info-hover">
                <div class="icon icon-primary icon-circle">
                  <i class="now-ui-icons education_atom"></i>
                </div>
                <h4 class="info-title">Smarter</h4>
                <p class="description">
                  Provides efficiently designed portfolio's and user interface.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info info-hover">
                <div class="icon icon-primary icon-circle">
                  <i class="now-ui-icons tech_watch-time"></i>
                </div>
                <h4 class="info-title">Faster</h4>
                <p class="description">
                  Provides a much fast way to contact and hire web developer/designers.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SECTION-1 -->

    <!-- UNDER-MAINTENANCE  -->
    <!-- SECTION-2 -->
    <div class="separator-line separator-primary"></div>  
    <?php
              include "link.php";
            if (isset($_POST['submit'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $skill = $_POST['skill'];
              $q = "Insert into `w_w_s` (`name`, `email`,`skill`) values('$name','$email', '$skill')";
              $result = mysqli_query($link, $q);
              if ($result > 0) {?>
                <div class="alert alert-success" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons ui-2_like"></i>
                        </div>
                        <strong>Details Sent!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
             <?php }else{?>
              <div class="alert alert-danger" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons objects_support-17"></i>
                        </div>
                        <strong>Oh snap!</strong> Change a few things and try submitting again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
              <?php }
            }
            ?>
    <div class="about-contact">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mr-auto ml-auto">
            <h2 class="text-center title">Want to work with us?</h2>
            <h4 class="text-center description">Are you interested to work with us and help make this platform achieve its goals. Let us know by providing us <br> a medium to contact you.</h4>
          
            <form class="contact-form mt-5" method="post" onsubmit="return checkAbout()">
              <div class="row">
                <div class="col-md-4">
                  <label> Your Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend ">
                      <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                    </div>
                    <input type="text" class="form-control" id="about_name" name="name" placeholder="First Name..." required>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Your Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                    </div>
                    <input type="text" name="email" class="form-control" id="about_email" placeholder="Email Name..." required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Speciality</label>
                    <div class="btn-group bootstrap-select ">
                      <select name="skill" id="skill" class="selectpicker" data-size="3" data-style="btn btn-default btn-round mt-0" title="Skill" tabindex="-98" required>
                        <option class="bs-title-option" value="">Select Your Speciality</option>
                        <option value="designer">I'm a Designer</option>
                        <option value="developer">I'm a Developer</option>
                        <option value="employer"> I'm an Employer</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <input type="submit" name="submit" class="btn btn-primary btn-round mt-4 btn-lg" value="Let's Talk">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SECTION-2  -->
  <!-- UNDER-MAINTENANCE  -->

  <?php
  require "footer.php"
  ?>