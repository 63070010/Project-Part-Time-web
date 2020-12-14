<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
  include("server.php");
  $username = $_SESSION['username'];
  $res = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $res2 = mysqli_query($conn, "SELECT * FROM office WHERE username = '$username'");
  $Result = mysqli_fetch_array($res);
  $Result2 = mysqli_fetch_array($res2);
?>
</head>
<body>
    

<nav class="navbar navbar-dark bg-dark fixed-top" >
<ul class="nav nav-tabs">
<a class="navbar-brand" href="#">Find Your Job</a>
  <li class="nav-item">
    <a class="nav-link" href="home.php" style="color : white;">หน้าแรก</a>
  </li>

  <?php if(isset($_SESSION['username'])) {?>
    <li class="nav-item">
    <a class="nav-link" href="#" style="color:white;"><?php echo $_SESSION['username']; ?></a>
    </li>
  <?php } else {?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">สมัครสมาชิก</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="register.php">ผู้ใช้งาน</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="register_office.php">บริษัท</a> 
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">เข้าสู่ระบบ</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="login.php">ผู้ใช้งาน</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="login_office.php">บริษัท</a>
  <?php }?>  
    </div>
    </li>

      
    </div>
  </li>
  <?php if(isset($_SESSION['office'])) {?>
  <li class="nav-item">
    <p><a class="nav-link" href="home.php?logout='1'" style="color: red;">Logout</a></p> 
  </li>
  <li class="nav-item">
    <a class="nav-link" href='info_office.php?id="<?php echo $Result2['id']; ?>' style="color:white;">กรอกข้อมูล</a>
  </li>
  <?php } elseif(isset($_SESSION['firstname'])) {?>
  <li class="nav-item">
    <p><a class="nav-link" href="home.php?logout='1'" style="color: red;">Logout</a></p> 
  </li>
  <li class="nav-item">
    <a class="nav-link" href='info.php?id="<?php echo $Result['id']; ?>' style="color:white;">กรอกประวัติ</a>
  </li>
  <?php }?>
</ul>
</nav>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>