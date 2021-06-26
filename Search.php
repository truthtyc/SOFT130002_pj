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
    if ($search == "")
        $sql = "select * from artworks";
    else
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
        $sql = $sql .
            " order by price desc";
        echo $sql;
        $result = $conn->query($sql);
    } else if ($sort == 'sortByView') {
        $sql = $sql .
            " order by view desc";
        echo $sql;
        $result = $conn->query($sql);
    }

    if ($result)
        $totalCount = $result->num_rows;
    else
        $totalCount = 0;

    $pageSize = 5;
    $totalPage = (int)(($totalCount % $pageSize == 0) ? ($totalCount / $pageSize) : ($totalCount / $pageSize + 1));

    if (!isset($_GET['page']))
        $currentPage = 1;
    else
        $currentPage = $_GET['page'];

    $mark = ($currentPage - 1) * $pageSize;
    $firstPage = 1;
    $lastPage = $totalPage;
    $prePage = ($currentPage > 1) ? $currentPage - 1 : 1;
    $nextPage = ($totalPage - $currentPage > 0) ? $currentPage + 1 : $totalPage;

    $pageSql = $sql . ' limit ' . $mark . ' , ' . $pageSize;
    echo $pageSql;
    $result = $conn->query($pageSql)

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
        <?php
        session_start();
        if (isset($_SESSION['u'])) {
            $u = $_SESSION['u'];
            echo "<a class=\"nav_bar_items\" href=\"Collections.php?u=$u\">My Collection</a>";
            echo "<a class=\"nav_bar_items\" href=\"SignOut.php?u=$u\">Sign Out</a>";
        } else {
            echo "<a class=\"nav_bar_items\" href=\"SignIn.php\">Sign In</a>";
            echo "<a class=\"nav_bar_items\" href=\"SignUp.php\">Sign Up</a>";
        }
        ?>
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
                for ($i = 0; $i < $pageSize; $i++) {
                    $row = $result->fetch_assoc();
                    if (!$row) break;
                    echo "<div class='search_items'>";
                    echo "<div class='search_items_img'>";
                    ?>
                    <a href="<?php echo 'Display.php?value=' . $row['artworkID'] ?>"><img src='resources/img/<?php echo $row['imageFileName'] ?>' alt=''/></a>
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
                    <?php
                    echo "<li><a href='Search.php?search=$search&sort=$sort&page=1'>&laquo;</a></li>";
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<li><a href='Search.php?search=$search&sort=$sort&page=$i'>$i</a></li>";
                    }
                    echo "<li><a href='Search.php?search=$search&sort=$sort&page=$totalPage'>&raquo;</a></li>";
                    ?>
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
    <!--    --><?php
    //    mysqli_free_result($result);
    //    $conn->close();
    //    ?>
    <!--footer-->
    <div class="footer">
        <p class="footer_txt">
            Maintained by Yuchen Tong. All rights reserved.
        </p>
    </div>
</div>
</body>
</html>
