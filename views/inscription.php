<?php
// views/inscription.php
$pageTitle = 'Inscription';
require 'views/partials/header.php';
?>

<div class="form-page">

    <h1>Formulaire d'inscription</h1>
    <p class="form-intro">Remplissez ce formulaire pour rejoindre la formation de votre choix. Notre équipe vous contactera dans les 48 heures.</p>

    <div class="form-card">

        <?php if (!empty($erreurs)): ?>
            <div class="alert alert-error">
                <strong>Erreurs détectées :</strong>
                <ul>
                    <?php foreach ($erreurs as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=inscription">

            <p class="form-section-title">Informations personnelles</p>

            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom <span class="req">*</span></label>
                    <input type="text" id="nom" name="nom"
                           value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
                           placeholder="Ex : Farhat" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom <span class="req">*</span></label>
                    <input type="text" id="prenom" name="prenom"
                           value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>"
                           placeholder="Ex : Hela" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail <span class="req">*</span></label>
                <input type="email" id="email" name="email"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       placeholder="Ex : hela.farhat@email.com" required>
            </div>

            <p class="form-section-title">Formation souhaitée</p>

            <div class="form-group">
                <label for="formation_id">Choisissez une formation <span class="req">*</span></label>
                <select id="formation_id" name="formation_id" required>
                    <option value="" disabled selected>-- Sélectionner une formation --</option>
                    <?php foreach ($formations as $f): ?>
                        <option value="<?= $f['id'] ?>"
                            <?= (isset($formation_preselect) && $formation_preselect == $f['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($f['titre']) ?> — <?= number_format($f['prix'], 2) ?> DT
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Votre niveau actuel <span class="req">*</span></label>
                <div class="radio-group">
                    <label class="radio-label"><input type="radio" name="niveau" value="debutant" required> Débutant</label>
                    <label class="radio-label"><input type="radio" name="niveau" value="intermediaire"> Intermédiaire</label>
                    <label class="radio-label"><input type="radio" name="niveau" value="avance"> Avancé</label>
                </div>
            </div>

            <div class="form-group">
                <label>Format préféré</label>
                <div class="radio-group">
                    <label class="radio-label"><input type="radio" name="format" value="presentiel"> Présentiel</label>
                    <label class="radio-label"><input type="radio" name="format" value="enligne"> En ligne</label>
                    <label class="radio-label"><input type="radio" name="format" value="hybride"> Hybride</label>
                </div>
            </div>

            <button type="submit" class="btn-submit">Continuer vers le paiement →</button>

            <a href="index.php" class="form-back">← Retour à l'accueil</a>

        </form>
    </div>
</div>

<?php require 'views/partials/footer.php'; ?>