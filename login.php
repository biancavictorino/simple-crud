<!-- login.php -->
<?php

$link = mysqli_connect("localhost", "root", "password", "dbplp");
    
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


    if(isset($_POST["submit"])){ 

        $username = $_POST["uname"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM usertb WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1){
            header("Location: view.php");
        } else {
            echo '
            <script>
                window.location.href = "index.php";
                alert("Login failed. Invalid Credentials!")
            </script>';
        }
        $link->close();
}
?>