<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Map Album</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body id="about-page">
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
    <div id="about-tab" class="">
        <h1 class="form-title">About</h1>
        <p id="description">With a general camera roll, it can be time consuming searching through to find a single
            photo. Our web site
            provides users with a site to organize, save, and share photos they have taken while traveling the
            United States. It also provides users with an interactive map that can be used to mark states they
            have visited as well as save photos from those trips.
        </p>
    </div>
</body>

</html>