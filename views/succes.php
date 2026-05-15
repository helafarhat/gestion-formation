<?php
$pageTitle = 'Paiement confirmé';
require 'views/partials/header.php';
?>

<div class="form-page">
    <div class="succes-card">
        <div class="succes-icon">✔</div>
        <h1>Paiement confirmé !</h1>
        <p>
            Félicitations <strong><?= htmlspecialchars($_SESSION['etudiant_prenom'] ?? '') ?></strong> !
            Votre inscription à la formation
            <strong><?= htmlspecialchars($_SESSION['formation_titre'] ?? '') ?></strong>
            a bien été enregistrée et votre paiement validé.
        </p>
        <p class="succes-sub">Un e-mail de confirmation vous sera envoyé prochainement.</p>
        <div class="succes-btns">
            <a href="index.php?page=cours" class="btn">Accéder aux cours →</a>
            <a href="index.php" class="btn-outline">Retour à l'accueil</a>
        </div>
    </div>
</div>

<?php require 'views/partials/footer.php'; ?>
