<?php
require "bootstrap.php";

$req2 = $entityManager->getRepository("Billets");
$msg = $req2->find();

var_dump($msg);
