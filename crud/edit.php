<html>
    <head>
        <title>Edit</title>
        <link rel="stylesheet" href="../admin/admin.css">
        <link rel="stylesheet" href="./edit.css">
        <link rel="stylesheet" href="../main.css">
    </head>
    <body>
       
    <div class="header">
       <a href="../admin/adminPanel.php">
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
               
               <a href="../admin/bookRequest.php?userId=<?php echo $userId ?>"><img src="../assets/565422.png" alt="" class="imgs">
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
    
              <div class="editPage">
              <div class="editDetails">
              <h1>Edit Room Detail</h1>
    <?php
     include "../dbConfig.php";
        if(isset($_GET['Id'])){
            $itemId = $_GET['Id'];
            $data = "select * from room where roomId = '$itemId'";
            $re2 = mysqli_query($conn,$data);
            $num = mysqli_num_rows($re2);
            while($row = mysqli_fetch_assoc($re2)){
                ?>
               <form method="POST" enctype="multipart/form-data" class="addRoom">
        
        <div class="in">
        <span>Place Name</span>
        <input required="true" type="text" placeholder="Eg: New Road" name="loc" value="<?php echo $row['Location']?>">
        </div>
        <div class="in">
        <span>District</span>
       
        <input required="true" type="text" placeholder="Eg: Kathmandu" name="dis" value="<?php echo $row['district']?>">
        </div>
        <div class="in">
        <span>Description</span>
        <textarea required="true" type="text"  name="des" cols="30" rows="10" placeholder="<?php echo $row['Descr']?>"></textarea>
       
       
        </div>
        <div class="in">
        <span>Longitude and Latitude</span>
        <input required="true" type="text" placeholder="Eg : 27.700769, 85.300140" name="lng" value="<?php echo $row['Longlat']?>">
        </div>
        <div class="in">
        <span>Price</span>
       <div class="ins"> <select name="curr" id="">
            <option value="NPR" name="curr">NPR</option>
            <option value="$" name="curr">$</option>
            <option value="INR" name="curr">INR</option>
            <option value="£" name="curr">£</option>
        </select>
        <input required="true" type="number" name="price" placeholder="Room price" value="<?php echo $row['price']?>"></div>
        </div>
        
       
        
        <div class="in">
        <span>Images</span>
        <input required="true" type="file" name="Picture" value="<?php echo $row['Images']?>">
        </div>
        <button type="submit" name="edit">Submit</button>
      
    </form>
    <?php
                       
                            if(isset($_POST['edit'])){

                                  
                                    
                                   

                              
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
                                    $sql = "UPDATE room SET Location = '$location', district = '$dis', price = '$price', currency = '$curr',  Descr = '$desc', Longlat = '$longlat', Images = '$folder' WHERE roomId = '$itemId'";
                                    $result2 = mysqli_query($conn, $sql);
                                    if($result2){
                                        echo "edited";
                                        header("location:edit.php?Id=$itemId");
                                    }
                                  
                            
                            }
                        ?>

<?php

            }
            

          
        }

    ?>
   
                        
   </div>
   
   <div class="cards">
   <h1>Room Details</h1>
        <?php

        $query = "select * from room where roomId = '$itemId'";
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
                            
                            echo "Date: " . $row['date'];
                           


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