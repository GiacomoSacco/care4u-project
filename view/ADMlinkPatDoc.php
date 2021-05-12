<html>
    <head>
        <title>CARE4U</title>

        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>  
        <a href="?page=createUser">Create new User</a>
        <h1>Link patients and doctors</h1>

        <!-- doctors -->
        <div id="doctorForm">
            <p>Select the doctor to add/remove patients:</p>
            <form action="" method="POST">
            <?php
                if(!isset($_POST["doctor"])){
                    //doctors form
                    foreach($doctors as $doctor){
                        echo "<input type='radio' id='doctor' name='doctor' value='{$doctor->iduse}' onclick='this.form.submit();'>";
                        echo "<label for='{$doctor->iduse}'>{$doctor->name} {$doctor->surname}</label><br>";
                    }
                }
            ?>
            <!-- <input type="submit"> -->
            </form>
        </div> 
        <div id="unlinkedPatients">
            <form action="" method="POST">
            <?php
                //UNLINKED patientes
                if(isset($_POST["doctor"])){
                    //legenda
                    echo "<p>UNLINKED patients with <b>".$selected_doctor->name." ".$selected_doctor->surname."</b>: (select ot ADD)</p>";
                    //hidden fields
                    echo "<input type='hidden' name='doctor' value='{$_POST['doctor']}'>";
                    //printing patients unlinked
                    foreach($unlinked_patients as $patient){
                        echo "<input type='radio' id='patient' name='patient' value='{$patient->iduse}' onclick='this.form.submit();'>";
                        echo "<label for='{$patient->iduse}'>{$patient->name} {$patient->surname}</label><br>";
                    }  
                }    
                
            ?>
            </form>
        </div>
        <div id="linkedPatients">
            <?php
                //LINKED patients
                if(isset($_POST["doctor"])){
                    //legenda
                    echo "<p>LINKED patients with <b>".$selected_doctor->name." ".$selected_doctor->surname."</b>: (select to REMOVE)</p>";
                    //printing patients
                    foreach($linked_patients as $patient){
                        echo "<form method='POST' action=''>   
                                <input type='hidden' name='REMpatientid' value='{$patient->iduse}'>
                                <input type='hidden' name='REMdoctorid' value='{$selected_doctor->iduse}'>
                                <label for='delete'>{$patient->name} {$patient->surname}</label>
                                <button name='delete' type='submit'><i class='fa fa-close'></i></button>
                              </form>";
                    } 
                    echo "<a href='?page=linkpatdoc'>CANCEL</a><br>";
                } 
                ?>
        </div>
        <!-- logout -->
        <a href="?page=logout">LOGOUTTTTTTTTTTT</a>

        <script src="view/js/linkPatDoc.js"></script>
    </body>
</html>