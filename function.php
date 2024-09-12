<?php

function dbconnect() {   //fonction qui se connecte à la base de données
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=dwwm_rodez', 'root', '');
        //echo 'connexion établie';
        return $dbh;
    } catch (PDOException $e) {
        echo 'ca ne marche pas !!';
}
}

function getAllMembers(){
    $dbh = dbconnect();
    $query = "SELECT * FROM membres";
    $stmt = $dbh->prepare($query);   //la méthode query permet d'executer la requète sql mais n'est pas exploitable de suite
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getMemberInfosByMembersId($id){
    $dbh = dbconnect();
    $query ="SELECT * FROM membres
        WHERE membres.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getAllRole(){
    $dbh = dbconnect();
    $query = "SELECT nom_role, id FROM role";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAllInteret(){
    $dbh = dbconnect();
    $query = "SELECT * FROM interets";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function getAllSameRole($id) {
    $dbh = dbconnect();
    $query = "SELECT *  FROM membres
        WHERE membres.role_id LIKE :id
    ";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getSameInterestNameByIntersetId($id) {
    $dbh = dbconnect();
    $query = "SELECT * FROM interets
        JOIN membres_interets ON interets.id = membres_interets.interet_id
        JOIN membres ON membres_interets.membre_id = membres.id
        WHERE interets.id LIKE :id";
    $stmt = $dbh->prepare($query);
    $stmt-> bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getRoleNameByRoleId($id){
    $dbh = dbconnect();
    $query = "SELECT nom_role FROM role
        WHERE id = :id";
    $stmt = $dbh->prepare($query);
    $stmt-> bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);    // result au singulier et fetch simple car la fonction ne récupère qu'un seul résultat
    return $result;
}
    
function getMembersInterestNameByInterestId ($membreId) {
    $dbh = dbconnect();
    /*
    $query ="SELECT nom_interet FROM membres 
    JOIN membre_interet ON membre.id = membre_interet.memebre_id
    JOIN interet ON membre_interet = interet.id"
    WHERE "membres.id = $membreId";
    */

    //autre rédaction de la même requête en utilisant durectement la table de liaison
    $query = "SELECT id, nom_interet FROM interets
        JOIN membres_interets ON interets.id = membres_interets.interet_id
        WHERE membres_interets.membre_id = :membreId";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam('membreId', $membreId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function addRole ($name) {
    $dbh = dbconnect();
    $query = "INSERT INTO role (nom_role) VALUE (:name)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
}

function deleteRole($name) {
    $dbh = dbconnect();
    $query = "DELETE FROM role
    WHERE nom_role = :name";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
}

function addInteret($name) {
    $dbh =dbconnect();
    $name = ucfirst($name);
    $query = "INSERT INTO interets (nom_interet) VALUE (:name)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    
}

function deleteInteret($name){
    $dbh = dbconnect();
    $query = "DELETE FROM interets
    WHERE nom_interet = :name";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
}

function addInterestIntoMember($idInteret, $idMembre){
    $dbh =dbconnect();
    $query = "INSERT INTO membres_interets(interet_id ,membre_id)
    VALUES (:idInteret, :idMembre)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':idInteret', $idInteret);
    $stmt->bindParam(':idMembre', $idMembre);
    $stmt->execute();
}

function deleteInterestIntoMember($idInteret, $idMembre){
    $dbh =dbconnect();
    $query = "DELETE FROM membres_interets
    WHERE interet_id= :idInteret, membre_id:idMembre";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':idInteret', $idInteret);
    $stmt->bindParam(':idMembre', $idMembre);
    $stmt->execute();
}


function addMemberRole($name) {
    $dbh =dbconnect();
}

function isUser ($pseudo) {
    $dbh = dbconnect();
    $query = "SELECT * FROM user_login
    WHERE pseudo = :pseudo";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam (':pseudo', $pseudo);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>