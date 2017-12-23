<?php

$servername = "localhost";
$username = "root";
$password = "root";
$db = "todos";
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
 
    $sql = 'SELECT title, completed, createdby, priority
            FROM todos';
 
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $q->fetch()):
echo htmlspecialchars($row['title']);
echo htmlspecialchars($row['completed']);
echo htmlspecialchars($row['createdby']);
echo htmlspecialchars($row['priority']);

endwhile;
?>