<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - CesEAT</title>
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="commun.css">
    
</head>
<body> 
    <header>
        <div class="menu_logo">
            <img src="img/oceseat-header.png" alt="">
        </div>
        <div class="menu_camember">
            <img src="img/menu_burger.svg" alt="">
        </div>
    </header>
  
    <main>
        <img id="logo_accueil" src="img/O'CESEAT.png">
        <div id="container_recherche">
            <input type="search" name="search" id="searchbar_accueil" placeholder="Votre recherche... (ex: kebab, fastfood...)" required>
            <input type="submit" id="submit" placeholder="oui">
        </div>

        <a href="php/logoutAction.php"> déconnexion </a> 

    </main>
</body>
</html>
