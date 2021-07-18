<?php 

    include("functions.php");

    if ($_GET['action'] == "loginSignup") {

        $error = "";
        $success = ""; 

        if (!$_POST['email']) {

            $error = "An email address is required.";

        } else if (!$_POST['password']) {

            $error = "A password is required.";

        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

            $error = "Please enter a valid email address.";

        }

        if ($error != "") {
            echo $error;
            exit();
        }

        if ($_POST['loginActive'] == "0") {

            $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1 ";

            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {
                $error = "That email address has already been taken";
            } else {

                $query = "INSERT INTO users (`email`, `password`, `is_doctor`) VALUES ('" . mysqli_real_escape_string($link, $_POST['email'])."', '" . mysqli_real_escape_string($link, $_POST['password'])."', '" . mysqli_real_escape_string($link, $_POST['checkDoctor']). "')";

                if (mysqli_query($link, $query)) {
 
                    $_SESSION['id'] = mysqli_insert_id($link);

                    $query = "UPDATE users SET password = '".md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ". $_SESSION['id'] ." LIMIT 1";

                    mysqli_query($link, $query);

                    $success = "You accout have been created successfully!";

                    echo 1;

                } else {
                    $error = "Couldn't create user - please try again later";
                }
            }

        } else {
                
            $query = "SELECT * FROM users WHERE email = '" .mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1 ";

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_assoc($result);

            if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                echo 1;

                $_SESSION['id'] = $row['id'];

                $success = "You have been signed in successfully!";

            } else {
                $error = "Could not find that username/password combination. Please try again.";
            }

        }

        if ($error != "") {
            echo $error;
            exit();
        }

        if ($success != "") {
            echo $error;
            exit();
        }
    }

    if ($_GET['action'] == "saveDetails") {

        $error = "";
        $success = ""; 

        if (!$_POST['phone']) {

            $error = "A contact no. is required.";

        } else if ($_POST['gender'] == "Choose...") {

            $error = "Your gender required.";

        } else if (!$_POST['birth']) {

            $error = "Your birthdate is required.";

        }

        if ($error != "") {
            echo $error;
            exit();
        } 

        $query = "UPDATE users SET username = '" .mysqli_real_escape_string($link, $_POST['username'])."',
                                    phone = '" .mysqli_real_escape_string($link, $_POST['phone'])."',
                                    gender = '" .mysqli_real_escape_string($link, $_POST['gender'])."',
                                    birthday = '" .mysqli_real_escape_string($link, $_POST['birth'])."' WHERE id = ". $_SESSION['id'] ." LIMIT 1";

        if (mysqli_query($link, $query)) {

            $success = "Your changes have saved successfully!";

            echo 1;

        } else {
            
            $error = "Couldn't create user - please try again later";

        }

    }

?>