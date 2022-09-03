<?php
require "nav.php";
(isset($_GET['msg'])) ?  $id = $_GET['msg'] : $id = $_SESSION['id'];
include "link.php";
$project_id = $_GET['id'];
$q = "Select * from `projects` where id='$project_id'";
$result = mysqli_query($link, $q);
$data = mysqli_fetch_assoc($result);

?>

<div class="team-5 section-image">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="uploads/<?php echo $data['image'] ?>" alt="project-img">
            </div>
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h2 class="title"><?php
                                    echo $data['title']; ?></h2>
                <h4 class="description"><?php echo $data['description'] ?></h4>

                <a href="<?php echo $data['url'] ?>" target="_blank"> <button class='btn btn-primary btn-round btn-lg'>Visit Website</button></a>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="title text-center">More Info</h4>
        <div class="nav-align-center">
            <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#messages" role="tablist">
                        <i class="now-ui-icons design-2_ruler-pencil"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home" role="tablist">
                        <i class="now-ui-icons travel_info"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content gallery">
            <div class="tab-pane active" id="messages" role="tabpanel">
                <h4 class="title text-center">Technologies Used</h4>
                <div class="row">
                    <?php

                    $x = "Select * from `projects` where id= '$project_id'";
                    $y = mysqli_query($link, $x);
                    $output = mysqli_fetch_assoc($y);
                    $input = explode(',', $output['technical_details']);
                    for ($i = 0; $i < count($input); $i++) {
                        if ($input[$i] == "html") {
                            echo " <div class='col-md-3'>
                             <div class='info'>
                     <div class='icon icon-primary icon-circle'>
                <i class='fa-brands fa-html5' style='color: #f96332;'></i>

                 </div>
                <h4 class='info-title'>HTML</h4>
              </div>
               </div>";
                        } else if ($input[$i] == "css") {
                            echo " <div class='col-md-3'>
                      <div class='info'>
                 <div class='icon icon-info icon-circle'>
                <i class='fa-brands fa-css3-alt' style='color: #007bff;'></i>
            </div>
            <h4 class='info-title'>CSS</h4>
        </div>
    </div>";
                        } else if ($input[$i] == "bootstrap") {
                            echo " <div class='col-md-3'>
        <div class='info'>
            <div class='icon icon-circle' style='-webkit-box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);'>
                <i class='fa-brands fa-bootstrap' style='color:#563d7c;' ></i>

            </div>
            <h4 class='info-title'>Bootstrap</h4>
        </div>
    </div>";
                        } else if ($input[$i] == "javascript") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-warning icon-circle'>
            <i class='fa-brands fa-js' style='color: #f7df1e;'></i>

        </div>
        <h4 class='info-title'>Javascript</h4>
    </div>
</div>";
                        } else if ($input[$i] == "php") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-circle' style = '-webkit-box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);
        box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);'>
            <i class='fa-brands fa-php' style='color:#474A8A;'></i>

        </div>
        <h4 class='info-title'>PHP</h4>
    </div>
</div>";
                        } else if ($input[$i] == "mysql") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-solid fa-database'></i>

        </div>
        <h4 class='info-title'>MySQL</h4>
    </div>
</div>";
                        } else if ($input[$i] == "react") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-info icon-circle'>
            <i class='fa-brands fa-react' style='color: #61DBFB;'></i>

        </div>
        <h4 class='info-title'>React</h4>
    </div>
</div>";
                        } else if ($input[$i] == "vue.js") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-success icon-circle'>
            <i class='fa-brands fa-vuejs' style='color: #41B883;'></i>

        </div>
        <h4 class='info-title'>Vue.Js</h4>
    </div>
</div>";
                        } else if ($input[$i] == "angular") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-angular' style='color: #B52E31;'></i>

        </div>
        <h4 class='info-title'>Angular</h4>
    </div>
</div>";
                        } else if ($input[$i] == "node.js") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-success icon-circle'>
            <i class='fa-brands fa-node' style='color: #68A063;'></i>

        </div>
        <h4 class='info-title'>Node.Js</h4>
    </div>
</div>";
                        } else if ($input[$i] == "swift") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-swift' style='color: #f05138;'></i>

        </div>
        <h4 class='info-title'>Swift</h4>
    </div>
</div>";
                        } else if ($input[$i] == "git") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-git' style='color: #F1502F;'></i>

        </div>
        <h4 class='info-title'>Git</h4>
    </div>
</div>";
                        } else if ($input[$i] == "sass") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-sass'></i>

        </div>
        <h4 class='info-title'>Sass</h4>
    </div>
</div>";
                        } else if ($input[$i] == "java") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-info icon-circle'>
            <i class='fa-brands fa-java' style='color: #5382a1;'></i>

        </div>
        <h4 class='info-title'>Java</h4>
    </div>
