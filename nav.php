<nav id="nav" class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">ExerciseLogger</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php 
                if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
                    echo ('<li><a href="viewprofile.php">View Profile</a></li>
                            <li><a href="exerciselog.php">Log Exercise</a></li>
                            <li><a href="editprofile.php">Edit Profile</a></li>');
                    
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php 
                if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
                    echo ('<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>
                            Log Out (' . $_SESSION['username'] . ')</a></li>');
                }
                else {
                    echo ('<li><a href="signup.php"><span class="glyphicon glyphicon-new-window"></span> Sign Up</a></li>');
                    echo ('<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>');
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

