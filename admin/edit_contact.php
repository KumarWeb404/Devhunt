<?php

use LDAP\Result;

require "nav.php";
include "../link.php";
$id = $_GET['id'];
$q = "Select * from `contact` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
if ($_POST['submit']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $q = "Update `contact` set `name`= '$name',`email`='$email',`subject`='$subject',`message`='$message' where id = '$id'";
    $result = mysqli_query($link, $q);
    if($result>0){
         echo "<script>window.location.assign('contact.php?success')</script>";
    }else{
        echo "<script>window.location.assign('contact.php?err')</script>";
    }
}
?>
<div class="page-header section-image">
    <div class="page-header-image" style="background-image:url(assets/img/bg18.jpg);"></div>
    <div class="content pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mr-auto">
                    <div style="max-width:80vw;
                                color: black;
                                text-align: left;" class="card card-signup">
                        <div style="width:90% ;" class="card-body mx-auto">
                            <h4 class="card-title text-center py-2">Enter Your Details</h4>

                            <form class="form" method="post" enctype="multipart/form-data">
                                <div class="form-row py-3">
                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name..." value="<?php echo $data['name']; ?>">
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="total_emp" placeholder="Your Email..." value="<?php echo $data['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-row py-3">
                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="subj">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subj" placeholder="Your Subject..." value="<?php echo $data['subject']; ?>">
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="msg">Message</label>
                                        <textarea name="message" id="msg" class="form-control" rows="6">
                                            <?php echo $data['message']; ?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="card-footer text-center mb-2">
                                    <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg" value="Update">
                                </div>
                            </form>
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