<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Display</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="Footprint.js"></script>
    <script type="text/javascript" src="SearchService.js"></script>
    <?php
    require "DatabaseConfig.php";
    $conn = connectDatabase();
    $artworkID = $_GET["value"];
    $oldSql = "select * from artworks where artworkID =" . $artworkID;
    $oldRow = $conn->query($oldSql)->fetch_assoc();
    $view = $oldRow['view'];
    $view++;
    $updateSql = "update artworks set view=" . $view . " where artworkID=" . $artworkID;
    $conn->query($updateSql);
    $sql = "select * from artworks where artworkID =" . $artworkID;
    $row = $conn->query($sql)->fetch_assoc();
    ?>
</head>
<body>
<script>
    function addIntoWishlist(username, id) {
        console.log(username);
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "addIntoWishlist.php?u=" + username + "&q=" + id);
        xmlhttp.send();
    }
</script>
<div class="container">
    <!--navigation bar-->
    <div class="nav_bar">
        <a id="logo" href="HomePage.php">Art Store</a>
        <a id="slogan" href="HomePage.php">Where you find GENIUS and EXTRAORDINARY</a>
        <label for="search"></label>
        <input class="search_bar" id="search" name="search" placeholder="Search......" type="text"
               autocomplete="off"/>
        <input class="button_search" id="go" type="button" value="GO" onclick="searchService()"/>
        <a class="nav_bar_items" href="HomePage.php">Home</a>
        <?php
        session_start();
        if (isset($_SESSION['u'])) {
            $u = $_SESSION['u'];
            echo "<a class=\"nav_bar_items\" href=\"Collections.php?u=$u\">My Collection $u</a>";
            echo "<a class=\"nav_bar_items\" href=\"SignOut.php?u=$u\">Sign Out $u</a>";
        } else {
            echo "<a class=\"nav_bar_items\" href=\"SignIn.php\">Sign In</a>";
            echo "<a class=\"nav_bar_items\" href=\"SignUp.php\">Sign Up</a>";
        }
        ?>
    </div>
    <!--display-->
    <div class="display_container">
        <div class="display_header">
            <p class="name"><?php echo $row['title'] ?></p>
            <a href="Search.php" class="display_author"><p><?php echo $row['artist'] ?></p></a>
        </div>
        <div class="left_column">
            <img id="display_img" src="resources/img/<?php echo $row['imageFileName'] ?>"
                 style="height: 100%; width: 100%;" alt=""/>
        </div>
        <div class="right_column">

            <p>Time: <?php echo $row['timeReleased'] ?></p>
            <p>Size: <?php echo $row['height'] . "*" . $row['height'] ?></p>
            <p>Age: <?php echo $row['yearOfWork'] ?></p>
            <p>Style: <?php echo $row['genre'] ?></p>
            <p class="description">
                <?php echo $row['description'] ?>
            </p>
            <p>View: <?php echo $row['view'] ?></p>
            <p>Price: <?php echo $row['price'] ?></p>
            <?php
            if ($u) {
                ?>
                <input
                        class="button_add_into_collections"
                        id="add_into_collections"
                        name="add_into_collections"
                        type="button"
                        onclick="addIntoWishlist('<?php echo $u ?>', <?php echo $row['artworkID'] ?>)"
                        value="ADD INTO WISHLIST"
                />
                <?php
            }
            $conn->close();
            ?>
        </div>
    </div>
    <!--footer-->
    <div class="footer">
        <p class="footer_txt">
            Maintained by Yuchen Tong. All rights reserved.
        </p>
    </div>
</div>
</body>
</html>
