<html>
    <head>
        <title>Status</title>
        <link rel="stylesheet" href="./userStatus.css">
        <link rel="stylesheet" href="../admin/admin.css">
        <link rel="stylesheet" href="./dashboard.css">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="../admin/bookRequest.css">
        
        
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
        <div class="bookRequest">
        <h1>Status</h1>
        <?php
        include "../dbConfig.php";
        if(isset($_GET['userId'])){
            $userId = $_GET['userId'];

            //checking if user is authorize
            if(isset($_SESSION['id'])){
                $session =  $_SESSION['id'];

                if($session != $userId){
                    header("Location: ../denied.html");
                }

            }
            
            $qu = "select * from book inner join room on book.roomId = room.roomId where book.userId = '$userId'";
        $re = mysqli_query($conn, $qu);

        $nums = mysqli_num_rows($re);

        if ($nums > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                ?>
                <div class="card1">
                <div class="userDetail">
                        <span>User Detail</span>
                        <div class="userInfo">
                        <div class="userImg">
                            <p>Citizenship:</p>
                            <img src="<?php echo $row['citizenship']; ?>" alt="">
                        </div>
                        <div class="info">
                            <div class="i">
                                <p>Name:</p>
                                <p>
                                    <?php echo $row['firstName'] . " " . $row['lastName'] ?>
                                </p>
                            </div>
                            <div class="i">
                                <p>Phone no :</p>
                                <p>
                                    <?php echo $row['phone'] ?>
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="userDetail">
                        <span>Room Detail</span>
                        <div class="userInfo">
                        <div class="userImg">
                            <p>Room Image:</p>
                            <img src="<?php echo $row['Images']; ?>" alt="">
                        </div>
                        <div class="info">
                            <div class="i">
                                <p>Location:</p>
                                <p>
                                    <?php echo $row['Location'] ?>
                                </p>
                            </div>
                            <div class="i">
                                
                                <p id="de"> 
                                    Description:
                                    <?php echo $row['Descr'] ?>
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="bookbtn">
                        <?php if ($row['bookStatus'] == 1) {
                            ?>
                            <div class="sta green">
                                <?php  echo "Book accepted";?>

                            </div>

                            <?php
                           
                        } 
                        
                        else if($row['bookStatus'] == 2) {
                            ?>
                            <div class="sta red">
                                <?php   echo "Rejected";?>

                            </div>

                            <?php
                           
                            

                        }else{
                            ?>
                            <div class="sta yellow">
                                <?php   echo "Pending";?>

                            </div>

                            <?php
                           
                        }
                        ?>

                    </div>
                </div>


                <?php
            }
        }

    




        }

        ?>
        </div>
    </body>
</html>