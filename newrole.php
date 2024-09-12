<?php 
require_once 'partials/header.php';
if(isset($_POST['addRole'])&& !empty($_POST['addRole'])){
    $addRole = $_POST['addRole'];
    addRole($addRole);
}

if(isset($_POST['deleteRole'])&& !empty($_POST['deleteRole'])) {
    $deleteRole = $_POST['deleteRole'];
    deleteRole($deleteRole);
}

$allRoles= getAllRole();
?>


<h1>liste des rôles:</h1>
<div class="container">
    <ul class="liste">
        <?php foreach($allRoles as $allRole) { ?> 
            <li><?php echo ucfirst ($allRole['nom_role']) ?></li>    
        <?php } ?>
    </ul>

    <div class="inputContainer">
    <h2>Ajouter un nouveau rôle</h2>
    <form action="" method="post">
    <input type="text" name="addRole" id="" placeHolder="Nom du rôle">
    <input type="submit" value="Enregistrer">
    </form>

    <form action="" method="post">
        <input type="text" name="deleteRole" id="" placeHolder="nom du rôle">
        <input type="submit" value="Supprimer">
    </form>
    </div>
    <form action="index.php" method="get">
        <input type="submit" value="Accueil">
    </form>
</div>