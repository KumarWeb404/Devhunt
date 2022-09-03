<?php
include "nav.php";
?>
<!-- Requisistes 
- edit profile - projects delete and add
- include known programming languages
- include user messages
- frontend settings
- view project - known Languages
- JS Validations Everywhere
-->
<div class="page-header " filter-color="orange">
    <div class="page-header-image" style="background-image:url(../assets/img/login.jpg);"></div>
    <div class="content">
        <div class="container">
            <?php
            if(isset($_GET['err'])){
              echo "<div class='alert alert-danger' role='alert'>
             Please Login!!
            </div>";
            }
            ?>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-signup p-4" data-background-color="orange">
                        <div class="card-body">
                            <h4 class="card-title text-center py-2">Admin Login</h4>
                        </div>
                        <?php
                        if(isset($_POST['submit'])){
                            include "../link.php";
                            $email = $_POST['email'];
                            $password = md5($_POST['password']);
    
                            $q = "Select * from `admin` where `email`='$email' and `password` = '$password'";
                            $result = mysqli_query($link, $q);
                            
                           if(mysqli_num_rows($result) > 0){
                           $data= mysqli_fetch_assoc($result);
                           $_SESSION['admin_name'] = $data['name'];
                           $_SESSION['admin_email'] = $data['email'];
                           $_SESSION['admin_id'] = $data['id'];
                            echo "<script>window.location.assign('index.php')</script>";
                           }
                           else{
                            echo "<script>window.location.assign('admin_login.php?err')</script>";
                           }
                        }
                        
                        ?>
                        <form class="form" method="post">
                            <div class="input-group form-group-no-border input-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="now-ui-icons ui-1_email-85 "></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Your Email...">
                            </div>

                            <div class="input-group form-group-no-border input-lg">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text"><i class="now-ui-icons text_caps-small "></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Your Password...">
                            </div>
                            <div class="card-footer text-center">
                                <input type="submit" name="submit" class="btn btn-neutral btn-round btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>