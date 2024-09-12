<?php 
require_once 'partials/header.php';

$id = $_GET['id'];
$roles = getAllSameRole($id);
$role = getRoleNameByRoleId($id);

?>


    <h1>DWWM Rodez 2024, la GOAT</h1>
    <div class="container">
        <h2>Liste des personnes ayant le rôle de <span><?php echo $role['nom_role'] ?></span>:</h2>
        
        <div class="userContainer">
            <?php foreach ($roles as $role) {?> 
                <div class="userCard">
                    <a href="membre.php?id=<?php echo $role['id'] ?>">    
                        <h3><?php echo $role['nom']. ' '. $role['prenom'] ?></h3>
                    </a> 
                </div> 
             <?php } ?>
        </div>
        <form action="index.php" method="get">
            <input type="submit" value="Accueil">
        </form>
        <form action="newrole.php" method="get">
            <input type="submit" value="Ajouter un rôle">
        </form>
    </div>

<?php require_once 'partials/footer.php' ?>