<?php
// Exécution du fichier de création du fichier matchs.json
include 'export_matchs.php';
// Chargement des données JSON
$matchs = json_decode(file_get_contents('json/matchs.json'), true);

// Dernier match (le premier dans l'ordre du tableau)
$dernierMatch = $matchs[0];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournois - Dernier Match</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto p-4">
        <!-- Dernier match -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Dernier Match</h2>
            <div class="flex items-center justify-between">
                <!-- Équipe Domicile -->
                <div class="flex items-center">
                    <img src="<?= $dernierMatch['logo_domicile']; ?>" alt="Logo Domicile" class="h-12 w-12 mr-4">
                    <span class="text-lg font-bold"><?= $dernierMatch['equipe_domicile']; ?></span>
                </div>

                <!-- Score -->
                <span class="text-xl font-semibold text-center"><?= $dernierMatch['dom_score']; ?> - <?= $dernierMatch['ext_score']; ?></span>

                <!-- Équipe Extérieure -->
                <div class="flex items-center">
                    <span class="text-lg font-bold"><?= $dernierMatch['equipe_exterieur']; ?></span>
                    <img src="<?= $dernierMatch['logo_exterieur']; ?>" alt="Logo Extérieur" class="h-12 w-12 ml-4">
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-2">Championnat: <?= $dernierMatch['championnat']; ?></p>
        </div>

        <!-- Liste des matchs -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Tous les matchs</h2>
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-left">Équipe Domicile</th>
                        <th class="px-4 py-2 text-left">Score</th>
                        <th class="px-4 py-2 text-left">Équipe Extérieure</th>
                        <th class="px-4 py-2 text-left">Championnat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matchs as $match) : ?>
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <div class="flex items-center">
                                    <img src="<?= $match['logo_domicile']; ?>" alt="Logo Domicile" class="h-8 w-8 mr-2">
                                    <span><?= $match['equipe_domicile']; ?></span>
                                </div>
                            </td>
                            <td class="px-4 py-2 text-center"><?= $match['dom_score']; ?> - <?= $match['ext_score']; ?></td>
                            <td class="px-4 py-2">
                                <div class="flex items-center">
                                    <img src="<?= $match['logo_exterieur']; ?>" alt="Logo Extérieur" class="h-8 w-8 mr-2">
                                    <span><?= $match['equipe_exterieur']; ?></span>
                                </div>
                            </td>
                            <td class="px-4 py-2"><?= $match['championnat']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
