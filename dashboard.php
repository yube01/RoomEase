<html>

<head>
    <title>EscapePlanner</title>
</head>

<?php
    session_start();
    include "dbConfig.php";
    if (isset($_SESSION['user_id'])) {

        echo "welcome" . $_SESSION['user_id'];
    }

    ?>

<body>
   <div class="header">
    <div class="logo">
        <img src="./assets/logo.png" alt="">
    </div>
    <div class="options">
        <div class="destination"></div>
        <div class="user"></div>

    </div>
   </div>
   <div class="main"></div>
   <div class="footer"></div>
    

   
</body>


</html>