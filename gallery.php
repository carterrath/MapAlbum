<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>


<body id="gallery-page">
    <?php
    if (isset($_GET['userID'])) {
        $UserID = $_GET['userID'];
    } else {
        $UserID = 0;
    }


    require_once("config.php");

    $AlbumTable = "photo_albums";
    $PhotosTable = "photos";
    $UserTable = "user_info";

    $sql = "SELECT * FROM $AlbumTable WHERE userID = '$UserID'";

    $result = $pdo->query($sql);

    $i = 0;
    // retrieve albumID based on userID
    while ($row = $result->fetch()) {
        $AlbumID[] = $row["albumID"];
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
        <a id="login" href="login.php">Log-In</a>
    </header>

    <?php
    $sql = "SELECT $PhotosTable.source FROM $PhotosTable WHERE $PhotosTable.albumID = ANY(SELECT albumID from $AlbumTable WHERE $UserID = $AlbumTable.userID)";
    $result = $pdo->query($sql);

    $j = 0;
    while ($row = $result->fetch()) {
        $PhotoSource[] = $row['source'];
        echo ("<img class='photo' src=$PhotoSource[$j] alt=''>");
        $j++;
    }

    unset($PhotoSource);
    ?>
</body>

</html>