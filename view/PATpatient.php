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
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                    <a href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="commands">
                <!-- adding measurement -->
                <button onclick="showCommands()" class="showMenu">Add measurement <i class="fa fa-angle-down" aria-hidden="true" id="menuIcon"></i></button>
                <form action="" method="POST" class="inputForm">
                    <input type="hidden" name="iduse" value="<?php echo $_SESSION["user"]->iduse; ?>">
                    <div class="colorpick">
                        <label for="ph">Ph</label>
                        <input type="color" id="ph" name="ph" value="#FF0000">
                    </div>
                    <div class="colorpick">
                        <label for="chlorides">Chlorides</label>
                        <input type="color" id="chlorides" name="chlorides" value="#00FF00">
                    </div>
                    <div class="colorpick">
                        <label for="lactic_acid">Lactic acid</label>
                        <input type="color" id="lactic_acid" name="lactic_acid" value="#0000FF">
                    </div>
                    <div class="colorpick">
                        <label for="glucose">Glucose</label>
                        <input type="color" id="glucose" name="glucose" value="#F0F000">
                    </div>   
                    <input type="submit"><br>
                </form>
            </div>
            <div id="disclaimer">
                <span>Your measurements</span>
            </div>
            <div id="body">
                <!-- TODO: view measurements -->
                <?php 
                    
                    foreach($measurements as $measurement){
                        echo "<div class='card'>
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

                ?>
            </div>
            <div id="foot">
                    Sacco Giacomo AS 2020/21, Elaborato di maturità
            </div>
        </div> 
    </body>
</html>