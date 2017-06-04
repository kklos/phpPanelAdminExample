<?php

include_once "header.php";
include_once 'config/database.php';
include_once 'objects/user.php';
 
// prepare objects
$user = new User($db);
 
// read the details of user to be read
$user->getUserDetails();

$page_title = "Profile details";

 

 echo"<div class='container'>";

// HTML table for displaying a user details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Username</td>";
        echo "<td>{$user->user_name}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>First name</td>";
        echo "<td>{$user->first_name}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Last name</td>";
        echo "<td>{$user->last_name}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Email</td>";
        echo "<td>{$user->user_email}</td>";
    echo "</tr>";
 
echo "</table>";

echo"</div>";
// set footer
include_once "footer.php";
?>
