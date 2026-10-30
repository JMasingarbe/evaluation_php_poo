<?php

namespace App\Service;

use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Game;
use App\Utils\Tools;

class GameService
{
    // Attribut
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    public function gameForm(array $post): array
    {
        $data = [];

        // On vérifie si tous les champs sont remplis
        if (
            empty(trim($_POST["title"])) 
            || empty(trim($_POST["type"])) 
            || empty($_POST["publish_at"]) 
            || empty(trim($_POST["console"]))
        ) {
            $data["errors"] = "Veuillez remplir tous les champs.";
            return $data;
        }

        // Création de l'objet Console qui correspond à l'id console du formulaire
        $console = $this->consoleRepository->findConsoleById(Tools::sanitize($_POST["console"]));

        // Création de l'objet Game selon le formulaire en le nettoyant
        $game = new Game(
            Tools::sanitize($_POST["title"]), 
            Tools::sanitize($_POST["type"]),
            new \DateTimeImmutable(Tools::sanitize($_POST["publish_at"])),
            $console
        );

        // Envoie à la bdd le nouveau jeu
        $game = $this->gameRepository->saveGame($game);

        if ($game != null) {
            // Message de réussite et le nouveau jeu
            $data["valid"] = "Le jeu " . $game->getTitle() . " a bien été enregistré.";
        } else {
            // Message s'il y a eu un problème d'enregistrement
            $data["errors"] = "Le jeu " . Tools::sanitize($_POST["title"]) . " n'a pas pu être enregistré.";
        }

        return $data;
    }
}