</div>";
                        } else if ($input[$i] == "rust") {
                            echo " <div class='col-md-3'>
    <div class='info'>
        <div class='icon icon-danger icon-circle'>
            <i class='fa-brands fa-rust'></i>

        </div>
        <h4 class='info-title'>Rust</h4>
    </div>
</div>";
                        } else if ($input[$i] == "ps") {
                            echo "<div class='col-md-3'>
                                          <div class='info'>
                                           <div class='icon icon-info icon-circle'>
                                               <img class='mt-4' src='assets/img/photoshop.png' width='30'>
 
                                               </div>
                                               <h4 class='info-title'>Photoshop</h4>
                                           </div>
                                           </div>";
                        } else if ($input[$i] == "ai") {
                            echo " <div class='col-md-3'>
                                          <div class='info'>
                                              <div class='icon icon-primary icon-circle'>
                                                 <img class='mt-4' src='assets/img/illustrator.png' width='30'>

                                              </div>
                                              <h4 class='info-title'>Illustrator</h4>
                                          </div>
                                      </div>";
                        } else if ($input[$i] == "xd") {
                            echo "  <div class='col-md-3'>
                                            <div class='info' >
                                                <div class='icon icon-circle' style = '-webkit-box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);
                                                  box-shadow: 0 15px 30px 0 rgba(86, 61, 124, 0.35);'>
                                                   <img class='mt-4' src='assets/img/xd.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>XD</h4>
                                            </div>
                                        </div>";
                        } else if ($input[$i] == "excel") {
                            echo " <div class='col-md-3'>
                                         <div class='info'>
                                             <div class='icon icon-success icon-circle'>
                                                <img class='mt-4' src='assets/img/excel.png' width='30'>

                                             </div>
                                             <h4 class='info-title'>MS Excel</h4>
                                         </div>
                                     </div>";
                        } else if ($input[$i] == "in") {
                            echo "<div class='col-md-3'>
                                            <div class='info'>
                                                <div class='icon icon-danger icon-circle'>
                                                   <img class='mt-4' src='assets/img/indesign.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>Indesign</h4>
                                            </div>
                                        </div>";
                        } else if ($input[$i] == "word") {
                            echo "  <div class='col-md-3'>
                                            <div class='info'>
                                                <div class='icon icon-info icon-circle'>
                                                   <img class='mt-4' src='assets/img/word.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>MS Word</h4>
                                            </div>
                                        </div>";
                        } else if ($input[$i] == "ppt") {
                            echo "
                                            <div class='col-md-3'>
                                                <div class='info'>
                                                    <div class='icon icon-primary icon-circle'>
                                                       <img class='mt-4' src='assets/img/powerpoint.png' width='30'>

                                                    </div>
                                                    <h4 class='info-title'>MS PowerPoint</h4>
                                                </div>
                                            </div>";
                        } else if ($input[$i] == "figma") {
                            echo " <div class='col-md-3'>
                                            <div class='info'>
                                                <div class='icon icon-primary icon-circle'>
                                                   <img class='mt-4' src='assets/img/figma.png' width='30'>

                                                </div>
                                                <h4 class='info-title'>Figma</h4>
                                            </div>
                                        </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- UNDER-MAINTENANCE ^ -->

            <div class="tab-pane" id="home" role="tabpanel">
                <div class="row">
                    <div class="container mt-3">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-7">
                                <div class="card p-3 py-4">
                                    <div class="text-center">
                                        <?php
                                        $s = "Select * from `user` where id='$id'";
                                        $res = mysqli_query($link, $s);
                                        $info = mysqli_fetch_assoc($res);
                                        if ($info['profile_img'] !== '') {
                                        ?>
                                            <img src="uploads/<?php echo $info['profile_img']; ?>" class="img-fluid rounded-circle" style="width: 100px;
                                            height:100px;" alt="profile_img">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="assets/img/profile-sample.png" class="img-fluid rounded-circle" style="width: 100px;
                                            height:100px;" alt="">
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="text-center mt-3">
                                        <h5 class="mt-2 mb-0"><?php echo ucwords($info['name']) ?></h5>
                                        <span><?php echo ucfirst($info['skills']); ?></span>

                                        <div class="px-4 mt-1">
                                            <p class="fonts"><?php echo ucfirst($info['user_description']); ?></p>

                                        </div>
                                        <div class="buttons">
                                            <a href="" class="btn btn-default btn-round px-4">Message</a>
                                            <a href="profile.php?msg=<?php echo $id ?>" class="btn btn-primary btn-round btn-md">View Profile</a>
                                        </div>


                                    </div>




                                </div>

                            </div>

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