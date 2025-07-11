<?php 
// login pour les admins 
$title = 'Inscription des officiels' ; 
ob_start() ; 
?>
<form action="index.php?action=check" method='POST'>
    <label for="nom_admin">entre votre UserName</label>
    <input type="text" name="username" id="username">
    <label for="password">entre votre mot de pass</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="valider">
</form>
<?php 
$content = ob_get_clean() ; 
require_once("layout.php") ; 
?>