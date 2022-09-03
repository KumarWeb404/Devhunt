<?php
require "nav.php";
include "../link.php";
$id = $_GET['id'];
$q = "Select * from `employer` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $started_in = $_POST['started_in'];
    $total_employee = $_POST['total_employee'];
    $website = $_POST['website'];

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
        move_uploaded_file($addrlocation, '../uploads/' . $address_proof);
    }

    $q = "update `employer` set `name`='$name',`email`='$email',`company_name`='$company_name',`company_address`='$company_address',`started_in`='$started_in',`total_employee`='$total_employee',`website`='$website',`id_proof`='$id_proof',`address_proof`='$address_proof' where `id`='$id'";
    $result = mysqli_query($link, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('employer.php?success');</script>";
    } else {
        echo "<script>window.location.assign('employer.php?err');</script>";
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
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name..." value="<?php echo $data['name'] ?>">
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="total_emp" placeholder="Enter Email..." value="<?php echo $data['email'] ?>">
                                    </div>
                                </div>
                                <div class="form-row py-3">
                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="c_name">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" id="c_name" placeholder="Your Company..." value="<?php echo $data['company_name'] ?>">
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="total_emp">Total Employees</label>
                                        <input type="number" name="total_employee" class="form-control" id="total_emp" min="0" placeholder="Enter Amount..." value="<?php echo $data['total_employee'] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mx-auto py-3">
                                        <label for="date">Company Founded In</label>
                                        <input type="date" data-date-format="DD MM YYYY" id="date" class="form-control" name="started_in" value="<?php echo $data['started_in']; ?>">
                                    </div>
                                </div>


                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label for="c_addr">Company Address</label>
                                            <input type="text" name="company_address" class="form-control" id="c_addr" placeholder="Your Company Address..." value="<?php echo $data['company_address'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label for="c_web">Company Website(URL)</label>
                                            <input type="url" name="website" class="form-control" id="c_web" placeholder="http://www.example.com" value="<?php echo $data['website'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="id_proof" class="custom-file-input" id="idFile" value="<?php echo $data['id_proof'] ?>">
                                        <label class="custom-file-label" for="idFile">ID Proof</label>
                                    </div>
                                </div>
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="address_proof" class="custom-file-input" id="addressFile" value="<?php echo $data['address_proof'] ?>">
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
require "footer.php";
?>