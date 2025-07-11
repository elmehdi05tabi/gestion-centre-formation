<?php 
// insert formation
function formationAction() {
   require_once("views/create_formation.php") ;
}
function creatformationAction() {
    create_formation() ; 
    header("location:index.php?action=liste");
}
?>