<?php 
require_once 'partials/header.php';
//le serveur va aller chercher le fichier et l'inclure à cet endroit
$membres = getAllMembers();

//ternaire vérifeir si un users est connecté
//(isset($_SESSION['user']) && !empty($_SESSION['user'])) ? $user =  $_SESSION['user']['email'] : $user = "invité"; 
if(isset($_SESSION['user'])&& !empty($_SESSION['user'])){
    $user = $_SESSION['user']['pseudo'];
}else {
    $user = 'Invité';
}

?>
<head>
    <div>
        <form action="login.php" method="get">
            <input type="submit" value="Se connecter" name="login">
        </form>
        <form action="logout.php" method="get">
            <input type="submit" value="Déconnexion" name="logout">
        </form>
    </div>
    <div>
        <p>Bienvenu(e) <?php echo $user ?></p>
    </div>
</head>

<main>
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
   <form action="newrole.php" method="get">
        <input type="submit" value="Ajouter un rôle">
    </form>
    <form action="newinteret.php" method="get">
            <input type="submit" value="Ajouter un centre d'intérêt">
    </form>

</main>
   <?php require_once 'partials/footer.php' ?>

