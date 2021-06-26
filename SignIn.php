<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="SignIn.js"></script>
    <script type="text/javascript" src="Footprint.js"></script>
    <script type="text/javascript" src="SearchService.js"></script>
</head>
<body>
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
            echo "<a class=\"nav_bar_items\" href=\"SignIn.php\">Sign In</a>";
            echo "<a class=\"nav_bar_items\" href=\"SignUp.php\">Sign Up</a>";
        ?>
    </div>
    <!--sign in-->
    <div class="sign_in">
        <form id="sign_in">
            <label for="username"></label>
            <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Username"
            />
            <br/>
            <label for="password"></label>
            <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
            />
            <br/>
            <input
                    type="button"
                    name="sign_in"
                    id="sign_in_button"
                    onclick="signInCheck()"
                    value="Sign in here"
            />
            <br/>
            <a id="sign_up_entrance" href="SignUp.php">Sign Up</a>
        </form>
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
