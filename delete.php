<?php
require "bootstrap.php";

$select = $_GET['id_billet'];

$req = $entityManager->getRepository('Billets');
$billet= $req->find($select);

$req2 = $entityManager->getRepository("Commentaires");
$resultat = $req2->findAll($billet);

foreach ($resultat as $key) {
    if ($key->getBillet()->getId() == $select) {

        $req3 = $entityManager->getRepository("Commentaires");
        $delete = $req3->find($key->getId());

        $entityManager->remove($delete);
    }
    }

$entityManager->remove($billet);
$entityManager->flush();
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<h5 class="my-5 text-center"> Votre billet et tous ses commentaires associés ont bien été supprimé </h5>

<div class="container">
<a href="index.php">
    <button class="btn btn-primary">Retour</button>
</a>
</div>
</body>

</html>
