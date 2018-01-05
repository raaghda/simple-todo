<?php
/* If title of todo is not given  -> error message will appear */
if (!isset($_POST["todotext"]) or strlen($_POST["todotext"])==0){
    header('Location: index.php?missingtitle=1'); 
}
/* If author of the todo is left blank -> error message will appear */
if (!isset($_POST["createdby"]) or strlen($_POST["createdby"])==0){
    header('Location: index.php?missingauthor=1'); 
}

$title=$_POST["todotext"];
$createdby=$_POST["createdby"];

/* Priority default is set to 0 (no priority), if set = 1 */
$priority=0;
if (isset($_POST["prioritise"])) {
    $priority=1;
}


/*In order to communicate with the db, a connection have to be made first. Here, we are connecting to the db */

$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

$gettitle = "SELECT title FROM todos WHERE title='$title'";
$countrows = $conn->prepare($gettitle);
$countrows->execute();

/* Counts and returns number of rows that were counted */
$count = $countrows->rowCount();

/* No allowance for duplicate title names. If there are the same title name -> user will be sent back to index with msg of failure. If title given is not duplicate, the new todo will be added to the db */
if ($count > 0){
   header('Location: index.php?duplicatetitle=1'); 
} else {
    //The variable sql have a string. The string is the sql query that we will run. 
    $sql = "INSERT INTO todos (title, createdby, priority)
        VALUES ('$title', '$createdby', '$priority')";

    //execution of the sql string.
    $conn->exec($sql);

    header('Location: index.php?success=1'); 
} 
?>
