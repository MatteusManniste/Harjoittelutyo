<section id="login_form">
    <div class="login">
        <div id="register-instead-positioning">
            <form class="login-form" action="<?= URLROOT . "/users/register" ?>" method="post">
                <h2 id="login-title">Register an account</h2>
                <div class="login-data">
                    <label for="email">Username:</label>
                    <input type="text" name="email" placeholder="Username...">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email address...">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password...">
                    <label for="password">Confirm password:</label>
                    <input type="password" name="password" placeholder="Confirm password...">
                </div>
                <a href="#"><button id="login-btn" type="submit"><i class="fa-solid fa-user-plus fa-icon-l"></i>Register</button></a>
            </form>
            <div id="register-instead">
                <p id="register-instead-text">Already have an existing account?</p><a href="<?= URLROOT . "/users/login" ?>"><button id="register-instead-btn"><small>Login</small></button></a>
            </div>
        </div>
    </div>
</section>