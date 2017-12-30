<?php
/* Connection to db */
$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

/* Deletion of a todo, where the deleteQuery sends todoid info to delete todo from the table 'todos', user will then be sent to index */
$todoid= $_GET['todoid'];
$deleteQuery = "DELETE FROM todos WHERE todoid='$todoid'";

$deleteToDo = $conn->prepare($deleteQuery);
$deleteToDo->execute();

header('Location: index.php'); 
?>