<?php
require "nav.php";
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
                                <?php
                                if (isset($_POST['submit'])) {
                                    include "link.php";
                                    $name = $_SESSION['signup_name'];
                                    $email = $_SESSION['signup_email'];
                                    $password = md5($_SESSION['signup_password']);
                                    $company_name = $_POST['company_name'];
                                    $total_employee = $_POST['total_employee'];
                                    $started_in = $_POST['started_in'];
                                    $company_address = $_POST['company_address'];
                                    $gender = $_POST['gender'];
                                    $website = $_POST['website'];
                                    $id_proof = $_FILES['id_proof']['name'];
                                    $address_proof = $_FILES['address_proof']['name'];
                                    $addr_location = $_FILES['address_proof']['tmp_name'];
                                    $id_location = $_FILES['id_proof']['tmp_name'];

                                    $q = "Insert into `employer` (`name`, `email`, `password`, `company_name`, `company_address`,`gender`, `started_in`, `total_employee`, `website`, `id_proof`, `address_proof`) values ('$name', '$email', '$password', '$company_name', '$company_address','$gender', '$started_in', '$total_employee', '$website', '$id_proof','$address_proof')";
                                    $result = mysqli_query($link, $q);
                                    if ($result > 0) {
                                        move_uploaded_file($id_location, 'uploads/' . $id_proof);
                                        move_uploaded_file($addr_location, 'uploads/' . $address_proof);
                                        session_destroy();
                                        echo "<script>window.location.assign('login-page.php?msg=emp&&log_msg=succ')</script>";
                                       
                                    } else {
                                        echo " <div class='alert alert-danger' role='alert'>
                                               Something Went Wrong!!
                                            </div>";
                                    }
                                }
                                ?>
                                <div class="form-row py-3">
                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="c_name">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" id="c_name" placeholder="Your Company..." required>
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="total_emp">Total Employees</label>
                                        <input type="number" name="total_employee" class="form-control" id="total_emp" min="0" placeholder="Enter Amount..." required>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-md-4 mx-auto py-3">
                                        <label for="date">Company Founded In</label>
                                        <input type="date" name="started_in" data-date-format="DD MM YYYY" id="date" class="form-control" name="started_in" required>
                                    </div>
                                    <div class="col-md-4 mx-auto">
                                        <label>Gender</label>
                                        <div class="btn-group bootstrap-select ">
                                            <select name="gender" class="selectpicker" data-size="3" data-style="btn btn-primary btn-round mt-0" title="Gender" tabindex="-98" required>
                                                <option class="bs-title-option" value="">Select Your Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label for="c_addr">Company Address</label>
                                            <input type="text" name="company_address" class="form-control" id="c_addr" placeholder="Your Company Address..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label for="c_web">Company Website(URL)</label>
                                            <input type="url" name="website" class="form-control" id="c_web" placeholder="http://www.example.com" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="id_proof" class="custom-file-input" id="idFile" required>
                                        <label class="custom-file-label" for="idFile">ID Proof</label>
                                    </div>
                                </div>
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="address_proof" class="custom-file-input" id="addressFile" required>
                                        <label class="custom-file-label" for="addressFile">Company Address Proof</label>
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