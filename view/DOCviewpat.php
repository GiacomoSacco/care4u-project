<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/modules/head.php";?>
    </head>

    <body>    
        <!-- User info -->        
        <div id="cont">
            <div id="logo">
                <a href="https://github.com/GiacomoSacco/care4u-maturity" target="_blank"><img src="public/logo_transparent.png" alt="LOGO"></a>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=DOCaddpat">Add a patient</a>
                </div>
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                    <a href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="commands">
                <button onclick="showCommands()" class="showMenu">View patients <i class="fa fa-angle-down" aria-hidden="true" id="menuIcon"></i></button>
                <div class="inputForm">
                    <button onclick="showPatients()" id="showpat" disabled="true">Show patients</button>
                </div>
            </div>
            <div id="disclaimer">
                <p>Click on a patient to see his measurements</p>
            </div>
            <div id="body">
                <!-- view measurements -->
                <?php 
                //printing users
                    foreach($patients_mea as $patient){
                        echo "<button class='card' onclick='showMyMeasurements({$patient->iduse})' value='patient'>";
                        echo "<img src='{$patient->role->icon}' alt='icon'>";
                        echo "<p>{$patient->name} {$patient->surname}</p>";
                        echo "<p>".$patient->email."</p>";
                        echo "<p>Measurements number: ".count($patient->measurements)."</p>";
                        echo "</button>";
                    }
                    foreach($patients_mea as $patient){
                        foreach($patient->measurements as $measurement){
                            echo "<div class='card' style='display: none' value='{$patient->iduse}'>
                                    <p>Date: {$measurement->time}</p>
                                    <div class='MEAvalues'>
                                    Ph {$measurement->ph}<br>
                                    <p style='background-color:{$measurement->ph}' class='colorMEA'>&nbsp</p>
                                    Chlorides {$measurement->chlorides}<br>
                                    <p style='background-color:{$measurement->chlorides}' class='colorMEA'>&nbsp</p>
                                    Lactic acid {$measurement->lactic_acid}<br>
                                    <p style='background-color:{$measurement->lactic_acid}' class='colorMEA'>&nbsp</p>
                                    Glucose {$measurement->glucose}<br>
                                    <p style='background-color:{$measurement->glucose}' class='colorMEA'>&nbsp</p>
                                    </div>             
                                </div>" ;
                        }
                    }

                ?>
            </div>
            <div id="foot">
                <?php include "view/modules/foot.php";?>
            </div>
        </div>
    </body>
</html>