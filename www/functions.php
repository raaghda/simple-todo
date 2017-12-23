<?php
require 'database.php';
//Prints message if user entered task correctly/wrong
function show_submit_message()
{
    //Display of success-message when task is entered
    if (isset($_GET["success"]))
        {
            echo '<p id="submit_message">' . "Great! A new task has been added." . '</p>';
        }
} 