<?php

if (!isset($_POST["todotext"]) or strlen($_POST["todotext"])==0){
    header('Location: index.php?missingtitle=1'); 
}

if (!isset($_POST["createdby"]) or strlen($_POST["createdby"])==0){
    header('Location: index.php?missingauthor=1'); 
}

$title=$_POST["todotext"];
$createdby=$_POST["createdby"];

$priority=0;
if (isset($_POST["prioritise"])) {
    $priority=1;
}


//För att kunna ha något med db att göra (alltså kommunícera med den) så måste man ALLLLTIIIID ansluta sig till den först.
//Nu ska vi ansluta oss till db

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
   header('Location: index.php?duplicatetitle=1'); 
} else {
    //The variable sql have a string. The string is the sql query that we will run. 
    $sql = "INSERT INTO todos (title, createdby, priority)
        VALUES ('$title', '$createdby', '$priority')";

    //execution of the sql string
    $conn->exec($sql);

    header('Location: index.php?success=1'); 
} 
    
    

?>
