<?php
require 'includes/connexion.php';
require 'includes/validation.php';
require 'includes/fonctions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Récupérer et nettoyer les données du formulaire
$nom = trim($_POST['nom'] ?? '');
$prenom = trim($_POST['pn'] ?? '');
$email = trim($_POST['email'] ?? '');
$formation_id = (int)($_POST['formation_id'] ?? 0);
// Validation (fonctions du TP4)
$erreur = validerFormulaire($nom, $prenom, $email);
if ($formation_id <= 0) {
$erreur .= 'Veuillez choisir une formation.<br>';
}
if (!empty($erreur)) {
// Afficher les erreurs et arrêter le traitement
echo afficherErreur($erreur);
} else {
// Tout est valide → Insérer en base de données
$pdo = getConnexion();
// 1. Préparer la requête avec des marqueurs ? (placeholders)
// Les ? seront remplacés par les vraies valeurs à l'étape execute()
$stmt = $pdo->prepare(
'INSERT INTO inscriptions (nom, prenom, email, formation_id, statut_paiement,

date_inscription)'
. ' VALUES (?, ?, ?, ?, "en_attente", NOW())'
);
// 2. Exécuter avec les vraies valeurs dans l'ordre des ?
$stmt->execute([$nom, $prenom, $email, $formation_id]);
// 3. Récupérer l'ID de la ligne insérée
$id = $pdo->lastInsertId();
// Rediriger vers la page de paiement avec l'ID
header('Location: paiement.php?id=' . $id);
exit();
}
}
?>