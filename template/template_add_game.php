<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ??  "" ?></title>
</head>
<body>
    <?php include 'component/navbar.php'?>

    <h1>Ajouter un jeu</h1>
    
    <!-- Formulaire -->
    <form action="" method="post">
        <label for="title">Titre du jeu :</label>
        <input type="text" name="title" id="title" placeholder="Titre" required>

        <label for="type">Type de jeu :</label>
        <input type="text" name="type" id="type" placeholder="Type" required>

        <label for="publish_at">Date de publication :</label>
        <input type="date" name="publish_at" id="publish_at" required>

        <!-- Liste déroulante des différentes plateformes -->
        <label for="console">Plateforme :</label>
        <select name="console" id="console">
            <option value="">Choisir une plateforme</option>
            <?php foreach ($data["consoles"] ?? [] as $console) : ?>
                <option value="<?= $console["id"] ?>"><?= $console["name"] ?></option>
            <?php endforeach ?>
        </select>

        <button type="submit" name="submit">Ajouter le jeu</button>
    </form>
    
    <!-- Affichage s'il y a une erreur avec le formulaire -->
    <?php if (!empty($data["errors"])) : ?>
        <p><?= $data["errors"] ?></p>
    <?php endif ?>
    
    <!-- Message de réussite d'enregistrement du jeu -->
    <?php if (!empty($data["valid"])) : ?>
        <p><?= $data["valid"] ?></p>
    <?php endif ?>

</body>
</html>