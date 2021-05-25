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
                <div style="width:80%;">
                <button onclick="showRegLog('login')" id="loginBTN">Login</button>
                <button onclick="showRegLog('register')" id="registerBTN">New patient</button>
                <form action="" method="POST" id="login">
                    <h3>Login</h3>
                    <input type="hidden" name="id" value="login">
                    <div class="input">
                        <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i>  Email</label>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="input">
                        <label for="password"><i class="fa fa-lock" aria-hidden="true"></i>  Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required><br>
                    </div>
                    <input type="submit" value="Login">
                    <?php echo "<p style='color:#ff0033'>$errorLOG</p>";?>
                </form>

                <form action="" method="POST" id="register" >
                    <h3>Register</h3>
                    <input type="hidden" name="id" value="register">
                    <div class="input">
                        <label for="name"><i class="fa fa-user-o" aria-hidden="true"></i>  Name</label>
                        <input type="text" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="input">
                        <label for="surname"><i class="fa fa-user-o" aria-hidden="true"></i>  Surname</label>
                        <input type="text" name="surname" placeholder="Enter surname" required>
                    </div>
                    <div class="input">
                        <label for="fiscalCode"><i class="fa fa-address-card-o" aria-hidden="true"></i>  Fiscal code</label>
                        <input type="text" name="fiscalCode" placeholder="Enter fiscal code" required>
                    </div>
                    <div class="input">
                        <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i>  Email</label>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="input">
                        <label for="password"><i class="fa fa-lock" aria-hidden="true"></i>  Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required><br>
                    </div>
                    <input type="submit" value="Register">
                    <?php echo "<p style='color:#ff0033'>$errorREG</p>";?>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>