<?php
require "bootstrap.php";


$req = $entityManager->getRepository('Utilisateur');
$utilisateur = $req->find(1);
var_dump($utilisateur);

$req2 = $entityManager->getRepository('Billets');
$billet = $req2->find(7);
var_dump($billet);



$commentaire = "voici le 1er commentaire";

$comment = new Commentaires();
$comment->setProprietaire($utilisateur);
$comment->setBillet($billet);
$comment->setContent($commentaire);

$entityManager->persist($comment);
$entityManager->flush();

/*
$req = $entityManager->getRepository('Utilisateur');
$utilisateur = $req->find(1);

var_dump($utilisateur);

$titleBillet = "Mon 1er billet";
$textBillet = "Mon 1er contenu de billet";


$billet = new Billets();
$billet->setProprietaire($utilisateur);
$billet->setTitre($titleBillet);
$billet->setTexte($textBillet);

$entityManager->persist($billet);
$entityManager->flush();

$titleBillet2 = "Mon 2ème billet";
$textBillet2 = "Mon 2ème contenu de billet";


$billet2 = new Billets();
$billet2->setProprietaire($utilisateur);
$billet2->setTitre($titleBillet2);
$billet2->setTexte($textBillet2);

$entityManager->persist($billet2);
$entityManager->flush();

var_dump($billet);
var_dump($billet2);

*/