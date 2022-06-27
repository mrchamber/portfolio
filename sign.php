<?php require_once "include/header.inc.php"?>
<body>
<section class="sign">
    <div class="sign-container">
        <div class="form sign-in-form">
            <div class="wrapper">
                <form action="include/login.inc.php" method="post">
                    <h1>Sign In</h1>
                    <p>Please use your username and password to sign in</p>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <button type="submit" name="submit">Sign In</button>
                </form>
                <?php
                if(isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all fields!</p>";
                    }
                    else if ($_GET["error"] == "wronglogin"){
                        echo "<p>Incorrect login information</p>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="form sign-up-form active">
            <div class="wrapper">
                <form action="include/sign.inc.php" method="post">
                    <h1>Sign Up</h1>
                    <p>Please, provide the info needed below to create an account</p>
                    <input type="text" name="username" placeholder="Enter your user name">
                    <input type="text" name="firstname" placeholder="Enter your first name">
                    <input type="text" name="lastname" placeholder="Enter your last name">
                    <input type="email" name="email" placeholder="Enter your email">
                    <input type="text" name="phone" placeholder="Enter your phone number">
                    <input type="password" name="pwd" placeholder="Enter your password">
                    <input type="text" name="repeatpwd" placeholder="Confirm your password">
                    <button type="submit" name="submit">Sign Up</button>
                </form>
                <?php
                    if(isset($_GET["error"])){
                        if ($_GET["error"] == "emptyinput"){
                            echo "<p>Fill in all fields!</p>";
                        }
                        else if ($_GET["error"] == "invaliduid"){
                            echo "<p>Choose a proper username</p>";
                        }
                        else if ($_GET["error"] == "invalidemail"){
                            echo "<p>Choose a proper email!</p>";
                        }
                        else if ($_GET["error"] == "passwordsdontmatch"){
                            echo "<p>Fill in all fields!</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed"){
                            echo "<p>Something went wrong, try again!</p>";
                        }
                        else if ($_GET["error"] == "usernametaken"){
                            echo "<p>Username already taken</p>";
                        }
                        else if ($_GET["error"] == "none"){
                            echo "<p>You have signed up!</p>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="overlay-container">
            <div class="overlay">
            <div class="overlay-left">
                <h1>Create Account</h1>
                <p>or</p>
                <button id="signInButton">Log In</button>
            </div>
            <div class="overlay-right">
                <h1>Please, Log In</h1>
                <p>or</p>
                <button id="signUpButton">Create Account</button>
            </div>
            </div>
        </div>
    </div>
</section>
<script src="main.js"></script>
</body>
<?php require_once "include/footer.inc.php"?>