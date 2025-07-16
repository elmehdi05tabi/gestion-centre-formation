<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/style/style.css">
</head>
<body>
    <header>
    <div class="logo" style='margin:auto'>
        <img src="views/logo.png" alt="">
    </div>
</header>
    <form action="index.php?action=check" method='POST' class='admin-form'>
        <label for="nom_admin">UserName :</label>
        <input type="text" name="username" id="username">
        <label for="password">mot de pass:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="valider">
    </form>
</body>
</html>