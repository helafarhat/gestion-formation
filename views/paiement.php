<?php
$pageTitle = 'Paiement';
require 'views/partials/header.php';
?>

<div class="form-page">

    <h1>Finaliser mon inscription</h1>
    <p class="form-intro">Vérifiez les informations de votre inscription avant de confirmer.</p>

    <?php if ($erreur_paiement): ?>
        <div class="alert alert-error">
            Paiement refusé. Veuillez réessayer ou choisir un autre mode.
        </div>
    <?php endif; ?>

    <div class="form-card">

        <p class="form-section-title">Récapitulatif de la commande</p>

        <div class="recap-box">
            <div class="recap-row">
                <span>Étudiant</span>
                <span><?= htmlspecialchars($inscription['prenom'] . ' ' . $inscription['nom']) ?></span>
            </div>
            <div class="recap-row">
                <span>Formation</span>
                <span><?= htmlspecialchars($inscription['formation_titre']) ?></span>
            </div>
            <div class="recap-row recap-total">
                <span>Total à payer</span>
                <span><?= number_format($inscription['prix'], 2) ?> DT</span>
            </div>
        </div>

        <p class="form-section-title">Confirmation du paiement</p>
        <p style="font-size:13px; color:#7C6D97; margin-bottom:16px;">
            Choisissez votre mode de paiement pour finaliser votre inscription.
        </p>

        <div class="paiement-btns">

            <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>">
                <input type="hidden" name="mode" value="ok">
                <button type="submit" class="btn-paiement btn-paiement-ok">
                    ✔ Confirmer et payer
                </button>
            </form>

            <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>">
                <input type="hidden" name="mode" value="echec">
                <button type="submit" class="btn-paiement btn-paiement-ko">
                   ✖ Annuler
                </button>
            </form>

        </div>

        <a href="index.php?page=inscription" class="form-back">← Modifier mon inscription</a>

    </div>
</div>

<?php require 'views/partials/footer.php'; ?>
