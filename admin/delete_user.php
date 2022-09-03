<?php
   include '../link.php';
   $id = $_GET['id'];
   $q = "Delete from `user` where id='$id'";

   $result = mysqli_query($link, $q);
   if($result > 0){
    echo "<script>window.location.assign('users.php?success');</script>";
    
}else{
    echo "<script>window.location.assign('users.php?err');</script>";
}

?>