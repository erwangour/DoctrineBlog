<?php
require "bootstrap.php";

if (isset($_POST["envoie_connexion"])) {
    if (!empty($_POST['login']) AND !empty($_POST['mdp'])) {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $req = $entityManager->getRepository('Utilisateur');
        $utilisateur = $req->findOneBy(array('login' => $login));

        if (isset($utilisateur)) {

            if (password_verify($mdp, $utilisateur->getPasswd())) {
                session_start();
                $_SESSION['user'] = $utilisateur;
                header('location: index.php');
            } else {
                $err = "Le mot de passe est incorrecte";
            }
        }
        else {
            $err = "L'utilisateur n'existe pas";
        }
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

<h1 class="text-center my-5">Connexion</h1>

<div class="container">
    <div class="row">
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" class="form-control" name="login">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" name="mdp">
    </div>
    <button type="submit" class="btn btn-primary" name="envoie_connexion">Se connecter</button>
</form>
        <div class="col-5 mt-5 ml-3" style="color: red">
        <?php if (isset($err)){echo $err;}?>
        </div>
        </div>
</div>

</body>
</html>