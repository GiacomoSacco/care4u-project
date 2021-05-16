<html>
    <head>
        <title>CARE4U</title>

        <?php include "view/css/style.php";?>
    </head>

    <body>
        <div id="cont">
            <div id="logo">
                <h1>CARE4U</h1>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=linkpatdoc">Link Patients and Doctors</a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                </div>
            </div>
            <div id="commands">
                <h1>Create User</h1>
                <!-- adding users -->
                <form action="" method="POST">
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" required>
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <label for="role">Role:</label>
                    <select name="codrol" id="role">
                        <!-- <option disabled selected value> -- select an option -- </option> -->
                        <?php
                        foreach($roles as $role){
                            echo "<option value='".$role->idrol."'>".$role->role."</option>";
                        }
                        ?>
                    </select>
                    <input type="submit">
                </form>
            </div>
            <div id="body">
                <!-- users -->
                <?php
                    //printing users
                    foreach($users as $user){
                        echo "<div class='card'>";
                        echo "<p>".$user->name."</p>";
                        echo "<p>".$user->surname."</p>";
                        echo "<p>".$user->email."</p>";
                        echo "<p>".$roles[$user->codrol-1]->role."</p>";
                        echo "<form></form>";
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