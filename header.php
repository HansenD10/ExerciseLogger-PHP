<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("connectvars.php");
        echo "<title>Exercise Log " . $page_title . "</title>";
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
    <div id="main-container" class="container">
    <?php
        echo "<div class='jumbotron' id='header'><h1>Exercise Log " . $page_title . "</h1></div>";
    ?>