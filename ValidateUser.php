<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body id="login-page">
    <!-- <header>
        <h1 id="nav-title"><a id="logo" href="home.html">Map Album</a></h1>
        <nav>
            <ul>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <a id="login" href="login.html">Log-In</a>
    </header> -->

    <style>
        p {
            text-align: center;
            margin-bottom: 25px;
        }
    </style>

    <div id="login-tab" class="">
        <h1 class="form-title">User Login</h1>
        <?php
        if (empty($_POST['email']) || empty($_POST['password']))
            exit("<p>You must enter in all fields! Click your browser's Back button to return to previous page</p>");

        require_once("config.php");

        $TableName = "user_info";
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $sql = "SELECT * FROM $TableName
            WHERE email = '$Email'
            AND password = '$Password'";

        $result = $pdo->query($sql);

        if (!$row = $result->fetch())
            exit("<p>Please enter a valid email address and password for login. If you do not have an account please create one. Click your browser's Back button to return to the previous page</p>");
        else
            $UserID = $row['userID'];
        ?>
        <p>Login Successful for UserID: <strong>
                <?php echo $UserID ?>
            </strong></p>
    </div>
</body>

</html>