<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $office = mysqli_real_escape_string($conn, $_POST['office']);
        $province = mysqli_real_escape_string($conn, $_POST['province']);
        

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }

        $user_check_query = "SELECT * FROM office WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
                $_SESSION['error'] = "Username already exists";
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
            }
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $sql = "INSERT INTO office (email, username, password, office, province, detail, phone, price, filesname, filesname2) VALUES ('$email', '$username', '$password', '$office', '$province', '', '', 0, '', '')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['office'] = $office;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        } else {
            header("location: register_office.php");
        }
    }
    

?>
