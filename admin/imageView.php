<html>
    <head>
        <title>Citizenship View</title>
    </head>
    <style>
        body{
            max-height: 100vh;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        #citi{
            height: 53rem;
            width: 80rem;
            object-fit: cover;
        }
        #close{
            height: 4rem;
            position: absolute;
            top: 0;
            right: 190;
        }
        
    </style>
    <body>
        <?php
        if(isset($_GET['imageId'])){
        
            $path = $_GET['imageId'];
            $uid = $_GET['id'];
           
            ?>

            <img id ="citi"src="../picture/<?php echo $path ?>" alt="">

            <?php
            

        }
        
        ?>
        <div class="close">
            <a href="bookRequest.php?userId=<?php echo $uid;?>"><img id="close" src="../assets/cancel.png" alt=""></a>
        </div>
    </body>
</html>