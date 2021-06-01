<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Collections</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="Collections.js"></script>
    <script type="text/javascript" src="Footprint.js"></script>
</head>
<body>
<div class="container">
    <!--navigation bar-->
    <div class="nav_bar">
        <a id="logo" href="HomePage.php">Art Store</a>
        <a id="slogan" href="HomePage.php"
        >Where you find GENIUS and EXTRAORDINARY</a
        >
        <label for="search"></label>
        <input
                class="search_bar"
                id="search"
                name="search"
                placeholder="Search......"
                autocomplete="off"
        />
        <a href="Search.php"
        ><input
                class="button_search"
                id="go"
                name="go"
                type="button"
                value="GO"
        /></a>
        <a class="nav_bar_items" href="HomePage.php">Home</a>
        <a class="nav_bar_items" href="SignIn.php">Sign In</a>
        <a class="nav_bar_items" href="SignUp.php">Sign Up</a>
    </div>
    <div id="collection_container">
        <!--user info column-->
        <div id="user_info_col">
            <h2>User Info</h2>
            <div class="user_info">
                <img src="huaji.jpg" id="profile" alt=""/>
                <h1>Name</h1>
                <p class="info">Username:</p>
                <p class="info">Email:</p>
            </div>
        </div>
        <!--collection column-->
        <div id="collection_col">
            <div id="collections1">
                <div class="collection_img">
                    <a><img src="resources/img/47.jpg" alt=""/></a>
                </div>
                <div class="collection_descriptions">
                    <p>Name:</p>
                    <p>Artist:</p>
                    <p>Description:</p>
                </div>
                <div class="collection_del">
                    <input
                            type="button"
                            name="delete"
                            class="delete"
                            onclick="deleteElem(this.parentNode.parentNode)"
                            value="DELETE"
                    />
                </div>
            </div>
            <div id="collections2">
                <div class="collection_img">
                    <a><img src="resources/img/222.jpg" alt=""/></a>
                </div>
                <div class="collection_descriptions">
                    <p>Name:</p>
                    <p>Artist:</p>
                    <p>Description:</p>
                </div>
                <div class="collection_del">
                    <input
                            type="button"
                            name="delete"
                            class="delete"
                            onclick="deleteElem(this.parentNode.parentNode)"
                            value="DELETE"
                    />
                </div>
            </div>
            <div id="collections3">
                <div class="collection_img">
                    <a><img src="resources/img/291.jpg" alt=""/></a>
                </div>
                <div class="collection_descriptions">
                    <p>Name:</p>
                    <p>Artist:</p>
                    <p>Description:</p>
                </div>
                <div class="collection_del">
                    <input
                            type="button"
                            name="delete"
                            class="delete"
                            onclick="deleteElem(this.parentNode.parentNode)"
                            value="DELETE"
                    />
                </div>
            </div>
            <div id="collections4">
                <div class="collection_img">
                    <a><img src="resources/img/294.jpg" alt=""/></a>
                </div>
                <div class="collection_descriptions">
                    <p>Name:</p>
                    <p>Artist:</p>
                    <p>Description:</p>
                </div>
                <div class="collection_del">
                    <input
                            type="button"
                            name="delete"
                            class="delete"
                            onclick="deleteElem(this.parentNode.parentNode)"
                            value="DELETE"
                    />
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
