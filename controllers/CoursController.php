<?php
// controllers/CoursController.php
// Rôle : préparer les données des cours pour la vue
// Cette page est protégée — seul l'index.php vérifie la session avant d'arriver ici.

require_once 'models/Inscription.php';
require_once 'models/Formation.php';

// Récupérer les infos de l'inscription depuis la session
$inscription_id  = $_SESSION['inscription_id']  ?? 0;
$formation_titre = $_SESSION['formation_titre'] ?? 'Votre formation';
$prenom          = $_SESSION['etudiant_prenom'] ?? 'Étudiant';

// Récupérer les détails complets de l'inscription (avec JOIN formations)
$inscription = ($inscription_id > 0) ? Inscription::getById($inscription_id) : null;

// Chapitres fictifs — dans un projet complet, ces données viendraient d'une table BD
$chapitres = [
    ['num' => 1, 'titre' => 'Introduction et présentation du module',   'duree' => '45 min'],
    ['num' => 2, 'titre' => 'Concepts fondamentaux et théorie de base', 'duree' => '1h 20min'],
    ['num' => 3, 'titre' => 'Travaux pratiques — exercices guidés',      'duree' => '1h 30min'],
    ['num' => 4, 'titre' => 'Projet intermédiaire et correction',        'duree' => '2h'],
    ['num' => 5, 'titre' => 'Approfondissement et cas réels',            'duree' => '1h 15min'],
    ['num' => 6, 'titre' => 'Évaluation finale et certification',        'duree' => '1h'],
];

require 'views/cours.php';
?>
