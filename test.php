<?php

echo "Hello, World !\n";

define("NAME", "Hela");
echo "My name is: " . NAME . "\n\n";

$formations = ["Développement Web", "Réseaux", "Sécurité", "Base de données"];

echo "Affichage avec foreach :\n";

foreach ($formations as $formation) {
    echo $formation . "\n";
}

$tab = array("Développement web", "Réseaux", "Sécurité", "Bases de données");

echo "\nParcourir et affichage avec la boucle foreach :\n";

foreach ($tab as $key => $value) {
    echo $key . " : " . $value . "\n";
}

echo "\nParcourir et affichage avec la boucle while :\n";

$i = 0;
while ($i < count($tab)) {
    echo $tab[$i] . "\n";
    $i++;
}

echo "\nParcourir et affichage avec la boucle for :\n";

for ($i = 0; $i < count($tab); $i++) {
    echo $tab[$i] . "\n";
}

echo "\nTableau associatif :\n";

$user = [
    "nom" => "Hela",
    "prenom" => "Farhat",
    "age" => "20"
];

echo $user["nom"] . "\n";
echo $user["prenom"] . "\n";
echo $user["age"] . "\n";

$utilisateur = [
    "nom" => "Farhat",
    "prenom" => "Hela",
    "email" => "hela@email.com",
    "formation" => "Développement Web",
    "age" => "20"
];

echo "\nInformations utilisateur :\n";

echo "Nom : " . $utilisateur["nom"] . "\n";
echo "Prénom : " . $utilisateur["prenom"] . "\n";
echo "Email : " . $utilisateur["email"] . "\n";
echo "Age : " . $utilisateur["age"] . "\n";
echo "Formation : " . $utilisateur["formation"] . "\n";
if ($utilisateur["age"] >18)
{
echo "Bienvenue";
}
echo "\nTableau multidimensionnel :\n";

$formations = [
    ["nom" => "Développement Web", "duree" => "3 mois"],
    ["nom" => "Réseaux", "duree" => "2 mois"],
    ["nom" => "Sécurité", "duree" => "4 mois"]
];

foreach ($formations as $f) {
    echo "Formation : " . $f["nom"] . " - Durée : " . $f["duree"] . "\n";
}

?>