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

    include "dbConfig.php";
    if(isset($_POST['submit'])){
        $location = $_POST["loc"];
        $desc =$_POST["des"];
        $longlat = $_POST["lng"];
        $Picture = $_FILES['Picture']['name'];
        $temp = $_FILES['Picture']['tmp_name'];
        $folder="picture/".$Picture;
        move_uploaded_file($temp, $folder);

       


                $query  = "insert into room (Location,Descr,Longlat,Images) values('$location','$desc','$longlat','$folder')";
                $sql = mysqli_query($conn,$query);

                if($sql){
                    
                
                    echo "data inserted";
                }else{
                    echo "not inserted";
                }
    }



?>

</body>

</html>