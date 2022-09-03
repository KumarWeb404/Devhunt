<?php
require "nav.php";
include "link.php";
$id = $_SESSION['id'];
$q = "Select * from `hire` where user_id = $id";
$result = mysqli_query($link, $q);
$input = mysqli_fetch_assoc($result);
$e = "Select * from `employer` where id = " . $input['employer_id'];
$result2 = mysqli_query($link, $e);
$input2 = mysqli_fetch_assoc($result2);
$i = 1;
?>
<div class="presentation-page">
    <div class="section section-sections">
        <div class="container">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="section-description text-center">
                    <h2 class="title text-primary">Messages</h2>
                </div>
            </div>
            <table class="table">
                <thead class="thead bg-primary">
                    <tr style="color: white;">
                        <th scope="col">Sr.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $data) { ?>
                        <tr class="text-primary">
                            <th scope="row" class="text-primary">1</th>
                            <td><?php echo $input2['name'] ?></td>
                            <td><?php echo $input2['email'] ?></td>
                            <td><?php echo $data['description'] ?></td>
                            <td><button class="btn btn-link btn-success" onclick="accept()">Accept</button> <button  class="btn btn-link btn-danger" onclick="decline()">Decline</button></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
            <!-- <h4>From Employers:-</h4>
            <table class="table">
                <thead class="thead bg-primary">
                    <tr style="color: white;">
                        <th scope="col">Sr.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-primary">
                        <th scope="row" class="text-primary">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <td>
                            <div class="card card-plain">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        Collapsible Group Item #1
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table> -->
        </div>

    </div>
</div>
<?php
require "footer.php";
?>