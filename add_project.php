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
                            <h4 class="card-title text-center py-2">Enter Project Details</h4>
                            <form class="form" method="post" enctype="multipart/form-data">
                                <!-- ON SUBMISSION -->
                                <?php
                                if (isset($_POST['submit'])) {
                                    include "link.php";
                                    $id = $_SESSION['id'];
                                    $title = $_POST['title'];
                                    $url = $_POST['url'];
                                    $tech = implode(',', $_POST['t_used']);
                                    $description = $_POST['project_des'];
                                    $img = rand(1, 1000) . $_FILES['img']['name'];
                                    $location = $_FILES['img']['tmp_name']; 
                                    $q = "Insert into `projects`(`title`, `user_id`, `description`, `technical_details`, `image`, `url`)  values ('$title','$id','$description','$tech','$img','$url')";
                                    $result = mysqli_query($link, $q);
                                    if ($result > 0) {
                                        move_uploaded_file($location, "uploads/" . $img);
                                        echo "<script>window.location.assign('profile.php')</script>";
                                    } else {
                                        echo " <div class='alert alert-danger' role='alert'>
                                               Something Went Wrong!!
                                            </div>";
                                    }
                                }
                                ?>
                                <!-- END -->
                                <div class="form-row py-3">
                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Your Title..." required>
                                    </div>

                                    <div class="form-group col-md-4 mx-auto">

                                        <label for="p_web">Project Website(URL)</label>
                                        <input type="url" name="url" class="form-control" id="p_web" placeholder="http://www.example.com" required>
                                    </div>
                                </div>
                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label for="description">Project Description</label>
                                            <textarea name="project_des" class="form-control" id="description" rows="6" placeholder="Your Project Description..."></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label>Technologies Used</label>
                                            <div class="btn-group bootstrap-select">
                                                <select name="t_used[]" class="selectpicker" data-size="23" data-style="btn btn-primary btn-round mt-0" title="Technologies Used" required multiple>
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
                                <div class="form-row py-4">
                                    <div class="custom-file col-md-6 mx-auto">
                                        <input type="file" name="img" class="custom-file-input" id="File" required>
                                        <label class="custom-file-label" for="File">Project Home Page</label>
                                    </div>
                                </div>
                                <div class="card-footer text-center mb-2">
                                    <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg" value="Add Project">
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