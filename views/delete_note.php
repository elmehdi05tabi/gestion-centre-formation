<?php 
$id = $_GET["id"] ; 
?>
<!-- la confermation pour suprimer de la note  -->
<script>
    let valider = confirm("Voulez-Vous Suprimez la note de evaluation ") ; 
    if(valider) {
        window.location.href = "index.php?action=destroy_note&id=<?=$id?>" ; 
    }else{
        window.location.href= "index.php?action=evaluation"
    }
</script>