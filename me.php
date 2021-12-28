<?php include_once'assets/include/header.php';?>
<?php include_once'assets/include/dbh.inc.php';?>

    <title>My Profile</title>
</head>

<body>

<?php include_once'assets/include/navF.php'; ?>

    <div class="parallax">
        <div class="TekstMidden">
            <h1>My Profile</h1>
        </div>
    </div>

<?php

    $GryffindorSQL = "SELECT COUNT(*) FROM tblRatings WHERE fldRatedID = " . $_SESSION["fldAccountsID"] . " AND fldHousesID = 1;";
    $result = mysqli_query($conn, $GryffindorSQL);
    $row = mysqli_fetch_array($result);
    $Gryffindor = $row["COUNT(*)"];

    $HufflepuffSQL = "SELECT COUNT(*) FROM tblRatings WHERE fldRatedID = " . $_SESSION["fldAccountsID"] . " AND fldHousesID = 2;";
    $result = mysqli_query($conn, $HufflepuffSQL);
    $row = mysqli_fetch_array($result);
    $Hufflepuff = $row["COUNT(*)"];

    $RavenclawSQL = "SELECT COUNT(*) FROM tblRatings WHERE fldRatedID = " . $_SESSION["fldAccountsID"] . " AND fldHousesID = 3;";
    $result = mysqli_query($conn, $RavenclawSQL);
    $row = mysqli_fetch_array($result);
    $Ravenclaw = $row["COUNT(*)"];

    $SlytherinSQL = "SELECT COUNT(*) FROM tblRatings WHERE fldRatedID = " . $_SESSION["fldAccountsID"] . " AND fldHousesID = 4;";
    $result = mysqli_query($conn, $SlytherinSQL);
    $row = mysqli_fetch_array($result);
    $Slytherin = $row["COUNT(*)"];

    $max = $Gryffindor + $Hufflepuff + $Ravenclaw + $Slytherin;

    $Gryffindorperc = ($Gryffindor / $max) * 100;
    $Hufflepuffperc = ($Hufflepuff / $max) * 100;
    $Ravenclawperc = ($Ravenclaw / $max) * 100;
    $Slytherinperc = ($Slytherin / $max) * 100;
    
    $sql = "SELECT * FROM tblAccounts WHERE fldAccountsID=" . $_SESSION["fldAccountsID"] . ";";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    echo "<img class='center' src='assets/img/pfPictures/" . $row["fldFilename"] . "' alt='Profile picture'>";

    echo "<table class='btable'>
            <tr><th>Firstname</th><th>Name</th></tr>
            <tr>
            <td>" . $row["fldFirstname"] . "</td>
            <td>" . $row["fldName"] . "</td>
            </tr>
        </table>";
    
    
    echo "<table class='btable'>
            <tr><th>Username</th><th>Age</th><th>Gender</th></tr>
            <tr>
            <td>" . $row["fldUsername"] . "</td>
            <td>" . $row["fldAge"] . "</td>
            <td>" . $row["fldGender"] . "</td>
            </tr>
        </table>";

    echo "<table class='btable'>
            <tr><th>Mail</th></tr>
            <tr>
            <td>" . $row["fldMail"] . "</td>
            </tr>
        </table>";

    echo "<table class='btable'>
            <tr><th>Description</th></tr>
            <tr>
            <td>" . $row["fldDesc"] . "</td>
            </tr>
        </table>";

    echo "<div class='center-houses'>
            <div class='container-houses'>
                <form method='post' action='assets/include/rate.inc.php'>
                    <div class='row'>
                        <div class='columnnofilter'>
                            <button class='button1' type='submit' name='Gryffindor' disabled><p class='ratingprec'>" . number_format($Gryffindorperc, 2) . "%</p></button>
                        </div>

                        <div class='columnnofilter'>
                            <button class='button2' type='submit' name='Hufflepuff' disabled><p class='ratingprec'>" . number_format($Hufflepuffperc, 2) . "%</p></button>
                        </div>    
                        
                        <div class='columnnofilter'>
                            <button class='button3' type='submit' name='Ravenclaw' disabled><p class='ratingprec'>" . number_format($Ravenclawperc, 2) . "%</p></button>
                        </div>
                        

                        <div class='columnnofilter'>
                            <button class='button4' type='submit' name='Slytherin' disabled><p class='ratingprec'>" . number_format($Slytherinperc, 2) . "%</p></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>";
?>


<?php include_once'assets/include/footer.php'; ?>