<html>
    <head>
        <title>CARE4U</title>
        <?php include "view/modules/style.php";?>
        <link rel="stylesheet" href="view/css/logreg.css">
        <script src="view/js/global.js"></script>
    </head>

    <body>
        <div id="logincont">
            <div id="infos">
                <img src="public/logo_transparent.png" alt="logo">
            </div>
            <div id="form">
                <button onclick="showRegLog('login')" id="loginBTN">Login</button>
                <button onclick="showRegLog('register')" id="registerBTN">New patient</button>
                <form action="" method="POST" id="login">
                    <h3>Login</h3>
                    <input type="hidden" name="id" value="login">
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password"><br>
                    </div>
                    <input type="submit" value="Login">
                </form>

                <form action="" method="POST" id="register" >
                    <h3>Register</h3>
                    <input type="hidden" name="id" value="register">
                    <div class="input">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="input">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" placeholder="Enter surname" required>
                    </div>
                    <div class="input">
                        <label for="fiscalCode">Fiscal code</label>
                        <input type="text" name="fiscalCode" placeholder="Enter fiscal code" required>
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required><br>
                    </div>
                    <input type="submit" value="Register">
                </form>
            </div>

        </div>
    </body>
</html>