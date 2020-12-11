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
    $res2 = mysqli_query($conn, "SELECT * FROM office WHERE id = '$id'");
    $Result2 = mysqli_fetch_array($res2);
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
    <?php include("navbar.php")?>
    <br>
    <br>
    <br>
    <br>
    <div class="homeheader">
        <h2>กรอกข้อมูลรายละเอียดงาน</h2>
    </div>

    <div class="center">
        <!-- Check Error -->
<form method="POST" action="info_db_office.php">
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
      <label for="inputEmail4">ชื่อบริษัท</label>
      <input type="text" readonly class="form-control-plaintext" id="office" value="<?php echo $Result2['office'] ?>" name="office">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">จังหวัด</label>
      <input type="text" readonly class="form-control-plaintext" id="province" value="<?php echo $Result2['province'] ?>" name="province">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">อีเมลติดต่อ</label>
    <input type="email" readonly class="form-control-plaintext" id="email" value="<?php echo $Result2['email'] ?>" name="email">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">เบอร์ติดต่อ</label>
      <input type="text" class="form-control" id="phone" name="phone">
    </div> 
  </div>
  <div class="form-group">
    <label for="phone">อัพโหลดโลโก้บริษัท</label>
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
  </div>
  <div class="form-group">
    <label for="phone">อัพโหลดพื้นหลังบริษัท</label>
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
  </div>
  <textarea id="detail" name="detail" rows="4" cols="50" placeholder="รายละเอียดงาน"></textarea>
  <button type="submit" class="btn btn-primary" value="update" name="info_update">submit</button>
</form>



        
    </div>

</body>
</html>