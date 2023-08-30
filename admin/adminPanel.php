<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <form method="POST" enctype="multipart/form-data">
        Location
        <br>
        <input type="text" placeholder="Location" name="loc">
        <br>
        description
        <br>
        <input type="text" placeholder="description" name="des">
        <br>
        Longitude and Latitude
        <br>
        <input type="text" placeholder="Actual Location" name="lng">
        <br>
        Images
        <input type="file" name="Picture">
        <br>
        <input type="submit" name="submit">
    </form>

    <?php

    session_start();

    if (isset($_SESSION['user_id'])) {

        echo "welcome" . $_SESSION['user_id'];
    } else {
        header("location:../login/login.php");
    }
    $userId = $_SESSION['id'];
    echo $userId;

    include "../dbConfig.php";
    if (isset($_POST['submit'])) {
        $location = strtolower($_POST["loc"]);
        $desc = $_POST["des"];
        $longlat = $_POST["lng"];
        $Picture = $_FILES['Picture']['name'];
        $temp = $_FILES['Picture']['tmp_name'];
        $folder = "../picture/" . $Picture;
        if (move_uploaded_file($temp, $folder)) {
            echo "file moved";
        } else {
            echo "file not moved";
        }




        $query = "insert into room (Location,Descr,Longlat,Images,adminId) values('$location','$desc','$longlat','$folder',$userId)";
        $sql = mysqli_query($conn, $query);

        if ($sql) {


            echo "data inserted";
        } else {
            echo "not inserted";
        }
    }



    ?>

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
                    <div class="crud active">
                        <a href="../crud/edit.php?Id=<?php echo $row['Id'] ?>">Edit</a>
                        <a href="../crud/delete.php?Id=<?php echo $row['Id'] ?>">Delete</a>

                        

                    </div>
                </div>

                <?php
            }
        } else {
            echo "no data found";
        }

        ?>
    </div>

</body>

</html>