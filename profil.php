<?php
$nom = "Farhat";
$prenom = "Hella";
$email = "hela.farhat@email.com";
$age =20;
$ville ="Tunis";
$formation = "GTIC";
$tab=
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Profil utilisateur</title>
</head>
<body>
<h1>Profil utilisateur</h1>
<p><strong>Nom :</strong> <?= $nom ?></p>
<p><strong>Prénom :</strong> <?= $prenom ?></p>
<p><strong>Email :</strong> <?= $email ?></p>
<p><strong>Age :</strong> <?= $age ?></p>
<p><strong>Ville :</strong> <?= $ville ?></p>
<p><strong>Formation :</strong> <?= $formation ?></p>
<p>Bienvenue <?=$prenom?> dans la formation <?= $formation?></p>
</body>
</html>