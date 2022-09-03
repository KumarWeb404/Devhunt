<?php
     include "../link.php";
     $id = $_GET['id'];
     $q = "Delete from `contact` where id='$id'";
  
     $result = mysqli_query($link, $q);
     if($result > 0){
      echo "<script>window.location.assign('contact.php?success');</script>";
      
  }else{
      echo "<script>window.location.assign('contact.php?err');</script>";
  }
?>