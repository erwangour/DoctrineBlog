<?php
require "bootstrap.php";
session_start();


$select = $_GET['id_billet'];
$req = $entityManager->getRepository('Billets');
$billet = $req->find($select);

$req2 = $entityManager->getRepository("Commentaires");
$resultat = $req2->findBy(array('billet'=>$billet));

?>
<html>
<head>
<script src="js/jquery.js"></script>
   <script src="js/code.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h5 class="text-center my-5"><?php echo $billet->getTexte(); ?></h5>
<div class="list-group">
    <?php
    foreach ($resultat as $key) {
            echo "<div class=\"list-group-item list-group-item-action\">
        <div class=\"d-flex w-100 justify-content-between\">
                <small>Par : {$key->getProprietaire()->getLogin()}</small>
        </div>
        <p class=\"mb-1\">{$key->getContent()}</p>
   ";
         if (isset($_SESSION['user'])) {
             if ($_SESSION['user']->getId() === 1) {
                 echo " 
 <form class='mt-n4' action='deletecom.php' style='float: right'  method='post'>
    <input style='display: none' name='com' type='text' value='{$key->getId()}'>
   
 <button type='submit' class='btn btn-danger'>Supprimer</button>
 </form>";
             }

             if($key->getProprietaire()->getId() === $_SESSION['user']->getId()) {
                 echo " 
 <form class='mt-n4 pr-3' action='modifcom.php' style='float: right' method='post'>
    <input style='display: none' name='commentaire' type='text' value='{$key->getId()}'>
 <button type='submit' class='btn btn-warning'>Modifier</button>
 </form>";
             }

         }
         echo "</div>";
    }
?>
</div>
    <div class="row">
    <div class="mt-5 col-2">
        <a href="index.php">
            <button class="btn btn-warning">Retour</button>
        </a>
    </div>
    <div class="mt-5 offset-7 col-2">
        <form action="reponse.php" method="post">
            <input style="display: none" type="text" name="billet" value="<?php echo $select; ?>">
            <button type="submit" class="btn btn-info">Répondre</button>
        </form>
    </div>
    </div>
</div>

</body>
</html>
