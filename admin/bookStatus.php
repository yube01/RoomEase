<?php
include "../dbConfig.php";
if(isset($_GET['accept'])){
    if(isset($_GET['bookId'])){

        $bookId = $_GET['bookId'];
        $roomId = $_GET['roomId'];
        $userId = $_GET['userId'];
     
        
        
        $accept = "update book set bookStatus='1' where bookId = '$bookId'";




       
        $sql = mysqli_query($conn,$accept);
        if($sql){
            echo "value updated";
            $updateRestQuery = "UPDATE book SET bookStatus='2' WHERE roomId = '$roomId' AND bookId != '$bookId'";
            $sqls = mysqli_query($conn,$updateRestQuery);
            if($sqls){
                echo "updated";
                header("location:bookRequest.php?userId=$userId");

            }else{
                echo "error";
            }

      
        }else{
            echo "error";
        }
    
     }
}
if(isset($_GET['reject'])){
    if(isset($_GET['bookId'])){

        $bookId = $_GET['bookId'];
        $userId = $_GET['userId'];
     
        
        
        $accept = "update book set bookStatus='2' where bookId = '$bookId'";
        $sql = mysqli_query($conn,$accept);
        if($sql){
            echo "value updated";
            header("location:bookRequest.php?userId=$userId");
          
        }else{
            echo "error";
        }
    
     }
}
?>