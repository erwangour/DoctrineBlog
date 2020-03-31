<?php
require "bootstrap.php";

session_start();

$billet = $_POST['billet'];

if (isset($_POST['envoie'])) {
    if (!empty($_POST['content'])) {
        $reponse = $_POST['content'];
        $req = $entityManager->getRepository('Utilisateur');
        $utilisateur = $req->find($_SESSION['user']->getId());

        $req2 = $entityManager->getRepository('Billets');
        $billetselect = $req2->find($_POST['val']);

        $comment = new Commentaires();
        $comment->setProprietaire($utilisateur);
        $comment->setBillet($billetselect);
        $comment->setContent($reponse);
        $entityManager->persist($comment);
        $entityManager->flush();

    header("location: content.php?id_billet={$_POST['val']}");

    }
}
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

<?php

if (isset($_SESSION['user'])){
    echo "<h1 class=\"text-center my-5\">Votre réponse</h1>

<div class=\"container\">
    <form action='' method='post'>
    <div class=\"form-group\">
        <label for=\"exampleFormControlTextarea1\">Contenu</label>
        <textarea class=\"form-control\" rows=\"3\" name='content'></textarea>
    </div>
    <input style='display: none' type='texte' value='{$billet}' name='val'>
    <button type=\"submit\" class=\"btn btn-primary\" name=\"envoie\">Envoyer</button>
</form>
</div>";
}
else {
    echo "<h5 class='my-5 text-center'>Vous devez être connecté pour répondre</h5>
    <div class=\"container\">
    <div class='row'>
      <a class='mr-4' href=\"connect.php\">
            <button class=\"btn btn-primary\">Se connecter</button>
        </a>
        <a href=\"index.php\">
            <button class=\"btn btn-secondary\">Retour</button>
        </a>
    </div>
    </div>
";

}

?>

</body>
</html>