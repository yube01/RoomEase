<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="../main.css">
</head>

<body>
<div class="header">
        <div class="logo">
            <img src="../assets/logo.png" alt="" height="50px">
            <p>EscapePlanner</p>
        </div>

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
        <input type="text" placeholder="Eg: New Road, Kathmandu" name="loc">
        </div>
        <div class="in">
        <span>Description</span>
       
        <input type="text" placeholder="About your room" name="des">
        </div>
        <div class="in">
        <span>Longitude and Latitude</span>
        <input type="text" placeholder="Eg : 27.700769, 85.300140" name="lng">
        </div>
        <div class="in">
        <span>Price</span>
       <div class="ins"> <select name="curr" id="">
            <option value="Npr" name="curr">NPR</option>
            <option value="$" name="curr">$</option>
            <option value="Inr" name="curr">INR</option>
            <option value="Yen" name="curr">YEN</option>
        </select>
        <input type="number" name="price" placeholder="Room price"></div>
        </div>
        
       
        
        <div class="in">
        <span>Images</span>
        <input type="file" name="Picture">
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

        if (move_uploaded_file($temp, $folder)) {
            echo "file moved";
        } else {
            echo "file not moved";
        }




        $query = "insert into room (Location,Descr,Longlat,Images,adminId,currency,price,date) values('$location','$desc','$longlat','$folder','$userId','$curr','$price',NOW())";
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
                    <div class="hotelImg">
                        <img src="<?php echo $row['Images'] ?>" alt="">
                    </div>
                    <div class="details">
                        <div class="hdetails">
                            <p class="hname">
                                <?php echo $row['Location'] ?>
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
                        <div class="rooms">
                            <?php echo $row['Descr'] ?>
                        </div>
                        <div class="price">
                            <p>
                                <?php echo $row['Id'] ?>
                            </p>
                            <p>Includes taxes and fees</p>
                        </div>



                    </div>
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