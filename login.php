<?php include_once'assets/include/header.php';?>

    <title>Log-In</title>
</head>

<body>

<?php include_once'assets/include/navF.php';?>

<?php

if (isset($_POST["submit"])) {
    header("location: signup.php");
}

?>

    <div class="parallax">
        <div class="TekstMidden">
            <h1>Log-In</h1>
        </div>
    </div>

    <div class="tekst">
        <h1 class="invullen">Fill in your details:</h1>
        <form class="formulier" method="post" action="assets/include/login.inc.php">
            Username/E-Mail: <input class="formpos" type="text" name="uid" placeholder="Username/E-Mail"><br>
            Password: <input class="formpos" type="password" name="pwd" placeholder="Wachtwoord"><br>
            <input class="knop" type="submit" name="submit" value="Log-In">
            <a href="signup.php" class="knop">New? Register here</a>
            <?php
        if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<script> alert('Fill in all fields!') </script>";
        }
        else if ($_GET["error"] == "wronglogin"){
            echo "<script> alert('Your username and or password dont match!') </script>";       
        }
    }
    ?>
        </form>
        
    </div>

<?php include_once'assets/include/footer.php';?>
