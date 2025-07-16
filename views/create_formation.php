<?php 
// login pour les admins 
$title = 'ajouter des formations' ; 
ob_start() ; 
?>
<form action="index.php?action=creat_formation" method='POST'>
    <label for="nom_formation">entre le nom de formation</label>
    <input type="text" name="nom_formation" id="nom_formation">
    <label for="date_debut">date du début</label>
    <input type="date" name="date_debut" id="date_debut">
    <label for="date_fin">date du fin</label>
    <input type="date" name="date_fin" id="date_fin"><br>
    <input type="submit" value="valider">
</form>
<?php 
$content = ob_get_clean() ; 
require_once("layout.php") ; 
?>