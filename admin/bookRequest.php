<html>
    <head>
        <title>Book Request</title>
        <link rel="stylesheet" href="./admin.css">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="./bookRequest.css">
        <link rel="stylesheet" href="../user/userStatus.css">
       
    </head>
    <body>
       
        <div class="header">
       <a href="adminPanel.php">
         <div class="logo">
         <img src="../assets/Picsart_23-09-09_14-19-01-490.png" alt="" height="100px">
            <p>RoomEase</p>
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
   <div class="mainBody">
   <div class="bookRequest">
        <h1>Book Request</h1>
        <?php
        include "../dbConfig.php";
        if(isset($_GET['userId'])){
            $userId = $_GET['userId'];


            //checking if user is authorize
            if(isset($_SESSION['id'])){
                $session =  $_SESSION['id'];

                if($session != $userId){
                    header("Location: ../login/login.php");
                }

            }

           
            
            $qu = "select * from book inner join room on book.roomId = room.roomId where book.adminId = '$userId' and book.bookStatus = '3'";
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
                            <a href="imageView.php?imageId=<?php echo basename($row['citizenship']) ?>&id=<?php echo $userId?>"><img src="<?php echo $row['citizenship']; ?>" alt=""></a>
                            
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
                                    <?php echo nl2br($row['Descr'])?>
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="bookbtn">
                     
                            <a href="bookStatus.php?bookId=<?php echo $row['bookId'] ?>&accept=True&roomId=<?php echo $row['roomId']?>&userId=<?php echo $userId?>"
                                onclick="return confirm('Do you want to accept?')"  id="edit">Accept</a>
                            <?php

                        
                        ?>

                        <a href="bookStatus.php?bookId=<?php echo $row['bookId'] ?>&reject=True&userId=<?php echo $userId?>"  id="delete">Reject</a>

                    </div>
                </div>


                <?php
            }
        }else{
            echo "No request for booking";
        }

    




        }

        ?>
    </div>
    <div class="status">
        <div class="accepted">
            <span class="title">Accepted User</span>
            <?php
            $accept = "select firstName,lastName,phone,citizenship from book where adminId = '$userId' and bookStatus = '1' ORDER BY bookId DESC";
            $res1 = mysqli_query($conn,$accept);
            $num1 = mysqli_num_rows($res1);
            if($num1 > 0){
                while($rows = mysqli_fetch_assoc($res1)){
                    ?>
                    <div class="user1">
                        <div class="citi">
                            <img src="<?php echo $rows['citizenship']?>" alt="">
                        </div>
                        <div class="userDet">
                        <span>Name :<?php echo $rows['firstName']?></span>
                        <span><?php echo $rows['lastName']?></span>
                        <br>
                        <span>Phone no:<?php echo $rows['phone']?></span>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo "No Record";
            }

            ?>
        </div>
        <div class="rejected">
            <span class="title2">Rejected User</span>
        <?php
            $accept = "select firstName,lastName,phone,citizenship from book where adminId = '$userId' and bookStatus = '2' ORDER BY bookId DESC";
            $res1 = mysqli_query($conn,$accept);
            $num1 = mysqli_num_rows($res1);
            if($num1 > 0){
                while($rows = mysqli_fetch_assoc($res1)){
                    ?>
                    <div class="user1">
                        <div class="citi">
                            <img src="<?php echo $rows['citizenship']?>" alt="">
                        </div>
                        <div class="userDet">
                        <span>Name :<?php echo $rows['firstName']?></span>
                        <span><?php echo $rows['lastName']?></span>
                        <br>
                        <span>Phone no:<?php echo $rows['phone']?></span>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo "No record";
            }

            ?>
        </div>
    </div>
   </div>
    </body>
</html>