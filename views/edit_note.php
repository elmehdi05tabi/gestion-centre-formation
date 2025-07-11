<?php 
$title = 'modifier la note d\'evaluation ' ;
$id = $_GET['id'] ;  
ob_start() ; 
?>
    <form class="form-box" action="index.php?action=modifier_note&id=<?=$id?>" method='POST' enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom">id stagiaire</label>
            <input type="number" name="id" id="nom" class="form-control" value="<?=$id?>" disabled>
        </div>
        <div class="form-group">
            <label for="nom">Nom stagiaire</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?=$stagiaire->nom?>" readonly   >
        </div>
        <div class="form-group">
            <label for="prenom">Prénom stagiaire</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?=$stagiaire->prenom?>" readonly>
        </div>
        <div class="form-group">
            <label for="date">date d'evaluation</label>
            <input type="date" name="date_evaluation" id="date" class="form-control" value="<?=$stagiaire->date_evaluation?>">
        </div>
        <div class="form-group">
            <label for="tel">Formation</label>
            <input type="text" name="formation" id="formation" class="form-control" value="<?=$stagiaire->nom_formation?>" readonly>
        </div>
       <div class="form-group">
            <label for="matiere">Matieres</label>
            <select name="liste_matieres" id="matiere" class="form-control">
                <?php foreach($matieres as $m):?>
                    <option value="<?=$m[0]?>"><?= $m[1]?></option>
                <?php endforeach ; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="photo_stagiaire">Note stagiaire</label>
            <input type="number" name="note" id="note" class="form-control" value='<?=$stagiaire->note?>' step="0.1">
        </div>
        <div class="form-group">
            <input type="submit" value="Mdifier" class="btn-submit">
        </div>
    </form>
<?php 
$content = ob_get_clean(); 
require_once("layout.php"); 
?>
