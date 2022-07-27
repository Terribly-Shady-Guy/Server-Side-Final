<?php

$header = <<<_END
<header>
    <img id="Banner" src="images/ssb-ultimate-banner.jpg">
    <ul id="Navigation">
        <a href="index.php"><li>Home</li></a>
        <a href=product_list.php><li>Shop</li></a>
    </ul>
    <form id="LoginForm" method="post" action="src/login_management/login.php">
        <div class="LoginCol">
            <p><a href="create_account.php">Sign Up</a></p>
            <button type="submit" name="Login" id="login">Login</button>
        </div>
        <div class="LoginCol">
            <input type="text" name="Username" id="Username" placeholder="Enter Username" autocomplete="off" required>
            <input type="password" name="Password" id="Password" placeholder="Enter Password" required>
        </div>  
    </form>
    <div id="verify_auth_result" hidden>
        <button type="button" id="logout">Logout</button>
        <a href="admin.php">to admin page</a>
        <p id="Welcome"></p>
    </div>
</header>
_END;

$footer = <<<_END
<footer>
    <ul id="ContactInfo">
        <li>Phone: (763) 487-7777</li>
        <li>Mailing Address: 1450 Main st. Minneapolis, MN 55406</li>
    </ul>
    <p>Made by gamers for gamers!</p>
</footer>
_END;

$loginScript = <<<_END
<script src="js/login.js"></script>
_END;

?>