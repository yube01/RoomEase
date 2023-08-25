<html>

<head>
    <title>EscapePlanner</title>
    <link rel="stylesheet" href="./dashboard.css">
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
            <img src="./assets/logo.png" alt="" height="50px">
            <p>EscapePlanner</p>
        </div>

        <div class="options">
            <div class="username">Yube</div>
            <button>
                <a href="logout.php">Logout</a>
            </button>

        </div>
    </div>
    <div class="main">
        <h1>Available Rooms</h1>
        <div class="card">
            <div class="hotelImg">
                <img src="./assets/ColorWall-1pgxjg.jpg" alt="">
            </div>
            <div class="details">
                <div class="hdetails">
                    <p class="hname">Hotel Bagmati</p>
                    <span class="loc">
                    <p>Kathmandu</p>
                    <p>3.5 km from center</p>
                    </span>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis laudantium totam rem nisi labore
                    animi dolorum illum tempora rerum delectus.
                </div>
                <div class="rooms">
                    2 rooms left
                </div>
                <div class="price">
                    <p>NPR 5,4500</p>
                    <p>Includes taxes and fees</p>
                </div>



            </div>
        </div>
        <div class="card">
            <div class="hotelImg">
                <img src="./assets/logo.png" height="300px" alt="">
            </div>
            <div class="details">
                <div class="hdetails">
                    <p>Hotel Bagmati</p>
                    <p>Kathmandu</p>
                    <p>3.5 km from center</p>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis laudantium totam rem nisi labore
                    animi dolorum illum tempora rerum delectus.
                </div>
                <div class="rooms">
                    2 rooms left
                </div>
                <div class="price">
                    <p>NPR 5,4500</p>
                    <p>Includes taxes and fees</p>
                </div>



            </div>
        </div>
        <div class="card">
            <div class="hotelImg">
                <img src="./assets/ColorWall-1pgxjg.jpg" height="300px" alt="">
            </div>
            <div class="details">
                <div class="hdetails">
                    <p>Hotel Bagmati</p>
                    <p>Kathmandu</p>
                    <p>3.5 km from center</p>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis laudantium totam rem nisi labore
                    animi dolorum illum tempora rerum delectus.
                </div>
                <div class="rooms">
                    2 rooms left
                </div>
                <div class="price">
                    <p>NPR 5,4500</p>
                    <p>Includes taxes and fees</p>
                </div>



            </div>
        </div>
        <div class="card">
            <div class="hotelImg">
                <img src="./assets/ColorWall-1pgxjg.jpg" height="300px" alt="">
            </div>
            <div class="details">
                <div class="hdetails">
                    <p>Hotel Bagmati</p>
                    <p>Kathmandu</p>
                    <p>3.5 km from center</p>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis laudantium totam rem nisi labore
                    animi dolorum illum tempora rerum delectus.
                </div>
                <div class="rooms">
                    2 rooms left
                </div>
                <div class="price">
                    <p>NPR 5,4500</p>
                    <p>Includes taxes and fees</p>
                </div>



            </div>
        </div>
        <div class="card">
            <div class="hotelImg">
                <img src="./assets/ColorWall-1pgxjg.jpg" height="300px" alt="">
            </div>
            <div class="details">
                <div class="hdetails">
                    <p>Hotel Bagmati</p>
                    <p>Kathmandu</p>
                    <p>3.5 km from center</p>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis laudantium totam rem nisi labore
                    animi dolorum illum tempora rerum delectus.
                </div>
                <div class="rooms">
                    2 rooms left
                </div>
                <div class="price">
                    <p>NPR 5,4500</p>
                    <p>Includes taxes and fees</p>
                </div>



            </div>
        </div>
    </div>
    <div class="footer">
        copyright 2023
    </div>



</body>


</html>