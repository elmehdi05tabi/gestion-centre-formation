<?php 
require_once("models/stagiaires.php") ; 
require_once("models/formations.php") ; 
require_once("models/inscriptions.php") ; 
require_once("models/evaluation.php") ; 
require_once("models/matieres.php") ; 
// afficher les stagiares et aussi la validation pour login des admins
function indexAction(){
    session_start() ; 
    if($_SESSION['valider'] =='oui') {
        $stagiaires = affStg() ; 
        require_once("views/liste_stagiaires.php") ; 
    }else{
        header('location:index.php?action=login')  ; 
        exit ; 
    }
}
// affihcer la page de validation pour la supression
function deleteAction() {
    require_once("views/delete.php") ; 
}
// suprimer le stagiare
function destroyAction() {
    $id = $_GET['id'] ; 
    delete($id) ; 
    header('location:index.php?action=liste') ;
    exit ;  
}
// afficher la page de inscription de stagiaire avec lite des formation 
function afficherStagiare () {
    $formation = formations() ; 
    require_once("views/inscri_stagiare.php");
} ; 
// inséere sur la base de donnée 
function createAction() {
    creat();
    inscription(); 
    create_stg_ev() ; 
    header('location:index.php?action=liste') ;
    exit ; 
}
// afficher la liste des stagiers avec les notes des evaluation 
function noteAction () {
    $note_stagiaires = note() ; 
    require_once("views/liste_stagiare_evaluation.php") ; 
}
// afficher la page de modification 
function editAction() {
    $id = $_GET["id"]; 
    $stagiaire = viewStg($id) ; 
    $formation = formations() ; 
    require_once('views/edit.php') ; 
}
function updateAction() {
    $id = $_GET["id"] ; 
    update($id);
    updateFormation($id) ; 
    header("location:index.php?action=liste");
    exit ; 
}
// affihcer la page de validation pour la supression de note
function deleteNoteAction() {
    require_once("views/delete_note.php") ; 
}
// suprimer le note
function destroyNoteAction() {
    $id = $_GET['id'] ; 
    delete($id) ; 
    header('location:index.php?action=evaluation') ;
    exit ;  
}
// afficher la page de modification  de la note
function editNoteAction() {
    $id = $_GET["id"]; 
    $id_formation = $_GET['id_formation']  ;
    $stagiaire = viewNoteStg($id) ; 
    $matieres = matieres($id_formation) ; 
    require_once('views/edit_note.php') ; 
}
// modifier la note de evaluation 
function updateNoteAction() {
    $id = $_GET["id"] ; 
    edit_note($id);
    header("location:index.php?action=evaluation");
    exit ; 
}
// afficher la page des stagiare qui ils ont pas une note de evaluation
function sans_note() {
    $stagiaires = view_stg_not_ev() ;
    require_once("views/create_note.php") ; 
}
function viewNote() {
    $id = $_GET["id"]; 
    $id_formation = $_GET['id_formation']  ;
    $stagiaire = view_stg($id) ; 
    $matieres = matieres($id_formation) ; 
    print_r($stagiaire) ; 
    require_once("views/ajouter_note.php") ; 
}
function createNoteAction() {
    $id = $_GET['id'] ; 
    create_note($id) ; 
    header("location:index.php?action=evaluation");
    exit ; 
}
?>