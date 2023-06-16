<?php

// liaison site avec base de données

require "PHP/databasebbhub.php";

// Préparation de la requête pour récupérer tous les posts, triés par date décroissante
$requete = $database->prepare("SELECT * FROM posts ORDER BY date DESC");

//Préparation de la requête pour récupérer tous les utilisateurs
$requete_user=$database->prepare("SELECT * FROM users");

//Exécution de la requête pour récupérer les posts
$requete->execute();


// Exécution de la requête pour récupérer les utilisateurs
$requete_user->execute();

// Récupération de tous les utilisateurs dans un tableau associatif
$allusers= $requete_user->fetchAll(PDO::FETCH_ASSOC);

// Récupération de tous les posts dans un tableau associatif
$allposts = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlablaHub</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>BlablaHub</h1>
          <div class="button-container">
            <button class="login-button">Connexion</button>
            <button class="signup-button">Inscription</button>
          </div>
    </header>

    <main>

      <button class="side-button">Menu</button>
      <div class="side-menu">
          <button class="side-reduce">Réduire</button>   
          <a href="#">Accueil</a>
          <a href="#">Profil</a>
          <a href="#">Notifications</a>
          <a href="#">Tendances</a>
          <a href="#">Paramètres</a>
      </div>

      <div class="container">
        <ul class="menu">
          <li><a href="#"><span>Accueil</span></a></li>
          <li><a href="#"><span>Profil</span></a></li>
          <li><a href="#"><span>Notifications</span></a></li>
          <li><a href="#"><span>Tendances</span></a></li>
          <li><a href="#"><span>Paramètres</span></a></li>
        </ul>
      </div>
      
      <section id="feed">
          
      <div class="message">
        <ul>

        <!-- Parcourir l'ensemble des posts de la base de données pour les afficher sur le site -->
        <?php foreach ($allposts as $post) { ?>
       
        <!--  A ENLEVER-->
        <!-- $randUser. ligne 124 -->
        <?php
        // Détermination de la classe de couleur en fonction du tag du post
        $colorClass = '';
        $colorClass = '';
        switch ($post['tag']) {
          case 'Actualités':
            $colorClass = 'bleu';
            break;
          case 'Inspiration':
            $colorClass = 'jaune';
            break;
          case 'Technologie':
            $colorClass = 'gris';
            break;
          case 'Cuisine':
            $colorClass = 'rouge';
            break;
          case 'Art':
            $colorClass = 'violet';
            break;
          case 'Voyage':
            $colorClass = 'vert';
            break;
          case 'Mode':
            $colorClass = 'rose';
            break;
          case 'Sport':
            $colorClass = 'orange';
            break;
          case 'Humour':
            $colorClass = 'bleuclair';
            break;
          case 'Santé':
            $colorClass = 'vertclair';
            break;
          default:
            break;
        }
        ?>
      <div class="post">
        <div class="flex-container">
          <div class="flex2">
            <img src="Images/user.png">
          <p class="content <?= $colorClass ?>"> <?=$post['user']."     ".$post['date']?> <br> <?=$post['contenu']?> <br><?="#".$post['tag']?> </p>
          </div>
          <div class="trash">
            <form action="PHP/deletepost.php" method="POST" onsubmit="return confirmDelete();">
              <input type="hidden" name="suppr" value="<?= $post['id']?>">
              <button class="btnsuppr" type="submit">
              <img src="Images/trashcan.png" alt="btn_suppr">
              </button>
            </form>
          </div>
        </div>
        <?php } ?>
      </div>


        
      </section>
      <div class="newPost">
      <img src="Images/new_pub.png"alt="new_pub" class="imgnew">
      </div>
    <div class="popup_container">
        <section class="popup">
          <button class="reduce">Réduire</button>
          <h1>Création d'un nouveau post</h1>
          
          <form action="PHP/insertpublication.php" method="POST">
            <!-- Champ de saisie pour le contenu du post -->
            <input type="text" name="sujet" placeholder="Ecrivez votre réaction" required>
            <br>
            <label for="liste-elem">Sélectionnez un tag: </label>
            <!-- Menu déroulant pour sélectionner un tag -->
            <select id="liste-elements" name="element">
              <option value="Actualités">Actualités</option>
              <option value="Inspiration">Inspiration</option>
              <option value="Technologie">Technologie</option>
              <option value="Cuisine">Cuisine</option>
              <option value="Art">Art</option>
              <option value="Voyage">Voyage</option>
              <option value="Mode">Mode</option>
              <option value="Sport">Sport</option>
              <option value="Humour">Humour</option>
              <option value="Santé">Santé</option>
              
            </select>
            <br>
            <!-- Bouton pour publier le post -->
            <button class="btnpublish"type="submit">Publier</button>
          </form>

        </section>
    </div>

    </section>

    </main>
    
    <footer>
      <div class="footer-content">
        <p>BlablaHub &copy; 2023 - Tous droits réservés</p>
          <ul class="footer-links">
            <li><a href="#">Conditions d'utilisation</a></li>
            <li><a href="#">Politique de confidentialité</a></li>
            <li><a href="#">Politique relative aux cookies</a></li>
            <li><a href="#">Accessibilité</a></li>
            <li><a href="#">Informations sur les publicités</a></li>
          </ul>
      </div>
    </footer>

    <script src="script.js"></script>
   </body>
</html>