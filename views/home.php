<?php
$pageTitle = 'Accueil';
require 'views/partials/header.php';
?>

<header class="hero">
    <span class="hero-tag">Formations professionnelles certifiantes</span>
    <h1>Développez vos compétences<br>numériques</h1>
    <p>Des formations conçues avec des experts de l'industrie pour vous préparer aux métiers du numérique.</p>
    <div class="hero-actions">
        <a href="index.php?page=formations" class="btn-hero">Voir les formations</a>
        <a href="index.php?page=inscription" class="btn-hero-outline">S'inscrire gratuitement</a>
    </div>
</header>

<section class="stats">
    <div class="stats-container">
        <div class="stat"><h2>1 200+</h2><p>Apprenants actifs</p></div>
        <div class="stat"><h2>6</h2><p>Formations disponibles</p></div>
        <div class="stat"><h2>99%</h2><p>Taux de satisfaction</p></div>
        <div class="stat"><h2>12</h2><p>Instructeurs experts</p></div>
    </div>
</section>

<section class="formations-section">
    <span class="section-tag">Nos programmes</span>
    <h2 class="section-title">Choisissez votre formation</h2>
    <p class="section-sub">Des parcours pensés pour vous préparer aux métiers les plus recherchés du numérique.</p>

    <div class="cards-grid">

        <div class="card">
            <div class="card-top"><span class="card-icon">🤖</span><span class="badge">Intermédiaire</span></div>
            <h3>Intelligence Artificielle</h3>
            <p>Machine learning, réseaux de neurones, TensorFlow et déploiement de modèles IA en production.</p>
            <ul>
                <li>⏱ 3 mois — 120 heures</li>
                <li>🌐 Format hybride</li>
                <li>📜 Certificat inclus</li>
            </ul>
            <div class="card-btns">
                <a href="index.php?page=inscription&formation_id=1" class="btn">S'inscrire</a>
            </div>
        </div>

        <div class="card">
            <div class="card-top"><span class="card-icon">📊</span><span class="badge debutant">Débutant</span></div>
            <h3>Data Science</h3>
            <p>Analyse et visualisation de données avec Python, Pandas, Matplotlib et Power BI.</p>
            <ul>
                <li>⏱ 2.5 mois — 100 heures</li>
                <li>💻 100% en ligne</li>
                <li>📜 Certificat inclus</li>
            </ul>
            <div class="card-btns">
                <a href="index.php?page=inscription&formation_id=2" class="btn">S'inscrire</a>
            </div>
        </div>

        <div class="card">
            <div class="card-top"><span class="card-icon">🔐</span><span class="badge avance">Avancé</span></div>
            <h3>Cybersécurité</h3>
            <p>Sécurité réseau, tests de pénétration, forensique et gestion des incidents de sécurité.</p>
            <ul>
                <li>⏱ 4 mois — 140 heures</li>
                <li>🏛 Présentiel (labo)</li>
                <li>📜 Certificat inclus</li>
            </ul>
            <div class="card-btns">
                <a href="index.php?page=inscription&formation_id=3" class="btn">S'inscrire</a>
            </div>
        </div>

        <div class="card">
            <div class="card-top"><span class="card-icon">☁️</span><span class="badge">Intermédiaire</span></div>
            <h3>Cloud Computing</h3>
            <p>Infrastructure cloud sur AWS, Azure et Google Cloud. Docker, Kubernetes et DevOps.</p>
            <ul>
                <li>⏱ 2 mois — 80 heures</li>
                <li>💻 100% en ligne</li>
                <li>📜 Certificat inclus</li>
            </ul>
            <div class="card-btns">
                <a href="index.php?page=inscription&formation_id=4" class="btn">S'inscrire</a>
            </div>
        </div>

        <div class="card">
            <div class="card-top"><span class="card-icon">🌐</span><span class="badge debutant">Débutant</span></div>
            <h3>Développement Web</h3>
            <p>HTML, CSS, JavaScript, React et Node.js. Du front-end au back-end, une formation complète.</p>
            <ul>
                <li>⏱ 4 mois — 160 heures</li>
                <li>🔄 Format hybride</li>
                <li>📜 Certificat inclus</li>
            </ul>
            <div class="card-btns">
                <a href="index.php?page=inscription&formation_id=5" class="btn">S'inscrire</a>
            </div>
        </div>

        <div class="card">
            <div class="card-top"><span class="card-icon">📱</span><span class="badge">Intermédiaire</span></div>
            <h3>Développement Mobile</h3>
            <p>Création d'applications iOS et Android avec React Native et Flutter. UX/UI incluse.</p>
            <ul>
                <li>⏱ 3 mois — 120 heures</li>
                <li>💻 100% en ligne</li>
                <li>📜 Certificat inclus</li>
            </ul>
            <div class="card-btns">
                <a href="index.php?page=inscription&formation_id=6" class="btn">S'inscrire</a>
            </div>
        </div>

    </div>
</section>

<section class="cta-section">
    <h2>Prêt à commencer votre parcours ?</h2>
    <p>Rejoignez plus de 1 200 apprenants et transformez votre carrière dès aujourd'hui.</p>
    <a href="index.php?page=inscription" class="btn">S'inscrire maintenant</a>
</section>

<?php require 'views/partials/footer.php'; ?>
