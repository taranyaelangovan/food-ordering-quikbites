<?php

$link = mysqli_connect("localhost", "root", "", "donut");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$user = mysqli_real_escape_string($link, $_REQUEST['user']);
$pass = mysqli_real_escape_string($link, $_REQUEST['pass']);

// Attempt insert query execution
$sql = "select * from users where user='$user' and pass='$pass'";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        header("Location: homepage.php");
    } 
    else{
        echo 
    "<html>
    <head><link rel='stylesheet' type='text/css' href='style1.css'></head>
    <body>
    <div style='padding-left: 30px; padding-right: 30px;'>
    <h1>Invalid Login</h1>
    <form action='login.html'>
    <button type='submit' class='button button3'>Try again!</button>
    </form>
    <form action='register.html'>
    <button type='submit' class='button button3'>Register Here!</button>
    </form>
    </div>
    </body>
    </html>"
    ;
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
/*
if(mysqli_query($link, $sql)){
    echo 
    "<html>
    <head><link rel='stylesheet' type='text/css' href='style1.css'></head>
    <body>
    <div style='padding-left: 30px; padding-right: 30px;'>
    <h1>Account created! Welcome, $user</h1>
    <form action='login.html'>
    <button type='submit' class='button button3'>Login to continue</button>
    </form>
    </div>
    </body>
    </html>"
    ;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/
 
// Close connection
mysqli_close($link);
?>