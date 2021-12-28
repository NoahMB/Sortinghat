<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $achternaam = $_POST["achternaam"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $newname = $username.$filename;
    $folder = "../img/pfPictures/".$newname;

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(emptyInputSignup($name, $achternaam, $email, $username, $pwd, $pwdrepeat, $filename) !== false){
    header("location: ../../signup.php?error=emptyinput");
    exit();
}
if(invalidUid($username) !== false){
    header("location: ../../signup.php?error=invaliduid");
    exit();
}
if(invalidEmail($email) !== false){
    header("location: ../../signup.php?error=invalidemail");
    exit();
}
if(pwdMatch($pwd, $pwdrepeat) !== false){
    header("location: ../../signup.php?error=passwordsdontmatch");
    exit();
}
if(uidExists($conn, $username,  $email) !== false){
    header("location: ../../signup.php?error=usernametaken");
    exit();
}

createUser($conn, $name, $achternaam, $email, $age, $gender, $description, $username, $pwd, $filename, $tempname, $folder, $newname);

}
else{
    header("location: ../../signup.php?error=signupsucces");
    exit();
}