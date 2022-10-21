<?php
session_start();
//require_once "connect.inc.php";
//require_once "functions.inc.php";
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
                    if (isset($_SESSION['uname'])) {
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='logout.inc.php'>Log out</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>