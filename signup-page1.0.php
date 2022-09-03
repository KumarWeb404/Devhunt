<?php
require "nav.php";
?>

<div class="page-header section-image" style="min-height: 200vh;">
    <div class="page-header-image" style="background-image:url(assets/img/bg18.jpg);"></div>
    <div class="content pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mr-auto">
                    <?php
                    if (isset($_POST['submit'])) {
                        include "link.php";
                        $name = $_SESSION['signup_name'];
                        $email = $_SESSION['signup_email'];
                        $password = md5($_SESSION['signup_password']);
                        $qual = $_POST['qual'];
                        $exp = $_POST['exp'];
                        $skill = $_POST['skill'];
                        $t_known = implode(',', $_POST['t_known']);
                        $work_state = $_POST['work_state'];
                        $id_proof = $_FILES['id_proof']['name'];
                        $address = $_POST['address'];
                        $dob = $_POST['dob'];
                        $gender = $_POST['gender'];
                        $address_proof = $_FILES['address_proof']['name'];
                        $idlocation = $_FILES['id_proof']['tmp_name'];
                        $addresslocation = $_FILES['address_proof']['tmp_name'];
                        $q = "Insert into `user`(`name`, `email`, `password`,`qualification`,`experience`,`skills`,`tech_known`,`current_working`, `id_proof`, `address`, `dob`, `gender`, `address_proof`) values ('$name', '$email', '$password','$qual','$exp','$skill','$t_known','$work_state','$id_proof','$address','$dob','$gender','$address_proof')";


                        $result = mysqli_query($link, $q);

                        if ($result > 0) {
                            move_uploaded_file($idlocation, 'uploads/' . $id_proof);
                            move_uploaded_file($addresslocation, 'uploads/' . $address_proof);
                            session_destroy();
                            echo "<script>window.location.assign('login-page.php?msg=dev&&log_msg=succ')</script>";
                        } else {
                            echo " <div class='alert alert-danger' role='alert'>
                                Something Went Wrong!!
                                </div>";
                        }
                    }

                    ?>
                    
                   
                    <div style="max-width:80vw; color: black;text-align: left;" class="card card-signup">
                        <div style="width:90% ;" class="card-body mx-auto">
                            <h4 class="card-title text-center py-2">Enter Your Details</h4>

                            <form class="form" method="post" enctype="multipart/form-data">
                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <label>Skill</label>
                                        <div class="btn-group bootstrap-select ">
                                            <select name="skill" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Skill" tabindex="-98" required>
                                                <option class="bs-title-option" value="">Select Your Skill</option>
                                                <option value="designer">I'm a Designer</option>
                                                <option value="developer">I'm a Developer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="exp">Experience</label>
                                        <input type="number" name="exp" class="form-control" id="exp" min="0" placeholder="Your Experience..." required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mx-auto py-3">
                                        <label>Qualification</label>
                                        <div class="btn-group bootstrap-select">
                                            <select name="qual" class="selectpicker" data-size="8" data-style="btn btn-primary btn-round mt-0" title="Highest Qualification" tabindex="-98" required>
                                                <option value="" class="bs-title-option">Select Your Highest Qualification</option>
                                                <option value="No formal education">No formal education</option>
                                                <option value="Primary education">Primary education</option>
                                                <option value="Secondary education">Secondary education or high school</option>
                                                <option value="GED">GED</option>
                                                <option value="Vocational qualification">Vocational qualification</option>
                                                <option value="Bachelors degree">Bachelor's degree</option>
                                                <option value="Masters degree">Master's degree</option>
                                                <option value="Doctorate or higher">Doctorate or higher</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label>Technologies Known</label>
                                            <div class="btn-group bootstrap-select">
                                                <select name="t_known[]" class="selectpicker" data-size="23" data-style="btn btn-primary btn-round mt-0" title="Technologies Known" required multiple>
                                                    <option value="html">HTML5</option>
                                                    <option value="css">CSS3</option>
                                                    <option value="javascript">Javascript</option>
                                                    <option value="bootstrap">Bootstrap</option>
                                                    <option value="php">PHP</option>
                                                    <option value="mysql">MySQL</option>
                                                    <option value="react">React</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="vue.js">Vue.Js</option>
                                                    <option value="node.js">Node.Js</option>
                                                    <option value="sass">Sass</option>
                                                    <option value="rust">Rust</option>
                                                    <option value="java">Java</option>
                                                    <option value="swift">Swift</option>
                                                    <option value="git">Git</option>
                                                    <option value="ps">Adobe Photoshop</option>
                                                    <option value="in">Adobe Indesign</option>
                                                    <option value="ai">Adobe Illustrator</option>
                                                    <option value="xd">Adobe XD</option>
                                                    <option value="figma">Figma</option>
                                                    <option value="word">MS Word</option>
                                                    <option value="excel">MS Excel</option>
                                                    <option value="ppt">MS PowerPoint</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row py-3">
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

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="date">Date Of Birth</label>
                                        <input type="date" id="date" class="form-control" name="dob" required value=" <?php echo date('Y-m-d', strtotime('18 years ago')); ?>" max="<?php echo date('Y-m-d', strtotime('18 years ago')); ?>">

                                    </div>
                                </div>
                                <div class=" form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <label>Employment State</label>
                                        <div class="btn-group bootstrap-select ">
                                            <select name="work_state" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Employment-State" tabindex="-98" required>
                                                <option class="bs-title-option" value="">Select Your Employment State</option>
                                                <option value="employed">Employed</option>
                                                <option value="unemployed">Unemployed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mx-auto">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Your Address..." required>
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
                                        <label class="custom-file-label" for="addressFile">Address Proof</label>
                                    </div>
                                </div>
                                <div class="card-footer text-center mb-2">
                                    <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg" value="Submit">
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
require "footer.php";
?>