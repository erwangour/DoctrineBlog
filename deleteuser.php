<?php
require "bootstrap.php";
session_start();
$req = $entityManager->getRepository('Utilisateur');
$user = $req->find($_POST['user']);

$req2 = $entityManager->getRepository('Commentaires');
$comment = $req2->findAll();

foreach ($comment as $key){
    if ($key->getProprietaire() === $user){
        $entityManager->remove($key);
    }
}
$entityManager->remove($user);
$entityManager->flush();
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<h5 class="my-5 text-center"> L'utilisateur et ses commentaires ont bien été supprimés</h5>

<div class="container">
    <a href="gestion.php">
        <button class="btn btn-primary">Retour</button>
    </a>
</div>
</body>

</html>
