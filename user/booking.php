<html>

<head>
    <title>Booking</title>
</head>

<body>
    <h1>Booking Detail Form</h1>
    <form method="POST" enctype="multipart/form-data">
        <p>First Name</p>

        <input type="text" name="fname" required>
        <p>Last Name</p>

        <input type="text" name="lname" required>
        <p>Phone no</p>

        <input type="number" name="phone" required>
        <p>Upload Citizenship Image</p>

        <input type="file" name="citizen" required>

        <button value="Submit" name="submit"> Book </button>
    </form>
    <?php
    include "../dbConfig.php";
   
    if(isset($_POST['submit'])){

        if(isset($_GET['Id'])){
            $userId = $_GET['Id'];
            $roomId = $_GET['Room'];
            $adminId = $_GET['secondId'];
           
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $Picture = $_FILES['citizen']['name'];
        $temp = $_FILES['citizen']['tmp_name'];
        $folder = "../picture/" . $Picture;
        if (move_uploaded_file($temp, $folder)) {
            echo "file moved";
        } else {
            echo "file not moved";
        }

        $query = "insert into book (phone,firstName,lastName,citizenship,userId,roomId,userBook,adminId) values ('$phone','$fname','$lname','$folder','$userId','$roomId',1,'$adminId')";
        $result = mysqli_query($conn,$query);

        if($result){
            
            header("location:dashboard.php");
        }else{
            echo "not booked";
        }

    }


    }


?>
</body>

</html>