<?php

function emptyInputSignup($fname, $lname, $uname, $email, $phone, $pwd, $repeatpwd){
    $result;
    if (empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($phone) || empty($pwd) || empty($repeatpwd)){
        $result = true;
    }

    else{
        $result = false;
    }
    return $result;
}

function invaliduid($uname){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$uname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$repeatpwd){
    $result;
    if ($pwd !== $repeatpwd){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn,$uname,$email){
    $sql = "SELECT * FROM users WHERE uname = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname,$email);
    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $uname, $email, $phone, $pwd){
    $sql = "INSERT INTO users (fname, lname, uname, email, phone, pwd) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $uname, $email, $phone, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sign.php?error=none");
}

function emptyInputLogin($uname ,$pwd){
    $result;
    if (empty($uname) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uname, $pwd){
    $uidExists = uidExists($conn, $uname, $pwd);

    if ($uidExists === false){
        header("location: ../sign.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists['pwd'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../sign.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["uname"] = $uidExists["uname"];
        header("location: ../index.php");
        exit();
    }
}