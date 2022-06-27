<?php

if(isset($_POST["submit"])){
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];

    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup( $fname, $lname, $uname, $email, $phone, $pwd, $repeatpwd) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
}
