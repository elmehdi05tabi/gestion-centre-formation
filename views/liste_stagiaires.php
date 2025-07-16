<!-- afficher la liste des stagiaires -->
<?php 
$title = 'liste des stagiaires' ; 
ob_start() ; 
?> 
<div class="search">
    <input type="text" id="search" placeholder='recherche un stagier'>
</div>
<table id='tb'>
    <thead>
        <th>id stagiaire</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th>telephone</th>
        <th>formation</th>
        <th>date de naissence</th>
        <th>photo de stagiaire</th>
        <th>action</th>
    </thead>
    <tbody id='tbody'>
        <?php foreach($stagiaires as $stagiare) : ?>
            <tr class='tr'>
                <td class='idStagiaire'><?= $stagiare->id_stagiaire?></td>
                <td class='nom'><?= $stagiare->nom?></td>
                <td class='prenom'><?= $stagiare->prenom?></td>
                <td class='emailStagiare'><?=$stagiare->email?></td>
                <td class='Tel'><?= $stagiare->tel?></td>
                <td class='nomFormation'><?= $stagiare->nom_formation?></td>
                <td class='dateNaissance'><?= $stagiare->date_naissance?></td>
                <td class='PhotoStagiaire'><img src="<?= $stagiare->photo_stagier?>" alt="stagire image"></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $stagiare->id_stagiaire?>">modifier</a>
                    <a href="index.php?action=delete&id=<?= $stagiare->id_stagiaire?>">suprimer</a>
                </td>
            </tr> 
            <?php endforeach ; ?>
    </tbody>
 </table>
 <?php 
 $content = ob_get_clean() ; 
 require_once("layout.php") ; 
 ?>