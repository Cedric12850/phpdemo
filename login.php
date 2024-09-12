<?php require_once 'partials/header.php';

if (isset($_POST)&& !empty($_POST)) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $user = isUser($pseudo);
        if($user) {
            $registered_password = $user['password'];
            $isCredentialsOk = password_verify($password, $registered_password);
            if ($isCredentialsOk) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'pseudo' => $user['pseudo']
                ];
                header('location:index.php');
            }else {
                echo 'Mauvais mot de passe';
            }
        }else {
            echo 'mauvais pseudo';
        }
}
?>

<div>
    <form action="" method="post">
        <input type="text" name="pseudo" id="" placeholder="Entrez votre pseudo.">
        <input type="password" name="password" id="">
        <input type="submit" value="Se connecter">
    </form>
</div>
<form action="index.php" method="get">
    <input type="submit" value="Accueil">
</form>