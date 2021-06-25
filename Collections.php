<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Collections</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="Collections.js"></script>
    <script type="text/javascript" src="Footprint.js"></script>
    <script type="text/javascript" src="SearchService.js"></script>
</head>
<body>
<div class="container">
    <!--navigation bar-->
    <!--navigation bar-->
    <div class="nav_bar">
        <a id="logo" href="HomePage.php">Art Store</a>
        <a id="slogan" href="HomePage.php">Where you find GENIUS and EXTRAORDINARY</a>
        <label for="search"></label>
        <input class="search_bar" id="search" name="search" placeholder="Search......" type="text"
               autocomplete="off"/>
        <input class="button_search" id="go" type="button" value="GO" onclick="searchService()"/>
        <a class="nav_bar_items" href="HomePage.php">Home</a>
        <a class="nav_bar_items" href="SignIn.php">Sign In</a>
        <a class="nav_bar_items" href="SignUp.php">Sign Up</a>
    </div>
    <div id="collection_container">
        <!--user info column-->
        <div id="user_info_col">
            <h3 class="info">User Info</h3>
            <div class="user_info">
                <img src="./resources/img/huaji.jpg" id="profile" alt=""/>
                <?php
                require("DatabaseConfig.php");
                $conn = connectDatabase();
                $sql = "select * from users";
                $row = $conn->query($sql)->fetch_assoc();
                echo "<h4 class='info'>Name: {$row['name']}</h4>";
                echo "<h4 class='info'>E-mail: {$row['email']}</h4>";
                echo "<h4 class='info'>Tel: {$row['tel']}</h4>";
                echo "<h4 class='info'>Address: {$row['address']}</h4>";
                ?>
            </div>
        </div>
        <div id="collection_col">
            <?php
            $sql = "select * from wishlist where userID = 1";
            $result = $conn->query($sql);
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $artSql = "select * from artworks where artworkID = " . $row['artworkID'];
                $artRow = $conn->query($artSql)->fetch_assoc();
                ?>
                <div id="collection_item_<?php echo $i ?>">
                    <div class='collection_img'>
                        <a><img src='resources/img/<?php echo $artRow['imageFileName'] ?>' alt=''/></a>
                    </div>
                    <div class='collection_descriptions'>
                        <a href="<?php echo 'Display.php?value=' . $artRow['artworkID'] ?>"
                           class='collection_descriptions_title'>Name:
                            <?php echo $artRow['title'] ?></a>
                        <p class='collection_descriptions_date'>Time Released: <?php echo $artRow['timeReleased'] ?></p>
                    </div>
                    <div class='collection_del'>
                        <input type='button' id="delete_button" name='delete' class='delete'
                               onclick='deleteElem(this.parentNode.parentNode, <?php echo $artRow['artworkID'] ?>)'
                               value='DELETE'/>
                    </div>
                </div>
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
