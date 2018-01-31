<?php
    session_start();
    $page_title = "- Log New Exercise!";
    require_once("header.php");
    require_once("nav.php");
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("Error connecting to database.");
            
    if (isset($_POST['submit'])) {
        $query = "SELECT year(SYSDATE()) - year(birthdate) age, weight, gender FROM exercise_user WHERE id = '" . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("Error querying database.");
        $row = mysqli_fetch_array($data);
        
        $type = mysqli_escape_string($dbc, trim($_POST['type']));
        $date = mysqli_escape_string($dbc, trim($_POST['date']));
        $time = mysqli_escape_string($dbc, trim($_POST['time']));
        $heartrate = mysqli_escape_string($dbc, trim($_POST['heartrate']));
        $age = $row['age'];
        $weight = $row['weight'];
        $gender = $row['gender'];
        if ($gender == 'M') {
            $calories = ((-55.0969 + (0.6309 * $heartrate) + (0.090174 * $weight) + (0.2017 * $age)) / 4.184) * $time;
        }
        else {
            $calories = ((-20.4022 + (0.4472 * $heartrate) - (0.057288 * $weight) + (0.074 * $age)) / 4.184) * $time;
        }
    
        if (!empty($type) && !empty($date) && !empty($time) && !empty($heartrate)) {
            $query = "INSERT INTO exercise_log (user_id, type, date, time_in_minutes, heartrate, calories)
                    VALUES ('" . $_SESSION['user_id'] . "', '$type', '$date', '$time', '$heartrate', '$calories')";
            mysqli_query($dbc, $query)
                    or die("Error querying database.");
            
            echo '<p>Your exercise has been logged.<a href="exerciselog.php">Click here to log another exercise.</a></p>';
            echo '<p>or <a href="viewprofile.php"> Click here to view profile.</p>';
            mysqli_close($dbc);
            exit();
        }
    }
    
    
?>
<form class="form-horizontal" method="post" 
        action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <legend>Log a New Exercise</legend>
    <div class ="form-group">
        <label class="control-label col-sm-5" for="type">Type:</label>
        <div class="col-sm-5">
            <select class="form-control" name="type">
                <option value="Running">Running</option>
                <option value="Walking">Walking</option>
                <option value="Swimming">Swimming</option>
                <option value="Weightlifting">Weightlifting</option>
                <option value="Yoga">Yoga</option>
                <option value="Sport">Sport</option>
                <option value="Other">Other</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="date">Date:</label>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="date" placeholder="yyyy/mm/dd"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="time">Time (in minutes):</label>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="time"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5"for="heartrate">Average Heart Rate:</label>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="heartrate"/>
        </div>
    </div>
    <br />
    <div class="form-group"> 
        <div class="col-sm-offset-5 col-sm-7">
            <button name="submit" type="submit" class="btn btn-success">Log Exercise</button>
        </div>
    </div>
</form>
<?php
    require_once("footer.php");
?>