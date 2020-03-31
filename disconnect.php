<?php
require "bootstrap.php";
session_start();


if (isset($_SESSION['user'])) {
    session_unset();
    session_destroy();

}
?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <h4 class="text-center my-5">Vous avez bien été déconnecté</h4>

    <div class="container">
        <a href="index.php">
            <button class="btn btn-primary">Retour</button>
        </a>
    </div>

</body>
</html>