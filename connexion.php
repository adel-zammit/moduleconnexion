<?php
session_start();

//on se connecte à la base de données:
include "src/src.php";
//var_dump($_SESSION);

if (isset($_POST['validerco'])) {
    $loginco = htmlspecialchars(trim($_POST['loginco']));
    $passwordco = htmlspecialchars(trim($_POST['passwordco']));

    if (!empty($loginco) && !empty($passwordco)) {
        $repLogin = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$loginco' AND password= '$passwordco'");

        $result = mysqli_fetch_assoc($repLogin);
        $repPassword = $result['password'];
        var_dump($result);
        if(count($result) !=0 )
        {
            if ($loginco == 'admin' && $passwordco == 'admin')
            {
                $_SESSION['data'] = $result;
                header("Location: admin.php");
            }
            else {
                $_SESSION['data'] = $result;
                header("Location: profil.php");
            }
        }
        else
        {
            $erreur = "Login ou password incorrect ou incomplet";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Module de connexion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/module.css">
    <link rel="stylesheet" href="CSS/connexion.css">
</head>
<body>
<header>
    <div class="hautdepage">
        <nav class="navbar">
            <div class="picture">
                <img src="images/3505254.png">
            </div>
            <h1>My Web Site<span class="rose">.</span></h1>
            <li><a href="index.php">Acceuil</a></li>
        </nav>
    </div>
</header>
<section class="partideux">
    <h4>
        Connexion
    </h4>
</section>

<div class="conect">
    <fieldset>


    <form action="connexion.php" method="post">
        <div class="formul">
            <table>
                <tbody >
                <tr>
                    <td>
                        <label for="login">Login :</label>
                    </td>
                    <td>
                        <input type="text" name="loginco" placeholder="Login" id="login">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" name="passwordco" placeholder="Mot de passe" id="password">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <br/>
                        <input value="Se connecter" type="submit" name="validerco">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
    </fieldset>
    <?php
    if (isset($erreur)) {
        echo '<font color="red">' . $erreur . "</font>";
    }
    ?>
</div>

<footer class="site-footer">

    <footer>
</body>
</html>