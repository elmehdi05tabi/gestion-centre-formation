<?php 
$id = $_GET["id"] ; 
?>
<!-- la confermation pour suprimer un stagiaire -->
<script>
    let valider = confirm("Voulez-Vous Suprimez Cette Stagiares") ; 
    if(valider) {
        window.location.href = "index.php?action=destroy&id=<?=$id?>" ; 
    }else{
        window.location.href= "index.php?action=liste"
    }
</script>