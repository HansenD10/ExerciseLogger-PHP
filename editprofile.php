<?php
    session_start();
    $page_title = "- Edit Profile";
    require_once("header.php");
    require_once("nav.php");
    require_once("authenticate.php");
        
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error connecting to database.');
            
    if (isset($_POST['submit'])) {
        //Grab variables
        $first_name = mysqli_escape_string($dbc, trim($_POST['fname']));
        $last_name = mysqli_escape_string($dbc, trim($_POST['lname']));
        $gender = $_POST['gender'];
        $birthday = mysqli_escape_string($dbc, trim($_POST['bday']));
        $weight = mysqli_escape_string($dbc, trim($_POST['weight']));
        
        //Make sure all fields answered
        if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($birthday)
                && !empty($weight)) {
            //Build and run query
            $query = "UPDATE exercise_user SET first_name = '$first_name', last_name = '$last_name',
                    gender = '$gender', birthdate = '$birthday', weight = $weight WHERE id = '"
                    . $_SESSION['user_id'] . "'";
            
            mysqli_query($dbc, $query)
                    or die("Error querying the database.");
                    
            //Notify user account was modified
            echo '<p>Your profile has been successfully updated. <a href="viewprofile.php">' 
            . 'Click here to view profile.</a></p>';
            mysqli_close($dbc);
            exit();
        }
        else {
            echo "<p>Please fill out all the information below.</p>";
        }
    }
    else {
        $query = "SELECT first_name, last_name, gender, birthdate, weight FROM exercise_user WHERE id = '" 
                . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("Error querying the database.");
        $row = mysqli_fetch_array($data);
        if ($row != NULL) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $gender = $row['gender'];
            $birthday = $row['birthdate'];
            $weight = $row['weight'];
        }
        else {
            echo '<p> There was a problem accesing your profile.</p>';
        }
    }
?>




<form class="form-horizontal" enctype="multipart/form-data" method="post" 
        action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label class="control-label col-sm-3" for="fname">First Name:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="fname" value="<?php if(!empty($first_name)) echo $first_name; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lname">Last Name:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="lname" value="<?php if(!empty($last_name)) echo $last_name; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="gender">Gender:</label>
        <div class="col-sm-2">
            <select class="form-control" name="gender">
                <option value="M" <?php if(!empty($gender) && $gender == 'M') echo 'selected = "selected"';?>>M</option>
                <option value="F" <?php if(!empty($gender) && $gender == 'F') echo 'selected = "selected"';?>>F</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bday">Birthdate:</label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="bday" value="<?php if (!empty($birthday)) echo $birthday;?>" placeholder="yyyy/mm/dd"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="weight">Weight (in pounds):</label>
        <div class="col-sm-2">
            <input class="form-control" type="text" name="weight" value="<?php if(!empty($weight)) echo $weight;?>"/>
        </div>
    </div>
    <br />
    <div class="form-group"> 
        <div class="col-sm-offset-5 col-sm-7">
            <button name="submit" type="submit" class="btn btn-success">Save Profile</button>
        </div>
    </div>
</form>
<?php
    require_once("footer.php")
?>
