<?php
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){
        echo "<p style='text-align: center'>Please sign in.</p>";
        require_once("footer.php");
        exit();
    }
?>