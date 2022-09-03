<?php
require "nav.php";
include "../link.php";
$id = $_GET['id'];
$q = "Select * from `user` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $qual = $_POST['qual'];
    $exp = $_POST['exp'];
    $skill = $_POST['skills'];
    $work_state = $_POST['work_state'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    if ($_FILES['id_proof']['error'] > 0) {
        $id_proof = $data['id_proof'];
    } else {
        $id_proof = rand(1, 1000) . $_FILES['id_proof']['name'];
        $idlocation = $_FILES['id_proof']['tmp_name'];
        move_uploaded_file($idlocation, '../uploads/' . $id_proof);
    }

    if ($_FILES['address_proof']['error'] > 0) {
        $address_proof = $data['address_proof'];
    } else {
        $address_proof = rand(1, 1000) . $_FILES['address_proof']['name'];
        $addrlocation = $_FILES['address_proof']['tmp_name'];
        move_uploaded_file($addrlocation, '../uploads' . $address_proof);
    }
    $q = "Update `user` set `name`='$name',`email`='$email',`qualification`='$qual',`experience`='$exp',`skills`='$skill',`current_working`='$work_state',`id_proof`='$id_proof',`address`='$address',`dob`='$dob',`gender`='$gender',`address_proof`='$address_proof' where id='$id'";
    $result = mysqli_query($link, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('users.php?success')</script>";
    } else {
        echo "<script>window.location.assign('users.php?err')</script>";
    }
}

?>
<div class="page-header section-image" style="min-height: 200vh;">
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
                                    <div class="col-md-4 mx-auto">
                                        <label>Skill</label>
                                        <div class="btn-group bootstrap-select ">
                                            <select name="skills" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Skill" tabindex="-98">
                                                <option class="bs-title-option" value="">Select Your Skill</option>
                                                <option value="designer" <?php if($data['skills']=='designer')
                                                 echo 'selected' ;?>>I'm a Designer </option>
                                                <option value="developer" <?php if ($data['skills'] == 'developer') echo "selected"; ?>>I'm a Developer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="exp">Experience</label>
                                        <input type="number" name="exp" class="form-control" id="exp" min="0" placeholder="Your Experience..." value="<?php echo $data['experience']; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mx-auto py-3">
                                        <label>Qualification</label>
                                        <div class="btn-group bootstrap-select">
                                            <select name="qual" class="selectpicker" data-size="8" data-style="btn btn-primary btn-round mt-0" title="Highest Qualification" tabindex="-98">
                                                <option value="" class="bs-title-option">Select Your Highest Qualification</option>
                                                <option value="No formal education" <?php if ($data['qualification'] == 'No formal education') echo "selected" ?>>No formal education</option>
                                                <option value="Primary education" <?php if ($data['qualification'] == 'Primary education') echo "selected" ?>>Primary education</option>
                                                <option value="Secondary education" <?php if ($data['qualification'] == 'Secondary education') echo "selected" ?>>Secondary education or high school</option>
                                                <option value="GED" <?php if ($data['qualification'] == 'GED') echo "selected" ?>>GED</option>
                                                <option value="Vocational qualification" <?php if ($data['qualification'] == 'Vocational qualification') echo "selected" ?>>Vocational qualification</option>
                                                <option value="Bachelors degree" <?php if ($data['qualification'] == "Bachelor's degree") echo "selected" ?>>Bachelor's degree</option>
                                                <option value="Master's degree" <?php if ($data['qualification'] == "Masters degree") echo "selected" ?>>Master's degree</option>
                                                <option value="Doctorate or higher" <?php if ($data['qualification'] == 'Doctorate or higher') echo "selected"; ?>>Doctorate or higher</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <label>Gender</label>
                                        <div class="btn-group bootstrap-select ">
                                            <select name="gender" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Gender" tabindex="-98">
                                                <option class="bs-title-option" value="">Select Your Gender</option>
                                                <option value="male" <?php if($data['gender']=="male") echo "selected";?>>Male</option>
                                                <option value="female" <?php if($data['gender']=="female") echo "selected";?>>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="date">Date Of Birth</label>
                                        <input type="date" id="date" class="form-control" name="dob" value="<?php echo $data['dob']; ?>">

                                    </div>
                                </div>
                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <label>Employment State</label>
                                        <div class="btn-group bootstrap-select ">
                                            <select name="work_state" class="selectpicker" data-size="2" data-style="btn btn-primary btn-round mt-0" title="Employment-State" tabindex="-98">
                                                <option class="bs-title-option" value="">Select Your Employment State</option>
                                                <option value="employed"<?php if($data['current_working']=="employed") echo "selected";?>>Employed</option>
                                                <option value="unemployed" <?php if($data['current_working']=="unemployed") echo "selected";?>>Unemployed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mx-auto">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Your Address..." value="<?php echo $data['address']; ?>">
                                    </div>
                                </div>
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="id_proof" class="custom-file-input" id="idFile">
                                        <label class="custom-file-label" for="idFile">ID Proof</label>
                                    </div>
                                </div>
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="address_proof" class="custom-file-input" id="addressFile">
                                        <label class="custom-file-label" for="addressFile">Address Proof</label>
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
require "footer.php";
?>