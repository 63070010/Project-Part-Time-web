<?php 
    session_start();

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

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
        
        
    <?php
        $id = $_GET['id'];
        $res = mysqli_query($conn, "SELECT * FROM office WHERE id = '$id'");
        $Result = mysqli_fetch_array($res);
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
    <div style="text-align: center;"><img src="images/<?=$Result['filesname2']?>" alt="" style="width : 800px; height : 400px;"></div>
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
    <div style="padding-left: 150px;"><img src="images/<?=$Result['filesname']?>" alt="" style="width : 122px; height: 92px;"><p style="font-size: 24px; font-weight: bold;"><?php echo $Result['office'];?></p></div>
            </div>
            <div class="col">
                <p>รายละเอียดงาน : <?php echo $Result['detail'] ?></p>
            </div>
            <div class="col">
                <p>จังหวัด : <?php echo $Result['province'] ?></p>
                <p>โทรศัพท์ : <?php echo $Result['phone'] ?></p>
                <p>ค่าตอบแทน : <?php echo $Result['price'] ?></p>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>