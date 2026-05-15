<?php
$pageTitle = 'Formations';
require 'views/partials/header.php';
?>

<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Nos Formations</h1>
        <p class="page-hero-desc">Choisissez la formation qui correspond à vos objectifs. Toutes nos formations sont certifiantes et encadrées par des experts.</p>
    </div>
</div>

<section class="formations-section">
    <span class="section-tag">Tous nos programmes</span>
    <h2 class="section-title">Formations disponibles</h2>
    <p class="section-sub"><?= count($formations) ?> formations disponibles — mises à jour régulièrement par nos experts.</p>

    <div class="cards-grid">
        <?php if (empty($formations)): ?>
            <p class="empty-msg">Aucune formation disponible pour le moment.</p>
        <?php else: ?>
            <?php foreach ($formations as $f): ?>
                <?php
                    // Emoji par défaut si la colonne n'existe pas en BD
                    $emoji = $f['emoji'] ?? '📚';

                    // Badge couleur selon le niveau
                    $niveauClass = '';
                    $niveau = $f['niveau'] ?? '';
                    if ($niveau === 'Avancé')       $niveauClass = 'avance';
                    elseif ($niveau === 'Débutant') $niveauClass = 'debutant';
                ?>
                <div class="card">
                    <div class="card-top">
                        <span class="card-icon"><?= htmlspecialchars($emoji) ?></span>
                        <span class="badge <?= $niveauClass ?>">
                            <?= htmlspecialchars($niveau) ?>
                        </span>
                    </div>
                    <h3><?= htmlspecialchars($f['titre']) ?></h3>
                    <p><?= htmlspecialchars($f['description'] ?? '') ?></p>
                    <ul>
                        <?php if (!empty($f['duree'])): ?>
                            <li>⏱ <?= htmlspecialchars($f['duree']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($f['categorie'])): ?>
                            <li>🏷 <?= htmlspecialchars($f['categorie']) ?></li>
                        <?php endif; ?>
                        <li>💰 <?= number_format($f['prix'], 2) ?> DT</li>
                        <li>📜 Certificat inclus</li>
                    </ul>
                    <div class="card-btns">
                        <a href="index.php?page=inscription&formation_id=<?= $f['id'] ?>" class="btn">
                            S'inscrire →
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>