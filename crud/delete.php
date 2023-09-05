<?php
include "../dbConfig.php";
if(isset($_GET['Id'])){
    $delId = $_GET['Id'];
    $query = "delete from room where roomId = '$delId'";
    $result = mysqli_query($conn,$query);
    if($result){
        header("location:../admin/adminPanel.php");
    }else{
        echo "not deleted";
    }
}



?>


