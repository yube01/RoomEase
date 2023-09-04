<html>
    <head>
        <title>Book Request</title>
        <link rel="stylesheet" href="./admin.css">
    </head>
    <body>
    <div class="bookRequest">
        <h1>Book Request</h1>
        <?php
        include "../dbConfig.php";
        if(isset($_GET['userId'])){
            $userId = $_GET['userId'];
            
            $qu = "select * from book inner join room on book.roomId = room.roomId where book.adminId = '$userId' and book.bookStatus = '3'";
        $re = mysqli_query($conn, $qu);

        $nums = mysqli_num_rows($re);

        if ($nums > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                ?>
                <div class="card">
                    <div class="userDetail">
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
                    <div class="roomDetail">
                        <div class="roomImg">

                            <img src="<?php echo $row['Images'] ?>" alt="">
                        </div>
                        <div class="roomDetail">
                            <div class="i">
                                <p>Location:</p>
                                <p>
                                    <?php echo $row['Location'] ?>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="bookbtn">
                        <?php if ($row['bookStatus'] == 1) {
                            echo "book accepted";
                        } 
                        
                        else {
                            ?>
                            <a href="bookStatus.php?bookId=<?php echo $row['bookId'] ?>&accept=True&roomId=<?php echo $row['roomId']?>&userId=<?php echo $userId?>"
                                onclick="return confirm('Do you want to accept?')">Accept</a>
                            <?php

                        }
                        ?>

                        <a href="bookStatus.php?bookId=<?php echo $row['bookId'] ?>&reject=True&userId=<?php echo $userId?>">Reject</a>

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