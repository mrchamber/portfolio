<?php
require_once "include/header.inc.php";
$showform=1;
$errormsg=0;
$erruname="";
$errpwd="";

if (isset($_SESSION['ID'])){
    $showform = 0;
    echo "<center><div class=loginblock><h1>Member Account Information</h1>";
    try {
        $sql = "SELECT * FROM Users WHERE ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_SESSION['ID']);
        $stmt->execute();
        $row = $stmt->fetch();
    }
    catch (PDOException $e){
        die($e->getMessage());
    }
    $fname = $row['FirstName'];
    $lname = $row['LastName'];
    $uname = $row['Username'];
    $phone = $row['PhoneNumber'];
    $signUp = $row['SignUpDate'];

    echo "<p>Name: $fname $lname</p>";
    echo "<p>Username: $uname</p>";
    echo "<p>Phone Number: $phone</p>";
    echo "<p>Account Created: $signUp</p>";
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = trim(strtolower($_POST['uname']));
    $pwd = $_POST['pwd'];

    if (empty($uname)) {
        $erruname = "You must enter a username.";
        $errormsg = 1;
    }
    if (empty($pwd)) {
        $errpwd = "You must enter a password.";
        $errormsg = 1;
    }
    if($errormsg == 1) {
        echo "<p class='error'>There are errors. Please make corrections and resubmit.</p>";
    }
    else {
        try {
            $sql = "SELECT * FROM Users WHERE Username = :uname";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':uname', $uname);
            $stmt->execute();
            $row = $stmt->fetch();
            if (password_verify($pwd, $row['Password'])) {
                echo "<p class='success'>Login successful!</p>";
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['uname'] = $row['Username'];
                header("Location: confirm.php?state=2");
            }
            else {
                echo "<p class='error'>The username and password you entered is not correct. Please try again.</p>";
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
if($showform == 1) {
    ?>

    <section id ="feedback">
    <div class="feedback container">
    <div class="feedback-top">
        <h1>Please <span>login</span> here</h1>
        <form name="login" id="login" method="POST" action="login.php">
                <table>
                    <tr><th><label for="uname">Username:</label><span class="error">*</span></th>
                        <td><input name="uname" id="uname" type="text" placeholder="Username"
                                   value="<?php if(isset($uname)) {
                                       echo $uname;
                                   }?>" /><span class="error"><?php if(isset($erruname)){echo $erruname;}?></span></td>
                    </tr>
                    <tr><th><label for="pwd">Password:</label><span class="error">*</span></th>
                        <td><input name="pwd" id="pwd" type="password" placeholder="Password"/>
                            <span class="error"><?php if(isset($errpwd)){echo $errpwd;}?></span></td>
                    </tr>
                    <tr><th><label for="submit"></label></th>
                        <div>
                            <td><input class="button" type="submit" name="submit" id="submit" value="submit"/></td>
                        </div>
                    </tr>
                </table>
            </form>
        <br>
        <br>
            <p>Not a member? <a href="signup.php">Click here</a> to leave feedback!</p>
        </div>
    </div>
    </section>
    <p>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p>

    <?php
}
require_once "include/footer.inc.php";