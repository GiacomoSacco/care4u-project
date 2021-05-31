<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/modules/head.php";?>
    </head>

    <body>
        <div id="cont">
            <div id="logo">
            <a href="https://github.com/GiacomoSacco/care4u-maturity" target="_blank"><img src="public/logo_transparent.png" alt="LOGO"></a>
                
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
                <?php include "view/modules/foot.php";?>
            </div>
        </div>        
    </body>
</html>