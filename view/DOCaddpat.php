<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/modules/head.php";?>
    </head>

    <body>    
        <!-- User info -->        
        <div id="cont">
            <div id="logo">
                <!-- <h1>CARE4U</h1> -->
                <a href="https://github.com/GiacomoSacco/care4u-maturity" target="_blank"><img src="public/logo_transparent.png" alt="LOGO"></a>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=DOCviewpat">View patients</a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                    <a href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="commands">
                <button onclick="showCommands()" class="showMenu">Add patient <i class="fa fa-angle-down" aria-hidden="true" id="menuIcon"></i></button>
                <div class="inputForm">
                    <!-- <input type="text" name="search" placeholder="Search.."> -->
                </div>
            </div>
            <div id="disclaimer">
                <p>Click on a patient to add him</p>
            </div>
            <div id="body">
                <!-- view measurements -->
                <?php 
                //printing users
                    foreach($unlinked_patients as $patient){
                        echo "<button class='card' onclick='linkThisPat({$patient->iduse})' value='{}'>";
                        echo "<img src='{$patient->role->icon}' alt='icon'>";
                        echo "<p>{$patient->name} {$patient->surname}</p>";
                        echo "<p>$patient->email</p>";
                        echo "</button>";
                    }
                ?>
                <form action="" method="POST" id="linkPatForm" style="display: none;">
                    <input type="hidden" name="patient" value="" id="linkPatInput">
                </form>
            </div>
            <div id="foot">
                <?php include "view/modules/foot.php";?>
            </div>
        </div>
    </body>
</html>