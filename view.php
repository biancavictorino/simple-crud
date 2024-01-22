<!-- view.php -->
<html>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="logo-con">
        <h1 class="logo">logo here.</h1>
    </div>
    <div class="records">
    <?php
   
    $link = mysqli_connect("localhost", "root", "password", "dbplp");
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Attempt select query execution
    $sql = "SELECT * FROM usertb";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='table'>"; 
                echo "<tr>";
                    echo "<th>USERID</th>";
                    echo "<th>USERNAME</th>";
                    echo "<th>FULL NAME</th>";
                    echo "<th>DATE CREATED</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    $id = $row['userid'];
                    echo "<td>" . $row['userid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['datecreated'] . "</td>";
                    echo"<td> <a href ='updaterecord.php?userid=$id'>Edit</a>";
                    
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
    // Close connection
    mysqli_close($link);
    ?>
    </div>
</html>

