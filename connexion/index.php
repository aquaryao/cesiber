<?php require('../php/connexionAction.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CesEAT</title>
    <link rel="stylesheet" href="../connexion.css">
    <link rel="stylesheet" href="../commun.css">
</head>
<body>

    <header>
        <div class="menu_logo">
            <img src="../img/oceseat-header.png" alt="">
        </div>
        <div class="menu_camember">
            <img src="../img/menu_burger.svg" alt="">
        </div>
    </header>
  
    <main>

        <div id="container_formulaire_inscription">
        

            <h2 id="inscription_titre">Connexion</h2>

            <form class="container" method="POST" id="formulaire_inscription">

                <?php if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>';}?>


                <div class="mb-3">
                    <input class="formulaire_inscription_input" placeholder="Téléphone" type="text" name="telephone">
                </div>

                <div class="mb-3">
                    <input class="formulaire_inscription_input" placeholder="Email" type="text" name="email">
                </div>

                <div class="mb-3">
                    <input class="formulaire_inscription_input" placeholder="Mot de passe" type="password" name="motDePasse">
                </div>


                <br><br>

                <button type="submit">Vous n'êtes pas encore inscrit ? S'inscrivez vous gratuitement</button>

                <button type="submit" name="validate">Connexion</button>
                <br><br>
            </form>

        </div>

    </main>
    
</body>
</html>