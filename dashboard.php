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
    <button>
        <a href="logout.php">Logout</a>
    </button>
    <div class="options">
        <div class="destination"></div>
        <div class="user"></div>

    </div>
   </div>
   <div class="main">
   <form method="POST">
   <h1>Search Hotel</h1>
    <input type="text" placeholder="Search hotel" name="hotel">
    <input type="submit" name="submit">
   </form>
   </div>
   <div class="footer">
    copyright 2023
   </div>
    

   
</body>


</html>