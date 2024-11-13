<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'tournois';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération des données des matchs avec les informations des équipes et des championnats
$stmt = $pdo->prepare("
    SELECT 
        matchs.id,
        equipes_domicile.nom AS equipe_domicile,
        equipes_domicile.url_logo AS logo_domicile,
        equipes_exterieur.nom AS equipe_exterieur,
        equipes_exterieur.url_logo AS logo_exterieur,
        matchs.dom_score,
        matchs.ext_score,
        championnats.nom AS championnat
    FROM matchs
    JOIN equipes AS equipes_domicile ON matchs.domicile = equipes_domicile.id
    JOIN equipes AS equipes_exterieur ON matchs.exterieur = equipes_exterieur.id
    JOIN championnats ON matchs.championnat_id = championnats.id
");
$stmt->execute();

$matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sauvegarde des données au format JSON
file_put_contents('json/matchs.json', json_encode($matchs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

?>
