<?php
//paramètres de connexion à la base de données
try { 
    $database = new PDO(
        "mysql:host=localhost;dbname=blablahub",
        "root",
        ""
    );

//code à exécuter en cas d'erreur
} catch(PDOException $error) {
    die("");
}