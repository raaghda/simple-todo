<?php
$todoid=$_POST["todoid"];
if (!isset($_POST["todotext"]) or strlen($_POST["todotext"])==0){
    header("Location: index.php?missingtitle=1&todoid=$todoid"); 
}
$title=$_POST["todotext"];

$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

$gettitle = "SELECT title FROM todos WHERE title='$title'";

$countrows = $conn->prepare($gettitle);
$countrows->execute();

/* Return number of rows that were counted */
$count = $countrows->rowCount();

if ($count > 0){
    header("Location: index.php?duplicatetitle=1&todoid=$todoid"); 
} else {
    $updateQuery = "UPDATE todos SET title='$title' WHERE todoid='$todoid'";
    //execution of the sql string
    $conn->exec($updateQuery);

    header('Location: index.php?edited=1'); 
} 
?>