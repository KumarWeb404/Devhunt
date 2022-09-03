<?php
require "nav.php";
if(!isset($_SESSION['admin_name'])){
    echo "<script>window.location.assign('admin_login.php?err')</script>";
}
?>
<div class="page-header " filter-color="orange">
    <div class="page-header-image" style="background-image:url(../assets/img/login.jpg);"></div>
    <div class="content">
        <?php
        if (isset($_GET['success'])) {
            echo " <div class='alert alert-primary' role='alert'>
                     Data Updated!!
                   </div>";
        } else if(isset($_GET['err'])){
            echo " <div class='alert alert-danger' role='alert'>
                      Something Went Wrong!!
                    </div>";
        }
        ?>
        <div class="container" data-background-color="orange">
            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title text-center py-2">Users</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Qual</th>
                            <th scope="col">Exp</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Emp-State</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Id-Proof</th>
                            <th scope="col">Addr-Proof </th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../link.php";
                        $q = "Select * from `user`";
                        $result = mysqli_query($link, $q);
                        $i = 1;
                        foreach ($result as $data) {

                        ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['qualification']; ?></td>
                                <td><?php echo $data['experience']; ?></td>
                                <td><?php echo $data['skills']; ?></td>
                                <td><?php echo $data['current_working']; ?></td>
                                <td><?php echo $data['gender']; ?></td>
                                <td><?php echo $data['address']; ?></td>
                                <td><?php echo $data['id_proof']; ?></td>
                                <td><?php echo $data['address_proof']; ?></td>
                                <td><a href="edit_users.php?id=<?php echo $data['id'];?>"><i class="now-ui-icons ui-2_settings-90"></i></a></td>
                            </tr>
                        <?php
                       
                        $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</div>
<?php
require "footer.php";
?>