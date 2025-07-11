<?php 
require_once("models/database.php") ; 
// afficher les stagire qui ils sont pas un note de evaluation 
function no_evaluation() {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT s.id_stagiaire,s.nom,s.prenom,
    f.nom
    ") ;
}
// insére un note 
function createNote() {
    $pdo=connection_database() ; 
    $sqlState = $pdo->prepare(" INSERT INTO evaluations (note,date_evaluation,id_stagiaire,id_matiere)") ;
} 
// afficher les notes des evaluation en la base de donnée 
function note() {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT
    s.id_stagiaire,
    s.nom , 
    s.prenom,  
    e.date_evaluation, 
    e.note,
    m.nom_matiere ,
    f.id_formation,
    f.nom_formation 
    FROM stagiaires s
    JOIN inscriptions i on i.id_stagiaire = s.id_stagiaire 
    JOIN formations f on i.id_formation = f.id_formation
    JOIN evaluations e on e.id_stagiaire = s.id_stagiaire
    JOIN matieres m on m.id_matiere = e.id_matiere
    ") ; 
    $sqlState->execute()  ; 
    return $sqlState->fetchAll(PDO::FETCH_OBJ) ; 
}
// suprimer la note 
function delete_note($id) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("DELETE FROM evaluations WHERE id_stagiaire=?") ; 
    return $sqlState->execute([$id])  ;
}
// modifer la note d'evaluation 
function edit_note($id){
    $pdo = connection_database()  ;
    $note  = $_POST['note'] ; 
    $date_evaluation  = $_POST['date_evaluation'] ; 
    $id_matiere  = $_POST['liste_matieres'] ; 
    $sqlState=$pdo->prepare("UPDATE evaluations SET note=?,date_evaluation=?,id_matiere=? WHERE id_stagiaire=?") ;
    return $sqlState->execute(
        [
            $note,
            $date_evaluation,
            $id_matiere ,
            $id
        ]
    ) ; 
} ; 
// create stagiare sur la table evaluation 
function create_stg_ev() {
    $pdo = connection_database()  ;
    $stmt = $pdo->query("SELECT max(id_stagiaire) as id_dernier from stagiaires " );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dernier_id = $row["id_dernier"]; 
    $id_stagiaire = $dernier_id; 
    $sqlState = $pdo->prepare("INSERT INTO evaluations(id_stagiaire)values(?)") ; 
    return $sqlState->execute([$id_stagiaire]) ; 
} 
// afficher les stagier qui ils sont pas une note de evaluation
function view_stg_not_ev() {
    $pdo = connection_database()  ;
    $sqlState = $pdo->prepare("SELECT
    s.id_stagiaire,
    s.nom , 
    s.prenom,  
    e.date_evaluation, 
    e.note,
    m.nom_matiere ,
    f.id_formation,
    f.nom_formation 
    FROM stagiaires s
    JOIN inscriptions i on i.id_stagiaire = s.id_stagiaire 
    JOIN formations f on i.id_formation = f.id_formation
    JOIN evaluations e on e.id_stagiaire = s.id_stagiaire
    LEFT JOIN matieres m on m.id_matiere = e.id_matiere
    WHERE e.note is Null 
    ") ; 
    $sqlState->execute() ;
    return  $sqlState->fetchAll(PDO::FETCH_OBJ); 
}
// afficher un seul stagiare pour la modification de note 
function view_stg($id) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT
    s.id_stagiaire,
    s.nom , 
    s.prenom,  
    f.id_formation,
    f.nom_formation 
    FROM stagiaires s
    JOIN inscriptions i on i.id_stagiaire = s.id_stagiaire 
    JOIN formations f on i.id_formation = f.id_formation
    WHERE s.id_stagiaire = ?
    ") ; 
    $sqlState->execute(array($id))  ; 
    return $sqlState->fetch(PDO::FETCH_OBJ) ; 
}
// ajouter un note de evaluation 
function create_note($id) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("INSERT INTO evaluations(note,date_evaluation,id_matiere)VALUES(?,?,?) where id_stagiaire=?");
    return $sqlState->execute($id) ; 
}
?>