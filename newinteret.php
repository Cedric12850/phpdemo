<?php 
require_once 'partials/header.php';
if(isset($_POST['addInteret'])&& !empty($_POST['addInteret'])){
    $addInteret = $_POST['addInteret'];
    addInteret($addInteret);
}

if(isset($_POST['deleteInteret'])&& !empty($_POST['deleteInteret'])) {
    $deleteInteret = $_POST['deleteInteret'];
    deleteInteret($deleteInteret);
}

$allInterets= getAllInteret();
?>

<h1>liste des centres d'intérêts:</h1>
<div class="container">
    <ul class="liste">
        <?php foreach($allInterets as $allInteret) { ?> 
            <li><?php echo ucfirst ( $allInteret['nom_interet']) ?></li>    
        <?php } ?>
    </ul>

    <div class="inputContainer">
        <h2>Ajouter un nouveau centre d'intérêt</h2>
        <form action="" method="post">
            <input type="text" name="addInteret" id="" placeHolder="Nom du centre d'intérêt">
            <input type="submit" value="Enregistrer">
        </form>

        <form action="" method="post">
        <input type="text" name="deleteInteret" id="" placeHolder="nom du centre d'intérêt">
        <input type="submit" value="Supprimer">
    </form>
    </div>
    <form action="index.php" method="get">
        <input type="submit" value="Accueil">
    </form>
</div>