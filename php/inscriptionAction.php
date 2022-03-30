<!-- Le fichier s'appelle inscriptionAction
    car l'action du code PHP va être fait dedans
-->
<?php

session_start();
require('database.php');


//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tout les champs
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['motDePasse']) && !empty($_POST['motDePasseConfirmation'])){

        //Vérifier si l'user a bien mis 2 mots de passe pareils
        if($_POST['motDePasse'] === $_POST['motDePasseConfirmation']){


            //les données de l'user
            $user_nom = htmlspecialchars($_POST['nom']);
            $user_prenom = htmlspecialchars($_POST['prenom']);
            $user_email = htmlspecialchars($_POST['email']);
            $user_telephone = htmlspecialchars($_POST['telephone']);
            $user_motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);

            //vérifie si l'utilisateur existe déjà sur le site
            $checkIfUserAlreadyExists = $bdd->prepare('SELECT nom, FROM utilisateurs WHERE nom = ? ');
            $checkIfUserAlreadyExists->execute(array($user_nom));

            var_dump($checkIfUserAlreadyExists->fetch());


            if($checkIfUserAlreadyExists->rowCount() == 0){

                //insérer l'utilisateur dans la BDD
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, email, telephone, motDePasse) VALUES(?, ?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_nom, $user_prenom, $user_email, $user_telephone, $user_motDePasse));

                var_dump($insertUserOnWebsite->fetch());


                //récupérer les infos de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT id, nom, prenom, email, telephone, FROM utilisateurs WHERE nom = ? AND prenom = ? AND email = ? AND telephone = ?');
                $getInfosOfThisUserReq->execute(array($user_nom, $user_prenom, $user_email, $user_telephone));

                $userInfos = $getInfosOfThisUserReq->fetch();

                var_dump($userInfos);

                //Authentifier l'utilisateur sur le site et récup ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                // $_SESSION['id'] = $userInfos['id'];
                $_SESSION['nom'] = $userInfos['nom'];
                $_SESSION['prenom'] = $userInfos['prenom'];
                // $_SESSION['email'] = $userInfos['email'];
                // $_SESSION['telephone'] = $userInfos['telephone'];


                //rediriger l'utilisateur vers la page d'accueil
                header('Location: ../index.php');

            }else{
                $errorMsg = "Veillez mettre des mots de passes identiques";
            }

        }else{
            $errorMsg = "l'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}