<?php
require "bootstrap.php";
session_start();

$req = $entityManager->getRepository('Billets');
$billets = $req->findAll();
?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background-color: #e9ecef">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Blog Doctrine</h1>
        <p class="lead">Voici un blog réaliser avec Doctrine.</p>
    </div>
</div>

<div class="container mb-5">
    <?php if (isset($_SESSION['user'])){
        echo "<h5>Bonjour {$_SESSION['user']->getLogin()}</h5>";

        if ($_SESSION['user']->getId() == 1) {
            $admin = true;
        }
        else {
            $admin = false;
        }
    } ?>
<div class="row">
    <?php
    if (isset($admin)) {
        if ($admin === true) {
            echo "<div class=\"col-2\"><a href=\"admin.php\"><button type=\"button\" class=\"btn btn-success\">Nouveau billet</button></a></div>";
        }
    }
    ?>
    <div class="mb-5 mr-n5 offset-6 col-2"><?php

        if (isset($_SESSION['user'])){
            echo "<a href=\"disconnect.php\"><button type=\"button\" class=\"btn btn-warning\">Déconnexion</button></a>";
        }
        else {
            echo "<a href=\"connect.php\"><button type=\"button\" class=\"btn btn-secondary\">Connexion</button></a>";
        }
        ?>
    </div>
    <?php

    if(isset($_SESSION['user'])){

        if ($admin === true ){
            echo " <div class=\"mb-5 ml-n3 col-2\">
        <a href=\"gestion.php\">
            <button type=\"button\" class=\"btn btn-secondary\">Gestion</button>
        </a>
    </div>";
        }

    }
    else {
        echo " <div class=\"mb-5 ml-n3 col-2\">
        <a href=\"inscription.php\">
            <button type=\"button\" class=\"btn btn-secondary\">Inscription</button>
        </a>
    </div>";
    }

    ?>
    <?php
    foreach ($billets as $val) {

        if (isset($admin)) {
            if ($admin === true) {
                echo " <div class=\"col-sm-6\">
        <div class=\"card\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">{$val->getTitre()}</h5>
                <p class=\"card-text\">{$val->getTexte()}</p>
                <div style='display: flex;justify-content: space-around;'>
                 <form action='content.php' method='get'>
                     <input style='display:none' name='id_billet' type='text' value='{$val->getId()}'>
                     <input type='submit' class=\"btn btn-primary\" name='' value='Voir le contenu'>
                 </form>    
                 <form action='modif.php' method='get'>
                     <input style='display:none' name='id_billet' type='text' value='{$val->getId()}'>
                     <input type='submit' class=\"btn btn-dark\" name='' value='Modifier billet'>
                 </form>
                 <form action='delete.php' method='get'>
                    <input style='display:none' name='id_billet' type='text' value='{$val->getId()}'>
                    <input type='submit' class=\"btn btn-danger\" name='' value='Supprimer billet'>
                 </form>
                </div>
            </div>
        </div>
       </div>";
            }
            else {
                echo " <div class=\"col-sm-6\">
        <div class=\"card\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">{$val->getTitre()}</h5>
                <p class=\"card-text\">{$val->getTexte()}</p>
                <form action='content.php' method='get'>
                <input style='display:none' name='id_billet' type='text' value='{$val->getId()}'>
                <input type='submit' class=\"btn btn-primary\" name='' value='Voir le contenu'>
                </form>
            </div>
        </div>
    </div>";
            }
        } else {
            echo " <div class=\"col-sm-6\">
        <div class=\"card\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">{$val->getTitre()}</h5>
                <p class=\"card-text\">{$val->getTexte()}</p>
                <form action='content.php' method='get'>
                <input style='display:none' name='id_billet' type='text' value='{$val->getId()}'>
                <input type='submit' class=\"btn btn-primary\" name='' value='Voir le contenu'>
                </form>
            </div>
        </div>
    </div>";
        }
    }
    ?>
    </div>
</div>

</body>
</html>