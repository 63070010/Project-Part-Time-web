<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['office']);
        unset($_SESSION['firstname']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if (isset($_SESSION['firstname'])) {
            unset($_SESSION['office']);
        } elseif(isset($_SESSION['office'])) {
            unset($_SESSION['firstname']);
        }
    
    ?>
    <?php include("navbar.php")?>
        
        <br><br><br><br><br>

    <div class="container">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-4">
                <div class="card border-primary mb-3" style="max-width: 30rem;">
            <div class="card-header">Header</div>
                <form action="home.php" method="GET">
                    
                
                </form>
            </div>
        </div>

            <div class="col-8">
                <!-- image slide -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/1.jpg" alt="First slide" style="width : 800px; height : 400px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/2.jpg" alt="Second slide" style="width : 800px; height : 400px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/3.jpg" alt="Third slide" style="width : 800px; height : 400px;">
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                        </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- image slide -->
            </div>
        </div>
    </div>

</body>
</html>