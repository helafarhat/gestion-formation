-- ============================================
-- FormaPro — Script de création de la base de données
-- ============================================

CREATE DATABASE IF NOT EXISTS gestion_formations
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE gestion_formations;

-- ─── Table formations ───────────────────────
CREATE TABLE IF NOT EXISTS formations (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    titre       VARCHAR(150)    NOT NULL,
    description TEXT            NOT NULL,
    categorie   VARCHAR(80)     NOT NULL,
    emoji       VARCHAR(10)     DEFAULT '📚',
    prix        DECIMAL(8,2)    NOT NULL DEFAULT 0.00,
    duree       VARCHAR(50)     NOT NULL,
    niveau      ENUM('Débutant','Intermédiaire','Avancé') NOT NULL DEFAULT 'Débutant',
    created_at  DATETIME        DEFAULT NOW()
);

-- ─── Table inscriptions ─────────────────────
CREATE TABLE IF NOT EXISTS inscriptions (
    id                INT AUTO_INCREMENT PRIMARY KEY,
    nom               VARCHAR(80)  NOT NULL,
    prenom            VARCHAR(80)  NOT NULL,
    email             VARCHAR(150) NOT NULL,
    formation_id      INT          NOT NULL,
    statut_paiement   ENUM('en_attente','paye') NOT NULL DEFAULT 'en_attente',
    date_inscription  DATETIME     DEFAULT NOW(),
    FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE CASCADE
);

-- ─── 6 formations (mêmes que le projet HTML/CSS) ────────────────────
INSERT INTO formations (titre, description, categorie, emoji, prix, duree, niveau) VALUES

('Intelligence Artificielle',
 'Maîtrisez le machine learning, les réseaux de neurones et les outils IA modernes comme TensorFlow et PyTorch. Une formation complète pour préparer les métiers de l\'intelligence artificielle.',
 'IA & Data', '🤖', 299.00, '120h — 3 mois', 'Intermédiaire'),

('Data Science',
 'Apprenez à collecter, analyser et visualiser des données massives. Transformez des données brutes en informations utiles avec Python, Pandas et Power BI.',
 'IA & Data', '📊', 249.00, '100h — 2.5 mois', 'Débutant'),

('Cybersécurité',
 'Maîtrisez les techniques de protection des systèmes, de détection des menaces et de réponse aux incidents. Préparez-vous aux certifications Security+ et CEH.',
 'Sécurité', '🔐', 349.00, '140h — 4 mois', 'Avancé'),

('Cloud Computing',
 'Déployez et gérez des infrastructures cloud sur AWS, Azure et Google Cloud. Maîtrisez Docker, Kubernetes et les pratiques DevOps modernes.',
 'Infrastructure', '☁️', 199.00, '80h — 2 mois', 'Intermédiaire'),

('Développement Web',
 'Créez des applications web complètes avec HTML, CSS, JavaScript, React et Node.js. Du front-end au back-end, une formation complète.',
 'Développement', '🌐', 179.00, '160h — 4 mois', 'Débutant'),

('Développement Mobile',
 'Créez des applications iOS et Android avec React Native et Flutter. Conception UX/UI mobile incluse.',
 'Développement', '📱', 229.00, '120h — 3 mois', 'Intermédiaire');
