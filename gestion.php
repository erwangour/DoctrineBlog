<?php
require "bootstrap.php";

session_start();
$req = $entityManager->getRepository('Utilisateur');
$users = $req->findAll();
?>


<html>
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="js/code.js"></script>
</head>
<body>
<div class="container">
    <div class="row">

        <h4 class="my-5" >Voici la liste des utilisateurs : </h4>
<div class="list-group col-10">
<?php foreach ($users as $val) {

    if ($val->getId() != 1) {

        echo "
  <div class=\" list-group-item list-group-item-action\">
  <h3><strong>{$val->getLogin()}</strong></h3>
  <form action='deleteuser.php' method='post'>
    <input style='display: none' name='user' type='text' value='{$val->getId()}'>
  <button type='submit' class='btn btn-danger'style='position: relative; float: right; margin-top: -37px'>Supprimer</button>
  </form>
  </div>

";
    }
}

?>
</div>
</div>
    <div class="row">
        <div class="mt-5 col-2">
            <a href="index.php">
                <button class="btn btn-warning">Retour</button>
            </a>
        </div>
</div>
</body>
</html>