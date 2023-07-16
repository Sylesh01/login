<?php
session_start();
require 'config.php'; 
require 'add_employee_form.php'; 

if (isset($_POST['submit'])) {
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
    

    $sql = "INSERT INTO employees(firstname,lastname,email,salary) VALUES ('$first_name','$last_name','$email','$salary')"; 

    $result = $conn->query($sql);

    if ($result === true) {
        $_SESSION['message'] = "Information added successfully.";
        header("Location: view.php");
        exit();
    } else {
        echo 'Error';
    }
}
$conn->close();
?>


