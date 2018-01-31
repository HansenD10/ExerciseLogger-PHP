<?php
    session_start();
    $page_title = "- View Profile";
    require_once("header.php");
    require_once("nav.php");
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("Error connecting to database.");

    $query = "SELECT username, first_name, last_name, gender, birthdate, weight FROM exercise_user WHERE id = '" 
                . $_SESSION['user_id'] . "'";
    $data = mysqli_query($dbc, $query)
            or die("Error querying the database.");
    $row = mysqli_fetch_array($data);
    if ($row != NULL) {
        $username = $row['username'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $gender = $row['gender'];
        $birthday = $row['birthdate'];
        $weight = $row['weight'];
    }
    else {
        echo '<p> There was a problem accesing your profile.</p>';
    }
?>
<div>
    <div class='col-sm-4'>
        <table class="table">
            <legend>Account Information</legend>
            <tr>
                <th>
                    Username:
                </th>
                <td>
                    <?php echo $username;?>
                </td>
            </tr>
            <tr>
                <th>
                    First Name:
                </th>
                <td>
                    <?php if(!empty($first_name)) echo $first_name;?>
                </td>
            </tr>
            <tr>
                <th>
                    Last Name:
                </th>
                <td>
                    <?php if(!empty($last_name)) echo $last_name;?>
                </td>
            </tr>
            <tr>
                <th>
                    Gender:
                </th>
                <td>
                    <?php if(!empty($gender)) echo $gender;?>
                </td>
            </tr>
            <tr>
                <th>
                    Birthdate:
                </th>
                <td>
                    <?php if(!empty($birthday)) echo $birthday;?>
                </td>
            </tr>
            <tr>
                <th>
                    Weight:
                </th>
                <td>
                    <?php if(!empty($weight)) echo $weight . ' lbs';?>
                </td>
            </tr>
        </table>
    </div>
    <div class='col-sm-8'>
        <table class="table">
            <legend>Exercise Logs</legend>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Time in Minutes</th>
                    <th>Heart Rate</th>
                    <th>Calories Burned</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT id, date, type, time_in_minutes, heartrate, calories FROM exercise_log WHERE user_id = '"
                        . $_SESSION['user_id'] . "' ORDER BY date DESC LIMIT 15";
                
                $data = mysqli_query($dbc, $query)
                        or die("Error querying database.");
                
                while($row = mysqli_fetch_array($data)) {
                    echo '<tr>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['type'] . '</td>';
                    echo '<td>' . $row['time_in_minutes'] . '</td>';
                    echo '<td>' . $row['heartrate'] . '</td>';
                    echo '<td>' . $row['calories'] . '</td>';
                    echo '<td><a href="removeexercise.php?id= ' . $row['id']
                    . '" onclick="return confirm(\'Are you sure?\')"><span class="glyphicon glyphicon-trash"></span>';
                    echo '</tr>';
                }
                
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    require_once("footer.php");
?>