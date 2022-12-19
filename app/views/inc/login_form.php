<section id="login_form">
    <div class="login">
        <div id="register-instead-positioning">
            <form class="login-form" action="<?= URLROOT . "/users/login" ?>" method="post">
                <h2 id="login-title">Login to your account</h2>
                <div class="login-data">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email address...">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password...">
                </div>
                <a href="#"><button id="login-btn" type="submit"><i class="fa-regular fa-lock fa-icon-l"></i>Login</button></a>
            </form>
            <div id="register-instead">
                <p id="register-instead-text">Don't have an account?</p><a href="<?= URLROOT . "/users/register" ?>"><button id="register-instead-btn"><small>Register now</small></button></a>
            </div>
        </div>
    </div>
</section>