<html>

<head>
    <title>Login page</title>
    <link rel="stylesheet" href="../Register/register.css">
</head>

<body>

    <div class="container">
        <h1>Login</h1>
        <form method="POST">
            <p>Username</p>

            <input type="text" name="username" required>



            <p>Password</p>

            <input type="password" name="password" required>

            <button value="Submit" name="submit"> Register </button>
        </form>
        <div class="login">
            <p>Don't have a account?</p>
            <a href="../Register/register.php">Register</a>
        </div>

    </div>
    <?php
        session_start();
        include "../dbConfig.php";

        if (isset($_POST['submit'])) {
            ?>
             <div class="db">


<?php
            $user = $_POST["username"];
            $password = md5($_POST["password"]);

            //checking username
            $checkUser = "select * from auth where username='$user'";
            $userCheck = mysqli_query($conn, $checkUser);
            $numCheck = mysqli_num_rows($userCheck);

            if ($numCheck == 0) {
                echo "User doesn't exist";
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
            ?>
             </div>
            <?php






        }
        ?>
</body>

</html>