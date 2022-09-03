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
        } else if (isset($_GET['err'])) {
            echo " <div class='alert alert-danger' role='alert'>
                      Something Went Wrong!!
                    </div>";
        }
        ?>
        <div class="container" data-background-color="orange">



            <div class="card-body" style="overflow-x:auto;">
                <h4 class="card-title text-center py-2">Employers</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Company-Addr</th>
                            <th scope="col">Started-In</th>
                            <th scope="col">Total-Employees</th>
                            <th scope="col">Website(URL)</th>
                            <th scope="col">ID-Proof</th>
                            <th scope="col">Addr-Proof</th>
                            <th scope="col">Edit</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../link.php";
                        $q = "Select * from `employer`";
                        $result = mysqli_query($link, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['company_name']; ?></td>
                                <td><?php echo $data['company_address']; ?></td>
                                <td><?php echo $data['started_in']; ?></td>
                                <td><?php echo $data['total_employee']; ?></td>
                                <td><?php echo $data['website']; ?></td>
                                <td><?php echo $data['id_proof']; ?></td>
                                <td><?php echo $data['address_proof']; ?></td>
                                <td><a href="edit_employer.php?id=<?php echo $data['id']; ?>"><i class="now-ui-icons ui-2_settings-90"></i></a></td>
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