<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

$completed = $_GET['completed'];
$todoid = $_GET['todoid'];

if ($completed=="0"){
    $updateQuery = "UPDATE todos SET completed=1 WHERE todoid='$todoid'";
} else{
    $updateQuery = "UPDATE todos SET completed=0 WHERE todoid='$todoid'";
}

$updateToDo = $conn->prepare($updateQuery);
$updateToDo->execute();

header('Location: index.php'); 
?>