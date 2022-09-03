<?php
require "nav.php";
?>
<div class="section">
    <div class="about-description text-center">
        <div class="features-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto">
                        <h2 class="title">Login As </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="login-page.php?msg=dev" style="text-decoration: none;">
                        <div class="info info-hover">
                            <div class="icon icon-primary icon-circle">
                            <i class="fa-solid fa-user-ninja"></i>
                            </div>
                            <h4 class="info-title">Developer/Designer</h4>
                        </div>
                        </a>
                       
                    </div>
                    <div class="col-md-6">
                        <a href="login-page.php?msg=emp" style="text-decoration: none;">
                            <div class="info info-hover">
                                <div class="icon icon-primary icon-circle">
                                <i class="fa-solid fa-user-secret"></i>
                                </div>
                                <h4 class="info-title">Employer</h4>
                               
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require "footer.php";
?>