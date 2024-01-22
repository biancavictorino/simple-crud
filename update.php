<!-- update.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST["userid"];
    $username = $_POST["uname"];
    $password = $_POST["pass"];
    $fullname = $_POST["fullname"];

    $link = mysqli_connect("localhost", "root", "password", "dbplp");

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $fullname = mysqli_real_escape_string($link, $fullname);

    $sql = "UPDATE usertb SET username='$username', fullname='$fullname', password='$password' WHERE userid='$userid'";

    if (mysqli_query($link, $sql)) {
        header("Location: view.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "Invalid request.";
}
?>
