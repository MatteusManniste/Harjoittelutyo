<section id="login_form"></section>
    <div class="login">
        <div id="register-instead-positioning">
            <form class="login-form" action="<?= URLROOT . "/login" ?>" method="post">
                <h2 id="login-title">Login to your account</h2>
                <div class="login-data">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Your username...">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Your password...">
                </div>
                <a href="#"><button id="login-btn" type="submit"><i class="fa-regular fa-lock fa-icon-l"></i>Login</button></a>
            </form>
            <div id="register-instead">
                <p id="register-instead-text">Don't have an account?</p><a href="#"><button id="register-instead-btn"><small>Register now</small></button></a>
            </div>
        </div>
    </div>
</section>