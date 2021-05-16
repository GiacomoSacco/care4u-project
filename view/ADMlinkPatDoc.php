<html>
    <head>
        <title>CARE4U</title>

        <?php include "view/css/style.php";?>
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
                <h1>Link patients and doctors</h1>
                <!-- doctors -->
                <div id="doctorForm">
                    <p>Select the doctor to add/remove patients:</p>
                    <form action="" method="POST">
                    <?php
                        //if(!isset($_POST["doctor"])){
                            //doctors form
                            foreach($doctors as $doctor){
                                echo "<input type='radio' name='doctor' value='{$doctor->iduse}' onclick='this.form.submit();'>";
                                echo "<label for='{$doctor->iduse}'>{$doctor->name} {$doctor->surname}</label><br>";
                            }
                        //}
                    ?>
                    <!-- <input type="submit"> -->
                    </form>
                    <!-- Rounded switch -->
                    link
                    <label class="switch">
                        <input type="checkbox" onclick="showLinkUnlink()">
                        <span class="slider round"></span>
                    </label>
                    unlink
                </div> 
            </div>
            <div id="body">           
                <?php 
                    if(isset($_POST["doctor"])){
                        foreach($unlinked_patients as $patient){
                            echo "<div class='linkcard'>
                                    {$patient->name}
                                    <button>LINK</button>
                                  </div>";
                        }
                ?>
                
                <?php        
                        foreach($linked_patients as $patient){
                            echo "<div class='unlinkcard' style='display:none;'>
                                    {$patient->name}
                                    <button><i class='fa fa-close'></i>UNLINK</button>
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
    <script src="view/js/linkPatDoc.js"></script>
    </body>
</html>