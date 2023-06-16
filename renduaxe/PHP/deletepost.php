<?php

//liaison avec la base de données
require 'databasebbhub.php';

//préparation et éxécution d'une requête de suppression d'un élément de la table 'posts' correspondant au paramètre 'id'
$supp = $database->prepare("DELETE FROM posts WHERE id = :id");
$supp->execute(
    [
        "id" => $_POST['suppr']
    ]
    );

//redirection automatique vers la page 'index.php'
header("Location: ../index.php");