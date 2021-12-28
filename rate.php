<?php include_once'assets/include/header.php';?>
<?php include_once'assets/include/dbh.inc.php';?>

    <title>Ratings</title>
</head>

<body>

<?php include_once'assets/include/navF.php'; ?>

    <div class="parallax">
        <div class="TekstMidden">
            <h1>Rate People</h1>
        </div>
    </div>

<?php

$sql = "SELECT * FROM tblAccounts WHERE fldAccountsID != " . $_SESSION["fldAccountsID"] . " AND fldAccountsID NOT IN 
        (SELECT fldRatedID FROM tblRatings WHERE fldRaterID = " . $_SESSION["fldAccountsID"] . ") LIMIT 1;";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<img class='center' src='assets/img/pfPictures/" . $row["fldFilename"] . "' alt='Profile picture'>";

        echo "<table class='btable' id='table'>
                <tr><th>Firstname</th><th>Name</th></tr>
                <tr>
                <td>" . $row["fldFirstname"] . "</td>
                <td>" . $row["fldName"] . "</td>
                </tr>
            </table>";

        echo "<table class='btable'>
                <tr><th>Age</th><th>Gender</th></tr>
                <tr>
                <td>" . $row["fldAge"] . "</td>
                <td>" . $row["fldGender"] . "</td>
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
                        <input type='hidden' name=id value=".$row["fldAccountsID"]." >
                        <div class='row'>
                            <div class='column'>
                                <button class='button1' type='submit' name='Gryffindor' value='Gryffindor'></button>
                            </div>

                            <div class='column'>
                                <button class='button2' type='submit' name='Hufflepuff' value='Hufflepuff'></button>
                            </div>    
                            
                            <div class='column'>
                                <button class='button3' type='submit' name='Ravenclaw' value='Ravenclaw'></button>
                            </div>
                            

                            <div class='column'>
                                <button class='button4' type='submit' name='Slytherin' value='Slytherin'></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";
    }
}
else {
    echo "<div class='norate' id='table'>
            <h1 class='noratetext'>no profiles left, " . $_SESSION["fldUsername"] . "</h1>
          </div>";
}


?>

<?php include_once'assets/include/footer.php'; ?>