<?php
// models/Formation.php
// Toutes les requêtes SQL liées à la table formations.
// Ne contient aucune logique d'affichage.

require_once 'models/Database.php';

class Formation {

    // Récupérer toutes les formations
    public static function getAll(): array {
        $pdo  = Database::connect();
        $stmt = $pdo->query('SELECT * FROM formations ORDER BY id ASC');
        return $stmt->fetchAll();
    }

    // Récupérer une formation par son ID
    public static function getById(int $id): array|false {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare('SELECT * FROM formations WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>
