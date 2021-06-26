<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="NewStyle.css"/>
    <script type="text/javascript" src="SignUp.js"></script>
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
    <!--sign up-->
    <div class="sign_up">
        <form id="sign_up">
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
            <label for="confirm_password"></label>
            <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    placeholder="Confirm Your Password"
            />
            <br/>
            <label for="email"></label>
            <input
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Your E-mail"
            />
            <br/>
            <label for="tel"></label>
            <input
                    type="text"
                    name="tel"
                    id="tel"
                    placeholder="Your telephone number"
            />
            <br/>
            <label for="address"></label>
            <input
                    type="text"
                    name="address"
                    id="address"
                    placeholder="Your address"
            />
            <br/>
            <input
                    type="button"
                    name="sign_up"
                    id="sign_up_button"
                    onclick="signUpCheck()"
                    value="Sign Up here"
            />
            <br/>
            <a id="sign_in_entrance" href="SignIn.php">Sign In</a>
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
