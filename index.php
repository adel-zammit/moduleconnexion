<?php
session_start();



if(isset($_SESSION['id'])){
var_dump($_SESSION['id']);

?>

<!DOCTYPE HTML>
<html>


<head>

</head>

<header>
    <button><a href="index.php">Accueil<a/></button>
    <button><a href="profil.php">Profil<a/></button>
    <button><a href="deco.php">Déconnexion<a/></button>

    <?php
    }else{

    ?>


    <button><a href="index.php">Accueil<a/></button>
    <button><a href="inscription.php">Inscription<a/></button>
    <button><a href="connexion.php">Connexion<a/></button>

<?php
    }


?>





<?php

if(isset($_SESSION["login"])){

$login = $_SESSION['login'];
if($login == 'admin' ){




    ?>

    <button><a href="admin.php"> Espace Admin.</a></button>

    <?php
}
}
    ?>



</header>
<body>

<main>

    <h1>Accueil</h1>
    Module de Connexion

</main>

<footer>
    Copyright all rights reserved.
</footer>
</body>
</html>
