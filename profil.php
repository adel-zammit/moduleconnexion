<?php
session_start();

$login = $_SESSION['data'];
//var_dump($login);

if (isset($_POST['confirmer']))
{
    $newlogin = $_POST['newlogin'];
    $newprenom = $_POST['newprenom'];
    $newnom = $_POST['newnom'];
    $newpassword = $_POST['newpassword'];
    $newpassword2 = $_POST['newpassword2'];
    $id = $_SESSION['data']['id'];

    if (!empty($newlogin) && !empty($newprenom) && !empty($newnom) && !empty($newpassword) && !empty($newpassword2))
    {
        include "lien.php";

        if ($bdd == true)
        {
            $req = mysqli_query($bdd,"UPDATE utilisateurs SET login = '$newlogin', prenom = '$newprenom', nom = '$newnom', password = '$newpassword' WHERE id = $id");

            if ($req == true)
            {
                if($newpassword == $newpassword2)
                {
//// faire la vérification des mots de passe

                    $req2 = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = $id");
                    $result = mysqli_fetch_assoc($req2);

                    if ($result == true)
                    {
                        $_SESSION['data'] = $result;
                        header('location: index.php');

                        echo ('modification effectuées'); // ne s'affiche pas :/
                    }
                }

            }
            else
            {
                header("Location: index.php");
                echo ('Erreur : problème sur la requête');
            }
        }
        else
        {
            echo ('Erreur : problème de connexion à la base de données.');
        }
    }
}

?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/module.css">
        <link rel="stylesheet" href="CSS/profil.css">
        <title>Module de connexion</title>
    </head>
<body>
<header>
    <div class="hautdepage">
    <nav class="navbar"
    <div class="picture">
        <img src="images/3505254.png">
    </div>
    <h1>Profil de <?php echo $login['login'];?><span class="rose">.</span></h1>
    <div class="titre">
    <ul class="menu">
<?php
if(isset($_SESSION['data']))
{
    ?>
    <h2><?php echo "Vous êtes connecter"?></h2>
    <button class="droite"><a href="deconnexion.php">Se déconnecter</a></button>
    </ul>
    </div>
    </nav>
    </div>
    </header>
    <tbody>
    <section class="partitrois">
        <h4>
            Modification du Profil
        </h4>
    </section>
    <div class="profils">
        <form action="profil.php" method="post">
            <table>
                <tr>
                    <td align="right">
                        <label for="login">Login :</label>
                    </td>
                    <td>
                        <input type="text" name="newlogin"  value="<?php echo $login['login']?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="prenom">Prénom :</label>
                    </td>
                    <td>
                        <input type="text" name="newprenom"  value="<?php echo $login['prenom']?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="nom">Nom :</label>
                    </td>
                    <td>
                        <input type="text" name="newnom"  value="<?php echo $login['nom']?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="password">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" name="newpassword" placeholder="Confirmer mot de passe">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="password2">Confirmez :</label>
                    </td>
                    <td>
                        <input type="password" name="newpassword2" placeholder="Confirme le mot de passe">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <br/>
                        <input value="Confirmer" type="submit" name="confirmer">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <?php
}else{
    ?>
    <?php
    if(isset($erreur))
    {
        echo '<font color="red">'.$erreur. "</font>";
    }
    ?>

    <footer class="site-footer">

        <footer>

    </body>
    </html>
    <?php
}
?>