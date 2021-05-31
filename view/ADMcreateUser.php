<html>
    <head>
        <title>CARE4U</title>

        <?php include "view/modules/style.php";?>
        <script src="view/js/global.js"></script>
    </head>

    <body>
        <div id="cont">
            <div id="logo">
                <img src="public/logo_transparent.png" alt="LOGO">
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=ADMlinkpatdoc">Link Pat Doc</a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                    <a href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="commands">
                <button onclick="showCommands()" class="showMenu">Create user <i class="fa fa-angle-down" aria-hidden="true" id="menuIcon"></i></button>
                <!-- adding users -->
                <form action="" method="POST" class="inputForm">
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
                    <label for="role">Role</label><br>
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
                        echo "<p>{$user->name} {$user->surname}</p>";
                        echo "<p>{$user->email}</p>";
                        echo "<p>{$user->role->role}</p>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div id="foot">
                <p>Sacco Giacomo AS 2020/21, Elaborato di maturità</p>
            </div>
        </div>        
    </body>
</html>