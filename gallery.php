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

    <div id="photo-gallery"></div>
    <div class="album">
        <img class="photo" src="photos/y1.jpg" alt="">
        <img class="photo" src="photos/y2.jpg" alt="">
        <img class="photo" src="photos/y3.jpg" alt="">
        <img class="photo" src="photos/y4.jpg" alt="">
        <img class="photo" src="photos/e1.jpg" alt="">
        <img class="photo" src="photos/e2.jpg" alt="">
    </div>

    </div>
    </div>
</body>

</html>