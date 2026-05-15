<?php
// index.php — Routeur central (point d'entrée UNIQUE)
// Toutes les URLs passent par ce fichier via le paramètre GET 'page'.

session_start();

// Lire le paramètre ?page= dans l'URL (défaut : 'home')
$page = $_GET['page'] ?? 'home';

// ── PROTECTION SESSION ──────────────────────────────────────────────
// La page 'cours' n'est accessible QUE si le paiement a été validé.
if ($page === 'cours') {
    if (!isset($_SESSION['paiement_ok']) || $_SESSION['paiement_ok'] !== true) {
        header('Location: index.php');
        exit();
    }
}

// ── ROUTAGE ─────────────────────────────────────────────────────────
switch ($page) {

    case 'formations':
        require 'controllers/FormationController.php';
        break;

    case 'inscription':
        require 'controllers/InscriptionController.php';
        break;

    case 'paiement':
        require 'controllers/PaiementController.php';
        break;

    case 'cours':
        require 'controllers/CoursController.php';
        break;

    case 'succes':
        require 'views/succes.php';
        break;

    default:
        // Toute URL inconnue affiche la page d'accueil
        require 'views/home.php';
        break;
}
?>
