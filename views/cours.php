<?php
$pageTitle = 'Mes cours';
require 'views/partials/header.php';
?>

<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Bienvenue, <?= htmlspecialchars($prenom) ?> !</h1>
        <p class="page-hero-desc">
            Formation : <strong><?= htmlspecialchars($formation_titre) ?></strong>
        </p>
    </div>
</div>

<section class="formations-section">

    <span class="section-tag">Votre programme</span>
    <h2 class="section-title">Chapitres disponibles</h2>
    <p class="section-sub">Suivez les chapitres dans l'ordre pour une progression optimale.</p>

    <div class="cours-list">
        <?php foreach ($chapitres as $ch): ?>
            <div class="cours-item">
                <div class="cours-num"><?= $ch['num'] ?></div>
                <div class="cours-info">
                    <h3><?= htmlspecialchars($ch['titre']) ?></h3>
                    <span>⏱ <?= htmlspecialchars($ch['duree']) ?></span>
                </div>
                <button class="btn btn-sm">▶ Commencer</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="home-all-btn" style="margin-top: 32px;">
        <a href="index.php" class="btn-outline">← Retour à l'accueil</a>
    </div>

</section>

<?php require 'views/partials/footer.php'; ?>
