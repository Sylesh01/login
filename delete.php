<?php
session_start();

require 'config.php';

$id = $_GET['id'];
$query = "DELETE FROM employees WHERE id = '$id'";
$result = $conn->query($query);

$_SESSION['message'] = 'Deleted successfully';
header("Location: view.php");
exit();
?>