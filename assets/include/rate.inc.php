<?php

session_start();

if (isset($_POST["Gryffindor"])) {
    $id = $_POST["id"];

    require_once 'dbh.inc.php';

    $sql = "INSERT INTO tblRatings (`fldRaterID`, `fldRatedID`, `fldHousesID`) VALUES ('" . $_SESSION["fldAccountsID"] . "', '" . $id . "', '1');";
    mysqli_query($conn, $sql);
    header("location:../../percentage.php?id=$id#table"); 
}

if (isset($_POST["Hufflepuff"])) {
    $id = $_POST["id"];

    require_once 'dbh.inc.php';

    $sql = "INSERT INTO tblRatings (`fldRaterID`, `fldRatedID`, `fldHousesID`) VALUES ('" . $_SESSION["fldAccountsID"] . "', '" . $id . "', '2');";
    mysqli_query($conn, $sql);
    header("location:../../percentage.php?id=$id#table");
}

if (isset($_POST["Ravenclaw"])) {
    $id = $_POST["id"];

    require_once 'dbh.inc.php';

    $sql = "INSERT INTO tblRatings (`fldRaterID`, `fldRatedID`, `fldHousesID`) VALUES ('" . $_SESSION["fldAccountsID"] . "', '" . $id . "', '3');";
    mysqli_query($conn, $sql);
    header("location:../../percentage.php?id=$id#table");
}

if (isset($_POST["Slytherin"])) {
    $id = $_POST["id"];

    require_once 'dbh.inc.php';

    $sql = "INSERT INTO tblRatings (`fldRaterID`, `fldRatedID`, `fldHousesID`) VALUES ('" . $_SESSION["fldAccountsID"] . "', '" . $id . "', '4');";
    mysqli_query($conn, $sql);
    header("location:../../percentage.php?id=$id#table");
}


