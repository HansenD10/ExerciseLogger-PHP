<?php
    $page_title = "- Sign Up";
    require_once('header.php');
    require_once('nav.php');
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error connecting to database.');
    
    if (isset($_POST['submit'])) {
        $username = mysqli_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_escape_string($dbc, trim($_POST['password2']));
        
        if (!empty($username) && !empty($password1) && !empty($password2) && $password1 === $password2) {
            $query = "SELECT * FROM exercise_user WHERE username = '$username'";
            
            $data = mysqli_query($dbc, $query)
                    or die('Error querying database.');
                    
            if (mysqli_num_rows($data) == 0) {
                $query = "INSERT INTO exercise_user (username, password)" 
                        . " VALUES ('$username', SHA('$password1'))";
                
                mysqli_query($dbc, $query)
                        or die('Error querying database.');
                
                echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
                        
                mysqli_close($dbc);
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url);
            }
            else {
                echo '<p>An account already exists for this username. Please use a different'
                        . 'address.</p>';
                $username = "";
            }
        }
        else {
            echo '<p>You must enter all of the sign-up data, including the desired password '
                    . 'twice.</p>';
        }
    }
    mysqli_close($dbc);
?>
<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <legend>Registration</legend>
    <div class="form-group">
        <label class="control-label col-sm-4" for="username">Username:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="username"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="password1">Password:</label>
        <div class="col-sm-7">
            <input class="form-control" type="password" name="password1"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="password2">Confirm Password:</label>
        <div class="col-sm-7">
            <input class="form-control" type="password" name="password2"/>
        </div>
    </div>
    <br />
    <div class="form-group"> 
        <div class="col-sm-offset-5 col-sm-12">
            <button name="submit" type="submit" class="btn btn-success">Sign Up</button>
        </div>
    </div>
</form>