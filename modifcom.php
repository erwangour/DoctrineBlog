<?php
require "bootstrap.php";
session_start();
$req = $entityManager->getRepository('Commentaires');
$com = $req->find($_POST['commentaire']);

if (isset($_POST['envoie'])){
    if (!empty($_POST['content'])) {

        $com->setContent($_POST['content']);
        $entityManager->persist($com);
        $entityManager->flush();

        header("location: content.php?id_billet={$_POST['billet']}");
    }
    else {
        echo "Veuillez complété tous les champs";
    }
}
?>


    <html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
if (isset($_SESSION['user'])){
    if($_SESSION['user']->getId() === $com->getProprietaire()->getId()){

        echo "<h1 class=\"text-center my-5\">Modifier le billet</h1>

<div class=\"container\">
    <form action='' method='post'>
    <div class=\"form-group\">
        <label for=\"exampleFormControlTextarea1\">Contenu</label>
        <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\" name='content'>{$com->getContent()}</textarea>
    </div>
    <input type='text' value=\"{$com->getBillet()->getId()}\" name='billet' style='display:none'>
    <input type='text' value=\"{$com->getId()}\" name='commentaire' style='display:none'>
    <button type=\"submit\" class=\"btn btn-primary\" name=\"envoie\">Envoyer</button>
</form>
</div>";

    }
    else {echo "<h1 class='tex-center'>Vous n'êtes pas le propriétaire du billet</h1>";}
}
else {echo "<h1 class='tex-center'>Qui êtes-vous ? </h1>";}
?>

</body>
    </html>
