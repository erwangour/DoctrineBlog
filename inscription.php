<?php
require "bootstrap.php";

if (isset($_POST['inscription'])){
    if (!empty($_POST['login']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])){
        if ($_POST["mdp"] === $_POST["mdp2"]) {
            $login = $_POST['login'];
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

            $req = $entityManager->getRepository('Utilisateur');
            $userexist = $req->findOneBy(array("login" => $_POST['login']));

            if (isset($userexist)) {
                $err = "<p>Cette utilisateur existe déjà</p>";
            }
            else {
                $utilisateur = new Utilisateur();
                $utilisateur->setLogin($login);
                $utilisateur->setPasswd($mdp);

                $entityManager->persist($utilisateur);
                $entityManager->flush();

                $err = "<p>Votre compte à bien été crée, <a href='connect.php'> connectez vous ! </a></p> ";
            }
        }
        else {
            $err =  "Les mots de passe ne correspondent pas";
        }
}
    else{
        $err = "Veuillez complété tous les champs";
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

<h1 class="text-center my-5">Inscription</h1>

<div class="container">
    <div class="row">
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Login : </label>
        <input type="text" class="form-control" name="login">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe : </label>
        <input type="password" class="form-control" name="mdp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirmez le mot de passe : </label>
        <input type="password" class="form-control" name="mdp2">
    </div>
    <button type="submit" class="btn btn-primary" name="inscription">S'inscrire</button>
</form>
        <div class="col-5 mt-5 ml-3" >
            <?php if (isset($err)){echo $err;}?>
        </div>
        </div>
</div>

</body>
</html>