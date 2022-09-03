<?php
require "nav.php";
include "link.php";
$id = $_SESSION['id'];
$q = "Select * from `employer` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $emp_desc = $_POST['emp_desc'];
    $company_address = $_POST['company_address'];
    $company_name = $_POST['company_name'];
    $started_in = $_POST['started_in'];
    $website = $_POST['website'];
    if ($_FILES['image']['error'] > 0) {
        $image = $data['image'];
    } else {
        $image = rand(1, 1000) . $_FILES['image']['name'];
        $location = $_FILES['image']['tmp_name'];
        move_uploaded_file($location, "uploads/" . $image);
    }

    $q = "Update `employer` set `name`='$name',`email`='$email',`company_name`='$company_name',`company_address`='$company_address',`gender`='$gender',`started_in`='$started_in',`website`='$website',`image`='$image',`emp_desc`='$emp_desc' where id='$id'";
    $result = mysqli_query($link, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('edit_emp.php?msg=success')</script>";
    } else {
        echo "<script>window.location.assign('edit_emp.php?msg=0')</script>";
    }
}
?>

<div style="background-color: #eee;">
    <div class="container mt-5 py-5">
        <form method="post" enctype="multipart/form-data">
            <?php if (isset($_GET['msg'])) {
                if($_GET['msg'] =='success'){

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
            <?php }} ?>
            <h2 class="title text-center"> Edit Profile</h2>

            <div class="row ">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php
                                        if ($data['image'] !== '') {

                                            echo "uploads/" . $data['image'];
                                        } else {
                                            echo  "assets/img/profile-sample.png";
                                        }
                                        ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 100px; height:100px;">
                            <h5 class="my-3"><?php echo ucwords($data['name']); ?></h5>
                        </div>
                        <input class="d-block mx-auto mb-5" type="file" name="image">

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
                                    <input class="form-control" type="name" name="name" placeholder="Enter Your Username..." value="<?php echo ucwords($data['name']); ?>" required>
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
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-6">
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Company Name</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="company_name" placeholder="Your Company Name..." value="<?php echo ucwords($data['company_name']); ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Company Website (URL)</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="url" name="website" placeholder="Your Company Website..." value="<?php echo $data['website']; ?>" required>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Company Established In</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" id="date" class="form-control" name="started_in" required max="<?php echo date('Y-m-d', strtotime('now')); ?>" value="<?php echo $data['started_in']; ?>">


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Company Address</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="company_address" placeholder="Enter Your Address..." value="<?php echo $data['company_address']; ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Description</p>
                                </div>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="emp_desc" rows="6" placeholder="Your Description..." required><?php echo ucfirst($data['emp_desc']); ?></textarea>
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