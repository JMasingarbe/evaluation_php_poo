<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <option value="PlayStation 5">PlayStation 5</option>
            <option value="Switch">Switch</option>
            <option value="Xbox Series X">Xbox Series X</option>
            <option value="Steam Deck">Steam Deck</option>
        </select>

        <button type="submit" name="submit">Ajouter le jeu</button>
    </form>
</body>
</html>