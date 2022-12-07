<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
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
        <h1 class="form-title">User Registered</h1>
        <?php
        if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm']))
            exit("<p>You must enter in all fields! Click your browser's Back button to return to previous page</p>");
        elseif ($_POST['password'] != $_POST['password_confirm'])
            exit("<p>Password's do not match try again!</p>");

        require_once("config.php");

        $TableName = "user_info";
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $sql = "SELECT * FROM $TableName";
        $result = $pdo->query($sql);

        while ($row = $result->fetch()) {
            if ($row['email'] == $Email)
                exit("<p>The email address you entered is already registered! Click your browser's Back button to return to the previous page!</p>");
        }

        $sql = "INSERT INTO $TableName(email, password) VALUES ('$Email', '$Password')";
        $pdo->exec($sql);

        $sql = "SELECT * FROM $TableName WHERE email = '$Email'";
        $result = $pdo->query($sql);

        if ($row = $result->fetch())
            $UserID = $row['userID'];

        $pdo = null;
        ?>

        <p>Your new UserID is <strong>
                <?php echo $UserID ?>
            </strong></p>

        <p><a id="home-link" href="home.php?userID=<?= $UserID ?>">Map Album Home Page</a></p>

    </div>


</body>

</html>