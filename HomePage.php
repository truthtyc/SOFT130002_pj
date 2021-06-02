<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Art Store</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="Footprint.js"></script>
</head>
<body>
<div class="container">
    <!--navigation bar-->
    <div class="nav_bar">
        <a id="logo" href="HomePage.php">Art Store</a>
        <a id="slogan" href="HomePage.php">Where you find GENIUS and EXTRAORDINARY</a>
        <form action="Search.php" method="get">
            <input class="search_bar" id="search" name="search" placeholder="Search......" type="text"
                   autocomplete="off"/>
            <input class="button_search" id="go" type="submit" value="GO"/>
        </form>
        <a class="nav_bar_items" href="HomePage.php">Home</a>
        <a class="nav_bar_items" href="SignIn.php">Sign In</a>
        <a class="nav_bar_items" href="SignUp.php">Sign Up</a>
    </div>
    <!--Leading pictures-->
    <div id="lead_picture_container">
        <div id="lead_pictures">
            <?php
            require "DatabaseConfig.php";
            $conn = connectDatabase();
            $sql = "select * from artworks order by view desc;";
            $result = $conn->query($sql);

            for ($i = 1; $i <= 3; $i++) {
                $row = $result->fetch_assoc();
                ?>
                <a href="<?php echo 'Display.php?value=' . $row['artworkID'] ?>"><img
                            src='resources/img/<?php echo $row['imageFileName'] ?>' alt=''/></a>
                <?php
            }
            ?>
        </div>
    </div>
    <!--most viewed pictures-->
    <div class="most_viewed">
        <div class="header">
            <hr/>
            <p>Most Viewed</p>
        </div>
        <?php
        $sql = "select * from artworks order by timeReleased desc;";
        $result = $conn->query($sql);

        for ($i = 1; $i <= 3; $i++) {
            $row = $result->fetch_assoc();
            echo "<div class='column'>";
            ?>
            <a href="<?php echo 'Display.php?value=' . $row['artworkID'] ?>"><img src='resources/img/<?php echo $row['imageFileName'] ?>' alt=''/></a>
            <?php
            echo "<p class='name'>{$row['title']}</p>";
            echo "<p class='author'>{$row['artist']}</p>";
            echo "<p class='description'>{$row['description']}</p>";
            ?>
            <a href="<?php echo 'Display.php?value=' . $row['artworkID'] ?>" class='see_details'>SEE DETAILS</a>
            <?php
            echo "</div>";
        }
        $conn->close();
        ?>
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
