<html>
    <head></head>
    <body>
        dash

        <?php
        session_start();
        include "dbConfig.php";
        if(isset($_SESSION['user_id'])){
        
            echo "welcome" . $_SESSION['user_id'];
        }

        ?>
    </body>
</html>