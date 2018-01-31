<?php
    session_start();
    $page_title = "- Log In";
    require_once('header.php');
    require_once('nav.php');
    $error_msg = "";
    
    if (!isset($_SESSION['user_id'])) {
        if (isset($_POST['submit'])) {
            //Connect to database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("Error connecting to the database.");
                    
            $user_username = mysqli_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_escape_string($dbc, trim($_POST['password']));
            
            
            if (!empty($user_username) && !empty($user_password)) {
                $query = "SELECT id, username FROM exercise_user WHERE username = '$user_username' "
                        . "AND password = SHA1('$user_password')";
                $data = mysqli_query($dbc, $query)
                        or die("Error querying database.");
                
                if (mysqli_num_rows($data) == 1) {
                    $row = mysqli_fetch_array($data);
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/viewprofile.php';
                    header('Location: ' . $home_url);
                }
                else {
                    $error_msg = 'Sorry, you must enter a valid username and password to log in.';
                }
            }
            else {
                $error_msg = 'Sorry, you must enter your username and password to log in.';
            }
        }
    }
    if (empty($_SESSION['user_id'])) {
        echo '<p>' .  $error_msg . '</p>';        
?>
<form class="form-horizontal" enctype="multipart/form-data" method="post" 
        action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <legend>Sign in</legend>
    <div class="form-group">
        <label class="control-label col-sm-3" for="username">Username:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="username"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="password">Password:</label>
        <div class="col-sm-7">
            <input class="form-control" type="password" name="password"/>
        </div>
    </div>
    <br />
    <div class="form-group"> 
        <div class="col-sm-offset-5 col-sm-7">
            <button name="submit" type="submit" class="btn btn-success">Log In</button>
        </div>
    </div>
</form>
<?php
    }
    else {
        echo '<p class="login" You are logging in as ' . $_SESSION['username'] . '</p>';
    }
    require_once("footer.php");
?>
    
    
    