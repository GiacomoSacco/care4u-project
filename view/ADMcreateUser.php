<html>
    <head>
        <title>CARE4U</title>

        <link rel="stylesheet" href="view/css/style.css">
    </head>

    <body>
    <!-- User info -->
    <?php include "view/modules/userInfo.php"; ?>

    <a href="?page=linkpatdoc">Link Patients and Doctors</a>
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

        <!-- users -->
        <div id="users">
            <?php
                //printing users
                foreach($users as $user){
                    echo "<div>";
                    echo "<p>".$user->name."</p>";
                    echo "<p>".$user->surname."</p>";
                    echo "<p>".$user->email."</p>";
                    echo "<p>".$roles[$user->codrol-1]->role."</p>";
                    echo "<form></form>";
                    echo "</div>";
                }
            ?>
        </div>

        
        <!-- logout -->
        <a href="?page=logout">LOGOUT</a>
    </body>
</html>