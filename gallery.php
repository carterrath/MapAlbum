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

    $AlbumTable = "photo_albums";
    $PhotosTable = "photos";
    $UserTable = "user_info";

    $sql = "SELECT * FROM $AlbumTable WHERE userID = '$UserID'";

    $result = $pdo->query($sql);

    $i = 0;
    // retrieve albumID based on userID
    while ($row = $result->fetch()) {
        $AlbumID[] = $row["albumID"];
        $i++;
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

    <div id="photo-gallery"></div>

    <script type="text/javascript">
        for (let x = 0; x < <?= $i ?>; x++) {
            let newAlbumDiv = document.createElement('div');
            newAlbumDiv.setAttribute('id', x);
            newAlbumDiv.classList.add("album");
            let photoGallery = document.getElementById("photo-gallery");

            photoGallery.appendChild(newAlbumDiv);
        }
    </script>

    <?php
    if ($UserID != 0) {
        $sql = "SELECT $PhotosTable.source, $PhotosTable.albumID FROM $PhotosTable WHERE $PhotosTable.albumID = ANY(SELECT albumID from $AlbumTable WHERE $UserID = $AlbumTable.userID)";
        $result = $pdo->query($sql);

        $j = 0;
        //Gets a photo's album id to use to look into the AlbumId[] array to find which div it must be injected into
        $photoAlbumID = -1;


        while ($row = $result->fetch()) {
            $PhotoSource[] = $row['source'];
            $PhotoAlbumId[] = $row['albumID'];
            //echo ("<img class='photo' src=$PhotoSource[$j] alt=''>");
    
            //echo ("<p> Photo Album ID: $PhotoAlbumId[$j] <p>");
    
            for ($z = 0; $z < $i; $z++) {
                if ($AlbumID[$z] == $PhotoAlbumId[$j]) {
                    //echo ("<p> Album ID: $AlbumID[$z] <p>");
                    $y = $z;
                    break;
                }
            }

            //echo ("<p> $y <p>");
    ?>
    <script>
        var newImage = document.createElement("img");
        newImage.classList.add("photo");
        newImage.src = "<?= $PhotoSource[$j] ?>";
        var Idstring = "<?= $y ?>";
        var corrAlbum = document.getElementById(<?= $y ?>);
        corrAlbum.appendChild(newImage);
    </script>
    <?php

            $j++;

        }

        unset($PhotoSource);
    } else {
        echo ("<h3>Sign in to show your gallery of photos!</h3>");
    }
    ?>
</body>

</html>