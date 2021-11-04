<div>
    <?php 
        //var_dump($_SESSION['user']);
        echo "  {$_SESSION['user']->name}
                {$_SESSION['user']->surname}  
                <img src='{$_SESSION['user']->role->icon}' alt='avatar'>";
    ?>
</div>