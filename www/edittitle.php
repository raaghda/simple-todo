<?php
/* If todo text is not given, user will receive error msg that title is missing */
$todoid=$_POST["todoid"];
if (!isset($_POST["todotext"]) or strlen($_POST["todotext"])==0){
    header("Location: index.php?missingtitle=1&todoid=$todoid"); 
}
$title=$_POST["todotext"];

/* Connection to db  */
$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

/*  */
$gettitle = "SELECT title FROM todos WHERE title='$title' AND NOT IN ($todoid)";

$countrows = $conn->prepare($gettitle);
$countrows->execute();

/* Return number of rows that were counted */
$count = $countrows->rowCount();

/* If title is duplicate, user will receive msg of failure. Else, update the existing todo in the db */
if ($count > 0){
    header("Location: index.php?duplicatetitle=1&todoid=$todoid"); 
} else {
    $updateQuery = "UPDATE todos SET title='$title' WHERE todoid='$todoid'";
    //execution of the sql string
    $conn->exec($updateQuery);

    header('Location: index.php?edited=1'); 
} 
?>