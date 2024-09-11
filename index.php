<?php 
require_once 'partials/header.php';
//le serveur va aller chercher le fichier et l'inclure à cet endroit
$membres = getAllMembers();

?>


    <h1>DWWM Rodez 2024, la GOAT</h1>
    <div class="container">
        <div class="userContainer">
            <?php foreach($membres as $membre){ 
                // $role = getRoleNameByRoleId($membre["role_id"]);
                // $interets = getMembersInterestNameByInterestId($membre["id"]);
                ?>
                    <div class="userCard">
                        <h3><?php echo $membre['nom'] .' '. $membre['prenom'] ?></h3>

                        <a href="membre.php?id=<?php echo $membre['id'] ?>">Users details</a>
                        <a href="role.php?id=<?php echo $membre['role_id']?>&membre=<?php echo $membre['id'] ?>">Role</a>
                    </div>
            <?php } ?>
        </div>

        <div>           
        </div>
   </div>
   <button><a href="newrole.php">Ajouter un role.</button></a>
   <button><a href="newinteret.php">Ajouter un centre d'intérêt.</button></a>


   <?php require_once 'partials/footer.php' ?>

