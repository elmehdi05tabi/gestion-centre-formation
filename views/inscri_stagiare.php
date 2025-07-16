<?php 
$title = 'Inscription des stagiaires' ; 
ob_start() ; 
?>
    <form class="form-box" action="index.php?action=create" method='POST' enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom">Nom stagiaire</label>
            <input type="text" name="nom" id="nom" class="form-control">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom stagiaire</label>
            <input type="text" name="prenom" id="prenom" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email stagiaire</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="tel">Téléphone stagiaire</label>
            <input type="tel" name="tel" id="tel" class="form-control">
        </div>
        <div class="form-group">
            <label for="data_naissance">Date de naissance</label>
            <input type="date" name="data_naissance" id="data_naissance" class="form-control">
        </div>
        <div class="form-group">
            <label for="photo_stagiaire">Photo stagiaire</label>
            <input type="file" name="photo_stagiare" id="photo_stagiaire" class="form-control">
        </div>
        <div class="form-group">
            <label for="formation">Formation</label>
            <select name="liste_formation" id="formation" class="form-control">
                <?php foreach($formation as $f) :?>
                    <option value="<?=$f->id_formation?>"><?= $f->nom_formation?></option>
                <?php endforeach ; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="S'inscrire" class="btn-submit">
        </div>
    </form>
<?php 
$content = ob_get_clean(); 
require_once("layout.php"); 
?>
