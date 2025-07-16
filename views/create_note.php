<!-- la page pour insére un note -->
<?php 
$title = "ajouter un  note d'évaluation"; 
ob_start() ; 
?>
<table id='tb'>
    <thead>
        <th>id stagiaire</th>
        <th>nom</th>
        <th>prenom</th>
        <th>formation</th>
        <th>action</th>
    </thead>
    <tbody id='tbody'>
        <?php foreach($stagiaires as $stagiare) : ?>
            <tr class='tr'>
                <td class='idStagiaire'><?= $stagiare->id_stagiaire?></td>
                <td class='nom'><?= $stagiare->nom?></td>
                <td class='prenom'><?= $stagiare->prenom?></td>
                <td class='nomFormation'><?= $stagiare->nom_formation?></td>
                <td>
                    <a href="index.php?action=ajouter_note&id=<?= $stagiare->id_stagiaire?>&id_formation=<?=$stagiare->id_formation?>"class="ajouter-note" >ajouter la note</a>
                </td>
            </tr> 
            <?php endforeach ; ?>
    </tbody>
 </table>
 <?php 
$content = ob_get_clean() ; 
require_once("views/layout.php") ; 
?>