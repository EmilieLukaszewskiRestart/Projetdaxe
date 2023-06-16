<?php

require 'PHP/databasebbhub.php';
$nom = $database->prepare("SELECT id, contenu, tag, date FROM posts ORDER BY id DESC LIMIT 10");
$nom->execute();
$resultat = $nom->fetch(PDO::FETCH_ASSOC);

echo json_encode($resultat);
?>
