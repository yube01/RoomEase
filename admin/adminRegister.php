<html>
    <head>
        <title>Host Register page</title>
        <link rel="stylesheet" href="../Register/register.css">
    </head>
    <body>
        <div class="container">
        <h1>Host Register</h1>
            <form method="POST">
                <p>Username</p>
                
                <input type="text" name="username" required>
               
                <p>Email</p>
               
                <input type="email" name="email" required>
             
                <p>Password</p>
               
                <input type="password" name="password" required>
                
                <button value="Submit" name="submit"> Register </button>
            </form>
            <div class="login">
            <p>Do you already have a account ?</p>
            <a href="../login/login.php">Login</a>
            </div>
            <?php
            include "../dbConfig.php";
            
            if(isset($_POST['submit'])){
                ?>
                <div class="db">

                <?php
                $user = $_POST["username"];
                $password= md5($_POST ["password"]);
                $email=$_POST ['email'];

                //checking if email already exist
                $checkEmail = "select * from auth where email='$email' and isAdmin = '1'";
                $sqls = mysqli_query($conn,$checkEmail);
                $num = mysqli_fetch_assoc($sqls);
                if($num>0){
                    echo "Email is already used";
                    exit();
                }



                $query  = "insert into auth (username,email,password,isAdmin) values('$user','$email','$password','1')";
                $sql = mysqli_query($conn,$query);

                if($sql){
                    
                    header("Location: ../login/login.php");
                    exit();
                }else{
                    echo "not inserted";
                }
                ?>
                </div>

                <?php

                



            }
            ?>

        </div>
    </body>
   
</html>