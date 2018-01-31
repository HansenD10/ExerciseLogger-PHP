<?php
    require_once("connectvars.php");
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("Error connecting to database.");
    
    $query = "DELETE FROM exercise_log WHERE id = '" . $_GET['id'] . "' LIMIT 1";
    
    mysqli_query($dbc, $query)
            or die("Error querying database.");
            
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/viewprofile.php';
    header('Location: ' . $home_url);
?>