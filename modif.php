<?php
require "bootstrap.php";
session_start();
$req = $entityManager->getRepository('Billets');
$billet = $req->find($_GET['id_billet']);

if (isset($_POST['envoie'])){
if (!empty($_POST['titre']) AND !empty($_POST['content'])) {

    $billet->setTitre($_POST['titre']);
    $billet->setTexte($_POST['content']);
    $entityManager->persist($billet);
    $entityManager->flush();

    header("location: index.php");
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
if($_SESSION['user']->getId() === 1){

echo "<h1 class=\"text-center my-5\">Modifier le billet</h1>

<div class=\"container\">
    <form action='' method='post'>
    <div class=\"form-group offset-3 col-6\">
        <label for=\"exampleInputEmail1\">Titre du billet</label>
        <input type=\"text\" class=\"form-control\" name='titre' value='{$billet->getTitre()}'>
    </div>
    <div class=\"form-group\">
        <label for=\"exampleFormControlTextarea1\">Contenu</label>
        <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\" name='content'>{$billet->getTexte()}</textarea>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\" name=\"envoie\">Envoyer</button>
</form>
</div>";

}
else {echo "<h1 class='tex-center'>Vous n'êtes pas administrateur</h1>";}
}
?>

</body>
</html>