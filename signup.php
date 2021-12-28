<?php include_once'assets/include/header.php';?>

    <title>Register</title>
</head>

<body>

<?php include_once'assets/include/navF.php';?>

    <div class="parallax">
        <div class="TekstMidden">
            <h1>Register</h1>
        </div>
    </div>

    <?php
        if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p class='error'>Fill in all fields!</p>";
                }
        else if ($_GET["error"] == "invalidUid"){
            echo "<p class='error'>Choose a proper username!</p>";
        }
        else if ($_GET["error"] == "invalidemail"){
            echo "<p class='error'>Choose a proper email!</p>";
                }
        else if ($_GET["error"] == "passwordsdontmatch"){
            echo "<p class='error'>Passwords doesn't match!</p>";
                }
        else if ($_GET["error"] == "stmtfailed"){
            echo "<p class='error'>Something went wrong, try again!</p>";
                }
        else if ($_GET["error"] == "usernametaken"){
            echo "<p class='error'>This username is already taken!</p>";        
        }
        else if ($_GET["error"] == "none"){
            echo "<p class='error'>You have signed up!</p>";
        }  
        else if ($_GET["error"] == "signupsucces"){
            echo "<p class='error'>Account created succesfully!</p>";
            }
    }
    ?>

    <div class="tekst">
        <h1 class="invullen" id="form">Fill in your details:</h1>
        <form class="formulier" action="assets/include/signup.inc.php" method="post" enctype="multipart/form-data" id="signinform">
            Firstname: <input class="formpos" type="text" name="name" placeholder="Firstname"><br>
            Lastname: <input class="formpos" type="text" name="achternaam" placeholder="Lastname"><br>
            Age: <input class="formpos" type="number" name="age" placeholder="0"><br>
            Gender: <br><select class="formpos" name="gender"><br>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                   </select><br>
            Description:<br> <textarea class="formpos" name="description" form="signinform"></textarea><br>
            Username: <input class="formpos" type="text" name="username" placeholder="Username"><br>
            Password: <input class="formpos" type="password" name="pwd" placeholder="Password"><br>
            Repeat password: <input class="formpos" type="password" name="pwdrepeat" placeholder="Repeat password"><br>
            E-mail: <input class="formpos" type="text" name="email" placeholder="E-mail" minlength="5"><br>
            Profile Picture: <input class="formpos" type="file" name="uploadfile" accept="image/png, image/jpeg" value="" required><br>
            <input class="knop" type="submit" name="submit" value="Register">
        </form>
    </div>

<?php include_once'assets/include/footer.php';?>
