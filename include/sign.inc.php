<?php
/*
if (isset($_POST["submit"])){
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $uname = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $repeatpwd = $_POST["repeatpwd"];

    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup( $fname, $lname, $uname, $email, $phone, $pwd, $repeatpwd) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($uname) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $repeatpwd) !== false){
        header("location: ../signup.php?error=pasworddontmatch");
        exit();
    }
    if (uidExists($conn, $uname, $email)){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn,$uname, $fname, $lname, $email, $phone, $pwd);
}
else {
    header("location: ../sign.php");
    exit();
}
/*