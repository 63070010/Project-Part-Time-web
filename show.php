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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลทั้งหมด</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
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
        <form action="show.php" method="GET" style="width : 100%;">
            <div class="form-group">
                <label for="search">SEARCH</label>
                <input type="text" class="form-control" id="search" placeholder="search" name="search">
            </div>
            <button type="submit" class="btn btn-primary" value="search">submit</button>
        </form>
           
        </div>  
            
        <div class="col-8">
            <?php
              
              //  if(empty($search))
              //  {
              //  
              //  } else {
              //  $res = mysqli_query($conn, "SELECT * FROM office WHERE province = '$search'");
              //  }
            if(empty($_GET['search'])) {
                $res = mysqli_query($conn, 'SELECT * FROM office');  
            } elseif(isset($_GET['search'])) {
                $search = $_GET['search'];
                $res = mysqli_query($conn, "SELECT * FROM office where province LIKE '%$search%' or office LIKE '%$search%'");
            }
            ?>
            <?php
            while($Result = mysqli_fetch_array($res))
            {
            ?>
                <div class="row">
                    <div class="col">
                        <a style="font-size: 24px; font-weight: bold;" href='profile_office.php?id=<?php echo $Result['id']; ?>'><?php echo $Result['office'];?></a>
                        <p>จังหวัดที่ตั้ง: <?php echo $Result['province'];?></p>
                        <p>เบอร์ติดต่อ: <?php echo $Result['phone'];?></p>
                        <p>ค่าตอบแทน: <?php echo $Result['price'];?></p>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="col">
                        <div><img src="images/<?=$Result['filesname']?>" alt="" style="width : 122px; height: 92px;"></div>
                    </div>

                </div>
                <hr style="width:50%;text-align:left;margin-left:0">
            <?php }?>
        </div>
        </div>
    </div>

</body>
</html>