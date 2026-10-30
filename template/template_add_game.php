<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ??  "" ?></title>
</head>
<body>
    <h1>Ajouter un jeu</h1>
    
    <form action="" method="post">
        <label for="title">Titre du jeu :</label>
        <input type="text" name="title" id="title" placeholder="Titre" required>

        <label for="type">Type de jeu :</label>
        <input type="text" name="type" id="type" placeholder="Type" required>

        <label for="publish_at">Date de publication :</label>
        <input type="date" name="publish_at" id="publish_at" required>

        <label for="console">Plateforme :</label>
        <select name="console" id="console">
            <option value="">Choisir une plateforme</option>
            <?php foreach ($data["consoles"] ?? [] as $console) : ?>
                <option value="<?= $console["id"] ?>"><?= $console["name"] ?></option>
            <?php endforeach ?>
        </select>

        <button type="submit" name="submit">Ajouter le jeu</button>
    </form>
    
    <?php if (!empty($data["errors"])) : ?>
        <p><?= $data["errors"] ?></p>
    <?php endif ?>
    
    <?php if (!empty($data["valid"])) : ?>
        <p><?= $data["valid"] ?></p>
    <?php endif ?>

</body>
</html>