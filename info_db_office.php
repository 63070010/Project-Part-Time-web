<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['info_update'])) {
        $username = $_SESSION['username'];
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $detail = mysqli_real_escape_string($conn, $_POST['detail']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $strsql = $_FILES["fileToUpload"]["name"];
        $strsql2 = $_FILES["fileToUpload2"]["name"];

        if (empty($detail)) {
            array_push($errors, "จำเป็นต้องกรอกรายละเอียด");
            $_SESSION['error'] = "จำเป็นต้องกรอกรายละเอียด";
        }
        if (empty($phone)) {
            array_push($errors, "จำเป็นต้องกรอกเบอร์โทร");
            $_SESSION['error'] = "จำเป็นต้องกรอกเบอร์โทร";
        }

        if (count($errors) == 0) {
            $sql = "update office set detail = '$detail', phone = '$phone', price = '$price', filesname = '$strsql', filesname2 = '$strsql2' where username = '$username'";
            mysqli_query($conn, $sql);
            $_SESSION['success'] = "Confirmed";
            header('location: home.php');
        } else {
            header("location: info_office.php");
        }
    }


        // upload image system
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
  if($check !== false and $check2 !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file) and file_exists($target_file2)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000 and $_FILES["fileToUpload2"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" and $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) and move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//pic 2
    
?>
