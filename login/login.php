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
        <a href="../Register/register.php">Register page</a>
        <?php
        session_start();
        include "../dbConfig.php";
        
        if (isset($_POST['submit'])) {
            $user = $_POST["username"];
            $password = md5($_POST["password"]);

            //checking username
            $checkUser = "select * from auth where username='$user'";
            $userCheck = mysqli_query($conn, $checkUser);
            $numCheck = mysqli_num_rows($userCheck);

            if ($numCheck == 0) {
                echo "username is not created yet";
                exit();
            }

            //checking password
            $checkPw = "select * from auth where password='$password'";
            $userPw = mysqli_query($conn, $checkPw);
            $pwCheck = mysqli_num_rows($userPw);

            if ($pwCheck == 0) {
                echo "Password incorrect";
                exit();
            }


            // if both username and password is right then execute this code
            $sql = "select * from auth where username='$user' and password='$password'";

            $result = mysqli_query($conn, $sql);


            $num = mysqli_num_rows($result);

            if ($num > 0) {
                $userId = mysqli_fetch_assoc($result);




                $_SESSION['user_id'] = $userId['username'];
                $_SESSION['id'] = $userId['Id'];
                $role = $userId['isAdmin'];
                if ($role == 0) {
                    header("Location: ../user/dashboard.php");
                    exit();

                } elseif ($role == 1) {
                    header("Location: ../admin/adminPanel.php");
                    exit();
                } else {
                    echo "server error";
                }







            } else {
                echo "error";
            }






        }
        ?>
    </div>
</body>

</html>