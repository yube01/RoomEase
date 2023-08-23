<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <div class="container">
            <p>Login</p>
            <form method="POST">
                Username:
                <br>
                <input type="text" placeholder="Enter Username" name="username">
                <br>
                Password
                <br>
                <input type="password" name="password">
                <br>
                <input type="submit" value="Submit" name="submit"> 
            </form>
            <a href="register.php">Register page</a>
            <?php
            session_start();
            include "dbConfig.php";
            if(isset($_POST['submit'])){
                $user = $_POST["username"];
                $password=  md5 ($_POST ["password"]);

                $sql  = "select * from auth where username='$user' and password='$password'";

                $result = mysqli_query($conn,$sql);

   
                $num = mysqli_num_rows($result);
                if($num > 0){
                    $userId = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $userId['username'];
                    header("Location: dashboard.php");
                    exit();
                }
                else{
                    echo "error";
                }


                



            }
            ?>
        </div>
    </body>
</html>