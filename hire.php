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
                            <h4 class="card-title text-center py-2">Enter Details</h4>
                            <form class="form" method="post" enctype="multipart/form-data">
                                <!-- ON SUBMISSION -->
                                <!-- END -->
                                <div class="form-row py-3">
                                    <div class="form-group col-md-4 mx-auto">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Your Title..." required>
                                    </div>

                                </div>
                                <div class="form-row py-3">
                                    <div class="col-md-4 mx-auto">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="des" class="form-control" id="description" rows="6" placeholder="Your Description..."></textarea>
                                        </div>
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
require "footer.php"
?>