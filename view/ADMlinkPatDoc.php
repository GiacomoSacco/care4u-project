<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/modules/head.php";?>
    </head>

    <body>
        <div id="cont">
            <div id="logo">
                <a href="https://github.com/GiacomoSacco/care4u-maturity" target="_blank"><img src="public/logo_transparent.png" alt="LOGO"></a>
            </div>
            <div id="head">
                <div id="nav"> 
                    <a href="?page=createUser">Create user</a>
                </div>
                <!-- User info -->
                <div id="userinfo">
                    <?php include "view/modules/userInfo.php"; ?>
                    <a href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="commands">
                <button onclick="showCommands()" class="showMenu">Link patients and doctors <i class="fa fa-angle-down" aria-hidden="true" id="menuIcon"></i></button>
                <!-- doctors -->
                <form action="" method="POST" class="inputForm">
                    <p>Select the doctor:</p>
                <?php
                    foreach($doctors as $doctor){
                        echo "<form method='POST' action='' class='inputForm'>";
                        echo "<input type='hidden' name='docname' value='{$doctor->name}'>";
                        echo "<input type='hidden' name='docsurname' value='{$doctor->surname}'>";
                        echo "<input type='radio' name='doctor' value='{$doctor->iduse}' onclick='this.form.submit();'>";
                        echo "<label for='{$doctor->iduse}'>{$doctor->name} {$doctor->surname}</label><br>";
                        echo "</form>";
                    }
                ?>
                    <!-- Rounded switch -->
                    <div id="switch"> 
                    <label class="switch">
                        <input type="checkbox" onclick="showLinkUnlink()" id="checkboxLink">
                        <span class="slider round"></span>
                    </label>
                    </div>
                </form> 
            </div>
            <div id="disclaimer">
                <p>Doctor: <?php echo "{$_POST["docname"]} {$_POST["docsurname"]}"; ?></p>
            </div>
            <div id="body">           
                <?php 
                    if(isset($_POST["doctor"])){
                        foreach($unlinked_patients as $patient){
                            echo "<div class='card linkcard'>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='doctor' value='{$selected_doctor->iduse}'>   
                                        <input type='hidden' name='patient' value='{$patient->iduse}'>
                                        <label for='add'>{$patient->name} {$patient->surname}</label>
                                        <button name='add' type='submit' class='addRemBTN'><i class='fa fa-plus'></i></button>
                                    </form>
                                  </div>";
                        }
       
                        foreach($linked_patients as $patient){
                            echo "<div class='card unlinkcard' style='display:none;'>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='doctor' value='{$selected_doctor->iduse}'>   
                                        <input type='hidden' name='REMpatientid' value='{$patient->iduse}'>
                                        <label for='delete'>{$patient->name} {$patient->surname}</label>
                                        <button name='delete' type='submit' class='addRemBTN'><i class='fa fa-minus'></i></button>
                                    </form>
                                  </div>";
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