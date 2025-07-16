<!-- afficher la liste des stagiaires avec les notes des evaluation -->
<?php 
$title = 'les notes des stagiares ' ; 
ob_start() ; 
?> 
<div class="search">
    <input type="text" id="search" placeholder='shercher un stagier'>
    <a href="index.php?action=create_note" class="sans-note">Stagiaires non notés</a>  
</div>
<table id='tb'>
    <thead>
        <th>id stagiaire</th>
        <th>nom</th>
        <th>prenom</th>
        <th>formation</th>
        <th>matiere</th>
        <th>date evaluation</th>
        <th>note</th>
        <th>action</th>
    </thead>
    <tbody id='tbody'>
        <?php foreach($note_stagiaires as $stagiare) : ?>
            <tr class='tr'>
                <td class='idStagiaire'><?= $stagiare->id_stagiaire?></td>
                <td class='nom'><?= $stagiare->nom?></td>
                <td class='prenom'><?= $stagiare->prenom?></td>
                <td class='note'><?= $stagiare->nom_formation?></td>
                <td class='nomMatiere'><?= $stagiare->nom_matiere?></td>
                <td class='photoStagiair'><?=$stagiare->date_evaluation?></td>
                <td class='nomMatiere'><?=$stagiare->note?></td>
                <td>
                    <a href="index.php?action=edit_note&id=<?= $stagiare->id_stagiaire?>&id_formation=<?=$stagiare->id_formation?>" class="modifier">modifier la note</a>
                    <a href="index.php?action=delete_note&id=<?= $stagiare->id_stagiaire?>" class="suprimer">suprimer la note</a>
                </td>
            </tr> 
            <?php endforeach ; ?>
    </tbody>
 </table>
 <?php 
 $content = ob_get_clean() ; 
 require_once("layout.php") ; 
 ?>