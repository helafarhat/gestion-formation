<?php
$pageTitle = 'Formations';
require 'views/partials/header.php';

// Icônes SVG par formation ID
$icons = [
    1 => '<div class="card-icon-wrap icon-purple"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><circle cx="9" cy="10" r="1" fill="currentColor"/><circle cx="15" cy="10" r="1" fill="currentColor"/><path d="M9 13c1 1 5 1 6 0"/></svg></div>',
    2 => '<div class="card-icon-wrap icon-blue"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>',
    3 => '<div class="card-icon-wrap icon-orange"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>',
    4 => '<div class="card-icon-wrap icon-teal"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg></div>',
    5 => '<div class="card-icon-wrap icon-green"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg></div>',
    6 => '<div class="card-icon-wrap icon-pink"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div>',
];

$ratings = [
    1 => ['score' => '4.9', 'count' => '128'],
    2 => ['score' => '4.7', 'count' => '94'],
    3 => ['score' => '5.0', 'count' => '203'],
    4 => ['score' => '4.6', 'count' => '76'],
    5 => ['score' => '4.9', 'count' => '310'],
    6 => ['score' => '4.7', 'count' => '88'],
];

$tags = [
    1 => ['Python', 'TensorFlow', 'ML'],
    2 => ['Pandas', 'Power BI', 'SQL'],
    3 => ['Kali Linux', 'Pentest', 'SIEM'],
    4 => ['AWS', 'Docker', 'Kubernetes'],
    5 => ['React', 'Node.js', 'CSS'],
    6 => ['Flutter', 'React Native', 'UI/UX'],
];

$formats = [
    1 => 'Format hybride',
    2 => '100% en ligne',
    3 => 'Présentiel (labo)',
    4 => '100% en ligne',
    5 => 'Format hybride',
    6 => '100% en ligne',
];

$featured_id = 3;

function stars(float $score): string {
    $html = '<div class="stars">';
    for ($i = 1; $i <= 5; $i++) {
        if ($score >= $i) {
            $html .= '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
        } else {
            $html .= '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
        }
    }
    $html .= '</div>';
    return $html;
}
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
                    $id          = $f['id'];
                    $niveau      = $f['niveau'] ?? '';
                    $niveauClass = $niveau === 'Avancé' ? 'avance' : ($niveau === 'Débutant' ? 'debutant' : '');
                    $icon        = $icons[$id] ?? '<div class="card-icon-wrap icon-purple">📚</div>';
                    $rating      = $ratings[$id] ?? ['score' => '4.5', 'count' => '0'];
                    $card_tags   = $tags[$id] ?? [];
                    $format      = $formats[$id] ?? 'En ligne';
                    $isFeatured  = ($id === $featured_id);
                ?>
                <div class="card <?= $isFeatured ? 'card-featured' : '' ?>">

                    <?php if ($isFeatured): ?>
                        <div class="card-featured-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            Populaire
                        </div>
                    <?php endif; ?>

                    <div class="card-top">
                        <?= $icon ?>
                        <span class="badge <?= $niveauClass ?>"><?= htmlspecialchars($niveau) ?></span>
                    </div>

                    <h3><?= htmlspecialchars($f['titre']) ?></h3>

                    <div class="card-rating">
                        <?= stars((float)$rating['score']) ?>
                        <span class="rating-count">
                            <?= $rating['score'] ?>
                            <span class="rating-reviews">(<?= $rating['count'] ?> avis)</span>
                        </span>
                    </div>

                    <p><?= htmlspecialchars($f['description'] ?? '') ?></p>

                    <?php if (!empty($card_tags)): ?>
                        <div class="card-tags">
                            <?php foreach ($card_tags as $tag): ?>
                                <span class="card-tag"><?= htmlspecialchars($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <ul class="card-meta">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <?= htmlspecialchars($f['duree'] ?? '') ?>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                            <?= htmlspecialchars($format) ?>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                            Certificat inclus
                        </li>
                    </ul>

                    <div class="card-btns">
                        <a href="index.php?page=formation_detail&id=<?= $id ?>" class="btn-outline">Voir programme</a>
                        <a href="index.php?page=inscription&formation_id=<?= $id ?>" class="btn">S'inscrire</a>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>