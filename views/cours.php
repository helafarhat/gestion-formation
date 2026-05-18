<?php
$pageTitle = 'Mes cours';
require 'views/partials/header.php';
?>

<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Bienvenue, <?= htmlspecialchars($prenom) ?> ! 👋</h1>
        <p class="page-hero-desc">Formation : <strong><?= htmlspecialchars($formation_titre) ?></strong></p>
    </div>
</div>

<div class="cours-layout">

    <!-- SIDEBAR CHAPITRES -->
    <aside class="cours-sidebar">
        <div class="cours-sidebar-header">
            <span class="section-tag" style="margin-bottom:4px">Votre programme</span>
            <h3>Chapitres</h3>
        </div>
        <ul class="cours-chapters-list">
            <?php foreach ($chapitres as $ch): ?>
                <li>
                    <a href="index.php?page=cours&chapitre=<?= $ch['num'] ?>"
                       class="cours-chapter-link <?= $ch['num'] === $chapitre_actif ? 'active' : '' ?>">
                        <div class="cours-num"><?= $ch['num'] ?></div>
                        <div class="cours-chapter-info">
                            <span class="cours-chapter-title"><?= htmlspecialchars($ch['titre']) ?></span>
                            <span class="cours-chapter-dur">⏱ <?= htmlspecialchars($ch['duree']) ?></span>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="cours-main">

        <!-- TITRE DU CHAPITRE -->
        <div class="cours-chapter-header">
            <span class="cours-chapter-num-label">Chapitre <?= $ch_courant['num'] ?> / <?= count($chapitres) ?></span>
            <h2><?= htmlspecialchars($ch_courant['titre']) ?></h2>
            <span class="cours-chapter-duration">⏱ <?= htmlspecialchars($ch_courant['duree']) ?></span>
        </div>

        <!-- VIDEO -->
        <div class="cours-video-wrap">
            <iframe
                src="<?= htmlspecialchars($ch_courant['video']) ?>"
                title="<?= htmlspecialchars($ch_courant['titre']) ?>"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>

        <!-- PDF -->
        <div class="cours-resources">
            <h3>📄 Ressources du chapitre</h3>
            <a href="<?= htmlspecialchars($ch_courant['pdf']) ?>" target="_blank" class="cours-pdf-btn">
                <span class="pdf-icon">📥</span>
                Télécharger le cours PDF — Chapitre <?= $ch_courant['num'] ?>
            </a>
        </div>

        <!-- NAVIGATION ENTRE CHAPITRES -->
        <div class="cours-nav-btns">
            <?php if ($chapitre_actif > 1): ?>
                <a href="index.php?page=cours&chapitre=<?= $chapitre_actif - 1 ?>" class="btn-outline">
                    ← Chapitre précédent
                </a>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if ($chapitre_actif < count($chapitres)): ?>
                <a href="index.php?page=cours&chapitre=<?= $chapitre_actif + 1 ?>" class="btn">
                    Chapitre suivant →
                </a>
            <?php else: ?>
                <a href="index.php" class="btn" style="background:var(--green)">
                    ✔ Formation terminée — Retour à l'accueil
                </a>
            <?php endif; ?>
        </div>

    </main>

</div>

<style>
/* Layout cours */
.cours-layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 32px;
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 32px;
    align-items: start;
}

/* Sidebar */
.cours-sidebar {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    position: sticky;
    top: 80px;
}

.cours-sidebar-header {
    padding: 18px 20px 12px;
    border-bottom: 1px solid var(--border);
    background: var(--purple-ghost);
}

.cours-sidebar-header h3 {
    font-family: 'DM Serif Display', serif;
    font-size: 1.1rem;
    font-weight: 400;
    color: var(--ink);
}

.cours-chapters-list { padding: 8px 0; }

.cours-chapter-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    transition: background 0.15s;
    border-left: 3px solid transparent;
}

.cours-chapter-link:hover { background: var(--purple-ghost); }

.cours-chapter-link.active {
    background: var(--purple-pale);
    border-left-color: var(--purple-main);
}

.cours-chapter-link.active .cours-num {
    background: var(--purple-main);
    color: white;
}

.cours-chapter-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.cours-chapter-title {
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    line-height: 1.4;
}

.cours-chapter-dur {
    font-size: 11px;
    color: var(--muted);
}

/* Main content */
.cours-main { display: flex; flex-direction: column; gap: 24px; }

.cours-chapter-header {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 20px 24px;
}

.cours-chapter-num-label {
    font-size: 11px;
    font-weight: 600;
    color: var(--purple-main);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    display: block;
    margin-bottom: 6px;
}

.cours-chapter-header h2 {
    font-family: 'DM Serif Display', serif;
    font-size: 1.5rem;
    font-weight: 400;
    color: var(--ink);
    margin-bottom: 6px;
}

.cours-chapter-duration {
    font-size: 13px;
    color: var(--muted);
}

/* Video */
.cours-video-wrap {
    background: #000;
    border-radius: var(--radius-lg);
    overflow: hidden;
    aspect-ratio: 16 / 9;
    width: 100%;
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
}

.cours-video-wrap iframe {
    width: 100%;
    height: 100%;
    display: block;
}

/* Resources */
.cours-resources {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 20px 24px;
}

.cours-resources h3 {
    font-size: 15px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 14px;
}

.cours-pdf-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    background: var(--purple-ghost);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 14px 18px;
    font-size: 14px;
    font-weight: 500;
    color: var(--purple-main);
    transition: background 0.15s, border-color 0.15s;
}

.cours-pdf-btn:hover {
    background: var(--purple-pale);
    border-color: var(--purple-light);
}

.pdf-icon { font-size: 20px; }

/* Navigation */
.cours-nav-btns {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding-top: 8px;
}

.cours-nav-btns .btn,
.cours-nav-btns .btn-outline {
    width: auto;
    padding: 11px 24px;
}
</style>

<?php require 'views/partials/footer.php'; ?>
