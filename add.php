<!-- add.php -->
<?php

$username = $_POST["uname"];
$password = $_POST["pass"];
$fullname = $_POST["fullname"];


$link = mysqli_connect("localhost", "root", "password", "dbplp");
 
// Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
 
// query
    $sql = "INSERT INTO usertb SET username='$username' , password='$password', fullname='$fullname'";
    if(mysqli_query($link, $sql)){
        header("Location: view.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
 
// Close connection
mysqli_close($link);

?>
