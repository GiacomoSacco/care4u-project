<html>
    <head>
        <title>CARE4U</title>
        <?php include "view/css/style.php";?>
    </head>

    <body>    
        <!-- TODO: 
            - visualizza misurazioni del paziente
            - visualizza account paziente
            - logout paziente
            - inserisci nuova misurazione   
        -->
        <div id="cont">
            <div id="logo">
                <h1>CARE4U</h1>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=linkpatdoc"></a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                </div>
            </div>
            <div id="commands">
                <!-- adding measurement -->
                <h3>Add measurement</h3>
                <form action="" method="POST">
                    <input type="hidden" name="iduse" value="<?php echo $_SESSION["user"]->iduse; ?>">
                    <div class="colorpick">
                        <p>Ph</p>
                        <input type="color" id="ph" name="ph" value="#FF0000">
                    </div>
                    <div class="colorpick">
                        <p>Chlorides</p>
                        <input type="color" id="chlorides" name="chlorides" value="#00FF00">
                    </div>
                    <div class="colorpick">
                        <p>Lactic acid</p>
                        <input type="color" id="lactic_acid" name="lactic_acid" value="#0000FF">
                    </div>
                    <div class="colorpick">
                        <p>Glucose</p>
                        <input type="color" id="glucose" name="glucose" value="#F0F000">
                    </div>
                    <!-- <label for="ph">Ph: </label>
                    <input type="color" id="ph" name="ph" value="#000000"><br>
                    <label for="chlorides">Chlorides: </label>
                    <input type="color" id="chlorides" name="chlorides" value="#000000"><br>
                    <label for="lactic_acid">Lactic acid: </label>
                    <input type="color" id="lactic_acid" name="lactic_acid" value="#000000"><br>
                    <label for="glucose">Glucose: </label>
                    <input type="color" id="glucose" name="glucose" value="#000000"><br> -->
                    
                    <select name="iddoc" id="doctor">
                        <option selected="true" disabled="disabled" required>Select doctor</option>
                        <?php
                        foreach($linked_doctors as $doctor){
                            echo "<option value='".$doctor->iduse."'>".$doctor->name." {$doctor->surname}</option>";
                        }
                        ?>
                    </select><br>
                    <input type="submit"><br>
                </form>
            </div>  
            <div id="body">
                <!-- TODO: view measurements -->
                <?php 
                    foreach($measurements as $measurement){
                        echo "<div class='card'>
                                <p>Doctor: {$measurement->doctor->surname}</p>
                                <p>Date: {$measurement->time}</p>
                                <p class='MEAvalues'>
                                Ph: {$measurement->ph} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->ph};'></i> <br>
                                Chlorides: {$measurement->chlorides} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->chlorides};'></i> <br>
                                Lactic acid: {$measurement->lactic_acid} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->lactic_acid};'></i> <br>
                                Glucose: {$measurement->glucose} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->glucose};'></i> <br>
                                </p>              
                            </div>" ;
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