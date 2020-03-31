<?php
require "bootstrap.php";
session_start();
$req = $entityManager->getRepository('Commentaires');
$com = $req->find($_POST['com']);
$billet = $com->getBillet()->getId();
$entityManager->remove($com);
$entityManager->flush();
?>


<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<h5 class="my-5 text-center"> Le commentaire du billet a bien été supprimé</h5>

<div class="container">
    <a href="content.php?id_billet=<?php echo $billet?>">
        <button class="btn btn-primary">Retour</button>
    </a>
</div>
</body>

</html>

