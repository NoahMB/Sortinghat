<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                
                <?php 
                    if (isset($_SESSION["fldUsername"])) {
                        
                        echo "<li><a href='rate.php'>Rate Profiles</a></li>";
                        echo "<li><a href='me.php'>My Profile</a></li>";
                        echo "<li><a href='assets/include/logout.inc.php'>Log Out</a></li>";
                        echo "<li><i>Welcome, " . $_SESSION["fldUsername"] . "</i></li>";
                        
                    }
                    else {
                        echo "<li><a href='signup.php'>Register</a></li>";
                        echo "<li><a href='login.php'>Log-In</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
</header>