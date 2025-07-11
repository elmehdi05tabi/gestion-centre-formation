<?php
require_once('models/database.php') ; 
// afficher les stagiaires
function affStg() {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT s.id_stagiaire,s.nom ,s.prenom,s.photo_stagier, 
    s.email,s.tel,s.date_naissance,
    f.nom_formation FROM stagiaires s
    JOIN inscriptions i on i.id_stagiaire = s.id_stagiaire 
    JOIN formations f on i.id_formation = f.id_formation
    ")  ; 
    $sqlState->execute()  ; 
    return $sqlState->fetchAll(PDO::FETCH_OBJ) ; 
}
// suprimer un stagiare
function delete($id) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("DELETE FROM stagiaires WHERE id_stagiaire=?") ; 
    return $sqlState->execute([$id])  ;
}
// inseére un stagire sur la base de donnée 
function  creat(){
    $pdo = connection_database() ; 
    $nom = $_POST['nom'] ; 
    $prenom = $_POST['prenom'] ; 
    $email = $_POST['email'] ; 
    $tel = $_POST['tel'] ; 
    $data_naissance = $_POST['data_naissance'] ; 
    $photo_stagiaire_name = $_POST['nom'];
    $photo_stagiaire = $_FILES['photo_stagiare']["tmp_name"];
    $chemine = "views/images/$photo_stagiaire_name.png" ; 
    move_uploaded_file($photo_stagiaire,$chemine) ;  
    $sqlState = $pdo->prepare("INSERT INTO stagiaires(nom,prenom,email,tel,date_naissance,photo_stagier) values(?,?,?,?,?,?)"); 
    return $sqlState->execute(
        [
            $nom,
            $prenom,
            $email,
            $tel,
            $data_naissance,
            $chemine,
        ] 
    ) ;
}
// modifer le stagiare 
function update($id) {
    $pdo = connection_database() ; 
    $nom  = $_POST["nom"] ; 
    $prenom  = $_POST["prenom"] ; 
    $email  = $_POST["email"] ; 
    $tel  = $_POST["tel"] ; 
    $data_naissance  = $_POST["data_naissance"] ; 
    $photo_stagiaire_name  = $_POST["nom"]; 
    $photo_stagiaire  = $_FILES["photo_stagiare"]["tmp_name"]; 
    $chemine = "views/images/$photo_stagiaire_name.png" ;
    move_uploaded_file($photo_stagiaire,$chemine) ; 
    $sqlState = $pdo->prepare("UPDATE  stagiaires SET 
    nom=?,
    prenom=?,
    email=?,
    tel =?,
    date_naissance =?,
    photo_stagier =?
    WHERE id_stagiaire = ?
    ") ;
    return $sqlState->execute(
       [
            $nom,
            $prenom,
            $email,
            $tel,
            $data_naissance,
            $chemine,
            $id
       ]
    ) ;
} 
// afficher un seul stagire pour la modification
function viewStg($id) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT s.id_stagiaire,s.nom ,s.prenom,s.photo_stagier, 
    s.email,s.tel,s.date_naissance,
    f.nom_formation FROM stagiaires s
    JOIN inscriptions i on i.id_stagiaire = s.id_stagiaire 
    JOIN formations f on i.id_formation = f.id_formation
    WHERE s.id_stagiaire = ?
    ")  ; 
    $sqlState->execute([$id]); 
    return $sqlState->fetch(PDO::FETCH_OBJ) ; 
}
// afficher un seul stagiare pour la modification de la note 
function viewNoteStg($id) {
    $pdo = connection_database() ; 
    $sqlState = $pdo->prepare("SELECT
    s.id_stagiaire,
    s.nom , 
    s.prenom,  
    e.date_evaluation, 
    e.note,
    m.nom_matiere ,
    f.id_formation ,
    f.nom_formation 
    FROM stagiaires s
    JOIN inscriptions i on i.id_stagiaire = s.id_stagiaire 
    JOIN formations f on i.id_formation = f.id_formation
    JOIN evaluations e on e.id_stagiaire = s.id_stagiaire
    JOIN matieres m on m.id_matiere = e.id_matiere
    WHERE s.id_stagiaire = ?
    ") ; 
    $sqlState->execute([$id])  ; 
    return $sqlState->fetch(PDO::FETCH_OBJ) ; 
}
?> 