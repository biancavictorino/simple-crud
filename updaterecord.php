<!-- updaterecord.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userid = $_GET["q"];
    
    $link = mysqli_connect("localhost", "root", "password", "dbplp");
    
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM usertb WHERE userid='$userid'";
    
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $username = $row['username'];
            $fullname = $row['fullname'];
            $password = $row['password'];
        } else {
            echo "Error: User not found.";
            exit();
        }
        mysqli_free_result($result);
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        exit();
    }
    
    mysqli_close($link);
} else {
    echo "Invalid request.";
    exit();
}
?>

<html>
    <link rel="stylesheet" href="style.css">
    <form action="update.php" method="post">
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
    
    <div class="title">
        <h1>Update Records</h1>
    </div>
    
    <div class="inputs-add-update">
        <label for="uname">Username</label>
        <input id='username' type="text" name="uname" value="<?php echo $username; ?>" required><br>
        
        <label for="fullname">Full Name:</label>
        <input id='fullname' type="text" name="fullname" value="<?php echo $fullname; ?>" required><br>
        
        <label for="password">Password:</label>
        <input id='password' type="password" name="pass" value="<?php echo $password; ?>" required><br>
    </div>
    
    <div class="buttons">
            <button onclick={myFunction()} value="Clear" name="clear" type="reset">RESET</button>
            <button class="btn-main" value="Submit" name="submit" type="submit">UPDATE</button>
    </div>
    
</form>
<script src="script.js"></script>
</html>