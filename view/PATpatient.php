<html>
    <head>
        <title>CARE4U</title>
        <link rel="stylesheet" href="view/css/style.css">
    </head>

    <body>
        <div>
            Hello patient!
        </div>    
        <!-- TODO: 
            - visualizza misurazioni del paziente
            - visualizza account paziente
            - logout paziente
            - inserisci nuova misurazione  
        -->
        <!-- insert measurement -->

        
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
        
        <!-- logout -->
        <a href="?page=logout">LOGOUT</a>
    </body>
</html>