<?php 
require_once ('function.php');
    $id = $_GET['id'];
    $i = $_GET['interets'];
    $membres = getSameInterestNameByIntersetId($id);
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre d'intérêt</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>DWWM Rodez 2024, la GOAT</h1>
    <div class="container">
        <h2>Liste des personnes ayant <span id="capitalize"><?php echo $i ?></span> comme centre d'intérêt :</h2>

        <div class="userContainer">
            <?php foreach($membres as $membre) { ?> 
                <div class="userCard">
                    <a href="membre.php?id=<?php echo $membre['id'] ?>">
                        <h3><?php echo $membre['nom'].' '.$membre['prenom']  ?></h3>
                    </a>                  
                </div>
                
            <?php } ?>
        </div>
        <button><a href="index.php ?>">Retour accueil</a> </button>
    </div>
</body>
</html>