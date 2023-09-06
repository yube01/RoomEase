<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
<div class="header">
<a href="adminPanel.php">
         <div class="logo">
            <img src="../assets/logo.png" alt="" height="50px">
            <p>EscapePlanner</p>
        </div>
       </a>

        <div class="options">
            <?php
              session_start();

              if (isset($_SESSION['user_id'])) {
          
                  ?>
                  <div class="user"><?php echo $_SESSION['user_id'];?></div>
                  <?php
              } else {
                  header("location:../login/login.php");
              }
              $userId = $_SESSION['id'];
            
          
              include "../dbConfig.php";


            ?>
            <div class="noti">
               
               <a href="bookRequest.php?userId=<?php echo $userId ?>"><img src="../assets/565422.png" alt="" class="imgs">
               <?php
                $qu = "select * from book inner join room on book.roomId = room.roomId where book.adminId = '$userId' and book.bookStatus = '3'";
                $re = mysqli_query($conn, $qu);
        
                $noti = mysqli_num_rows($re);
                ?>
                <div class="notin"><?php echo $noti?></div>
                <?php

                ?>
                </a>
                
            </div>

            <button>
                <a href="../logout/logout.php">Logout</a>
            </button>

        </div>
    </div>
    <div class="mainContent">
    <div class="addRoom">
    <h1>Add Room Detail</h1>
    <form method="POST" enctype="multipart/form-data">
        
        <div class="in">
        <span>Place Name</span>
        <input required="true" type="text" placeholder="Eg: New Road" name="loc">
        </div>
        <div class="in">
        <span>District</span>
       
        <input required="true" type="text" placeholder="Eg: Kathmandu" name="dis">
        </div>
        <div class="in">
        <span>Description</span>
       
        <input required="true" type="text" placeholder="About your room" name="des">
        </div>
        <div class="in">
        <span>Longitude and Latitude</span>
        <input required="true" type="text" placeholder="Eg : 27.700769, 85.300140" name="lng">
        </div>
        <div class="in">
        <span>Price</span>
       <div class="ins"> <select name="curr" id="">
            <option value="NPR" name="curr">NPR</option>
            <option value="$" name="curr">$</option>
            <option value="INR" name="curr">INR</option>
            <option value="£" name="curr">£</option>
        </select>
        <input required="true" type="number" name="price" placeholder="Room price"></div>
        </div>
        
       
        
        <div class="in">
        <span>Images</span>
        <input required="true" type="file" name="Picture">
        </div>
        <button type="submit" name="submit">Submit</button>
      
    </form>

    <?php

  
    if (isset($_POST['submit'])) {


        $checkPost = "select adminId from room where adminId = '$userId'";
        $res = mysqli_query($conn,$checkPost);
        $rows = mysqli_num_rows($res);
        

       if($rows<= 2){
        $location = strtolower($_POST["loc"]);
        $desc = $_POST["des"];
        $longlat = $_POST["lng"];
        $Picture = $_FILES['Picture']['name'];
        $temp = $_FILES['Picture']['tmp_name'];
        $folder = "../picture/" . $Picture;
        $curr = $_POST['curr'];
        $price = $_POST['price'];
        $dis = $_POST['dis'];

        if (move_uploaded_file($temp, $folder)) {
            echo "file moved";
        } else {
            echo "file not moved";
        }




        $query = "insert into room (Location,Descr,Longlat,Images,adminId,currency,price,date,district) values('$location','$desc','$longlat','$folder','$userId','$curr','$price',NOW(),'$dis')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {


            echo "data inserted";
        } else {
            echo "not inserted";
        }
       }else{
        echo "You can only post two room";
    }
    }





    ?>
    </div>
    
    <div class="hostView">
        <h1>Your Listings</h1>
        <?php

        $query = "select * from room where adminId = '$userId'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="card">
                   <div class="first"> <div class="hotelImg">
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
                                    <?php echo $row['Longlat'] ?>
                                </p>
                                <p></p>
                            </span>
                        </div>
                        <div class="desc">
                            <?php echo $row['Descr'] ?>
                        </div>
                        
                        <div class="price">
                        <p>Includes taxes and fees</p>
                            <p>
                            <?php echo $row['currency'] ?>   <?php echo $row['price'] ?>
                            </p>
                            
                        </div>
                        <div class="datePosted">
                            <?php
                            

                            // Convert the date string to a Unix timestamp
                            $timestamp = strtotime($row['date']);
                            
                            if ($timestamp === false) {
                                echo "Invalid date format";
                            } else {
                                // Calculate the time elapsed since the given date
                                $currentTime = time();
                                $elapsedTime = $timestamp - $currentTime;
                            
                                // You can format the elapsed time as needed, for example, in minutes, hours, days, etc.
                                if ($elapsedTime < 60) {
                                    // Less than 1 minute, show in seconds
                                    $elapsedUnit = "second";
                                    $elapsedValue = $elapsedTime;
                                } elseif ($elapsedTime < 3600) {
                                    // Less than 1 hour, show in minutes
                                    $elapsedUnit = "minute";
                                    $elapsedValue = floor($elapsedTime / 60);
                                } elseif ($elapsedTime < 86400) {
                                    // Less than 1 day, show in hours
                                    $elapsedUnit = "hour";
                                    $elapsedValue = floor($elapsedTime / 3600);
                                }  elseif ($elapsedTime < 2592000) {
                                    // Less than 30 days, show in days
                                    $elapsedUnit = "day";
                                    $elapsedValue = floor($elapsedTime / 86400);
                                } elseif ($elapsedTime < 31536000) {
                                    // Less than 365 days (1 year), show in months
                                    $elapsedUnit = "month";
                                    $elapsedValue = floor($elapsedTime / 2592000); // assuming 30 days per month
                                } else {
                                    // More than 1 year, show in years
                                    $elapsedUnit = "year";
                                    $elapsedValue = floor($elapsedTime / 31536000); // assuming 31,536,000 seconds per year
                                }
                            
                                // Display the elapsed time in the appropriate unit
                                if ($elapsedValue == 1) {
                                    echo "Uploaded: $elapsedValue $elapsedUnit ago" ;
                                } else {
                                    echo "Uploaded: $elapsedValue {$elapsedUnit}s ago";
                                }
                            }


?>
                        </div>



                    </div></div>
                    <div class="crud">
                        <a href="../crud/edit.php?Id=<?php echo $row['roomId'] ?>" id="edit">Edit</a>
                        <a href="../crud/delete.php?Id=<?php echo $row['roomId'] ?>" id="delete">Delete</a>



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