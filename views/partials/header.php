<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'FormaPro') ?> — FormaPro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="/Gestionformations/favicon.svg">
    <link rel="stylesheet" href="/Gestionformations/assets/style.css">
</head>
<body>

<nav>
    <div class="nav-container">
        <a href="index.php" class="logo-link">
            <!-- Logo SVG inline -->
            <svg width="34" height="34" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                <rect width="64" height="64" rx="12" fill="#2D1B69"/>
                <rect x="10" y="11" width="44" height="6" rx="3" fill="#A78BFA"/>
                <rect x="10" y="22" width="30" height="6" rx="3" fill="#7B5CE5"/>
                <rect x="10" y="36" width="18" height="18" rx="4" fill="#5B3FC4"/>
                <rect x="34" y="36" width="20" height="7" rx="3" fill="#7B5CE5"/>
                <rect x="34" y="47" width="14" height="7" rx="3" fill="#A78BFA"/>
            </svg>
            <span class="logo-text">Forma<span>Pro</span></span>
        </a>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?page=formations">Formations</a></li>
            <li><a href="index.php?page=inscription" class="btn-nav">S'inscrire</a></li>
        </ul>
    </div>
</nav>
