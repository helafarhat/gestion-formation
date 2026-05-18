<?php
$pageTitle = htmlspecialchars($formation['titre']);
require 'views/partials/header.php';

$niveau = $formation['niveau'] ?? '';
$niveauClass = $niveau === 'Avancé' ? 'avance' : ($niveau === 'Débutant' ? 'debutant' : '');
?>

<div class="page-hero">
    <div class="page-hero-inner">
        <p class="breadcrumb">
            <a href="index.php">Accueil</a> ›
            <a href="index.php?page=formations">Formations</a> ›
            <?= htmlspecialchars($formation['titre']) ?>
        </p>

        <div class="detail-hero-title">
            <div class="card-icon-wrap <?= $icon['class'] ?> icon-hero">
                <?= $icon['svg'] ?>
            </div>
            <h1><?= htmlspecialchars($formation['titre']) ?></h1>
        </div>

        <p class="page-hero-desc"><?= htmlspecialchars($formation['description'] ?? '') ?></p>
        <div class="meta-tags">
            <span class="meta-tag">⏱ <?= htmlspecialchars($formation['duree'] ?? '') ?></span>
            <span class="meta-tag">🎓 <?= htmlspecialchars($niveau) ?></span>
            <span class="meta-tag">💰 <?= number_format($formation['prix'], 2) ?> DT</span>
            <span class="meta-tag">📜 Certificat inclus</span>
        </div>
    </div>
</div>

<div class="detail-layout">

    <div class="detail-main">

        <!-- OBJECTIFS -->
        <?php if (!empty($objectifs)): ?>
        <section>
            <h2>Objectifs de la formation</h2>
            <ul class="objectives">
                <?php foreach ($objectifs as $obj): ?>
                    <li><?= htmlspecialchars($obj) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php endif; ?>

        <!-- MODULES -->
        <?php if (!empty($modules)): ?>
        <section>
            <h2>Programme — Modules</h2>
            <table class="modules-table">
                <thead>
                    <tr>
                        <th>Module</th>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Durée</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modules as $m): ?>
                        <tr>
                            <td><?= htmlspecialchars($m['num']) ?></td>
                            <td><?= htmlspecialchars($m['titre']) ?></td>
                            <td style="color:var(--muted); font-size:13px"><?= htmlspecialchars($m['contenu']) ?></td>
                            <td><?= htmlspecialchars($m['duree']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <?php endif; ?>

        <!-- PREREQUIS -->
        <section>
            <h2>Prérequis</h2>
            <p>
                <?php
                $prerequis = [
                    1 => 'Des notions de base en Python sont recommandées. Des connaissances en mathématiques de niveau lycée suffisent. Aucune expérience en IA n\'est requise.',
                    2 => 'Aucune expérience en data science n\'est requise. Une curiosité pour les données et des bases en mathématiques de lycée sont suffisantes.',
                    3 => 'Une bonne maîtrise des systèmes Linux et Windows est indispensable. Des connaissances en réseaux (TCP/IP, OSI) sont fortement recommandées.',
                    4 => 'Des bases en administration système et en réseaux sont nécessaires. Une expérience avec Linux est un plus.',
                    5 => 'Aucun prérequis technique. Motivation et régularité suffisent pour démarrer cette formation complète.',
                    6 => 'Des bases en programmation sont recommandées. La formation part des fondamentaux du développement mobile.',
                ];
                echo htmlspecialchars($prerequis[$formation['id']] ?? 'Aucun prérequis particulier.');
                ?>
            </p>
        </section>

    </div>

    <!-- SIDEBAR -->
    <aside class="detail-sidebar">

        <div class="info-card">
            <h3>Informations pratiques</h3>
            <div class="info-row"><span>Durée</span><span><?= htmlspecialchars($formation['duree'] ?? '') ?></span></div>
            <div class="info-row"><span>Niveau</span><span><?= htmlspecialchars($niveau) ?></span></div>
            <div class="info-row"><span>Prix</span><span><?= number_format($formation['prix'], 2) ?> DT</span></div>
            <div class="info-row"><span>Certification</span><span>Certificat FormaPro</span></div>
            <div class="info-row"><span>Catégorie</span><span><?= htmlspecialchars($formation['categorie'] ?? '') ?></span></div>
        </div>

        <div class="enroll-card">
            <p>Rejoignez cette formation et obtenez votre certificat à la fin du parcours.</p>
            <a href="index.php?page=inscription&formation_id=<?= $formation['id'] ?>" class="btn-white">
                S'inscrire maintenant →
            </a>
        </div>

    </aside>

</div>

<style>
.detail-layout {
    max-width: 1100px;
    margin: 0 auto;
    padding: 52px 32px;
    display: grid;
    grid-template-columns: 1fr 290px;
    gap: 48px;
    align-items: start;
}

.detail-main section { margin-bottom: 40px; }

.detail-main h2 {
    font-family: 'DM Serif Display', serif;
    font-size: 1.3rem;
    font-weight: 400;
    color: var(--ink);
    margin-bottom: 18px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--purple-pale);
}

.objectives { list-style: none; display: flex; flex-direction: column; gap: 10px; }
.objectives li {
    font-size: 14px;
    color: var(--ink-2);
    padding-left: 22px;
    position: relative;
    line-height: 1.6;
}
.objectives li::before {
    content: '';
    position: absolute;
    left: 0; top: 8px;
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--purple-main);
}

/* Hero title with icon */
.detail-hero-title {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 14px;
}

.detail-hero-title h1 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(1.9rem, 3.5vw, 2.7rem);
    font-weight: 400;
    margin-bottom: 0;
    color: white;
}

.icon-hero {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    flex-shrink: 0;
    /* soften the colored bg so it reads well on the dark hero */
    opacity: 0.92;
}
</style>

<?php require 'views/partials/footer.php'; ?>