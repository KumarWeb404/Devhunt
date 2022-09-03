<?php
require "nav.php";
include "link.php";
$id = $_GET['msg'];
$q = "Select * from `projects` where id='$id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $t_used = implode(',', $_POST['t_used']);
    $description = $_POST['description'];
    $url = $_POST['url'];
    if ($_FILES['image']['error'] > 0) {
        $image = $data['image'];
    } else {
        $image = rand(1, 1000) . $_FILES['image']['name'];
        $location = $_FILES['image']['tmp_name'];
        move_uploaded_file($location, "uploads/" . $image);
    }
    $q = "Update `projects` set `title`='$title',`description`='$description',`technical_details`='$t_used',`image`='$image',`url`='$url' where id='$id'";
    $result = mysqli_query($link, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('profile.php')</script>";
    } else {
        echo " <div class='alert alert-danger' role='alert'>
    Something Went Wrong!!
 </div>";
    }
}
if (isset($_POST['delete'])) {
    $q = "Delete from `projects` where id='$id'";
    $result = mysqli_query($link, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('edit_project.php?msg=success')</script>";
    } else {
        echo "<script>window.location.assign('edit_project.php?msg=0')</script>";

    }
} ?>
<div style="background-color: #eee;">
    <div class="container mt-5 py-5">
        <form method="post" enctype="multipart/form-data">
            <?php if (isset($_GET['msg']) == 'success') {

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
            <?php } ?>
            <h2 class="title text-center"> Edit Project</h2>

            <div class="row ">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="uploads/<?php echo $data['image'] ?>" alt="project_img" class=" img-fluid" style="width: 300px;">
                        </div>
                        <input class="d-block mx-auto mb-5" type="file" name="image">

                    </div>
                </div>
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Title</p>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="name" name="title" placeholder="Enter Your Title..." value="<?php echo $data['title']; ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Technologies Used</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group bootstrap-select">
                                        <select name="t_used[]" class="selectpicker" data-size="23" data-style="btn btn-primary btn-round mt-0" title="Technologies Used" required multiple>
                                            <?php
                                            $t = explode(',', $data['technical_details']);
                                            ?>
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
                                    <p class="mb-0">Website (URL)</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="url" name="website" class="form-control" placeholder="http://www.example.com" value="<?php echo $data['url']; ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Description</p>
                                </div>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="description" rows="6" placeholder="Your Project Description..." required><?php echo $data['description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 mr-auto ml-auto text-center">
                    <input class="btn btn-primary btn-round btn-lg mr-2" type="submit" name="submit" value="Update">
                    <input type="submit" name="delete" class="btn btn-danger btn-round btn-lg" value="Delete">
                </div>
            </div>
        </form>

    </div>
</div>
<?php
require "footer.php"
?>