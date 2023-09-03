<html>

<head>
    <title>EscapePlanner</title>
    <link rel="icon" type="image/x-icon" href="/assets/logo.ico">
    <link rel="stylesheet" href="./dashboard.css">

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
                <div class="username">
                    <?php echo $_SESSION['user_id']; ?>
                </div>

                <?php
            } else {
                header("location:../login/login.php");
            }

            $userId = $_SESSION['id'];
            echo $userId;


            ?>
            <div class="noti">
               
               <div class="icon"><img src="../assets/565422.png" alt=""></div>
               <?php
               $qu = "select * from book where userId = '$userId'";
               $re = mysqli_query($conn, $qu);
       
               $noti = mysqli_num_rows($re);
               ?>
               <div class="notin"><?php echo $noti?></div>
               <?php

               ?>
               
           </div>

            <button>
                <a href="../logout/logout.php">Logout</a>
            </button>

        </div>
    </div>
    <div class="search">
        <form method="POST">
            <input type="text" name="search">
            <input type="submit" name="submit">
            <?php

            if (isset($_POST['submit'])) {
                $name = $_POST['search'];
                header("Location: search.php?search=$name");

            }

            ?>
        </form>
    </div>
    <div class="main">
        <h1>Available Rooms</h1>
        <?php

        $query = "select * from room order by rand()";
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