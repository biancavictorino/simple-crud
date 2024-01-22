<!-- index.php -->
<html>
    <link rel="stylesheet" href="style.css">

    <form action="login.php" method="POST">
        <div class="title">
            <h1>LOGIN</h1>
        </div>
        <div class="inputs-login">
            <label for="uname">Username:</label> 
            <input type="text" name="uname" required> <br>

            <label for="password">Password:</label>
            <input type="Password" name="password" required> <br>
        </div>

        <div class="buttons">
            <button value="Clear" name="clear" type="reset">CLEAR</button>
            <button class="btn-main" value="Submit" name="submit" type="submit">LOGIN</button>
        </div>
        <p class="link">Not Registered Yet? <b><a href="signup.html"> Sign Up </b></a></p>
    
    </form>
</html>