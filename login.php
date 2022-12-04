<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>


<body id="login-page">
    <?php
    if (isset($_GET['userID'])) {
        $UserID = $_GET['userID'];
    } else {
        $UserID = 0;
    }

    require_once("config.php");
    ?>

    <header>
        <h1 id="nav-title"><a id="logo" href="home.php">Map Album</a></h1>
        <nav>
            <ul>
                <li><a href="gallery.php?userID=<?= $UserID ?>">Gallery</a></li>
                <li><a href="about.php?userID=<?= $UserID ?>">About</a></li>
                <li><a href="contact.php?userID=<?= $UserID ?>">Contact</a></li>
            </ul>
        </nav>
        <a id="login" href="login.php">Log-In</a>
    </header>
    <div>

        <div id="login-tab" class="">
            <h1 class="form-title">Log-In</h1>
            <form action="ValidateUser.php" method="post" class="form" id="login">
                <div class="form-message form-message-error "></div>
                <div class="form-input-group">
                    <input type="email" class="form-input" name="email" autofocus placeholder="Email Address">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <input type="password" class="form-input" name="password" placeholder="Password">
                    <div class="form-input-error-message"></div>
                </div>
                <div id="submit-button">
                    <button class="form-button" type="submit">Continue</button>
                </div>
                <div id="login-links">
                    <p class="form-text">
                        <a href="#" class="form-link">Forgot your password?</a>
                    </p>
                    <p class="form-text">
                        <a href="#" class="form-link" id="linkCreateAccount">Dont have an account? Create account.</a>
                    </p>
                </div>
            </form>
        </div>

        <div id="create-tab" class="form-hidden">
            <h1 class="form-title">Create Account</h1>
            <form action="RegisterUser.php" method="post" class="form" id="createAccount">
                <div class="form-message form-message-error "></div>
                <div class="form-input-group">
                    <input type="email" class="form-input" name="email" autofocus placeholder="Email Address">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <input type="password" class="form-input" name="password" placeholder="Password">
                    <div class="form-input-error-message"></div>
                </div>
                <div class="form-input-group">
                    <input type="password" class="form-input" name="password_confirm" placeholder="Confirm Password">
                    <div class="form-input-error-message"></div>
                </div>
                <div id="submit-button">
                    <button class="form-button" type="submit">Continue</button>
                </div>
                <div id="login-links">
                    <p class="form-text">
                        <a href="#" class="form-link" id="linkLogin">Already have an account? Sign in.</a>
                    </p>
                </div>
            </form>
        </div>

    </div>
    <script src="login.js"></script>
</body>

</html>