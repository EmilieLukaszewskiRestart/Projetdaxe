<?php

//liaison avec la base de données
require 'databasebbhub.php';

//Préparation de la requête pour récupérer tous les utilisateurs
$requete_user = $database->prepare("SELECT * FROM users");
// Récupération de tous les utilisateurs dans un tableau associatif
$requete_user->execute();
$allusers = $requete_user->fetchAll(PDO::FETCH_ASSOC);
$randIndex = array_rand($allusers);
$randUser = $allusers[$randIndex]['pseudo'];

// Préparation de la requête d'insertion dans la table 'posts' à l'aide des valeurs contenu, tag et user
$insert = $database->prepare("INSERT INTO posts(contenu, tag, user) VALUES (:contenu, :tag, :user)");

// Exécution de la requête d'insertion avec les valeurs fournies
$insert->execute(
    [
        "contenu" => $_POST['sujet'],
        "tag" => $_POST['element'],
        "user" => $randUser
    ]
);

// Redirection automatique vers la page 'index.php'
header("Location: ../index.php");
