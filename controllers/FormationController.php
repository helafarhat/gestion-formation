<?php
// controllers/FormationController.php
// Rôle : récupérer la liste des formations depuis le modèle
//        et passer les données à la vue formations.php

require_once 'models/Formation.php';

// Appel du modèle — aucune requête SQL ici
$formations = Formation::getAll();

// Passer à la vue
require 'views/formations.php';
?>
