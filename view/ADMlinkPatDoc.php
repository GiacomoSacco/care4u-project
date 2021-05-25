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
            <div id="foot">
            </div>
        </div> 
    
    </body>
</html>