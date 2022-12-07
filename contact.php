<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>


<body id="contact-page">
    <?php
    require_once("config.php");

    if (isset($_GET['userID']) && ($_GET['userID'] != 0)) {
        $UserID = $_GET['userID'];

        $TableName = "user_info";

        $sql = "SELECT email FROM $TableName WHERE userID = '$UserID'";

        $result = $pdo->query($sql);

        // retrieve albumID based on userID
        if ($row = $result->fetch()) {
            $Name = $row["email"];
            $Name = strtok($Name, '@');
        }

    } else {
        $UserID = 0;
        $Name = "Log-In";
    }
    ?>
    <header>
        <h1 id="nav-title"><a id="logo" href="home.php?userID=<?= $UserID ?>">Map Album</a></h1>
        <nav>
            <ul>
                <li><a href="gallery.php?userID=<?= $UserID ?>">Gallery</a></li>
                <li><a href="about.php?userID=<?= $UserID ?>">About</a></li>
                <li><a href="contact.php?userID=<?= $UserID ?>">Contact</a></li>
            </ul>
        </nav>
        <a id="login" href="login.php">
            <?= $Name ?>
        </a>
    </header>

    <div id="contact-tab">
        <div class="contact-user">
            <h1 class="contact-title">Alex</h1>
            <div id="contact-info">
                <p>Phone Number: 555-753-6047</p>
                <p>Email: <a class="contact-link" href="mailto:spath003@csusm.edu">spath003@csusm.edu</a></p>
            </div>
        </div>
        <div class="contact-user">
            <h1 class="contact-title">Carter</h1>
            <div id="contact-info">
                <p>Phone Number: 555-346-1293</p>
                <p>Email: <a class="contact-link" href="mailto:rath014@csusm.edu">rath014@csusm.edu</a></p>
            </div>
        </div>
        <div class="contact-user">
            <h1 class="contact-title">Cody</h1>
            <div id="contact-info">
                <p>Phone Number: 555-521-4373</p>
                <p>Email: <a class="contact-link" href="mailto:mckin062@csusm.edu">mckin062@csusm.edu</a></p>
            </div>
        </div>
    </div>
</body>

</html>