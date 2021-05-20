<html>
    <head>
        <title>CARE4U</title>

        <?php include "view/modules/style.php";?>
        <script src="view/js/global.js"></script>
    </head>

    <body>
        <div id="cont">
            <div id="logo">
                <h1>CARE4U</h1>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=linkpatdoc">Link Pat Doc</a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                </div>
            </div>
            <div id="commands">
                <h3 onclick='showCommands()'>Create User</h3>
                <!-- adding users -->
                <form action="" method="POST" class="inputForm">
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" required>
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <label for="role">Role:</label><br>
                    <select name="codrol" id="role">
                        <!-- <option disabled selected value> -- select an option -- </option> -->
                        <?php
                        foreach($roles as $role){
                            echo "<option value='".$role->idrol."'>".$role->role."</option>";
                        }
                        ?>
                    </select><br>
                    <input type="submit" value='Create'>
                </form>
            </div>
            <div id="body">
                <!-- users -->
                <?php
                    //printing users
                    foreach($users as $user){
                        echo "<div class='card'>";
                        echo "<img src='{$user->role->icon}' alt='icon'>";
                        echo "<p>".$user->name."</p>";
                        echo "<p>".$user->surname."</p>";
                        echo "<p>".$user->email."</p>";
                        echo "<p>".$user->role->role."</p>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div id="foot">
                <!-- logout -->
                <a href="?page=logout">LOGOUT</a>
            </div>
        </div>        
    </body>
</html>