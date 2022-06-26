<?php require_once "include/header.inc.php"?>
<body>
<section class="sign">
    <div class="sign-container">
        <div class="form sign-in-form">
            <div class="wrapper">
                <form action="#">
                    <h1>Sign In</h1>
                    <p>Please use your username and password to sign in</p>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <button>Sign In</button>
                </form>
            </div>
        </div>
        <div class="form sign-up-form active">
            <div class="wrapper">
                <form action="#">
                    <h1>Sign Up</h1>
                    <p>Please, provide the info needed below to create an account</p>
                    <input type="text" name="first name" placeholder="Enter your first name">
                    <input type="text" name="last name" placeholder="Enter your last name">
                    <input type="email" name="email" placeholder="Enter your email">
                    <input type="number" name="phone" placeholder="Enter your phone number">
                    <input type="password" name="pwd" placeholder="Enter your password">
                    <input type="text" name="repeatpwd" placeholder="Confirm your password">
                    <button type="submit">Sign Up</button>
                </form>
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