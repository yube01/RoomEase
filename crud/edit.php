<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
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
                            <input type="submit" name="edit">
                        </form>
                        <?php
                        include "../dbConfig.php";
                            if(isset($_POST['edit'])){

                                  if(isset($_GET['Id'])){
                                    $itemId = $_GET['Id'];
                                    
                                   

                              
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
                                    $sql = "UPDATE room SET Location = '$location', Descr = '$desc', Longlat = '$longlat', Images = '$folder' WHERE roomId = '$itemId'";
                                    $result2 = mysqli_query($conn, $sql);
                                    if($result2){
                                        echo "edited";
                                        header("location:../admin/adminPanel.php");
                                    }
                                  }
                            
                            }
                        ?>
    </body>
</html>