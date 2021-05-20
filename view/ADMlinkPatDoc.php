<html>
    <head>
        <title>CARE4U</title>

        <?php include "view/modules/style.php";?>
        <script src="view/js/global.js"></script>
    </head>

    <body>
        <div id="cont">
            <div id="logo">
                <h1>CARE4U</h1>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=createUser">Create user</a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                </div>
            </div>
            <div id="commands">
                <h3 onclick='showCommands()'><i class="fa fa-bars" aria-hidden="true"></i>Link patients and doctors</h3>
                <!-- doctors -->
                <form action="" method="POST" class="inputForm">
                    <p>Select the doctor:</p>
                <?php
                    foreach($doctors as $doctor){
                        echo "<input type='radio' name='doctor' value='{$doctor->iduse}' onclick='this.form.submit();'>";
                        echo "<label for='{$doctor->iduse}'>{$doctor->name} {$doctor->surname}</label><br>";
                    }
                ?>
                    <!-- Rounded switch -->
                    <div id="switch"> 
                    <label>link</label>
                    <label class="switch">
                        <input type="checkbox" onclick="showLinkUnlink()" id="checkboxLink">
                        <span class="slider round"></span>
                    </label>
                    <label>unlink</label>
                    </div>
                </form>
                
                 
            </div>
            <div id="body">           
                <?php 
                    if(isset($_POST["doctor"])){
                        foreach($unlinked_patients as $patient){
                            echo "<div class='card linkcard'>
                                    {$patient->name}
                                    <button>LINK</button>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='doctor' value='{$selected_doctor->iduse}'>   
                                        <input type='hidden' name='patient' value='{$patient->iduse}'>
                                        <label for='add'>{$patient->name} {$patient->surname}</label>
                                        <button name='add' type='submit'><i class='fa fa-plus'></i></button>
                                    </form>
                                  </div>";
                        }
                ?>
                
                <?php        
                        foreach($linked_patients as $patient){
                            echo "<div class='card unlinkcard' style='display:none;'>
                                    {$patient->name}
                                    <button><i class='fa fa-close'></i>UNLINK</button>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='doctor' value='{$selected_doctor->iduse}'>   
                                        <input type='hidden' name='REMpatientid' value='{$patient->iduse}'>
                                        <input type='hidden' name='REMdoctorid' value='{$selected_doctor->iduse}'>
                                        <label for='delete'>{$patient->name} {$patient->surname}</label>
                                        <button name='delete' type='submit'><i class='fa fa-close'></i></button>
                                    </form>
                                  </div>";
                        }
                    }
                ?>            

                <!-- unlinkedPatients -->
                <form action="" method="POST">
                <?php
                //     //UNLINKED patientes
                //     if(isset($_POST["doctor"])){
                //         //legenda
                //         //echo "<p>UNLINKED patients with <b>".$selected_doctor->name." ".$selected_doctor->surname."</b>: (select ot ADD)</p>";
                //         //hidden fields
                //         echo "<input type='hidden' name='doctor' value='{$_POST['doctor']}'>";
                //         //printing patients unlinked
                //         foreach($unlinked_patients as $patient){
                //             echo "<div class='card'>";
                //             echo "<input type='radio' id='patient' name='patient' value='{$patient->iduse}' onclick='this.form.submit();'>";
                //             echo "<label for='{$patient->iduse}'>{$patient->name} {$patient->surname}</label><br>";
                //             echo "</div>";
                //         }  
                //     }    
                    
                // ?>
                </form>

                <!-- linkedPatients -->
                <?php
                // //LINKED patients
                // if(isset($_POST["doctor"])){
                //     //legenda
                //     //echo "<p>LINKED patients with <b>".$selected_doctor->name." ".$selected_doctor->surname."</b>: (select to REMOVE)</p>";
                //     //printing patients
                //     foreach($linked_patients as $patient){
                //         echo "<div class='card'>
                //               <form method='POST' action=''>   
                //                 <input type='hidden' name='REMpatientid' value='{$patient->iduse}'>
                //                 <input type='hidden' name='REMdoctorid' value='{$selected_doctor->iduse}'>
                //                 <label for='delete'>{$patient->name} {$patient->surname}</label>
                //                 <button name='delete' type='submit'><i class='fa fa-close'></i></button>
                //               </form>
                //               </div>";
                //     } 
                //     echo "<a href='?page=linkpatdoc'>CANCEL</a><br>";
                // } 
                ?>

            </div>
            <div id="foot">
                <!-- logout -->
                <a href="?page=logout">LOGOUT</a>
            </div>
        </div> 
    
    </body>
</html>