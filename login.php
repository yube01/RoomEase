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
            <?php
            include "dbConfig.php";
            if(isset($_POST['submit'])){
                $user = $_POST["username"];
                $password=  md5 ($_POST ["password"]);

                



            }
            ?>
        </div>
    </body>
</html>