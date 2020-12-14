<?php 
    session_start();
    include("server.php");  
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    $id = $_GET['id'];
    $res = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
    $Result = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้ากรอกข้อมูล</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("navbar.php")?>
    <br>
    <br>
    <br>
    <br>
    <div class="homeheader">
        <h2>กรอกข้อมูล</h2>
    </div>

    <div class="center">
        <!-- Check Error -->
<form method="POST" action="info_db.php" enctype="multipart/form-data">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <h3>
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <!-- Check Error -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname">ชื่อ</label>
      <input type="text" readonly class="form-control-plaintext" id="firstname" value="<?php echo $Result['firstname'] ?>" name="firstname">
    </div>
    <div class="form-group col-md-6">
      <label for="lastname">นามสกุล</label>
      <input type="text" readonly class="form-control-plaintext" id="lastname" value="<?php echo $Result['lastname'] ?>" name="lastname">
    </div>
  </div>
  <div class="form-group">
    <label for="email">อีเมลติดต่อ</label>
    <input type="email" readonly class="form-control-plaintext" id="email" value="<?php echo $Result['email'] ?>" name="email">
  </div>
  <div class="form-group">
    <label for="province">จังหวัด</label>
    <input type="text" class="form-control" id="province" placeholder="จังหวัด" name=" province">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="phone">เบอร์ติดต่อ</label>
      <input type="text" class="form-control" id="phone" name="phone">
    </div> 
  </div>
  <div class="form-group">
    <label for="phone">อัพโหลดรูปประจำตัว</label>
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-primary" value="update" name="info_update">submit</button>
</form>



        
    </div>

</body>
</html>