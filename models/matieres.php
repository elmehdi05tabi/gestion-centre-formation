<?php 
// afficher les matiers 
require_once("models/database.php") ; 
function matieres($id_formation) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT * FROM matieres 
     WHERE id_formation=?") ; 
    $sqlState->execute([$id_formation]) ; 
    return $sqlState->fetchAll() ; 
}
?>