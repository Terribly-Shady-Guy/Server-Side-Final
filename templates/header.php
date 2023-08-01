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
<script src="js/login.js" defer></script>