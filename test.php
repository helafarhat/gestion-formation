<?php
echo "Hello, World !\n";
define("name","Hela");
echo"my name is:".name."<br>";
$tab=array("Développement web","Réseaux","Sécurité","Bases de données");
echo"<h4>Parcourir et afficahge avec la boucle foreach:</h4><br>";
foreach($tab as $key=>$value ){
    echo $key." : ".$value."<br>";
    }
$i=0;
echo"<h4>Parcourir et afficahge avec la boucle while:</h4><br>";
while($i< count($tab)){
    echo $tab[$i]."<br>";
    $i++;
    }
 echo"<h4>Parcourir et afficahge avec la boucle for:</h4><br>";
for ( $i=0;$i< count($tab);$i++){
    echo $tab[$i]."<br>";
    }
echo"<h4>Tableau associatif:</h4><br>";
$user=[
    "nom"=>"hela",
    "prénom"=>"farhat",
    "age"=>"20"];
    echo $user["nom"]."<br>";
    echo $user["prénom"]."<br>";
    echo $user["age"]."<br>";


?>