<html>
    <head>
        <Title>Search</Title>
    </head>
    <body>
        <h1>Search</h1>
        <?php
        include "../dbConfig.php";
        if(isset($_GET['search'])){
            $key = strtolower($_GET['search']);
            

            $query = "select * from room where Location='$key'";
            $result = mysqli_query($conn,$query);
            if($result){
                $num = mysqli_num_rows($result);
                if($num > 0){
                    while ($row = mysqli_fetch_assoc($result)){
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
                </div>

                <?php

                    }


                }else{
                    echo "no data found";
                }
                
            }else{
                echo "db error";
            }
        }


?>
    </body>
</html>