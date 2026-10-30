<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <?php include 'component/navbar.php'?>

    <h1>Tous les jeux enregistrés</h1>

    <!-- Pour chaque jeu affiche son article -->
    <?php foreach ($data["games"] ?? [] as $game) : ?>
        <article>
            <h2><?= $game["title"] ?></h2>
            <p>Type : <?= $game["type"] ?>.</p>
            <!-- Je transforme le string de la date en un objet \DateTimeImmutable pour modifier le formatage de l'affichage de la date -->
            <p>Sortie le <?= new \DateTimeImmutable($game["publish_at"])->format("d/m/Y") ?>.</p>
            <p>Plateforme : <?= $game["console"] ?>.</p>
        </article>
    <?php endforeach ?>
</body>
</html>