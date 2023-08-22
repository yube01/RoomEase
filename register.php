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
                <input type="text" placeholder="Enter Username" name="username">
                <br>
                Email
                <br>
                <input type="email" placeholder="Enter email" name="email">
                <br>
                Password
                <br>
                <input type="password" name="password">
                <br>
                <input type="submit" value="Submit" name="submit"> 
            </form>
            <?php
            include "dbConfig.php";
            if(isset($_POST['submit'])){
                $user = $_POST["username"];
                $password=  md5 ($_POST ["password"]);
                $email=$_POST ['email'];

                



            }
            ?>
        </div>
    </body>
</html>