<?php

function emptyInputSignup($name, $achternaam, $email, $username, $pwd, $pwdrepeat, $filename) {
    $result;
    if(empty($name) || empty($achternaam) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat) || empty($filename)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if($pwd !== $pwdrepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email) {
    $result;
    $sql = "SELECT * FROM tblAccounts WHERE fldUsername = ? OR fldMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
    exit();
}

function createUser($conn, $name, $achternaam, $email, $age, $gender, $description, $username, $pwd, $filename, $tempname, $folder, $newname) {
    $sql = "INSERT INTO tblAccounts (fldFirstname, fldName, fldAge, fldGender, fldDesc, fldMail, fldUsername, fldPassword, fldFilename) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $achternaam, $age, $gender, $description, $email, $username, $hashedPwd, $newname);

    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);

    move_uploaded_file($tempname, $folder);

    header("location: ../../signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd) {
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);
    if($uidExists === false) {
        header("location: ../../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["fldPassword"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../../login.php?error=wronglogin");
        exit();
    
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["fldAccountsID"] = $uidExists["fldAccountsID"];
        $_SESSION["fldUsername"] = $uidExists["fldUsername"];
        header("location: ../../index.php");
        exit();
    }
}

