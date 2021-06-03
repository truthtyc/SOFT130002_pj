<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="Footprint.js"></script>
    <script type="text/javascript" src="SearchService.js"></script>
    <?php
    require "DatabaseConfig.php";
    $conn = connectDatabase();
    $search = $_GET['search'];
    $sort = $_GET['sort'];
    $sql = "select * from artworks where artist like " . "'%" . $search . "%'" .
        " or title like " . "'%" . $search . "%'" .
        " or description like " . "'%" . $search . "%'" .
        " or artist like '" . $search . "%'" .
        " or title like '" . $search . "%'" .
        " or description like '" . $search . "%'" .
        " or artist like '" . "%" . $search .
        "' or title like '" . "%" . $search .
        "' or description like '" . "%" . $search . "'";
    $result = null;
    if ($sort == '') {
        $result = $conn->query($sql);
    } else if ($sort == 'sortByPrice') {
        $newSql = $sql .
            " order by price desc";
        echo $newSql;
        $result = $conn->query($newSql);
    } else if ($sort == 'sortByView') {
        $newSql = $sql .
            " order by view desc";
        echo $newSql;
        $result = $conn->query($newSql);
    }
    ?>
</head>
<body>
<div class="container">
    <!--        navigation bar-->
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
    <div id="search_container">
        <div id="left_search">
            <!--search bar-->
            <div id="main_search_bar_container">
                <label for="main_search_bar"></label>
                <input id="main_search_bar" name="search" placeholder="Search......" autocomplete="off"
                       type="text"/>
                <input class="button_search" id="go_search" name="go" type="button" onclick="searchService()"
                       value="GO"/>
            </div>
            <!--search items-->
            <div id="search_item_container">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    $row = $result->fetch_assoc();
                    if (!$row) break;
                    echo "<div class='search_items'>";
                    echo "<div class='search_items_img'>";
                    ?>
                    <a href="<?php echo 'Display.php?value=' . $row['artworkID'] ?>"><img
                                src='resources/img/<?php echo $row['imageFileName'] ?>' alt=''/></a>
                    <?php
                    echo "</div>";
                    echo "<div class='search_items_txt'>";
                    echo "<p> Name: {$row['title']}</p>";
                    echo "<p> Artist: {$row['artist']}</p>";
                    echo "<p> Price: {$row['price']}</p>";
                    echo "<p> View: {$row['view']}</p>";
                    echo "</div>";
                    echo "</div>";
                }
                $conn->close();
                ?>
            </div>
            <!--paging-->
            <div class="paging_container">
                <ul class="paging node">
                    <li><a href="#" class="prev">&laquo;</a></li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#" class="next">&raquo;</a></li>
                </ul>
                <br/>
            </div>
        </div>
        <div id="right_search">
            <div id="sorting_menu">
                <form id="sort">
                    <label for="find_by_name"></label>
                    <input type="text" name="find_by_name" id="find_by_name" placeholder="Find by Name..."/>
                    <br/><br/>
                    <label for="find_by_artist"></label>
                    <input type="text" name="find_by_artist" id="find_by_artist" placeholder="Find by Artist..."/>
                    <br/><br/>
                    <label for="find_by_style"></label>
                    <input type="text" name="find_by_style" id="find_by_style" placeholder="Find by Style..."/>
                    <br/><br/>
                    <input type="button" name="find" id="find" value="FIND"/>
                    <br/><br/>
                </form>
                <div class="dropdown_sorting">
                    <button class="dropdown_button">SORT</button>
                    <div class="dropdown-content">
                        <a href=<?php echo 'Search.php?search=' . $search . '&sort=sortByPrice' ?>>Sort by Price</a>
                        <a href=<?php echo 'Search.php?search=' . $search . '&sort=sortByView' ?>>Sort by View</a>
                    </div>
                </div>
            </div>
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
