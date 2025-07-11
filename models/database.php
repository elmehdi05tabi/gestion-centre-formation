<?php 
// la connection sur la base de donnée centre formation
function connection_database() {
    try {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=centre_formation','root','') ; 
        return $pdo ; 
    }catch(PDOException $e) {
        echo 'Erreur 👉'.$e->getMessage() ;
    }
}
?>