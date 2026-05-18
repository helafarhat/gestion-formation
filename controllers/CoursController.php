<?php
// controllers/CoursController.php
require_once 'models/Inscription.php';
require_once 'models/Formation.php';

$inscription_id  = $_SESSION['inscription_id']  ?? 0;
$formation_titre = $_SESSION['formation_titre'] ?? 'Votre formation';
$prenom          = $_SESSION['etudiant_prenom'] ?? 'Étudiant';
$inscription     = ($inscription_id > 0) ? Inscription::getById($inscription_id) : null;

// Récupérer l'ID de la formation depuis la session via l'inscription
$formation_id = $inscription['formation_id'] ?? 1;

// Chapitres avec vidéo YouTube et PDF par formation
$tous_chapitres = [
    1 => [ // Intelligence Artificielle
        ['num' => 1, 'titre' => 'Introduction à l\'Intelligence Artificielle', 'duree' => '45 min',
         'video' => 'https://www.youtube.com/embed/JMUxmLyrhSk',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 2, 'titre' => 'Mathématiques pour le Machine Learning', 'duree' => '1h 20min',
         'video' => 'https://www.youtube.com/embed/1VSZtNYMntM',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 3, 'titre' => 'Python & bibliothèques Data', 'duree' => '1h 30min',
         'video' => 'https://www.youtube.com/embed/rfscVS0vtbw',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 4, 'titre' => 'Machine Learning supervisé', 'duree' => '2h',
         'video' => 'https://www.youtube.com/embed/NWONeJKn9Kc',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 5, 'titre' => 'Deep Learning & réseaux de neurones', 'duree' => '2h 15min',
         'video' => 'https://www.youtube.com/embed/aircAruvnKk',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 6, 'titre' => 'NLP & Transformers', 'duree' => '1h 45min',
         'video' => 'https://www.youtube.com/embed/TQQlZhbC5ps',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
    ],
    2 => [ // Data Science
        ['num' => 1, 'titre' => 'Introduction à la Data Science', 'duree' => '40 min',
         'video' => 'https://www.youtube.com/embed/X3paOmcrTjQ',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 2, 'titre' => 'Python & Pandas pour la data', 'duree' => '1h 30min',
         'video' => 'https://www.youtube.com/embed/vmEHCJofslg',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 3, 'titre' => 'Visualisation avec Matplotlib & Seaborn', 'duree' => '1h 10min',
         'video' => 'https://www.youtube.com/embed/UO98lJQ3QGI',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 4, 'titre' => 'Statistiques & tests d\'hypothèses', 'duree' => '1h 25min',
         'video' => 'https://www.youtube.com/embed/oI3hZJqXJuc',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 5, 'titre' => 'Power BI & tableaux de bord', 'duree' => '1h',
         'video' => 'https://www.youtube.com/embed/NNSHu0rkew8',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
    ],
    3 => [ // Cybersécurité
        ['num' => 1, 'titre' => 'Fondamentaux de la cybersécurité', 'duree' => '50 min',
         'video' => 'https://www.youtube.com/embed/inWWhr5tnEA',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 2, 'titre' => 'Sécurité réseau & protocoles', 'duree' => '1h 20min',
         'video' => 'https://www.youtube.com/embed/qiQR5rTSshw',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 3, 'titre' => 'Cryptographie appliquée', 'duree' => '1h 10min',
         'video' => 'https://www.youtube.com/embed/AQDCe585Lnc',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 4, 'titre' => 'OWASP Top 10 & sécurité web', 'duree' => '1h 30min',
         'video' => 'https://www.youtube.com/embed/rWHvp7rUka8',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 5, 'titre' => 'Tests de pénétration avec Kali Linux', 'duree' => '2h',
         'video' => 'https://www.youtube.com/embed/3Kq1MIfTWCE',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
    ],
    4 => [ // Cloud
        ['num' => 1, 'titre' => 'Introduction au Cloud Computing', 'duree' => '45 min',
         'video' => 'https://www.youtube.com/embed/M988_fsOSWo',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 2, 'titre' => 'Amazon Web Services — les essentiels', 'duree' => '1h 30min',
         'video' => 'https://www.youtube.com/embed/3hLmDS179YE',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 3, 'titre' => 'Docker & conteneurisation', 'duree' => '1h 20min',
         'video' => 'https://www.youtube.com/embed/3c-iBn73dDE',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 4, 'titre' => 'Kubernetes — orchestration', 'duree' => '1h 15min',
         'video' => 'https://www.youtube.com/embed/X48VuDVv0do',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
    ],
    5 => [ // Dev Web
        ['num' => 1, 'titre' => 'HTML5 & CSS3 — les fondamentaux', 'duree' => '1h',
         'video' => 'https://www.youtube.com/embed/mU6anWqZJcc',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 2, 'titre' => 'JavaScript moderne (ES6+)', 'duree' => '1h 30min',
         'video' => 'https://www.youtube.com/embed/hdI2bqOjy3c',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 3, 'titre' => 'React.js — composants & hooks', 'duree' => '2h',
         'video' => 'https://www.youtube.com/embed/w7ejDZ8SWv8',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 4, 'titre' => 'Node.js & Express — API REST', 'duree' => '1h 45min',
         'video' => 'https://www.youtube.com/embed/Oe421EPjeBE',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 5, 'titre' => 'Base de données MySQL', 'duree' => '1h 20min',
         'video' => 'https://www.youtube.com/embed/7S_tz1z_5bA',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
    ],
    6 => [ // Mobile
        ['num' => 1, 'titre' => 'Introduction au développement mobile', 'duree' => '40 min',
         'video' => 'https://www.youtube.com/embed/0-S5a0eXPoc',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 2, 'titre' => 'React Native — fondamentaux', 'duree' => '1h 30min',
         'video' => 'https://www.youtube.com/embed/0DhIFaaned4',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 3, 'titre' => 'Flutter & Dart', 'duree' => '1h 45min',
         'video' => 'https://www.youtube.com/embed/VPvVD8t02U8',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
        ['num' => 4, 'titre' => 'Intégration Firebase & APIs', 'duree' => '1h 10min',
         'video' => 'https://www.youtube.com/embed/sfA3NWDBPZ4',
         'pdf'   => 'https://www.w3.org/WAI/WCAG21/Techniques/pdf/PDF1'],
    ],
];

$chapitres = $tous_chapitres[$formation_id] ?? $tous_chapitres[1];

// Chapitre actif sélectionné
$chapitre_actif = isset($_GET['chapitre']) ? (int)$_GET['chapitre'] : 1;
$chapitre_actif = max(1, min($chapitre_actif, count($chapitres)));
$ch_courant = $chapitres[$chapitre_actif - 1];

require 'views/cours.php';
?>
