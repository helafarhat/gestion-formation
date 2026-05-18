<?php
// controllers/FormationDetailController.php

require_once 'models/Formation.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header('Location: index.php?page=formations');
    exit();
}

$formation = Formation::getById($id);

if (!$formation) {
    header('Location: index.php?page=formations');
    exit();
}

// Modules par formation
$tous_modules = [
    1 => [
        ['num' => 'M1', 'titre' => 'Introduction à l\'Intelligence Artificielle', 'contenu' => 'Histoire, domaines, panorama des techniques', 'duree' => '8h'],
        ['num' => 'M2', 'titre' => 'Mathématiques pour le ML', 'contenu' => 'Algèbre linéaire, probabilités, statistiques', 'duree' => '12h'],
        ['num' => 'M3', 'titre' => 'Python & bibliothèques', 'contenu' => 'NumPy, Pandas, Matplotlib, Scikit-learn', 'duree' => '16h'],
        ['num' => 'M4', 'titre' => 'Machine Learning supervisé', 'contenu' => 'Régression, classification, SVM, Random Forest', 'duree' => '20h'],
        ['num' => 'M5', 'titre' => 'Machine Learning non supervisé', 'contenu' => 'Clustering, K-Means, DBSCAN, PCA', 'duree' => '12h'],
        ['num' => 'M6', 'titre' => 'Deep Learning', 'contenu' => 'Réseaux de neurones, CNN, RNN, TensorFlow, Keras', 'duree' => '24h'],
        ['num' => 'M7', 'titre' => 'NLP — Traitement du langage naturel', 'contenu' => 'Transformers, BERT, analyse de sentiment', 'duree' => '16h'],
        ['num' => 'M8', 'titre' => 'Déploiement & MLOps', 'contenu' => 'Docker, Flask, MLflow, monitoring de modèles', 'duree' => '12h'],
    ],
    2 => [
        ['num' => 'M1', 'titre' => 'Introduction à la Data Science', 'contenu' => 'Cycle de vie d\'un projet data, outils, environnement Jupyter', 'duree' => '6h'],
        ['num' => 'M2', 'titre' => 'Python & bibliothèques data', 'contenu' => 'NumPy, Pandas, manipulation de DataFrames', 'duree' => '18h'],
        ['num' => 'M3', 'titre' => 'Collecte & nettoyage des données', 'contenu' => 'Web scraping, APIs REST, valeurs manquantes, outliers', 'duree' => '14h'],
        ['num' => 'M4', 'titre' => 'Analyse exploratoire (EDA)', 'contenu' => 'Statistiques descriptives, corrélations, distributions', 'duree' => '14h'],
        ['num' => 'M5', 'titre' => 'Visualisation des données', 'contenu' => 'Matplotlib, Seaborn, graphiques interactifs Plotly', 'duree' => '12h'],
        ['num' => 'M6', 'titre' => 'Statistiques & tests d\'hypothèses', 'contenu' => 'Inférence statistique, ANOVA, tests A/B', 'duree' => '16h'],
        ['num' => 'M7', 'titre' => 'Tableaux de bord & reporting', 'contenu' => 'Power BI, Plotly Dash, storytelling avec les données', 'duree' => '12h'],
        ['num' => 'M8', 'titre' => 'Projet final Capstone', 'contenu' => 'Analyse complète d\'un dataset réel, rapport et présentation', 'duree' => '8h'],
    ],
    3 => [
        ['num' => 'M1', 'titre' => 'Fondamentaux de la sécurité', 'contenu' => 'Triade CIA, menaces, vulnérabilités, cadres réglementaires', 'duree' => '10h'],
        ['num' => 'M2', 'titre' => 'Sécurité réseau', 'contenu' => 'Firewalls, VPN, IDS/IPS, DMZ, segmentation', 'duree' => '20h'],
        ['num' => 'M3', 'titre' => 'Cryptographie appliquée', 'contenu' => 'Chiffrement symétrique/asymétrique, PKI, hachage', 'duree' => '14h'],
        ['num' => 'M4', 'titre' => 'Sécurité des applications web', 'contenu' => 'OWASP Top 10, injections SQL, XSS, CSRF', 'duree' => '20h'],
        ['num' => 'M5', 'titre' => 'Tests de pénétration', 'contenu' => 'Kali Linux, Nmap, Metasploit, Burp Suite, méthode PTES', 'duree' => '28h'],
        ['num' => 'M6', 'titre' => 'Réponse aux incidents & forensique', 'contenu' => 'SIEM, collecte de preuves, analyse de logs', 'duree' => '20h'],
        ['num' => 'M7', 'titre' => 'Conformité & gouvernance', 'contenu' => 'ISO 27001, RGPD, gestion des risques', 'duree' => '14h'],
        ['num' => 'M8', 'titre' => 'Projet CTF & certification', 'contenu' => 'Exercices pratiques, préparation Security+ / CEH', 'duree' => '14h'],
    ],
    4 => [
        ['num' => 'M1', 'titre' => 'Introduction au Cloud', 'contenu' => 'Modèles IaaS, PaaS, SaaS, fournisseurs majeurs', 'duree' => '8h'],
        ['num' => 'M2', 'titre' => 'Amazon Web Services (AWS)', 'contenu' => 'EC2, S3, RDS, Lambda, IAM', 'duree' => '18h'],
        ['num' => 'M3', 'titre' => 'Microsoft Azure', 'contenu' => 'VMs, Blob Storage, Azure Functions, Active Directory', 'duree' => '16h'],
        ['num' => 'M4', 'titre' => 'Google Cloud Platform', 'contenu' => 'Compute Engine, Cloud Storage, BigQuery', 'duree' => '14h'],
        ['num' => 'M5', 'titre' => 'Docker & conteneurisation', 'contenu' => 'Images, conteneurs, Docker Compose, registres', 'duree' => '12h'],
        ['num' => 'M6', 'titre' => 'Kubernetes', 'contenu' => 'Pods, services, déploiements, orchestration', 'duree' => '12h'],
    ],
    5 => [
        ['num' => 'M1', 'titre' => 'HTML5 & CSS3 fondamentaux', 'contenu' => 'Structure, sémantique, Flexbox, Grid', 'duree' => '20h'],
        ['num' => 'M2', 'titre' => 'JavaScript moderne', 'contenu' => 'ES6+, DOM, événements, fetch API', 'duree' => '28h'],
        ['num' => 'M3', 'titre' => 'React.js', 'contenu' => 'Composants, hooks, state, props, React Router', 'duree' => '32h'],
        ['num' => 'M4', 'titre' => 'Node.js & Express', 'contenu' => 'API REST, middleware, authentification JWT', 'duree' => '28h'],
        ['num' => 'M5', 'titre' => 'Base de données', 'contenu' => 'MySQL, MongoDB, ORM, requêtes avancées', 'duree' => '20h'],
        ['num' => 'M6', 'titre' => 'Déploiement web', 'contenu' => 'Git, GitHub, Netlify, Heroku, CI/CD basique', 'duree' => '12h'],
        ['num' => 'M7', 'titre' => 'Projet full stack', 'contenu' => 'Application complète de A à Z, code review', 'duree' => '20h'],
    ],
    6 => [
        ['num' => 'M1', 'titre' => 'Introduction au mobile', 'contenu' => 'Écosystèmes iOS et Android, outils de développement', 'duree' => '8h'],
        ['num' => 'M2', 'titre' => 'React Native fondamentaux', 'contenu' => 'Composants natifs, navigation, styles', 'duree' => '24h'],
        ['num' => 'M3', 'titre' => 'Flutter & Dart', 'contenu' => 'Widgets, état, navigation, animations', 'duree' => '28h'],
        ['num' => 'M4', 'titre' => 'APIs & données mobiles', 'contenu' => 'REST, Firebase, stockage local AsyncStorage', 'duree' => '20h'],
        ['num' => 'M5', 'titre' => 'UX/UI mobile', 'contenu' => 'Design patterns mobiles, accessibilité, prototypage', 'duree' => '16h'],
        ['num' => 'M6', 'titre' => 'Publication & déploiement', 'contenu' => 'App Store, Google Play, tests, versioning', 'duree' => '12h'],
        ['num' => 'M7', 'titre' => 'Projet final', 'contenu' => 'Application mobile complète iOS & Android', 'duree' => '12h'],
    ],
];

