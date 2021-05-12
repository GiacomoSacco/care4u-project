<html>
    <head>
        <title>CARE4U</title>

        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>  
        <a href="?page=createUser">Create new User</a>
        <h1>Link patients and doctor</h1>

        <!-- doctors and patients -->
        <div id="doctors">
            <form action="" method="POST">
            <?php
                if(!isset($_POST["doctor"])){
                    //legenda
                    echo "<p>Select the doctor you want to link a patient with</p>";
                    //printing doctors
                    foreach($doctors as $doctor){
                        echo "<input type='radio' id='doctor' name='doctor' value='".$doctor->iduse."'>";
                        echo "<label for='".$doctor->iduse."'>".$doctor->name." ".$doctor->surname."</label><br>";
                    }
                }else{
                    //legenda
                    echo "<p>Select the patient you want to link with the doctor <b>".$doctor_sel->name." ".$doctor_sel->surname."</b></p>";
                    //hidden fields
                    echo "<input type='hidden' name='doctor' value='$_POST[doctor]'>";
                    //printing patients
                    foreach($patients as $patient){
                        echo "<input type='radio' id='patient' name='patient' value='".$patient->iduse."'>";
                        echo "<label for='".$patient->iduse."'>".$patient->name." ".$patient->surname."</label><br>";
                    }  
                }
                
            ?>
                <input type="submit">
            </form>
        </div>
        <div>
            
                <?php
                echo "<form action='' method='POST'>";
                //legenda
                echo "<p>Select the doctor you want to see the patients of</p>";
                //printing doctors
                foreach($doctors as $doctor){
                    echo "<input type='radio' id='doctor' name='doctor_vis' value='".$doctor->iduse."'>";
                    echo "<label for='".$doctor->iduse."'>".$doctor->name." ".$doctor->surname."</label><br>";
                }
                echo "<input type='submit'>";
                echo "</form>";

                if(isset($_POST["doctor_vis"])){
                    //legenda
                    echo "<p>These are the patients of <b>".$doctor_sel->name." ".$doctor_sel->surname."</b>:</p>";
                    //printing patients
                    foreach($patients_vis as $patient){
                        echo "<div>{$patient->name} {$patient->surname} ";
                        echo "<form method='POST' action='' class='remform'>   
                                <input type='hidden' name='REMpatientid' value='{$patient->iduse}'>
                                <input type='hidden' name='REMdoctorid' value='{$doctor_sel->iduse}'>
                                <button type='submit'><i class='fa fa-close'></i></button>
                              </form>";
                        echo "</div>";
                    } 
                } 
                ?>
                
            
        </div>
        <!-- logout -->
        <a href="?page=logout">LOGOUT</a>

        <script src="view/js/linkPatDoc.js"></script>
    </body>
</html>