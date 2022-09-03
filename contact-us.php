<?php
require "nav.php"
?>

 <!-- HAVE TO CREATE A FEW VALIDATIONS -->
<div class="wrapper">
  <div class="page-header page-header-small">
    <div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/bg45.jpg')"></div>
  </div>
  <div class="main">
    <div class="contact-content">
     

      <div class="container">
      <?php
            if (isset($_POST['submit'])) {
              include "link.php";
              $name = $_POST['name'];
              $email = $_POST['email'];
              $subject = $_POST['subject'];
              $message = $_POST['message'];


              $q = "Insert into `contact` (`name`,`email`,`subject`,`message`) values('$name','$email','$subject','$message')";
              $result = mysqli_query($link, $q);

              if ($result > 0) {?>
                <div class="alert alert-success" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons ui-2_like"></i>
                        </div>
                        <strong>Message Delivered!</strong> 
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
        <div class="row">
          <div class="col-md-5 ml-auto mr-auto">
            <h2 class="title">Send us a message</h2>
            <p class="description">
              You can contact us with anything related to our Products.
              We'll get in touch with you as soon as possible.<br /><br />
            </p>
           
            <form id="contact-form" method="post" onsubmit = "return checkContact()">
              <label>Your name</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                </div>
                <input type="text" name="name" id="contact_name" class="form-control" placeholder="Your Name..." aria-label="Your Name..." required />
              </div>
              <label>Email address</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                </div>
                <input type="email" name="email" id="contact_email" class="form-control" placeholder="Email Here..." aria-label="Email Here..." title="No Caps" required />
              </div>
              <!-- <label for="myform_phone">Phone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="now-ui-icons tech_mobile"></i></span>
                </div>
                <input type="text" id="myform_phone" name="phone" pattern="^\+(?:[0-9]●?){6,14}[0-9]$" class="form-control" placeholder="Number Here..." title="Please enter valid number with Country Code"/>
              </div> -->
              <label>Subject</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="now-ui-icons ui-2_chat-round"></i></span>
                </div>
                <input type="text" class="form-control" id="contact_subject" name="subject" placeholder="Your Subject..." required/>
              </div>
              <div class="form-group">
                <label>Your message</label>
                <textarea name="message" class="form-control" id="contact_message" rows="6" required></textarea>
              </div>
              <div class="submit text-center mb-3">
                <input type="submit" name="submit" class="btn btn-primary btn-raised btn-round" />
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto mr-auto">
            <div class="info info-horizontal mt-5">
              <div class="icon icon-primary">
                <i class="now-ui-icons location_pin"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Find us at the office</h4>
                <p>
                  Bld Mihail Kogalniceanu, nr. 8,<br />
                  7652 Bucharest,<br />
                  Romania
                </p>
              </div>
            </div>
            <div class="info info-horizontal">
              <div class="icon icon-primary">
                <i class="now-ui-icons tech_mobile"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Give us a ring</h4>
                <p>
                  Michael Jordan<br />
                  +40 762 321 762<br />
                  Mon - Fri, 8:00-22:00
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require "footer.php"
  ?>