<?php
require 'nav.php'
?>

<div class="presentation-page">
    <div class="section section-sections" data-background-color="black">
        <div class="container">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="section-description text-center">
                    <h2 class="title">My Projects</h2>
                    <a href="
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo "add_project.php";
                    } else {
                        echo "login-page.php";
                    }
                    ?>" class="btn btn-primary btn-round text-center">Add A New Project</a>
                </div>
            </div>
            <div class="album py-5" data-background-color="black">
                <div class="container">
                    <div class="row">
                        <?php
                        include "link.php";
                        $q = "Select * from `projects` where user_id=" . $_SESSION['id'];
                        // SELECT * FROM `projects` left join user on projects.user_id=user.id;

                        $result = mysqli_query($link, $q);
                        foreach ($result as $data) {
                        ?>
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="uploads/<?php echo $data['image']; ?>" data-holder-rendered="true">
                                    <div class="card-body">
                                        <h4 class="card-title text-center">
                                            <a href="view_project.php?msg=<?php echo $data['user_id']; ?>&&id=<?php echo $data['id'] ;?>" class="card-link"><?php echo ucwords($data['title']); ?></a>
                                        </h4>
                                        <div class="card-description text-center mb-3">
                                            <?php echo $data['description']; ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="view_project.php?msg=<?php echo $data['user_id']; ?>&&id=<?php echo $data['id']; ?>" type="button" class="btn btn-sm btn-primary">View Project</a>
                                                <a href="edit_project.php?msg=<?php echo $data['id'] ?>" type="button" class="btn btn-sm btn-default">Edit</a>

                                            </div>
                                            <a href="profile.php?msg=<?php echo $data['user_id']; ?>" class="text-muted"> <?php
                                                                                                                            $user_id = $data['user_id'];
                                                                                                                            $s = "Select * from `user` where id='$user_id'";
                                                                                                                            $res = mysqli_query($link, $s);
                                                                                                                            $info = mysqli_fetch_assoc($res);
                                                                                                                            echo ucwords($info['name']); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
require 'footer.php'
?>