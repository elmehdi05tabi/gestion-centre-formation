<?php 
require_once("controllers/liste_admins.php") ; 
require_once("controllers/liste_stagiares.php") ; 
require_once("controllers/formation.php") ; 
// crée les routeurs 
$action = isset($_GET['action']) ? $_GET['action'] : 'liste' ; 
switch($action) {
    case 'liste' : 
        indexAction() ; 
        break ; 
    case 'login':
        login() ;
        break;
    case 'check' : 
        adminAction() ; 
        break ; 
    case 'delete' : 
        deleteAction() ; 
        break ; 
    case 'destroy' : 
        destroyAction() ; 
        break ; 
    case 'insert_stagiaire' :
        afficherStagiare() ;
        break ;
    case 'create' : 
        createAction() ; 
        break ; 
    case 'evaluation' : 
        noteAction() ; 
        break ; 
    case 'insert_formation' : 
        formationAction() ; 
        break ; 
    case 'creat_formation' :
        creatformationAction() ; 
        break ;
    case 'edit' : 
        editAction() ; 
        break ; 
    case 'modifier' : 
        updateAction() ; 
        break ; 
    case 'delete_note' : 
        deleteNoteAction() ; 
        break ; 
    case 'destroy_note' :
        destroyNoteAction() ;
        break ;
    case 'edit_note' : 
        editNoteAction() ; 
        break ; 
    case 'modifier_note' :
        updateNoteAction() ;
        break ; 
    case 'create_note' :
        sans_note() ; 
        break ;
    case 'ajouter_note' : 
        viewNote() ; 
        break ; 
}
?>