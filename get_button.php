<?php

//liaison avec la base de données
require 'PHP/databasebbhub.php';


// Préparation de la requête d'insertion dans la table 'posts' à l'aide des valeurs contenu et tagtype
$insert = $database->prepare("INSERT INTO posts(contenu, tag) VALUES (:contenu, :tagtype)");

// Exécution de la requête d'insertion avec les valeurs fournies
$insert->execute(
    [
        "contenu" => 'Bonjour tout le monde',
        "tagtype" => 'Santé'
    ]
);

$nom = $database->prepare("SELECT id, contenu, tag, date FROM posts ORDER BY date DESC LIMIT 1");
$nom->execute();
$resultat = $nom->fetch(PDO::FETCH_ASSOC);

echo json_encode($resultat);

?>