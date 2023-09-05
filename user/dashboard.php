<html>

<head>
    <title>EscapePlanner</title>
    <link rel="icon" type="image/x-icon" href="/assets/logo.ico">
    <link rel="stylesheet" href="./dashboard.css">
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
            include "../dbConfig.php";

            if (isset($_SESSION['user_id'])) {


                ?>
                        
        <form method="POST" class="search">
            <input type="text" name="search" class="in" placeholder="Search the location">
            <input type="submit" style="background-image: url('../assets/search-interface-symbol.png'); background-size: contain;" name="submit" value="" class="s2">
            
            <?php

            if (isset($_POST['submit'])) {
                $name = $_POST['search'];
                header("Location: search.php?search=$name");

            }

            ?>
        </form>
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
    <h1>Available Rooms</h1>
    <div class="main">
        
        <?php

        $query = "SELECT room.*
        FROM room
        LEFT JOIN book ON room.roomId = book.roomId AND book.userId = '$userId'
        WHERE book.roomId IS NULL;";
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
                    <div class="book">
                        <?php
                        $roomId = $row['roomId'];
                        $checkBook = "select * from book where userId='$userId'and roomId = '$roomId' and bookStatus in ('1','2','3')";
                        $result4 = mysqli_query($conn, $checkBook);
                        $num = mysqli_num_rows($result4);
                        $rows = mysqli_fetch_assoc($result4);

                        if ($rows['bookStatus'] == 3) {
                            echo "Approval Pending";

                        } else if ($rows['bookStatus'] == 2) {
                            echo "Rejected";
                        } else if ($rows['bookStatus'] == 1) {
                            echo "Accepted";
                        } else {
                            ?>
                                    <a
                                        href="booking.php?Id=<?php echo $userId ?>&Room=<?php echo $row['roomId'] ?>&secondId=<?php echo $row['adminId'] ?>">Book</a>
                            <?php

                        }


                        ?>

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
    <div class="footer">
        copyright 2023
    </div>



</body>


</html>