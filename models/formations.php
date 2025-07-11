<?php 
require_once("models/database.php") ; 
// afficher les formation 
function formations() {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT * FROM formations") ;
    $sqlState->execute() ; 
    return $sqlState->fetchAll(PDO::FETCH_OBJ) ;
}
// insert formation 
function create_formation() {
    $pdo = connection_database() ; 
    $nom_formation  = $_POST['nom_formation'] ; 
    $date_debut  = $_POST['date_debut'] ; 
    $date_fin  = $_POST['date_fin'] ; 
    $sqlState = $pdo->prepare("INSERT INTO formations(nom_formation,date_debut,date_fin)Values(?,?,?)") ; 
    return $sqlState->execute([
        $nom_formation,
        $date_debut,
        $date_fin
    ]) ;
} ; 
// modifier la formation de stagiare 
?>