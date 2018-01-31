<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        $_SESSION = array();

        session_destroy();
    }

    // Redirect to the home page
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    header('Location: ' . $home_url);
?>
