<?php

$link = mysqli_connect("localhost", "root", "", "donut");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['fname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['lname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$user = mysqli_real_escape_string($link, $_REQUEST['user']);
$pass = mysqli_real_escape_string($link, $_REQUEST['pass']);


// Attempt insert query execution
$sql = "INSERT INTO users VALUES ('$first_name', '$last_name', '$email','$user','$pass')";
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
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo 
    "<html>
    <head><link rel='stylesheet' type='text/css' href='style1.css'></head>
    <body>
    <div style='padding-left: 30px; padding-right: 30px;'>
    <h1>Registration failed, try again</h1>
    <form action='register.html'>
    <button type='submit' class='button button3'>Try again</button>
    </form>
    </div>
    </body>
    </html>"
    ;
}
 
// Close connection
mysqli_close($link);
?>