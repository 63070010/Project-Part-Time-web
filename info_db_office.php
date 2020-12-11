<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['info_update'])) {
        $username = $_SESSION['username'];
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $detail = mysqli_real_escape_string($conn, $_POST['detail']);

        if (empty($detail)) {
            array_push($errors, "จำเป็นต้องกรอกรายละเอียด");
            $_SESSION['error'] = "จำเป็นต้องกรอกรายละเอียด";
        }
        if (empty($phone)) {
            array_push($errors, "จำเป็นต้องกรอกเบอร์โทร");
            $_SESSION['error'] = "จำเป็นต้องกรอกเบอร์โทร";
        }

        if (count($errors) == 0) {
            $sql = "update office set detail = '$detail', phone = '$phone' where username = '$username'";
            mysqli_query($conn, $sql);
            $_SESSION['success'] = "Confirmed";
            header('location: home.php');
        } else {
            header("location: info_office.php");
        }
    }

?>
