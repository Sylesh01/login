<?php
require_once "config.php";

$username = $password = $confirm_password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['username'])){
        $username_err = 'Please enter a username';
    }
    else{    
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    if(empty($_POST['password'])){
        $pass_err = 'Please enter a password';
    }else{
        $password = trim($_POST["password"]);
    }

    if(empty($_POST['confirm_password'])){
        $conf_pass_err = 'Please confirm your password';
        
    } else{
    $confirm_password = $_POST['confirm_password'];
    if($password != $confirm_password){
        $conf_pass_err= 'Password did not match';
        }
    }

        if(empty($username_err)&&empty($pass_err)&&empty($conf_pass_err)){

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
        mysqli_close($conn);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <span class="error-message"><?php if(!empty($username_err)){ echo $username_err; } ?></span>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <span class="error-message"><?php if(!empty($pass_err)){ echo $pass_err; } ?></span>
            </div>

            <div class="mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
                <span class="error-message"><?php if(!empty($conf_pass_err)){ echo $conf_pass_err; } ?></span>
            </div>

            <div class="mb-3">
                <input type="submit" value="Submit">
            </div>

            <p class="login-link">Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
