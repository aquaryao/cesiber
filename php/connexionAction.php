<!-- Le fichier s'appelle connexionAction
    car l'action du code PHP va être fait dedans
-->

<?php 
session_start();
require('database.php');


//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tout les champs
    if(!empty($_POST['telephone']) && !empty($_POST['email']) && !empty($_POST['motDePasse'])){

        //les données de l'user
        $user_telephone = htmlspecialchars($_POST['telephone']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_motDePasse = htmlspecialchars($_POST['motDePasse']);

        //Vérifier si l'utilisateur existe (si le pseudo est correct)
        $checkIfUserExist = $bdd->prepare('SELECT * FROM utilisateurs WHERE telephone = ?');
        $checkIfUserExist->execute(array($user_telephone));

        if($checkIfUserExist->rowCount() > 0){

            //récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExist->fetch();

            //vérifier si le mot de passe est correct
            if(password_verify($user_motDePasse, $usersInfos['motDePasse'])){

                //Authentifier l'utilisateur sur le site et récup ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                // $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['nom'] = $usersInfos['nom'];
                $_SESSION['prenom'] = $usersInfos['prenom'];

                //rediriger l'utilisateur vers la page d'accueil
                header('Location: ../index.php');

            }else{
                $errorMsg = "Votre mot de passe est incorrect...";
            }

        }else{
            $errorMsg = "Votre pseudo est incorrect...";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}