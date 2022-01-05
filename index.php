<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/module.css">
    <title>Module de connexion</title>
</head>

<body>
<header>
    <div class="hautdepage">
        <nav class="navbar">
            <div class="picture" >
                <img src="images/3505254.png">
            </div>

            <h1>Accueil</h1>

            <div class="titre">
                <ul class="menu">
                    <?php
//                  SI UNE SESSION ACTIVE EST IDENTIFIER
                    if(isset($_SESSION['login']))
                    {
                    ?>
<!--                    ALORS ON AFFICHE -->
                    <h2><?php echo $_SESSION['login']. "Vous êtes connecter"?></h2>

                    <button class="btn1"><a href="deconnexion.php">Se déconnecter</a></button>
                    <button><a href="profil.php" class="button">Editer Profil</a>

                        <?php
                        }else{
                        ?>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="index.php">Acceuil</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="conect">


    <section class="liens">
        <h3><a href="https://github.com/adel-zammit/moduleconnexion">LIEN GITHUB</a></h3>
    </section>
    <?php
    }
    ?>
</div>

<footer class="site-footer">
    <div class="copyright">
        ....
    </div>
</footer>
</body>
</html>