$modules = $tous_modules[$formation['id']] ?? [];

// Objectifs par formation
$tous_objectifs = [
    1 => ['Comprendre les fondements mathématiques du machine learning', 'Maîtriser les algorithmes supervisés et non supervisés', 'Concevoir des réseaux de neurones avec TensorFlow et PyTorch', 'Implémenter des projets de vision par ordinateur et NLP', 'Déployer des modèles en production avec Docker et APIs REST'],
    2 => ['Collecter et nettoyer des données provenant de sources variées', 'Réaliser des analyses exploratoires complètes', 'Maîtriser Python, Pandas, NumPy et Matplotlib', 'Construire des tableaux de bord interactifs avec Power BI', 'Communiquer des résultats à des non-spécialistes'],
    3 => ['Identifier et analyser les vulnérabilités des systèmes', 'Mettre en œuvre des solutions IDS/IPS', 'Réaliser des tests de pénétration éthiques', 'Gérer la réponse aux incidents de sécurité', 'Se préparer aux certifications Security+ et CEH'],
    4 => ['Déployer des infrastructures sur AWS, Azure et GCP', 'Maîtriser Docker et Kubernetes', 'Appliquer les pratiques DevOps modernes', 'Gérer la sécurité et la scalabilité cloud'],
    5 => ['Créer des interfaces web responsive avec HTML/CSS', 'Développer des applications React.js modernes', 'Construire des APIs REST avec Node.js', 'Gérer des bases de données SQL et NoSQL', 'Déployer une application web complète'],
    6 => ['Créer des applications iOS et Android', 'Maîtriser React Native et Flutter', 'Intégrer des APIs et Firebase', 'Publier sur App Store et Google Play'],
];

$objectifs = $tous_objectifs[$formation['id']] ?? [];
$icons = [
    1 => ['class' => 'icon-purple', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><circle cx="9" cy="10" r="1" fill="currentColor"/><circle cx="15" cy="10" r="1" fill="currentColor"/><path d="M9 13c1 1 5 1 6 0"/></svg>'],
    2 => ['class' => 'icon-blue',   'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>'],
    3 => ['class' => 'icon-orange', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>'],
    4 => ['class' => 'icon-teal',   'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>'],
    5 => ['class' => 'icon-green',  'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
    6 => ['class' => 'icon-pink',   'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>'],
];

$icon = $icons[$formation['id']] ?? ['class' => 'icon-purple', 'svg' => ''];

require 'views/formation_detail.php';
?>
