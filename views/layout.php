<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="views/style/style.css">
</head>
<body>
    <div class="container">
    <?php 
    require_once("nav.php") ; 
    ?>
        <h1 class="titre"><?= $title ;?></h1>
        <?= $content ; ?>
    </div>
    <script src="views/js/script.js"></script>
</body>
</html>