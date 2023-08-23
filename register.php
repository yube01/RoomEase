<html>
    <head>
        <title>Register page</title>
    </head>
    <body>
        <div class="container">
            <p>Register</p>
            <form method="POST">
                Username:
                <br>
                <input type="text" placeholder="Enter Username" name="username" required>
                <br>
                Email
                <br>
                <input type="email" placeholder="Enter email" name="email" required>
                <br>
                Password
                <br>
                <input type="password" name="password" required>
                <br>
                <input type="submit" value="Submit" name="submit"> 
            </form>
            <a href="login.php">Login page</a>
            <?php
            include "dbConfig.php";
            if(isset($_POST['submit'])){
                $user = $_POST["username"];
                $password= md5($_POST ["password"]);
                $email=$_POST ['email'];

                // $checkEmail = "select * from ";


                $query  = "insert into auth (username,email,password) values('$user','$email','$password')";
                $sql = mysqli_query($conn,$query);

                if($sql){
                    
                    header("Location: login.php");
                    exit();
                }else{
                    echo "not inserted";
                }

                



            }
            ?>
        </div>
    </body>
</html>