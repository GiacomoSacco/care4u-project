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
        <!-- User info -->
        <?php include "view/modules/userInfo.php"; ?>
        
        <!-- adding measurement -->
        <form action="" method="POST">
            <input type="hidden" name="iduse" value="<?php echo $_SESSION["user"]->iduse; ?>">
            <label for="ph">Ph: </label>
            <input type="color" id="ph" name="ph" value="#000000">
            <label for="chlorides">Chlorides: </label>
            <input type="color" id="chlorides" name="chlorides" value="#000000">
            <label for="lactic_acid">Lactic acid: </label>
            <input type="color" id="lactic_acid" name="lactic_acid" value="#000000">
            <label for="glucose">Glucose: </label>
            <input type="color" id="glucose" name="glucose" value="#000000">
            
            <select name="iddoc" id="doctor">
                <?php
                foreach($linked_doctors as $doctor){
                    echo "<option value='".$doctor->iduse."'>".$doctor->name." {$doctor->surname}</option>";
                }
                ?>
            </select>
            <input type="submit">
        </form>

        <!-- TODO: view measurements -->
        <div id="measurements">
            <?php 
                foreach($measurements as $measurement){
                    echo "<div>
                            <p>
                            Patient: {$measurement->patient->surname}
                            Doctor: {$measurement->doctor->surname}
                            Ph: {$measurement->ph} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->ph};'></i> 
                            Chlorides: {$measurement->chlorides} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->chlorides};'></i>
                            Lactic acid: {$measurement->lactic_acid} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->lactic_acid};'></i> 
                            Glucose: {$measurement->glucose} <i class='fa fa-circle' aria-hidden='true' style='color: {$measurement->glucose};'></i> 
                            Time: {$measurement->time}
                            </p>                
                        </div>" ;
                }

            ?>
        </div>
        <!-- logout -->
        <a href="?page=logout">LOGOUT</a>
    </body>
</html>