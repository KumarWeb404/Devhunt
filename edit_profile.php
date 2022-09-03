<?php
require "nav.php";
include "link.php";
$id = $_SESSION['id'];
$q = "Select * from `user` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $skill = $_POST['skill'];
    $t_known = implode(',', $_POST['t_used']);
    $qual = $_POST['qual'];
    $exp = $_POST['exp'];
    $dob = $_POST['dob'];
    $e_state = $_POST['work_state'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    if ($_FILES['p_image']['error'] > 0) {
        $p_image = $data['profile_img'];
    } else {
        $p_image = rand(1, 1000) . $_FILES['p_image']['name'];
        $location = $_FILES['p_image']['tmp_name'];
        move_uploaded_file($location, "uploads/" . $p_image);
    }

    $q = "Update `user` set `name`='$name',`email`='$email',`qualification`='$qual',`experience`='$exp',`skills`='$skill',`tech_known`='$t_known',`current_working`='$e_state',`address`='$address',`dob`='$dob',`gender`='$gender',`profile_img`='$p_image',`user_description`='$description' where id='$id'";
    $result = mysqli_query($link, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('edit_profile.php?msg=success')</script>";
    } else {
        echo "<script>window.location.assign('edit_profile.php?msg=0')</script>";

    }
}
?>
<div style="background-color: #eee;">
    <div class="container mt-5 py-5">
        <form method="post" enctype="multipart/form-data">
            <?php if (isset($_GET['msg'])) {
                if($_GET['msg'] == 'success'){
            ?>
                <div class="alert alert-success" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons ui-2_like"></i>
                        </div>
                        <strong>Success!</strong> You successfully updated your details.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons objects_support-17"></i>
                        </div>
                        <strong>Oh snap!</strong> Change a few things up and try submitting again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
            <?php } }?>
            <h2 class="title text-center"> Edit Profile</h2>

            <div class="row ">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php
                                        if ($data['profile_img'] !== '') {

                                            echo "uploads/" . $data['profile_img'];
                                        } else {
                                            echo  "assets/img/profile-sample.png";
                                        }
                                        ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 100px; height:100px;">
                            <h5 class="my-3"><?php echo $data['name']; ?></h5>
                        </div>
                        <input class="d-block mx-auto mb-5" type="file" name="p_image">

                    </div>
                </div>
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Username</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="name" name="name" placeholder="Enter Your Username..." value="<?php echo $data['name']; ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="email" name="email" placeholder="Enter Your Email..." value="<?php echo $data['email']; ?>" required>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Skill</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group bootstrap-select ">
                                        <select name="skill" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Skill" tabindex="-98" required>
                                            <option class="bs-title-option" value="">Select Your Skill</option>
                                            <option value="designer" <?php if ($data['skills'] == 'designer')
                                                                            echo 'selected'; ?>>I'm a Designer </option>
                                            <option value="developer" <?php if ($data['skills'] == 'developer') echo "selected"; ?>>I'm a Developer</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Technologies Known</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group bootstrap-select">
                                        <?php
                                        $t = explode(',', $data['tech_known']);
                                        ?>
                                        <select name="t_used[]" class="selectpicker" data-size="23" data-style="btn btn-primary btn-round mt-0" title="Technologies Known" required multiple>
                                            <option value="html" <?php
                                                                    if (in_array("html", $t)) echo 'selected'; ?>>HTML5</option>
                                            <option value="css" <?php
                                                                if (in_array("css", $t)) echo 'selected'; ?>>CSS3</option>
                                            <option value="javascript" <?php
                                                                        if (in_array("javascript", $t)) echo 'selected'; ?>>Javascript</option>
                                            <option value="bootstrap" <?php
                                                                        if (in_array("bootstrap", $t)) echo 'selected'; ?>>Bootstrap</option>
                                            <option value="php" <?php
                                                                if (in_array("php", $t)) echo 'selected'; ?>>PHP</option>
                                            <option value="mysql" <?php
                                                                    if (in_array("mysql", $t)) echo 'selected'; ?>>MySQL</option>
                                            <option value="react" <?php
                                                                    if (in_array("react", $t)) echo 'selected'; ?>>React</option>
                                            <option value="angular" <?php
                                                                    if (in_array("angular", $t)) echo 'selected'; ?>>Angular</option>
                                            <option value="vue.js" <?php
                                                                    if (in_array("vue.js", $t)) echo 'selected'; ?>>Vue.Js</option>
                                            <option value="node.js" <?php
                                                                    if (in_array("node.js", $t)) echo 'selected'; ?>>Node.Js</option>
                                            <option value="sass" <?php
                                                                    if (in_array("sass", $t)) echo 'selected'; ?>>Sass</option>
                                            <option value="rust" <?php
                                                                    if (in_array("rust", $t)) echo 'selected'; ?>>Rust</option>
                                            <option value="java" <?php
                                                                    if (in_array("java", $t)) echo 'selected'; ?>>Java</option>
                                            <option value="swift" <?php
                                                                    if (in_array("swift", $t)) echo 'selected'; ?>>Swift</option>
                                            <option value="git" <?php
                                                                if (in_array("git", $t)) echo 'selected'; ?>>Git</option>
                                            <option value="ps" <?php
                                                                if (in_array("ps", $t)) echo 'selected'; ?>>Adobe Photoshop</option>
                                            <option value="in" <?php
                                                                if (in_array("in", $t)) echo 'selected'; ?>>Adobe Indesign</option>
                                            <option value="ai" <?php
                                                                if (in_array("ai", $t)) echo 'selected'; ?>>Adobe Illustrator</option>
                                            <option value="xd" <?php
                                                                if (in_array("xd", $t)) echo 'selected'; ?>>Adobe XD</option>
                                            <option value="figma" <?php
                                                                    if (in_array("figma", $t)) echo 'selected'; ?>>Figma</option>
                                            <option value="word" <?php
                                                                    if (in_array("word", $t)) echo 'selected'; ?>>MS Word</option>
                                            <option value="excel" <?php
                                                                    if (in_array("excel", $t)) echo 'selected'; ?>>MS Excel</option>
                                            <option value="ppt" <?php
                                                                if (in_array("ppt", $t)) echo 'selected'; ?>>MS PowerPoint</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Employment State</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group bootstrap-select ">
                                        <select name="work_state" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Employment-State" tabindex="-98" required>
                                            <option class="bs-title-option" value="">Select Your Employment State</option>
                                            <option value="employed" <?php if ($data['current_working'] == "employed") echo "selected"; ?>>Employed</option>
                                            <option value="unemployed" <?php if ($data['current_working'] == "unemployed") echo "selected"; ?>>Unemployed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="address" placeholder="Enter Your Address..." value="<?php echo $data['address']; ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Description</p>
                                </div>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="description" rows="6" placeholder="Your Description..." required><?php echo $data['user_description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="title text-center">Additional Info</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <label class="mt-2" for="exp">Experience</label>
                                    <input type="number" name="exp" class="form-control mb-4" id="exp" min="0" placeholder="Your Experience..." value="<?php echo $data['experience']; ?>" required>

                                    <label class="mt-1" for="date">Date Of Birth</label>
                                    <input type="date" id="date" class="form-control mb-3" name="dob" value="<?php echo $data['dob']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <label>Qualification</label>
                                    <div class="btn-group bootstrap-select mb-2">
                                        <select name="qual" class="selectpicker" data-size="8" data-style="btn btn-primary btn-round mt-0" title="Highest Qualification" tabindex="-98" required>
                                            <option value="" class="bs-title-option">Select Your Highest Qualification</option>
                                            <option value="No formal education" <?php if ($data['qualification'] == 'No formal education') echo "selected" ?>>No formal education</option>
                                            <option value="Primary education" <?php if ($data['qualification'] == 'Primary education') echo "selected" ?>>Primary education</option>
                                            <option value="Secondary education" <?php if ($data['qualification'] == 'Secondary education') echo "selected" ?>>Secondary education or high school</option>
                                            <option value="GED" <?php if ($data['qualification'] == 'GED') echo "selected" ?>>GED</option>
                                            <option value="Vocational qualification" <?php if ($data['qualification'] == 'Vocational qualification') echo "selected" ?>>Vocational qualification</option>
                                            <option value="Bachelors degree" <?php if ($data['qualification'] == "Bachelors degree") echo "selected" ?>>Bachelor's degree</option>
                                            <option value="Masters degree" <?php if ($data['qualification'] == "Masters degree") echo "selected" ?>>Master's degree</option>
                                            <option value="Doctorate or higher" <?php if ($data['qualification'] == 'Doctorate or higher') echo "selected"; ?>>Doctorate or higher</option>
                                        </select>
                                    </div>
                                    <label>Gender</label>
                                    <div class="btn-group bootstrap-select mb-2">
                                        <select name="gender" class="selectpicker" data-size="3" data-style="btn btn-primary btn-round mt-0" title="Gender" tabindex="-98" required>
                                            <option class="bs-title-option" value="">Select Your Gender</option>
                                            <option value="male" <?php if ($data['gender'] == "male") echo "selected"; ?>>Male</option>
                                            <option value="female" <?php if ($data['gender'] == "female") echo "selected"; ?>>Female</option>
                                            <option value="other" <?php if ($data['gender'] == "other") echo "selected"; ?>>Other</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 mr-auto ml-auto text-center">
                    <input class="btn btn-primary btn-round btn-lg" type="submit" name="submit" value="Update">
                </div>
            </div>
        </form>

    </div>
</div>
<?php
require "footer.php"
?>