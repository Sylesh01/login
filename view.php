<?php
// session_start();
//     require 'config.php';
//     if(isset($_SESSION["loggedin"])&& ($_SESSION["loggedin"]=== true)){
//         if(time()- $_SESSION["login_time_stamp"]>5){
//             session_unset();
//             session_destroy();
//             header("Location:login.php");
//         }
//     }
//     else {
//         header("Location:login.php");
//     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/view.css">
    <title>View Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * from employees";
                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <a href="logout.php" class="sign-out">Sign Out of Your Account</a>
</body>
</html>
