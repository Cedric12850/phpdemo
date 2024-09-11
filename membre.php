<?php require_once 'partials/header.php';
//le serveur va aller chercher le fichier et l'inclure à cet endroit
if(isset($_GET['id']) && !empty($_GET['id'])){
$id = $_GET['id'];
$membre = getMemberInfosByMembersId($id);
$role = getRoleNameByRoleId($membre["role_id"]);
$interets = getMembersInterestNameByInterestId($membre["id"]);
}else {
    header('location:404.php');
}

if(isset($_POST['addMemberInteret'])) {
    $addMemberInteret = $_POST['addMemberInteret'];
    addInterestIntoMember($addMemberInteret,$id);
}



if(isset($_POST['addMemberRole'])) {
    $addMemberRole =$_POST['addMemberRole'];
    addMemberRole($addMemberRole);
    var_dump($addMemberRole);
}

$allInterets= getAllInteret();
$allRoles= getAllRole();
?>



    <h1>DWWM Rodez 2024, la GOAT</h1>
    
    <div class="userContainer cardDetails">
        <div class="userCard ">
            <h3><?php echo $membre['nom'] .' '. $membre['prenom'] ?></h3>
            <h3>
                <a href="role.php?id=<?php echo $membre['role_id']?>&membre=<?php echo $membre['id'] ?>"><?php echo $role['nom_role'] ?></a>
            </h3>
                <small>(<?php echo $membre['date_naissance']?>)</small>
                <?php foreach($interets as $interets)  {  ?>                   
                    <a href="interets.php?id=<?php echo $interets['id']?>&interets=<?php echo $interets['nom_interet']?>"><?php echo $interets['nom_interet'] ?></a>                   
                <?php } ?>                
        </div>
    </div>
        <div class="inputContainer">
        <h2>Ajouter ou supprimer un centre d'intérêt à ce membre.</h2>
        <form action="" method="post">
            <select name="addMemberInteret" id="">
                <?php foreach($allInterets as $allInteret)  {  ?>
                    <option value="<?php echo ucfirst($allInteret['id']) ?>"><?php echo ucfirst($allInteret['nom_interet']) ?></option>              
                <?php } ?>  
                <input type="submit" value="enregistrer">
                <input type="submit" value="supprimer">
            </select>
        </form>

        <h2>Ajouter un rôle à ce membre.</h2>
        <form action="" method="post">
        <?php foreach($allRoles as $allRole) { ?> 
            <input type="checkbox" name="addMembersRole<?php echo $allRole['id']  ?>" id=""><?php echo $allRole['id']  ?>
            
        <?php } ?>
            <div>
                <input type="submit" value="valider">
            </div>
        </form>
    </div>              
    
    <button><a href="index.php ?>">Retour accueil</a> </button>

<?php require_once 'partials/footer.php' ?>