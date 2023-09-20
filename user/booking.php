<html>

<head>
    <title>Booking</title>
    <link rel="stylesheet" href="./dashboard.css">
    <link rel="stylesheet" href="./booking.css">
    <link rel="stylesheet" href="../admin/admin.css">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
<div class="header">
       <a href="./dashboard.php">
         <div class="logo">
         <img src="../assets/Picsart_23-09-09_14-19-01-490.png" alt="" height="100px">
            <p>RoomEase</p>
        </div>
       </a>

       <div class="options">
            <?php
            session_start();
            include "../dbConfig.php";

            if (isset($_SESSION['user_id'])) {


                ?>
                        
        
                <div class="username">
                    <?php echo $_SESSION['user_id']; ?>
                </div>

                <?php
            } else {
                header("location:../login/login.php");
            }
            ?>
         
            <?php

            $userId = $_SESSION['id'];
            


            ?>
        
            <div class="noti">
               
            <a href="status.php?userId=<?php echo $userId ?>"><img src="../assets/565422.png" alt="" class="imgs">
            <?php
               $qu = "select * from book where userId = '$userId'";
               $re = mysqli_query($conn, $qu);
       
               $noti = mysqli_num_rows($re);
               ?>
               <div class="notin"><?php echo $noti?></div>
               <?php

               ?></a>
               
               
           </div>

            <button>
                <a href="../logout/logout.php">Logout</a>
            </button>

        </div>
    </div>
    <div class="bookDetails">
    <div class="bookRequest">
    <h1>Booking Detail Form</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="in"><span>First Name</span>

<input type="text" name="fname" required></div>
        <div class="in"><span>Last Name</span>

<input type="text" name="lname" required></div>
        <div class="in"><span>Phone no</span>

<input type="number" name="phone" required></div>
        <div class="in"><span>Upload Citizenship Image</span>

<input type="file" name="citizen" required id="filename"></div>

        <button value="Submit" name="submit"> Book </button>
    </form>
    <?php
    include "../dbConfig.php";
    if(isset($_GET['Id'])){
        $userId = $_GET['Id'];
        $roomId = $_GET['Room'];
        $adminId = $_GET['secondId'];

        //checking if user is authorize
        if(isset($_SESSION['id'])){
            $session =  $_SESSION['id'];

            if($session != $userId){
                header("Location: ../denied.html");
            }

        }


   
    if(isset($_POST['submit'])){

        
           
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

        $query = "insert into book (phone,firstName,lastName,citizenship,userId,roomId,adminId,bookStatus)
         values ('$phone','$fname','$lname','$folder','$userId','$roomId','$adminId',3)";
        
        $result = mysqli_query($conn,$query);
        echo $result;

        if($result){
            
            header("location:dashboard.php");
        }else{
            echo "not booked";
        }

    }


    }


?>
    </div>

<div class="cards">
   <h1>Room Details</h1>
        <?php

        $query = "select * from room where roomId = '$roomId'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="card">
                   
                    <div class="imgDetails">
                    <div class="hotelImg">
                        <img src="<?php echo $row['Images'] ?>" alt="">
                    </div>
                    <div class="details">
                        <div class="hdetails">
                            <p class="hname">
                                <?php echo $row['Location'] ?> ,
                                <?php echo $row['district'] ?>
                            </p>
                            <span class="loc">
                                <p>
                                    Longitude and Latitude : <?php echo $row['Longlat'] ?>
                                </p>
                                <p></p>
                            </span>
                        </div>
                        
                        
                        <div class="price">
                        <p>Includes taxes and fees</p>
                            <p>
                            <?php echo $row['currency'] ?>   <?php echo $row['price'] ?>
                            </p>
                            
                        </div>
                        <div class="datePosted">
                            <?php
                            
                            echo "Date: " . $row['date'];
                           


?>
                        </div>



                    </div>
                    </div>

                    <div class="desc">
                            <?php echo $row['Descr'] ?>
                        </div>
                    
                </div>

                <?php
            }
        } else {
            echo "no data found";
        }

        ?>
              </div>
    </div>
</body>

</html>