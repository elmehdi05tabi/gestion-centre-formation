<?php
// insére inscription 
require_once("models/database.php");
function inscription() {
    $pdo = connection_database();
    $id_formation = $_POST['liste_formation'];
    //  Récupérer le dernier id_stagiaire
    $stmt = $pdo->query("SELECT max(id_stagiaire) as id_dernier from stagiaires " );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dernier_id = $row["id_dernier"]; 
    $id_stagiaire = $dernier_id;
    $date_inscription = date("Y-m-d");
    $sqlState = $pdo->prepare("
        INSERT INTO inscriptions (id_stagiaire, id_formation, date_inscription)
        VALUES (?, ?, ?)
    ");
    return $sqlState->execute([$id_stagiaire, $id_formation, $date_inscription]);
}
// modifier la formation de stagiare 
function updateFormation($id_stagiaire){
    $pdo = connection_database() ; 
    $id_formation = $_POST['liste_formation'];
    $sqlState = $pdo->prepare("UPDATE inscriptions SET id_stagiaire=?,id_formation=? WHERE id_stagiaire=?") ; 
    return $sqlState->execute([$id_stagiaire,$id_formation,$id_stagiaire]) ; 
}
?>
