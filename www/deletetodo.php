<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

$todoid= $_GET['todoid'];
$deleteQuery = "DELETE FROM todos WHERE todoid='$todoid'";

$deleteToDo = $conn->prepare($deleteQuery);
$deleteToDo->execute();

header('Location: index.php'); 
?>