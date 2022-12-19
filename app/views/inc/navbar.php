<header>
    <nav class="navbar">
        <h1 id="logo-text"><a href="<?= URLROOT ?>">DiegoMerch</a></h1>
        <ul class="nav-links">
            <?php if (isLoggedIn()) : ?>
                <li><a href="#"><i class="fa-sharp fa-solid fa-cart-shopping fa-icon-l"></i>Cart</a></li>
                <li><p>Logged in as <?php $_SESSION["user_id"] ?></p></li>
                <li><a href="<?= URLROOT . "/users/logout" ?>"><i class="fa-sharp fa-solid fa-right-from-bracket fa-icon-l"></i>Logout</a></li>
            <?php else : ?>
                <li><a href="<?= URLROOT . "/users/register" ?>"><i class="fa-solid fa-user fa-icon-l"></i>Register</a></li>
                <li><a href="<?= URLROOT . "/users/login" ?>"><i class="fa-sharp fa-solid fa-right-to-bracket fa-icon-l"></i>Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>