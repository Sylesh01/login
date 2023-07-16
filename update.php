<?php
session_start();

require 'config.php';

$id = $_GET['id'];

$query = "SELECT * FROM employees WHERE id = '$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update.css"> 
    <title>Update Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input value="<?php echo $row['firstname']; ?>" type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input value="<?php echo $row['lastname']; ?>" type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input value="<?php echo $row['email']; ?>" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update" value="Save">
                <a href="view.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</body>
</html>



<?php
if (isset($_POST['update'])) {

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "UPDATE employees SET firstname = '$first_name',lastname = '$last_name',email = '$email' WHERE id = '$id'"; 

    $result = $conn->query($sql);

    if ($result === true) {
        $_SESSION['message'] = "Information saved successfully.";
        header("Location: view.php");
        exit();
    } else {
        echo 'Error';
    }
}
$conn->close();


?>
