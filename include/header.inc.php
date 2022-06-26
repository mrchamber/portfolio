<?php
session_start();
$currentfile = basename($_SERVER['PHP_SELF']);
$currenttime = time();

error_reporting(E_ALL);
ini_set('display_errors', '1');

ini_set('date.timezone', 'America/New_York');
date_default_timezone_set('America/New_York');

require_once "connect.inc.php";
require_once "functions.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mary's Portfolio</title>
</head>
<body>
<section id="header">
    <div class="header container">
        <div class="nav-bar">
            <div class="brand">
                <a href="index.php#hero"><h1><span>M</span>ary <span>C</span>hambers</h1></a>
            </div>
            <div class="nav-list">
                <div class="hamburger"><div class="bar"></div></div>
                <ul>
                    <li><a href="index.php#header" data-after="Home">Home</a></li>
                    <li><a href="index.php#services" data-after="Services">Services</a></li>
                    <li><a href="index.php#projects" data-after="Projects">Projects</a></li>
                    <li><a href="index.php#about" data-after="About">About</a></li>
                    <li><a href="index.php#contact" data-after="Contact">Contact</a></li>
                    <li><a href="sign.php" data-after="Feedback">Feedback</a></li>
                    <?php
                    if (isset($_SESSION['ID'])) {
                        echo($currentfile == "logout.php") ? "<li>a class='active' href='logout.php'>Logout</a></li>" : "<li><a href='logout.php'>Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>