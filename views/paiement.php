<?php
$pageTitle = 'Paiement';
require 'views/partials/header.php';
?>

<div class="form-page" style="max-width:720px">

    <h1>Finaliser mon inscription</h1>
    <p class="form-intro">Vérifiez les informations de votre inscription avant de confirmer le paiement.</p>

    <?php if ($erreur_paiement): ?>
        <div class="alert alert-error">
            Paiement refusé. Veuillez vérifier vos informations et réessayer.
        </div>
    <?php endif; ?>

    <div class="form-card">

        <!-- RECAP -->
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

        <!-- CARD FORM (visuel uniquement) -->
        <p class="form-section-title">Informations de paiement</p>

        <div class="card-payment-box">

            <!-- Accepted cards -->
            <div class="card-brands">
                <span class="card-brand visa">VISA</span>
                <span class="card-brand mastercard">MC</span>
                <span class="card-brand amex">AMEX</span>
            </div>

            <div class="form-group" style="margin-bottom:16px">
                <label>Numéro de carte</label>
                <div class="card-input-wrap">
                    <span class="card-input-icon">💳</span>
                    <input type="text" placeholder="1234  5678  9012  3456" maxlength="19"
                           oninput="formatCard(this)" style="padding-left:40px">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Date d'expiration</label>
                    <input type="text" placeholder="MM / AA" maxlength="7"
                           oninput="formatExpiry(this)">
                </div>
                <div class="form-group">
                    <label>CVV</label>
                    <input type="password" placeholder="•••" maxlength="4">
                </div>
            </div>

            <div class="form-group" style="margin-bottom:0">
                <label>Nom sur la carte</label>
                <input type="text" placeholder="Ex : Mohamed Ben Ali">
            </div>

        </div>

        <!-- BOUTONS -->
        <p class="form-section-title" style="margin-top:24px">Confirmation du paiement</p>
        <p style="font-size:13px; color:var(--muted); margin-bottom:16px;">
            Choisissez le résultat pour finaliser votre inscription.
        </p>

        <div class="paiement-btns">
            <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>">
                <input type="hidden" name="mode" value="ok">
                <button type="submit" class="btn-paiement btn-paiement-ok">
                    🔒 Confirmer et payer <?= number_format($inscription['prix'], 2) ?> DT
                </button>
            </form>
            <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>">
                <input type="hidden" name="mode" value="echec">
                <button type="submit" class="btn-paiement btn-paiement-ko">
                    ✖ Annuler
                </button>
            </form>
        </div>

        <div class="paiement-secure">
            🔐 Paiement sécurisé — vos données sont protégées par chiffrement SSL
        </div>

        <a href="index.php?page=inscription" class="form-back">← Modifier mon inscription</a>

    </div>
</div>

<style>
.card-payment-box {
    background: var(--purple-ghost);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 20px 22px;
    margin-bottom: 8px;
}

.card-brands {
    display: flex;
    gap: 8px;
    margin-bottom: 18px;
}

.card-brand {
    padding: 4px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.visa       { background: #1A1F71; color: white; }
.mastercard { background: #EB001B; color: white; }
.amex       { background: #007BC1; color: white; }

.card-input-wrap {
    position: relative;
}

.card-input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
}

.card-input-wrap input {
    padding-left: 40px !important;
}

.paiement-secure {
    text-align: center;
    font-size: 12px;
    color: var(--muted);
    margin-top: 16px;
    padding: 10px;
    background: var(--purple-ghost);
    border-radius: var(--radius-sm);
    border: 1px solid var(--border);
}
</style>

<script>
function formatCard(input) {
    let val = input.value.replace(/\D/g, '').substring(0, 16);
    input.value = val.replace(/(.{4})/g, '$1  ').trim();
}

function formatExpiry(input) {
    let val = input.value.replace(/\D/g, '').substring(0, 4);
    if (val.length >= 2) val = val.substring(0,2) + ' / ' + val.substring(2);
    input.value = val;
}
</script>

<?php require 'views/partials/footer.php'; ?>
