<html>
    <head>
        <title>Admin Register page</title>
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
            include "../dbConfig.php";
            include "../login/login.php";
            if(isset($_POST['submit'])){
                $user = $_POST["username"];
                $password= md5($_POST ["password"]);
                $email=$_POST ['email'];

                //checking if email already exist
                $checkEmail = "select * from auth where email='$email'";
                $sqls = mysqli_query($conn,$checkEmail);
                $num = mysqli_fetch_assoc($sqls);
                if($num>0){
                    echo "Email is already used";
                    exit();
                }



                $query  = "insert into auth (username,email,password,isAdmin) values('$user','$email','$password','1')";
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