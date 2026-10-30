<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <h1>Tous les jeux enregistrés</h1>
    <?php foreach ($data["games"] ?? [] as $game) : ?>
        <article>
            <h2><?= $game["title"] ?></h2>
            <p>Type : <?= $game["type"] ?></p>
            <p>Sortie le <?= $game["publish_at"] ?></p>
            <p>Plateforme : <?= $game["console"] ?></p>
        </article>
    <?php endforeach ?>
</body>
</html>